<?php

namespace App\Services;

use App\Models\ImageFile;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager as InterventionImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ImageManager
{
    const VARIANT_ORIGINAL = 'original';
    const VARIANT_THUMBNAIL = 'thumbnail';
    const VARIANT_COMPRESSED = 'compressed';

    const PREFIX_ORIGINAL = 'or_';
    const PREFIX_THUMBNAIL = 'th_';
    const PREFIX_COMPRESSED = 'cr_';

    // Configuration constants
    const THUMBNAIL_WIDTH = 300;
    const THUMBNAIL_HEIGHT = 300;
    const COMPRESSED_MAX_SIZE = 2097152; // 2 MB in bytes
    const COMPRESSED_QUALITY = 75;
    const MAX_COMPRESSION_QUALITY = 50; // Minimum quality to maintain

    /**
     * Upload and store an image file with three variants (original, thumbnail, compressed)
     * For PDFs, only the original variant is saved.
     *
     * - or (original): Keeps original format and size
     * - th (thumbnail): Resized to 300x300 for preview (images only)
     * - cr (compressed): Compressed to be under 2MB (images only)
     */
    public static function upload(
        UploadedFile $file,
        string $fileType,
        int $modelId,
        string $modelType,
        string $directory = 'certificates'
    ) {
        try {
            // Check if file is image or PDF
            $isImage = str_starts_with($file->getMimeType(), 'image/');
            $isPdf = $file->getMimeType() === 'application/pdf';

            if (!$isImage && !$isPdf) {
                Log::warning('ImageManager: File is neither image nor PDF - ' . $file->getMimeType());
                return [];
            }

            $imageFiles = [];
            $baseFilename = self::generateUniqueFileName($file);
            $extension = $file->getClientOriginalExtension();
            $baseNameWithoutExt = str_replace('.' . $extension, '', $baseFilename);
            $fileContent = file_get_contents($file->getRealPath());

            Log::info('ImageManager: Starting upload - Original: ' . $file->getClientOriginalName() . ' (' . filesize($file->getRealPath()) . ' bytes)');

            // 1. Store ORIGINAL (or_ prefix) - Keep original format
            $originalFilename = self::PREFIX_ORIGINAL . $baseNameWithoutExt . '.' . $extension;
            $originalPath = $directory . '/' . $originalFilename;
            Storage::disk('public')->put($originalPath, $fileContent);

            $imageFiles[] = ImageFile::create([
                'filename' => $originalFilename,
                'original_name' => $file->getClientOriginalName(),
                'file_type' => $fileType,
                'image_variant' => self::VARIANT_ORIGINAL,
                'mime_type' => $file->getMimeType(),
                'file_size' => $file->getSize(),
                'path' => $originalPath,
                'imageable_id' => $modelId,
                'imageable_type' => $modelType,
                'created_by' => auth()->id(),
                'updated_by' => auth()->id(),
            ]);

            Log::info('ImageManager: Original variant created - ' . $originalFilename);

            // For PDFs, only save original variant
            if ($isPdf) {
                Log::info('ImageManager: PDF file uploaded - original variant only');
                return $imageFiles;
            }

            // 2. Store THUMBNAIL (th_ prefix) - Resized to 300x300 (images only)
            $thumbnailResult = self::createThumbnail($fileContent, $baseNameWithoutExt, $directory);
            if ($thumbnailResult) {
                $imageFiles[] = ImageFile::create([
                    'filename' => $thumbnailResult['filename'],
                    'original_name' => $file->getClientOriginalName(),
                    'file_type' => $fileType,
                    'image_variant' => self::VARIANT_THUMBNAIL,
                    'mime_type' => $thumbnailResult['mime_type'],
                    'file_size' => $thumbnailResult['file_size'],
                    'path' => $thumbnailResult['path'],
                    'imageable_id' => $modelId,
                    'imageable_type' => $modelType,
                    'created_by' => auth()->id(),
                    'updated_by' => auth()->id(),
                ]);
                Log::info('ImageManager: Thumbnail variant created - ' . $thumbnailResult['filename'] . ' (' . $thumbnailResult['file_size'] . ' bytes)');
            } else {
                Log::warning('ImageManager: Thumbnail creation failed');
            }

            // 3. Store COMPRESSED (cr_ prefix) - Compressed to under 2MB (images only)
            $compressedResult = self::createCompressed($fileContent, $baseNameWithoutExt, $directory);
            if ($compressedResult) {
                $imageFiles[] = ImageFile::create([
                    'filename' => $compressedResult['filename'],
                    'original_name' => $file->getClientOriginalName(),
                    'file_type' => $fileType,
                    'image_variant' => self::VARIANT_COMPRESSED,
                    'mime_type' => $compressedResult['mime_type'],
                    'file_size' => $compressedResult['file_size'],
                    'path' => $compressedResult['path'],
                    'imageable_id' => $modelId,
                    'imageable_type' => $modelType,
                    'created_by' => auth()->id(),
                    'updated_by' => auth()->id(),
                ]);
                Log::info('ImageManager: Compressed variant created - ' . $compressedResult['filename'] . ' (' . $compressedResult['file_size'] . ' bytes)');
            } else {
                Log::warning('ImageManager: Compressed creation failed');
            }

            Log::info('ImageManager: Upload complete - ' . count($imageFiles) . ' variants created');
            return $imageFiles;
        } catch (\Throwable $e) {
            Log::error('ImageManager upload failed: ' . $e->getMessage() . ' | ' . $e->getFile() . ':' . $e->getLine());
            return [];
        }
    }

    /**
     * Create a thumbnail variant (300x300 resized)
     */
    private static function createThumbnail(string $fileContent, string $baseNameWithoutExt, string $directory): ?array
    {
        $tempFile = null;
        $originalMemoryLimit = ini_get('memory_limit');
        try {
            Log::info('ImageManager: createThumbnail starting for ' . $baseNameWithoutExt);
            Log::info('ImageManager: File content size: ' . strlen($fileContent) . ' bytes');

            // Increase memory limit for image processing
            ini_set('memory_limit', '512M');
            Log::info('ImageManager: Increased memory limit to 512M');

            // Create a temporary file from the content
            $tempFile = tempnam(sys_get_temp_dir(), 'img_');
            $bytesWritten = file_put_contents($tempFile, $fileContent);
            Log::info('ImageManager: Created temp file at ' . $tempFile . ' - wrote ' . $bytesWritten . ' bytes');

            if (!file_exists($tempFile)) {
                Log::error('ImageManager: Temp file was not created at ' . $tempFile);
                return null;
            }

            $actualSize = filesize($tempFile);
            Log::info('ImageManager: Temp file actual size on disk: ' . $actualSize . ' bytes');

            // Try to detect image type
            $mimeType = mime_content_type($tempFile);
            Log::info('ImageManager: Detected MIME type: ' . $mimeType);

            // Use GD directly for thumbnail creation
            Log::info('ImageManager: Using GD library directly for thumbnail creation');

            $image = null;
            switch ($mimeType) {
                case 'image/jpeg':
                    Log::info('ImageManager: Creating from JPEG');
                    $image = @imagecreatefromjpeg($tempFile);
                    Log::info('ImageManager: imagecreatefromjpeg returned: ' . ($image ? 'resource' : 'false'));
                    break;
                case 'image/png':
                    Log::info('ImageManager: Creating from PNG');
                    $image = @imagecreatefrompng($tempFile);
                    Log::info('ImageManager: imagecreatefrompng returned: ' . ($image ? 'resource' : 'false'));
                    break;
                case 'image/gif':
                    Log::info('ImageManager: Creating from GIF');
                    $image = @imagecreatefromgif($tempFile);
                    Log::info('ImageManager: imagecreatefromgif returned: ' . ($image ? 'resource' : 'false'));
                    break;
                case 'image/webp':
                    Log::info('ImageManager: Creating from WebP');
                    $image = @imagecreatefromwebp($tempFile);
                    Log::info('ImageManager: imagecreatefromwebp returned: ' . ($image ? 'resource' : 'false'));
                    break;
                default:
                    Log::warning('ImageManager: Unknown image type: ' . $mimeType . ', trying imagecreatefromstring');
                    $image = @imagecreatefromstring($fileContent);
                    Log::info('ImageManager: imagecreatefromstring returned: ' . ($image ? 'resource' : 'false'));
            }

            if (!$image) {
                Log::error('ImageManager: Failed to create GD image from file at ' . $tempFile);
                // Try alternative method
                Log::info('ImageManager: Attempting fallback with imagecreatefromstring');
                $image = @imagecreatefromstring($fileContent);
                if (!$image) {
                    Log::error('ImageManager: Fallback also failed');
                    return null;
                }
                Log::info('ImageManager: Fallback succeeded with imagecreatefromstring');
            }

            Log::info('ImageManager: GD image created successfully');
            $width = imagesx($image);
            $height = imagesy($image);
            Log::info('ImageManager: Original dimensions: ' . $width . 'x' . $height);

            // Calculate new dimensions maintaining aspect ratio
            $newWidth = 300;
            $newHeight = 300;

            // Fit within 300x300 maintaining aspect ratio
            if ($width > $height) {
                $newHeight = (int)($height * ($newWidth / $width));
            } else {
                $newWidth = (int)($width * ($newHeight / $height));
            }

            Log::info('ImageManager: New dimensions: ' . $newWidth . 'x' . $newHeight);

            // Create thumbnail image
            $thumbnail = imagecreatetruecolor(300, 300);

            // Fill with white background
            $white = imagecolorallocate($thumbnail, 255, 255, 255);
            imagefill($thumbnail, 0, 0, $white);

            // Calculate position to center the resized image
            $x = (300 - $newWidth) / 2;
            $y = (300 - $newHeight) / 2;

            // Resample the image
            if (!imagecopyresampled($thumbnail, $image, $x, $y, 0, 0, $newWidth, $newHeight, $width, $height)) {
                Log::error('ImageManager: Failed to resample image');
                imagedestroy($image);
                imagedestroy($thumbnail);
                return null;
            }

            Log::info('ImageManager: Image resampled successfully');

            // Save as JPEG
            $filename = self::PREFIX_THUMBNAIL . $baseNameWithoutExt . '.jpg';
            $path = $directory . '/' . $filename;

            Log::info('ImageManager: Saving thumbnail to ' . $path);

            // Get JPEG data
            ob_start();
            imagejpeg($thumbnail, null, 80);
            $imageContent = ob_get_clean();

            imagedestroy($image);
            imagedestroy($thumbnail);

            if (!$imageContent) {
                Log::error('ImageManager: Failed to get JPEG output');
                return null;
            }

            Log::info('ImageManager: JPEG created, size: ' . strlen($imageContent) . ' bytes');

            Storage::disk('public')->put($path, $imageContent);

            Log::info('ImageManager: Successfully saved thumbnail - ' . $filename);

            return [
                'filename' => $filename,
                'mime_type' => 'image/jpeg',
                'file_size' => strlen($imageContent),
                'path' => $path,
            ];
        } catch (\Throwable $e) {
            Log::error('ImageManager createThumbnail FAILED: ' . $e->getMessage() . ' | Line: ' . $e->getLine() . ' | File: ' . basename($e->getFile()) . ' | Code: ' . $e->getCode());
            Log::error('Trace: ' . $e->getTraceAsString());
            return null;
        } finally {
            // Restore original memory limit
            ini_set('memory_limit', $originalMemoryLimit);
            Log::info('ImageManager: Restored memory limit to ' . $originalMemoryLimit);

            // Clean up temp file
            if ($tempFile && file_exists($tempFile)) {
                @unlink($tempFile);
                Log::info('ImageManager: Cleaned up temp file');
            }
        }
    }

    /**
     * Create a compressed variant (under 2MB)
     * Progressively reduces quality until size is under 2MB
     */
    private static function createCompressed(string $fileContent, string $baseNameWithoutExt, string $directory): ?array
    {
        $tempFile = null;
        $originalMemoryLimit = ini_get('memory_limit');
        try {
            Log::info('ImageManager: createCompressed starting for ' . $baseNameWithoutExt);
            Log::info('ImageManager: File content size: ' . strlen($fileContent) . ' bytes');

            // Increase memory limit for image processing
            ini_set('memory_limit', '512M');
            Log::info('ImageManager: Increased memory limit to 512M for compression');

            // Create a temporary file from the content
            $tempFile = tempnam(sys_get_temp_dir(), 'img_');
            $bytesWritten = file_put_contents($tempFile, $fileContent);
            Log::info('ImageManager: Created temp file at ' . $tempFile . ' - wrote ' . $bytesWritten . ' bytes');

            if (!file_exists($tempFile)) {
                Log::error('ImageManager: Temp file was not created at ' . $tempFile);
                return null;
            }

            $actualSize = filesize($tempFile);
            Log::info('ImageManager: Temp file actual size on disk: ' . $actualSize . ' bytes');

            // Try to detect image type
            $mimeType = mime_content_type($tempFile);
            Log::info('ImageManager: Detected MIME type: ' . $mimeType);

            // Use GD directly for compression
            Log::info('ImageManager: Using GD library directly for compression');

            $image = null;
            switch ($mimeType) {
                case 'image/jpeg':
                    Log::info('ImageManager: Creating from JPEG for compression');
                    $image = @imagecreatefromjpeg($tempFile);
                    Log::info('ImageManager: imagecreatefromjpeg returned: ' . ($image ? 'resource' : 'false'));
                    break;
                case 'image/png':
                    Log::info('ImageManager: Creating from PNG for compression');
                    $image = @imagecreatefrompng($tempFile);
                    Log::info('ImageManager: imagecreatefrompng returned: ' . ($image ? 'resource' : 'false'));
                    break;
                case 'image/gif':
                    Log::info('ImageManager: Creating from GIF for compression');
                    $image = @imagecreatefromgif($tempFile);
                    Log::info('ImageManager: imagecreatefromgif returned: ' . ($image ? 'resource' : 'false'));
                    break;
                case 'image/webp':
                    Log::info('ImageManager: Creating from WebP for compression');
                    $image = @imagecreatefromwebp($tempFile);
                    Log::info('ImageManager: imagecreatefromwebp returned: ' . ($image ? 'resource' : 'false'));
                    break;
                default:
                    Log::warning('ImageManager: Unknown image type for compression: ' . $mimeType . ', trying imagecreatefromstring');
                    $image = @imagecreatefromstring($fileContent);
                    Log::info('ImageManager: imagecreatefromstring returned: ' . ($image ? 'resource' : 'false'));
            }

            if (!$image) {
                Log::error('ImageManager: Failed to create GD image from file at ' . $tempFile);
                // Try alternative method
                Log::info('ImageManager: Attempting fallback with imagecreatefromstring for compression');
                $image = @imagecreatefromstring($fileContent);
                if (!$image) {
                    Log::error('ImageManager: Fallback compression also failed');
                    return null;
                }
                Log::info('ImageManager: Fallback succeeded with imagecreatefromstring for compression');
            }

            Log::info('ImageManager: GD image created successfully for compression');

            $width = imagesx($image);
            $height = imagesy($image);
            Log::info('ImageManager: Original dimensions for compression: ' . $width . 'x' . $height);

            // First, scale down to reasonable dimensions to reduce file size
            // Target: max 1920px on longest side
            $maxDimension = 1920;
            $newWidth = $width;
            $newHeight = $height;

            if ($width > $maxDimension || $height > $maxDimension) {
                Log::info('ImageManager: Image too large, scaling down for compression');
                if ($width > $height) {
                    $newWidth = $maxDimension;
                    $newHeight = (int)($height * ($maxDimension / $width));
                } else {
                    $newHeight = $maxDimension;
                    $newWidth = (int)($width * ($maxDimension / $height));
                }
                Log::info('ImageManager: Scaled dimensions: ' . $newWidth . 'x' . $newHeight);

                // Create resized image
                $scaledImage = imagecreatetruecolor($newWidth, $newHeight);
                imagecopyresampled($scaledImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
                imagedestroy($image);
                $image = $scaledImage;
                Log::info('ImageManager: Image scaled successfully for compression');
            }

            $filename = self::PREFIX_COMPRESSED . $baseNameWithoutExt . '.jpg';
            $path = $directory . '/' . $filename;

            // Progressive quality reduction from 75% to 50%
            $quality = self::COMPRESSED_QUALITY;

            while ($quality >= self::MAX_COMPRESSION_QUALITY) {
                Log::info('ImageManager: Trying JPEG compression at quality ' . $quality);

                try {
                    ob_start();
                    imagejpeg($image, null, $quality);
                    $imageContent = ob_get_clean();
                    $size = strlen($imageContent);

                    Log::info('ImageManager: Encoded size at quality ' . $quality . ': ' . $size . ' bytes');

                    // Check if under 2MB
                    if ($size <= self::COMPRESSED_MAX_SIZE) {
                        Log::info('ImageManager: Size acceptable, saving compressed image');
                        Storage::disk('public')->put($path, $imageContent);

                        imagedestroy($image);

                        Log::info('ImageManager: Compressed variant saved successfully - ' . $filename . ' (' . $size . ' bytes)');
                        return [
                            'filename' => $filename,
                            'mime_type' => 'image/jpeg',
                            'file_size' => $size,
                            'path' => $path,
                        ];
                    }

                    Log::info('ImageManager: Size too large (' . $size . ' > 2MB), trying lower quality');
                } catch (\Throwable $encodeError) {
                    Log::warning('ImageManager: JPEG encode at quality ' . $quality . ' failed: ' . $encodeError->getMessage());
                }

                // Reduce quality and try again
                $quality -= 5;
            }

            // If we get here, even at minimum quality it's still too large
            // Just save it anyway at minimum quality
            Log::warning('ImageManager: Could not get under 2MB even at minimum quality, saving anyway');
            try {
                ob_start();
                imagejpeg($image, null, self::MAX_COMPRESSION_QUALITY);
                $imageContent = ob_get_clean();

                Storage::disk('public')->put($path, $imageContent);

                imagedestroy($image);

                Log::warning('ImageManager: Saved compressed image at minimum quality - ' . $filename . ' (' . strlen($imageContent) . ' bytes)');
                return [
                    'filename' => $filename,
                    'mime_type' => 'image/jpeg',
                    'file_size' => strlen($imageContent),
                    'path' => $path,
                ];
            } catch (\Throwable $finalError) {
                Log::error('ImageManager: Final compression attempt failed: ' . $finalError->getMessage());
                imagedestroy($image);
                return null;
            }

        } catch (\Throwable $e) {
            Log::error('ImageManager createCompressed FAILED: ' . $e->getMessage() . ' | Line: ' . $e->getLine() . ' | File: ' . basename($e->getFile()) . ' | Code: ' . $e->getCode());
            Log::error('Trace: ' . $e->getTraceAsString());
            return null;
        } finally {
            // Restore original memory limit
            ini_set('memory_limit', $originalMemoryLimit);
            Log::info('ImageManager: Restored memory limit to ' . $originalMemoryLimit);

            // Clean up temp file
            if ($tempFile && file_exists($tempFile)) {
                @unlink($tempFile);
                Log::info('ImageManager: Cleaned up temp file for compression');
            }
        }
    }

    public static function uploadMultiple(
        array $files,
        string $fileType,
        int $modelId,
        string $modelType,
        string $directory = 'certificates'
    ) {
        $uploadedFiles = [];

        foreach ($files as $file) {
            $variants = self::upload($file, $fileType, $modelId, $modelType, $directory);
            $uploadedFiles = array_merge($uploadedFiles, $variants);
        }

        return $uploadedFiles;
    }

    /**
     * Delete an image file and its database record.
     */
    public static function delete(ImageFile $imageFile)
    {
        try {
            // Delete from storage
            if (Storage::disk('public')->exists($imageFile->path)) {
                Storage::disk('public')->delete($imageFile->path);
            }

            // Delete from database
            $imageFile->delete();

            return true;
        } catch (\Exception $e) {
            Log::error('ImageManager delete failed: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Delete all images for a specific model (all variants)
     */
    public static function deleteByModel(int $modelId, string $modelType)
    {
        try {
            $imageFiles = ImageFile::where('imageable_id', $modelId)
                ->where('imageable_type', $modelType)
                ->get();

            foreach ($imageFiles as $imageFile) {
                self::delete($imageFile);
            }

            return true;
        } catch (\Exception $e) {
            Log::error('ImageManager deleteByModel failed: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Get the best variant for display (prefer compressed > thumbnail > original)
     */
    public static function getDisplayVariant(int $modelId, string $modelType, string $fileType)
    {
        // Try to get compressed variant first (best for web, optimized)
        $image = ImageFile::where('imageable_id', $modelId)
            ->where('imageable_type', $modelType)
            ->where('file_type', $fileType)
            ->where('image_variant', self::VARIANT_COMPRESSED)
            ->first();

        if ($image) {
            return $image;
        }

        // Fall back to thumbnail
        $image = ImageFile::where('imageable_id', $modelId)
            ->where('imageable_type', $modelType)
            ->where('file_type', $fileType)
            ->where('image_variant', self::VARIANT_THUMBNAIL)
            ->first();

        if ($image) {
            return $image;
        }

        // Fall back to original
        return ImageFile::where('imageable_id', $modelId)
            ->where('imageable_type', $modelType)
            ->where('file_type', $fileType)
            ->where('image_variant', self::VARIANT_ORIGINAL)
            ->first();
    }

    /**
     * Validate file (MIME type only, no size validation)
     */
    public static function validateFile(UploadedFile $file, string $category = 'image'): bool
    {
        $allowedMimes = self::getAllowedMimes($category);
        return in_array($file->getMimeType(), $allowedMimes);
    }

    /**
     * Get allowed MIME types per category
     */
    public static function getAllowedMimes(string $category = 'image'): array
    {
        $mimes = [
            'image' => [
                'image/jpeg',
                'image/png',
                'image/gif',
                'image/svg+xml',
                'image/webp',
            ],
            'certificate_pdf' => [
                'application/pdf',
                'image/jpeg',
                'image/png',
                'image/gif',
                'image/svg+xml',
                'image/webp',
            ],
        ];

        return $mimes[$category] ?? $mimes['image'];
    }

    /**
     * Generate a unique filename with timestamp and random string
     */
    private static function generateUniqueFileName(UploadedFile $file): string
    {
        $timestamp = time();
        $random = Str::random(10);
        $extension = $file->getClientOriginalExtension();

        return "file_{$timestamp}_{$random}.{$extension}";
    }
}
