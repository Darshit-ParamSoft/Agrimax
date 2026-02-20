<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Carousel Configuration
    |--------------------------------------------------------------------------
    |
    | Configuration for the Homepage Product Carousel feature
    |
    */

    'status' => [
        'name' => 'product_carousel_status',
        'active' => 1,
        'inactive' => 0,
        'labels' => [
            1 => 'Active',
            0 => 'Inactive',
        ],
    ],

    // Maximum number of items in carousel (optional)
    'max_items' => 10,

    // Image storage path
    'image_path' => 'carousel',
];
