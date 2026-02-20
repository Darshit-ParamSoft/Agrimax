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
    </style>
    @component('backend.common-components.breadcrumb')
        @slot('pagetitle')
            Categories
        @endslot
        @slot('title')
            Create Category
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Add New Category</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Category Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                id="name" name="name" value="{{ old('name') }}"
                                placeholder="Enter category name" required oninput="generateSlugRealtime()">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug (Auto-generated)</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                id="slug" name="slug" value="{{ old('slug') }}"
                                placeholder="Leave blank for auto-generation">
                            <small class="form-text text-muted">Auto-generated from category name as you type. Edit directly if needed.</small>
                            @error('slug')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label d-block mb-2">Status</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="category_status" name="category_status"
                                    value="1" {{ old('category_status') ? 'checked' : 'checked' }} onchange="updateStatusText()">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="uil uil-check"></i> Create Category
                                </button>
                                <a href="{{ route('categories.index') }}" class="btn btn-secondary ms-2">
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
        // Real-time slug generation as user types
        function generateSlugRealtime() {
            const nameInput = document.getElementById('name');
            const slugInput = document.getElementById('slug');
            const name = nameInput.value;

            if (name) {
                // Convert to lowercase, replace spaces with hyphens, remove special characters
                const slug = name
                    .toLowerCase()
                    .trim()
                    .replace(/[^\w\s-]/g, '') // Remove special characters
                    .replace(/\s+/g, '-') // Replace spaces with hyphens
                    .replace(/-+/g, '-'); // Replace multiple hyphens with single hyphen

                slugInput.value = slug;
            } else {
                slugInput.value = '';
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const slugInput = document.getElementById('slug');

            // Format slug when user types directly in slug field
            slugInput.addEventListener('input', function() {
                this.value = this.value
                    .toLowerCase()
                    .trim()
                    .replace(/[^\w\s-]/g, '') // Remove special characters
                    .replace(/\s+/g, '-') // Replace spaces with hyphens
                    .replace(/-+/g, '-'); // Replace multiple hyphens with single hyphen
            });
        });

        // Update status text when checkbox changes
        function updateStatusText() {
            const statusCheckbox = document.getElementById('category_status');
            const statusText = document.getElementById('status-text');
            statusText.textContent = statusCheckbox.checked ? 'Active' : 'Inactive';
        }
    </script>
@endsection
