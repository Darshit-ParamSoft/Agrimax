<?php

namespace Database\Seeders;

use App\Models\Enquiry;
use App\Models\Product;
use Illuminate\Database\Seeder;

class EnquirySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get a random product or null if no products exist
        $product = Product::first();

        Enquiry::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '1234567890',
            'product_id' => $product?->id,
            'message' => 'I am interested in learning more about your products. Please provide more details about the pricing and availability.',
            'created_by' => null,
            'updated_by' => null,
            'deleted_by' => null,
        ]);
    }
}
