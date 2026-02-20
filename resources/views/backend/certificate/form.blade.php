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
            Certificates
        @endslot
        @slot('title')
            {{ $certificate ? 'Edit Certificate' : 'Create Certificate' }}
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">{{ $certificate ? 'Edit Certificate' : 'Add New Certificate' }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ $certificate ? route('certificates.update', $certificate->id) : route('certificates.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if($certificate)
                            @method('PUT')
                        @endif

                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="name" class="form-label">Certificate Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name', $certificate?->name ?? '') }}"
                                    placeholder="Enter certificate name" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="logo" class="form-label">Logo Image</label>
                                <input type="file" class="form-control @error('logo') is-invalid @enderror"
                                    id="logo" name="logo" accept="image/*">
                                <small class="form-text text-muted">Supported formats: JPEG, PNG, JPG, GIF, SVG</small>
                                @error('logo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- New Logo Preview -->
                            <div class="col-lg-6 mb-3" id="newLogoPreviewSection" style="display: none;">
                                <label class="form-label">New Logo Preview</label>
                                <div id="newLogoPreview"></div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="pdf" class="form-label">Certificate PDF & Images</label>
                            <input type="file" class="form-control @error('pdf.*') is-invalid @enderror"
                                id="pdf" name="pdf[]" accept=".pdf,image/*" multiple>
                            <small class="form-text text-muted">Upload PDFs and/or images. Supported formats: PDF, JPEG, PNG, JPG, GIF, SVG (Max 5MB per file). Select multiple files.</small>
                            @error('pdf.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Preview of newly selected files -->
                        <div class="mb-3" id="newFilesPreview" style="display: none;">
                            <label class="form-label">Selected Files Preview</label>
                            <div class="row" id="previewContainer">
                            </div>
                            <small class="form-text text-muted d-block mt-2">New files will replace the current ones when you save.</small>
                        </div>

                        @if($certificate)
                            <div class="mb-3" id="currentLogoSection">
                                <label class="form-label">Current Logo</label>
                                <div>
                                    @php
                                        // Get original variant for edit form display
                                        $logoImage = $certificate->logoImages()
                                            ->where('image_variant', 'original')
                                            ->first();

                                        // Fallback to thumbnail
                                        if (!$logoImage) {
                                            $logoImage = $certificate->logoImages()
                                                ->where('image_variant', 'thumbnail')
                                                ->first();
                                        }

                                        // Fallback to any variant
                                        if (!$logoImage) {
                                            $logoImage = $certificate->logoImages()->first();
                                        }
                                    @endphp
                                    @if($logoImage)
                                        <img src="{{ $logoImage->url }}" alt="{{ $certificate->name }}" style="max-width: 200px; max-height: 150px; object-fit: contain;">
                                    @endif
                                </div>
                            </div>
                        @endif

                        @if($certificate && $certificate->certificateFiles()->count() > 0)
                            <div class="mb-3" id="currentFilesSection">
                                <label class="form-label">Current PDF & Images</label>
                                <div class="row">
                                    @php
                                        // Get all original variants (base files) for display
                                        $certificateFiles = $certificate->certificateFiles()
                                            ->where('image_variant', 'original')
                                            ->get();
                                    @endphp
                                    @foreach($certificateFiles as $file)
                                        @php
                                            // Get all variants for this file
                                            $baseFilename = str_replace(['or_', 'th_', 'cr_'], '', $file->filename);
                                            $allVariants = $certificate->certificateFiles()
                                                ->where(function($q) use ($baseFilename) {
                                                    $q->where('filename', 'like', '%' . $baseFilename);
                                                })
                                                ->get();
                                        @endphp
                                        <div class="col-md-3 mb-2">
                                            @if($file->isPdf())
                                                <a href="{{ $file->url }}" target="_blank" class="btn btn-info btn-sm w-100">
                                                    <i class="uil uil-file-pdf"></i> PDF
                                                </a>
                                            @else
                                                <img src="{{ $file->url }}" alt="{{ $certificate->name }}" style="max-width: 100%; max-height: 150px; object-fit: contain; border: 1px solid #ddd; border-radius: 4px; padding: 5px;">
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">
                                <i class="uil uil-check"></i> {{ $certificate ? 'Update' : 'Create' }}
                            </button>
                            <a href="{{ route('certificates.index') }}" class="btn btn-secondary ms-2">
                                <i class="uil uil-times"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Form script loaded');

            // File validation and preview for logo
            document.getElementById('logo').addEventListener('change', function(e) {
                const file = e.target.files[0];
                const newLogoPreviewSection = document.getElementById('newLogoPreviewSection');
                const newLogoPreview = document.getElementById('newLogoPreview');
                const currentLogoSection = document.getElementById('currentLogoSection');

                if (file) {
                    // Read and display preview
                    const reader = new FileReader();
                    reader.addEventListener('load', function() {
                        newLogoPreview.innerHTML = `
                            <img src="${reader.result}" style="max-width: 100%; max-height: 150px; object-fit: contain; border: 1px solid #ddd; border-radius: 4px; padding: 5px;">
                        `;
                        if (newLogoPreviewSection) newLogoPreviewSection.style.display = 'block';

                        // Hide current logo if exists
                        if (currentLogoSection) currentLogoSection.style.display = 'none';
                    });
                    reader.readAsDataURL(file);
                } else {
                    // No file selected, show current logo again
                    if (newLogoPreviewSection) newLogoPreviewSection.style.display = 'none';
                    if (currentLogoSection) currentLogoSection.style.display = '';
                }
            });

            // File validation and preview for PDF & Images
            const pdfInput = document.getElementById('pdf');
            console.log('PDF input element:', pdfInput);

            pdfInput.addEventListener('change', function(e) {
                console.log('PDF input changed, files:', e.target.files);

                const files = e.target.files;
                const maxSize = 5120 * 1024; // 5MB per file
                const previewContainer = document.getElementById('previewContainer');
                const newFilesPreview = document.getElementById('newFilesPreview');
                const currentFilesSection = document.getElementById('currentFilesSection');

                console.log('Preview container:', previewContainer);
                console.log('New files preview:', newFilesPreview);

                // Clear previous previews
                if (previewContainer) {
                    previewContainer.innerHTML = '';
                }

                if (files.length === 0) {
                    console.log('No files selected');
                    if (newFilesPreview) newFilesPreview.style.display = 'none';
                    if (currentFilesSection) currentFilesSection.style.display = '';
                    return;
                }

                console.log('Processing', files.length, 'files');

                // Validate all files first
                for (let i = 0; i < files.length; i++) {
                    const file = files[i];
                    console.log('Checking file:', file.name, 'Type:', file.type, 'Size:', file.size);

                    // Check file size
                    if (file.size > maxSize) {
                        alert('File size must not exceed 5MB. File: ' + file.name);
                        e.target.value = '';
                        if (newFilesPreview) newFilesPreview.style.display = 'none';
                        if (currentFilesSection) currentFilesSection.style.display = '';
                        return;
                    }

                    // Check file type
                    const extension = file.name.split('.').pop().toLowerCase();
                    const isPdf = file.type === 'application/pdf' || extension === 'pdf';
                    const isImage = file.type.startsWith('image/') || ['jpg', 'jpeg', 'png', 'gif', 'svg'].includes(extension);

                    if (!isPdf && !isImage) {
                        alert('Please select valid PDF or image files. File: ' + file.name);
                        e.target.value = '';
                        if (newFilesPreview) newFilesPreview.style.display = 'none';
                        if (currentFilesSection) currentFilesSection.style.display = '';
                        return;
                    }
                }

                // Create previews
                for (let i = 0; i < files.length; i++) {
                    const file = files[i];
                    const extension = file.name.split('.').pop().toLowerCase();
                    const isPdf = file.type === 'application/pdf' || extension === 'pdf';

                    console.log('Creating preview for:', file.name, 'isPdf:', isPdf);

                    if (isPdf) {
                        const previewDiv = document.createElement('div');
                        previewDiv.className = 'col-md-3 mb-2';
                        previewDiv.innerHTML = `
                            <div class="btn btn-info btn-sm w-100" style="cursor: default; text-align: left; white-space: break-spaces; display: flex; align-items: center; gap: 8px; padding: 8px;">
                                <i class="uil uil-file-pdf" style="flex-shrink: 0;"></i>
                                <span style="font-size: 0.85rem; word-break: break-word; flex: 1;">${file.name}</span>
                            </div>
                        `;
                        previewContainer.appendChild(previewDiv);
                    } else {
                        // Image preview
                        const previewDiv = document.createElement('div');
                        previewDiv.className = 'col-md-3 mb-2';
                        previewDiv.style.position = 'relative';

                        const reader = new FileReader();

                        reader.addEventListener('load', function() {
                            console.log('FileReader loaded for:', file.name);
                            previewDiv.innerHTML = `
                                <div style="position: relative; width: 100%;">
                                    <img src="${reader.result}" style="max-width: 100%; height: 150px; object-fit: contain; border: 1px solid #ddd; border-radius: 4px; padding: 5px; display: block; width: 100%;">
                                    <small class="d-block text-center text-muted mt-1" style="font-size: 0.75rem; word-break: break-word; max-width: 100%;">${file.name}</small>
                                </div>
                            `;
                        });

                        previewContainer.appendChild(previewDiv);
                        console.log('Reading file:', file.name);
                        reader.readAsDataURL(file);
                    }
                }

                // Show new files preview and hide current files
                console.log('Showing preview section');
                if (newFilesPreview) newFilesPreview.style.display = 'block';
                if (currentFilesSection) currentFilesSection.style.display = 'none';
            });
        });
    </script>
@endsection
