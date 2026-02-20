<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Certificate extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $casts = [];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Get all images for this certificate (logo, pdf, images).
     */
    public function images()
    {
        return $this->morphMany(ImageFile::class, 'imageable');
    }

    /**
     * Get only logo images for this certificate.
     */
    public function logoImages()
    {
        return $this->images()->where('file_type', 'certificate_logo');
    }

    /**
     * Get only PDF/Images for this certificate.
     */
    public function certificateFiles()
    {
        return $this->images()->where('file_type', 'certificate_pdf');
    }

    /**
     * Get the user who created this certificate.
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the user who last updated this certificate.
     */
    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * Get the user who deleted this certificate.
     */
    public function deleter()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }
}
