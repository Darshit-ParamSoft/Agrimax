@extends('backend.layouts.master')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <style>
        .form-switch .form-check-input {
            width: 3.5em !important;
            height: 1.8em !important;
            cursor: pointer !important;
        }
        .image-preview {
            max-width: 200px;
            max-height: 200px;
            margin-top: 10px;
            border-radius: 4px;
        }
        .preview-container {
            margin-top: 15px;
        }
    </style>

    @component('backend.common-components.breadcrumb')
        @slot('pagetitle')
            Carousel
        @endslot
        @slot('title')
            {{ $carouselItem ? 'Edit Carousel Item' : 'Add Carousel Item' }}
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">{{ $carouselItem ? 'Edit Carousel Item' : 'Add New Carousel Item' }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ $carouselItem ? route('carousel.update', $carouselItem->id) : route('carousel.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if($carouselItem)
                            @method('PUT')
                        @endif

                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="product_id" class="form-label">Product <span class="text-danger">*</span></label>
                                <select class="form-control @error('product_id') is-invalid @enderror"
                                    id="product_id" name="product_id" required>
                                    <option value="">-- Select Product --</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}"
                                            {{ old('product_id', $carouselItem?->product_id ?? '') == $product->id ? 'selected' : '' }}>
                                            {{ $product->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('product_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">Each product can only appear once in the carousel</small>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="image" class="form-label">Carousel Image <span class="text-danger">*</span></label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    id="image" name="image" accept="image/*" {{ !$carouselItem ? 'required' : '' }}>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">Supported formats: JPEG, PNG, JPG, GIF (Max: 2MB)</small>
                            </div>
                        </div>

                        @if($carouselItem)
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="preview-container">
                                        <label class="form-label">Current Image</label>
                                        <div>
                                            @php
                                                // Get original variant for edit form display
                                                $originalImage = $carouselItem->imageFiles()
                                                    ->where('file_type', 'carousel')
                                                    ->where('image_variant', 'original')
                                                    ->first();

                                                // Fallback to thumbnail if original not found
                                                if (!$originalImage) {
                                                    $originalImage = $carouselItem->imageFiles()
                                                        ->where('file_type', 'carousel')
                                                        ->where('image_variant', 'thumbnail')
                                                        ->first();
                                                }

                                                // Fallback to any variant
                                                if (!$originalImage) {
                                                    $originalImage = $carouselItem->imageFiles()
                                                        ->where('file_type', 'carousel')
                                                        ->first();
                                                }
                                            @endphp
                                            @if($originalImage)
                                                <img src="{{ $originalImage->url }}" class="image-preview" alt="Current Image">
                                            @else
                                                <img src="{{ asset('assets/images/placeholder.png') }}" class="image-preview" alt="No Image">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="row mt-3">
                            <div class="col-lg-6 mb-3">
                                <label class="form-label d-block mb-3">Carousel Item Status</label>

                                <div class="d-flex align-items-center">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="product_carousel_status" name="product_carousel_status" value="1" {{ old('product_carousel_status', $carouselItem?->status ?? false) ? 'checked' : '' }} style="width: 3.5em; height: 1.8em; cursor: pointer;">
                                    </div>
                                </div>
                                <small class="form-text text-muted d-block mt-2">Toggle to show or hide this item in the carousel</small>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-lg-12">
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="uil uil-check"></i> {{ $carouselItem ? 'Update' : 'Create' }}
                                    </button>
                                    <a href="{{ route('carousel.index') }}" class="btn btn-secondary">
                                        <i class="uil uil-arrow-left"></i> Cancel
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const imageInput = document.getElementById('image');

            // Image preview functionality
            imageInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        let previewContainer = document.querySelector('.preview-container');
                        if (!previewContainer) {
                            previewContainer = document.createElement('div');
                            previewContainer.className = 'preview-container';
                            imageInput.parentElement.appendChild(previewContainer);
                        }

                        previewContainer.innerHTML = `
                            <label class="form-label">Image Preview</label>
                            <div>
                                <img src="${e.target.result}" class="image-preview" alt="Image Preview">
                            </div>
                        `;
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection
