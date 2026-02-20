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
        // Remove unique constraint from products slug
        Schema::table('products', function (Blueprint $table) {
            $table->dropUnique('products_slug_unique');
        });

        // Remove unique constraint from categories name
        Schema::table('categories', function (Blueprint $table) {
            $table->dropUnique('categories_name_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unique('slug');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->unique('name');
        });
    }
};
