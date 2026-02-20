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
        // Fix products table - drop old unique constraint and create new one with where clause
        Schema::table('products', function (Blueprint $table) {
            $table->dropUnique('products_slug_unique');
            $table->unique('slug')->where('deleted_at', null);
        });

        // Fix categories table - drop old unique constraint and create new one with where clause
        Schema::table('categories', function (Blueprint $table) {
            $table->dropUnique('categories_name_unique');
            $table->unique('name')->where('deleted_at', null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropUnique('products_slug_unique');
            $table->unique('slug');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->dropUnique('categories_name_unique');
            $table->unique('name');
        });
    }
};
