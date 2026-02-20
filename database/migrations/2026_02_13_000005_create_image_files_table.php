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
        Schema::create('image_files', function (Blueprint $table) {
            $table->id();
            $table->string('filename'); // Unique filename stored on disk
            $table->string('original_name'); // Original filename uploaded by user
            $table->string('file_type'); // 'product', 'certificate_logo', 'certificate_pdf', 'carousel'
            $table->string('mime_type'); // MIME type (image/jpeg, application/pdf, etc)
            $table->unsignedBigInteger('file_size'); // File size in bytes
            $table->string('path'); // Path relative to storage/certificates or storage/products

            // Polymorphic relationship
            $table->morphs('imageable'); // Creates imageable_id and imageable_type

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('created_by')->references('id')->on('users')->nullOnDelete();
            $table->foreign('updated_by')->references('id')->on('users')->nullOnDelete();

            // Index for file_type queries
            $table->index('file_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_files');
    }
};
