<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'long_description',
        'category_id',
        'division',
        'featured',
        'status',
        'is_main',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $casts = [
        'featured' => 'boolean',
        'status' => 'boolean',
        'is_main' => 'boolean',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected static function boot()
    {
        parent::boot();

        // Delete carousel items when product is deleted
        static::deleting(function ($product) {
            $product->carouselItems()->delete();
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get all image files for this product (polymorphic relationship).
     */
    public function imageFiles()
    {
        return $this->morphMany(ImageFile::class, 'imageable');
    }

    public function carouselItems()
    {
        return $this->hasMany(CarouselItem::class);
    }
}
