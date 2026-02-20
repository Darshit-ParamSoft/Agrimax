<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductImage extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'product_id',
        'main_image',
        'additional_images',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $casts = [
        'additional_images' => 'array',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Get the product associated with this product image.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
