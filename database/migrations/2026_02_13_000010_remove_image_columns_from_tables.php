<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        // Remove logo column from certificates table
        if (Schema::hasTable('certificates')) {
            Schema::table('certificates', function (Blueprint $table) {
                if (Schema::hasColumn('certificates', 'logo')) {
                    $table->dropColumn('logo');
                }
            });
        }

        // Remove image column from carousel_items table
        if (Schema::hasTable('carousel_items')) {
            Schema::table('carousel_items', function (Blueprint $table) {
                if (Schema::hasColumn('carousel_items', 'image')) {
                    $table->dropColumn('image');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Add back image columns to product_images
        if (Schema::hasTable('product_images')) {
            Schema::table('product_images', function (Blueprint $table) {
                $table->string('main_image')->nullable();
                $table->json('additional_images')->nullable();
            });
        }

        // Add back logo to certificates
        if (Schema::hasTable('certificates')) {
            Schema::table('certificates', function (Blueprint $table) {
                $table->string('logo')->nullable();
            });
        }

        // Add back image to carousel_items
        if (Schema::hasTable('carousel_items')) {
            Schema::table('carousel_items', function (Blueprint $table) {
                $table->string('image')->nullable();
            });
        }
    }
};
