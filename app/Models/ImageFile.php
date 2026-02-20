<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImageFile extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'filename',
        'original_name',
        'file_type',
        'image_variant',
        'mime_type',
        'file_size',
        'path',
        'imageable_id',
        'imageable_type',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'file_size' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Get the parent imageable model (Product, Certificate, CarouselItem).
     */
    public function imageable()
    {
        return $this->morphTo();
    }

    /**
     * Get the user who created this image.
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the user who last updated this image.
     */
    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * Check if the file is an image.
     */
    public function isImage()
    {
        return strpos($this->mime_type, 'image/') === 0;
    }

    /**
     * Check if the file is a PDF.
     */
    public function isPdf()
    {
        return $this->mime_type === 'application/pdf';
    }

    /**
     * Get the full URL to the image file.
     */
    public function getUrlAttribute()
    {
        return asset('storage/' . $this->path);
    }

    /**
     * Get file extension.
     */
    public function getExtensionAttribute()
    {
        return pathinfo($this->filename, PATHINFO_EXTENSION);
    }
}
