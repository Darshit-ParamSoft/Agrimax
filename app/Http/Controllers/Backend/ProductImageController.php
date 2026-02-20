<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\ImageManager;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    /**
     * Display all products for image management.
     */
    public function index()
    {
        $products = Product::withoutTrashed()->orderBy('id', 'desc')->paginate(10);
        $title = 'Product Images';
        return view('backend.product.images-index', compact('title', 'products'));
    }

    /**
     * Display the image management form for a product.
     */
    public function edit($productId)
    {
        $product = Product::findOrFail($productId);
        $title = 'Manage Product Images - ' . $product->name;

        return view('backend.product.images-edit', compact('title', 'product'));
    }

    /**
     * Update the product images.
     */
    public function update(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        // Check if main image is being uploaded or already exists
        $hasExistingMainImage = $product->imageFiles()->where('file_type', 'product_main')->exists();
        $isUploadingMainImage = $request->hasFile('main_image');

        // Validate - main image must either be uploaded or already exist
        if (!$isUploadingMainImage && !$hasExistingMainImage) {
            return redirect()->back()
                ->with('error', 'Main image is required. Please upload a main image.');
        }

        $request->validate([
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'additional_images' => 'nullable|array',
            'additional_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        // Handle main image upload using ImageManager
        if ($request->hasFile('main_image')) {
            // Delete old main image files from image_files table
            $product->imageFiles()->where('file_type', 'product_main')->delete();

            // Upload new main image and get all variants
            $uploadedImages = ImageManager::upload(
                $request->file('main_image'),
                'product_main',
                $product->id,
                Product::class,
                'products'
            );

            // Check if all 3 variants were created
            if (empty($uploadedImages)) {
                return redirect()->back()
                    ->with('error', 'Failed to upload main image. Please check the file format and try again.');
            }

            if (count($uploadedImages) < 3) {
                \Log::warning('Product main image upload incomplete: ' . count($uploadedImages) . ' variants created instead of 3');
            }
        }

        // Handle additional images upload using ImageManager
        if ($request->hasFile('additional_images')) {
            $uploadedCount = 0;
            $failedCount = 0;

            foreach ($request->file('additional_images') as $image) {
                $uploadedImages = ImageManager::upload(
                    $image,
                    'product_additional',
                    $product->id,
                    Product::class,
                    'products'
                );

                if (empty($uploadedImages)) {
                    $failedCount++;
                } else {
                    $uploadedCount++;
                    if (count($uploadedImages) < 3) {
                        \Log::warning('Product additional image upload incomplete: ' . count($uploadedImages) . ' variants created instead of 3');
                    }
                }
            }

            if ($failedCount > 0) {
                $message = sprintf('Additional images uploaded: %d successful, %d failed. Check the files and try again.', $uploadedCount, $failedCount);
                return redirect()->back()
                    ->with('error', $message);
            }
        }

        return redirect()->route('product-images.index')
            ->with('success', 'Product images updated successfully! All variants have been created.');
    }

    /**
     * Delete a specific image and all its variants.
     */
    public function deleteImage(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
        $imageType = $request->input('type'); // 'main' or 'additional'
        $imageIndex = $request->input('index'); // for additional images
        $filename = $request->input('filename'); // base filename to delete all variants

        if ($imageType === 'main') {
            // Delete all main image variants from image_files table
            $product->imageFiles()->where('file_type', 'product_main')->delete();
        } elseif ($imageType === 'additional') {
            if ($filename) {
                // Delete all variants of this additional image by filename
                // The filename parameter contains the base name without prefix
                $product->imageFiles()
                    ->where('file_type', 'product_additional')
                    ->where(function($query) use ($filename) {
                        // Match any variant of the same image (or_, th_, cr_ prefixes)
                        $query->where('filename', 'like', 'or_' . $filename)
                              ->orWhere('filename', 'like', 'th_' . $filename)
                              ->orWhere('filename', 'like', 'cr_' . $filename);
                    })
                    ->delete();
            } elseif (isset($imageIndex)) {
                // Legacy support: delete by index
                $additionalImages = $product->imageFiles()
                    ->where('file_type', 'product_additional')
                    ->where('image_variant', 'original')
                    ->get();

                if ($additionalImages->count() > $imageIndex) {
                    $baseImage = $additionalImages[$imageIndex];
                    // Delete all variants of this image
                    $product->imageFiles()
                        ->where('file_type', 'product_additional')
                        ->where(function($query) use ($baseImage) {
                            $query->where('filename', 'like', 'or_%' . substr($baseImage->filename, 3))
                                  ->orWhere('filename', 'like', 'th_%' . substr($baseImage->filename, 3))
                                  ->orWhere('filename', 'like', 'cr_%' . substr($baseImage->filename, 3));
                        })
                        ->delete();
                }
            }
        }

        return response()->json(['success' => true, 'message' => 'Image and all variants deleted successfully']);
    }

    /**
     * Check if product has images before going back
     */
    public function checkBeforeBack($productId)
    {
        $product = Product::findOrFail($productId);
        $hasMainImage = $product->imageFiles()->where('file_type', 'product_main')->exists();

        // If no main image exists, return alert flag
        if (!$hasMainImage) {
            return response()->json([
                'hasImage' => false,
                'productId' => $productId,
                'productName' => $product->name
            ]);
        }

        return response()->json([
            'hasImage' => true
        ]);
    }

    /**
     * Delete product without images
     */
    public function deleteProductWithoutImages($productId)
    {
        $product = Product::findOrFail($productId);
        $product->deleted_by = auth()->id();
        $product->save();
        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product deleted successfully!'
        ]);
    }

    /**
     * Toggle status.
     */
    public function toggleStatus(Request $request, $productId)
    {
        try {
            $product = Product::findOrFail($productId);
            $product->status = !$product->status;
            $product->updated_by = auth()->id();
            $product->save();

            return response()->json([
                'success' => true,
                'status' => $product->status,
                'message' => 'Status updated successfully',
            ]);
        } catch (\Exception $e) {
            \Log::error('ProductImageController@toggleStatus - ' . $e->getMessage());
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }
}
