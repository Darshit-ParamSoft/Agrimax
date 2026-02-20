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
        Schema::table('image_files', function (Blueprint $table) {
            $table->string('image_variant')->default('original')->after('file_type');
            // image_variant can be: 'original', 'thumbnail', 'compressed'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('image_files', function (Blueprint $table) {
            $table->dropColumn('image_variant');
        });
    }
};
