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
        #editor {
            height: 300px;
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
        }
    </style>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    @component('backend.common-components.breadcrumb')
        @slot('pagetitle')
            Products
        @endslot
        @slot('title')
            {{ $product ? 'Edit Product' : 'Create Product' }}
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">{{ $product ? 'Edit Product' : 'Add New Product' }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ $product ? route('products.update', $product->id) : route('products.store') }}" method="POST">
                        @csrf
                        @if($product)
                            @method('PUT')
                        @endif

                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="name" class="form-label">Product Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name', $product?->name ?? '') }}"
                                    placeholder="Enter product name" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="slug" class="form-label">Slug (Auto-generated)</label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                    id="slug" name="slug" value="{{ old('slug', $product?->slug ?? '') }}"
                                    placeholder="Leave blank for auto-generation">
                                <small class="form-text text-muted">Auto-generated from product name if left blank</small>
                                <div id="slug-feedback" class="mt-2"></div>
                                @error('slug')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="category_id" class="form-label">Category</label>
                                <select class="form-control @error('category_id') is-invalid @enderror"
                                    id="category_id" name="category_id" required>
                                    <option value="">-- Select Category --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id', $product?->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="division" class="form-label">Division</label>
                                <select class="form-control @error('division') is-invalid @enderror"
                                    id="division" name="division" required>
                                    <option value="">-- Select Division --</option>
                                    <option value="agrimax" {{ old('division', $product?->division ?? '') == 'agrimax' ? 'selected' : '' }}>Agrimax</option>
                                    <option value="maxwell" {{ old('division', $product?->division ?? '') == 'maxwell' ? 'selected' : '' }}>Maxwell</option>
                                </select>
                                @error('division')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label d-block mb-3">Product Status & Display</label>

                            <!-- Status Toggle -->
                            <div class="d-flex align-items-center mb-3">
                                <label class="form-label mb-0 me-3" style="min-width: 100px;">Status</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input toggle-switch" type="checkbox" id="product_status" name="product_status" value="1" {{ old('product_status', $product?->status ?? false) ? 'checked' : '' }} style="width: 3.5em; height: 1.8em; cursor: pointer;">
                                </div>
                            </div>

                            <!-- Featured Toggle -->
                            <div class="d-flex align-items-center mb-3">
                                <label class="form-label mb-0 me-3" style="min-width: 100px;">Featured</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input toggle-switch" type="checkbox" id="featured" name="featured" value="1" {{ old('featured', $product?->featured ?? false) ? 'checked' : '' }} style="width: 3.5em; height: 1.8em; cursor: pointer;">
                                </div>
                            </div>

                            <!-- Main Product Toggle -->
                            <div class="d-flex align-items-center">
                                <label class="form-label mb-0 me-3" style="min-width: 100px;">Main Product</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input toggle-switch" type="checkbox" id="is_main" name="is_main" value="1" {{ old('is_main', $product?->is_main ?? true) ? 'checked' : '' }} style="width: 3.5em; height: 1.8em; cursor: pointer;">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="short_description" class="form-label">Short Description</label>
                            <textarea class="form-control @error('short_description') is-invalid @enderror"
                                id="short_description" name="short_description" rows="3"
                                placeholder="Enter short description">{{ old('short_description', $product?->short_description ?? '') }}</textarea>
                            @error('short_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="long_description" class="form-label">Long Description</label>
                            <input type="hidden" id="long_description" name="long_description" value="{{ old('long_description', $product?->long_description ?? '') }}">
                            <div id="editor" style="height: 300px; background-color: #fff; border: 1px solid #dee2e6; border-radius: 0.25rem;"></div>
                            @error('long_description')
                                <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="uil uil-check"></i> {{ $product ? 'Update Product' : 'Create Product' }}
                                </button>
                                <a href="{{ route('products.index') }}" class="btn btn-secondary ms-2">
                                    <i class="uil uil-arrow-left"></i> Back
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const nameInput = document.getElementById('name');
            const slugInput = document.getElementById('slug');
            const slugFeedback = document.getElementById('slug-feedback');
            const productId = {{ $product?->id ?? 'null' }};
            let slugCheckTimeout;

            // Function to convert text to slug format
            function generateSlug(text) {
                return text
                    .toLowerCase()
                    .trim()
                    .replace(/[^\w\s-]/g, '') // Remove special characters
                    .replace(/\s+/g, '-')      // Replace spaces with hyphens
                    .replace(/-+/g, '-');      // Replace multiple hyphens with single hyphen
            }

            // Auto-generate slug when name changes
            nameInput.addEventListener('input', function() {
                slugInput.value = generateSlug(this.value);
            });

            // Check slug uniqueness when slug changes
            slugInput.addEventListener('input', function() {
                this.value = generateSlug(this.value);
            });
        });
    </script>

    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Quill editor with image and table support
            const quill = new Quill('#editor', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        ['bold', 'italic', 'underline', 'strike'],
                        ['blockquote', 'code-block'],
                        [{ 'header': 1 }, { 'header': 2 }],
                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                        [{ 'script': 'sub'}, { 'script': 'super' }],
                        [{ 'indent': '-1'}, { 'indent': '+1' }],
                        [{ 'size': ['small', false, 'large', 'huge'] }],
                        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                        [{ 'font': [] }],
                        [{ 'color': [] }, { 'background': [] }],
                        [{ 'align': [] }],
                        ['image', 'video'],
                        ['link'],
                        ['clean']
                    ]
                }
            });

            // Handle image insertion
            quill.getModule('toolbar').addHandler('image', function() {
                const input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                input.onchange = function() {
                    const file = input.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const range = quill.getSelection(true);
                            quill.insertEmbed(range.index, 'image', e.target.result);
                            quill.setSelection(range.index + 1);
                        };
                        reader.readAsDataURL(file);
                    }
                };
                input.click();
            });

            // Table insertion
            const tableBtn = document.querySelector('.ql-toolbar button[class*="ql-video"]');
            if (tableBtn) {
                tableBtn.innerHTML = '📋';
                tableBtn.title = 'Insert Table';
                tableBtn.onclick = function(e) {
                    e.preventDefault();
                    const rows = prompt('Number of rows:', '3');
                    const cols = prompt('Number of columns:', '3');

                    if (rows && cols) {
                        let html = '<table style="border-collapse: collapse; width: 100%;"><tbody>';
                        for (let i = 0; i < parseInt(rows); i++) {
                            html += '<tr>';
                            for (let j = 0; j < parseInt(cols); j++) {
                                html += '<td style="padding: 8px; border: 1px solid #ddd; min-width: 100px;"><br></td>';
                            }
                            html += '</tr>';
                        }
                        html += '</tbody></table>';

                        const range = quill.getSelection(true);
                        quill.insertText(range.index, '\n', false);
                        quill.dangerouslyPasteHTML(range.index + 1, html);
                        quill.setSelection(range.index + 1);
                    }
                };
            }

            // Get form and hidden input references
            const form = document.querySelector('form');
            const hiddenInput = document.getElementById('long_description');
            const initialValue = hiddenInput.value;

            // Set initial content if editing
            if (initialValue && initialValue.trim() !== '') {
                setTimeout(function() {
                    quill.root.innerHTML = initialValue;
                }, 100);
            }

            // Update hidden input on content change
            quill.on('text-change', function() {
                hiddenInput.value = quill.root.innerHTML;
            });

            // Save before form submission
            form.addEventListener('submit', function(e) {
                hiddenInput.value = quill.root.innerHTML;
                if (!form.checkValidity()) {
                    e.preventDefault();
                }
            });
        });
    </script>
@endsection
