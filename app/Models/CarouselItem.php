<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarouselItem extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'product_id',
        'sort_order',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Get the product associated with this carousel item.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get all image files for this carousel item (polymorphic relationship).
     */
    public function imageFiles()
    {
        return $this->morphMany(ImageFile::class, 'imageable')->where('file_type', 'carousel');
    }

    /**
     * Get the user who created this carousel item.
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    /**
     * Get the user who last updated this carousel item.
     */
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    /**
     * Get the user who deleted this carousel item.
     */
    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by', 'id');
    }
}
