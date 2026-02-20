@extends('backend.layouts.master')

@section('title')
    {{ $title }}
@endsection

@section('content')
    @component('backend.common-components.breadcrumb')
        @slot('pagetitle')
            Products
        @endslot
        @slot('title')
            Manage Product Images
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Manage Images for: {{ $product->name }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('product-images.update', $product->id) }}" method="POST" enctype="multipart/form-data" id="imageForm">
                        @csrf
                        @method('PUT')

                        <!-- Main Image Section -->
                        <div class="mb-5">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="main_image" class="form-label fw-bold">Main Image <span class="text-danger">*</span> (Required)</label>
                                        <div class="mb-3">
                                            <input type="file" class="form-control @error('main_image') is-invalid @enderror"
                                                id="main_image" name="main_image" accept="image/*" onchange="previewMainImage(this)">
                                            @error('main_image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <small class="text-muted d-block mt-2">Max file size: 2MB. Supported: JPEG, PNG, JPG, GIF</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Main Image Preview</label>
                                        <div id="mainImagePreview" style="border: 1px solid #ddd; border-radius: 5px; padding: 10px; height: 200px; display: flex; align-items: center; justify-content: center; background: #f8f9fa;">
                                            @php
                                                // Get thumbnail variant if available, otherwise get original
                                                $mainImage = $product->imageFiles()
                                                    ->where('file_type', 'product_main')
                                                    ->where('image_variant', 'original')
                                                    ->first();

                                            @endphp
                                            @if($mainImage)
                                                <div style="position: relative; width: 100%; height: 100%;">
                                                    <img src="{{ $mainImage->url }}"
                                                         alt="Main Image"
                                                         style="width: 100%; height: 100%; object-fit: cover; border-radius: 3px;">
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                            onclick="deleteMainImage(event)"
                                                            style="position: absolute; top: 5px; right: 5px;">
                                                        <i class="uil uil-trash"></i>Delete</button>
                                                </div>
                                            @else
                                                <span class="text-muted">No image selected</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>

                        <!-- Additional Images Section -->
                        <div class="mb-5">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="additional_images" class="form-label fw-bold">Additional Images</label>
                                        <div class="mb-3">
                                            <input type="file" class="form-control @error('additional_images') is-invalid @enderror"
                                                id="additional_images" name="additional_images[]" accept="image/*" multiple onchange="previewAdditionalImages(this)">
                                            @error('additional_images')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <small class="text-muted d-block mt-2">You can select multiple images. Max 2MB each.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label fw-bold">Additional Images Preview</label>
                                    <div id="additionalImagesPreview" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(100px, 1fr)); gap: 10px;">
                                        @php
                                            // Get all additional image originals (base images)
                                            $additionalImages = $product->imageFiles()
                                                ->where('file_type', 'product_additional')
                                                ->where('image_variant', 'original')
                                                ->get();
                                        @endphp
                                        @if($additionalImages->count() > 0)
                                            @foreach($additionalImages as $index => $image)
                                                @php
                                                    // Get thumbnail variant for display
                                                    $baseFilename = str_replace('or_', '', $image->filename);
                                                    $thumbnail = $product->imageFiles()
                                                        ->where('file_type', 'product_additional')
                                                        ->where('image_variant', 'thumbnail')
                                                        ->where('filename', 'like', '%' . $baseFilename)
                                                        ->first();

                                                    $displayImage = $thumbnail ?? $image;

                                                    // Get all variants
                                                    $allVariants = $product->imageFiles()
                                                        ->where('file_type', 'product_additional')
                                                        ->where(function($q) use ($baseFilename) {
                                                            $q->where('filename', 'like', '%' . $baseFilename);
                                                        })
                                                        ->get();
                                                @endphp
                                                <div class="additional-image-item" style="position: relative; border: 1px solid #ddd; border-radius: 5px; overflow: hidden;">
                                                    <img src="{{ $displayImage->url }}"
                                                         alt="Additional Image"
                                                         style="width: 100%; height: 100px; object-fit: cover;">
                                                    <button type="button" class="btn btn-xs btn-danger"
                                                            onclick="deleteAdditionalImage(event, {{ $index }}, '{{ $baseFilename }}')"
                                                            style="position: absolute; top: 2px; right: 2px; padding: 2px 5px; font-size: 11px;"
                                                            title="Delete all 3 variants (original, thumbnail, compressed)">
                                                        <i class="uil uil-trash"></i>
                                                    </button>
                                                </div>
                                            @endforeach
                                        @else
                                            <span class="text-muted" id="noAdditionalImages">No images selected</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>

                        <!-- Form Actions -->
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="uil uil-check"></i> Save Images
                                </button>
                                <button type="button" class="btn btn-secondary ms-2" onclick="handleBackButton(event)">
                                    <i class="uil uil-arrow-left"></i> Back
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .btn-xs {
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
        }
    </style>

    <script>
        document.getElementById('imageForm').addEventListener('submit', function(e) {
            const preview = document.getElementById('mainImagePreview');
            // Check if preview contains "No image selected"
            if (preview.textContent.includes('No image selected')) {
                e.preventDefault();
                toastr.error('Main image is required. Please upload a main image.');
                return false;
            }
        });

        function previewMainImage(input) {
            const file = input.files[0];
            const preview = document.getElementById('mainImagePreview');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = `
                        <div style="position: relative; width: 100%; height: 100%;">
                            <img src="${e.target.result}"
                                 alt="Preview"
                                 style="width: 100%; height: 100%; object-fit: cover; border-radius: 3px;">
                            <button type="button" class="btn btn-sm btn-danger"
                                    onclick="clearMainImage(event)"
                                    style="position: absolute; top: 5px; right: 5px;">
                                <i class="uil uil-trash"></i>
                            </button>
                        </div>
                    `;
                };
                reader.readAsDataURL(file);
            }
        }

        function previewAdditionalImages(input) {
            const files = input.files;
            const preview = document.getElementById('additionalImagesPreview');

            // Remove the "No images selected" message if it exists
            const noImagesMessage = preview.querySelector('.text-muted');
            if (noImagesMessage) {
                noImagesMessage.remove();
            }

            if (files.length > 0) {
                for (let i = 0; i < files.length; i++) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const imageDiv = document.createElement('div');
                        imageDiv.className = 'additional-image-item';
                        imageDiv.style.cssText = 'position: relative; border: 1px solid #ddd; border-radius: 5px; overflow: hidden;';
                        imageDiv.innerHTML = `
                            <img src="${e.target.result}"
                                 alt="Additional Preview"
                                 style="width: 100%; height: 100px; object-fit: cover;">
                            <button type="button" class="btn btn-xs btn-danger"
                                    onclick="removeNewAdditionalImage(this)"
                                    style="position: absolute; top: 2px; right: 2px; padding: 2px 5px; font-size: 11px;">
                                <i class="uil uil-trash"></i>
                            </button>
                        `;
                        preview.appendChild(imageDiv);
                    };
                    reader.readAsDataURL(files[i]);
                }
            } else {
                // Only show "No images selected" if there are no existing images
                if (preview.children.length === 0) {
                    preview.innerHTML = '<span class="text-muted">No images selected</span>';
                }
            }
        }

        function clearMainImage(event) {
            event.preventDefault();
            document.getElementById('main_image').value = '';
            document.getElementById('mainImagePreview').innerHTML = '<span class="text-muted">No image selected</span>';
        }

        function deleteMainImage(event) {
            event.preventDefault();
            if (confirm('Are you sure you want to delete the main image?')) {
                deleteMainImageAjax();
            }
        }

        function deleteMainImageAjax() {
            fetch('{{ route("product-images.delete-image", $product->id) }}', {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    type: 'main'
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    toastr.success('Main image deleted successfully');
                    // Update UI without reloading
                    document.getElementById('mainImagePreview').innerHTML = '<span class="text-muted">No image selected</span>';
                    document.getElementById('main_image').value = '';
                } else {
                    toastr.error('Failed to delete main image');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                toastr.error('Error deleting main image');
            });
        }

        function deleteAdditionalImage(event, index, filename) {
            event.preventDefault();
            if (confirm('Are you sure you want to delete this additional image.')) {
                deleteAdditionalImageAjax(index, filename);
            }
        }

        function deleteAdditionalImageAjax(index, filename) {
            fetch('{{ route("product-images.delete-image", $product->id) }}', {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    type: 'additional',
                    index: index,
                    filename: filename
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    toastr.success('Image and all variants deleted successfully');
                    setTimeout(() => location.reload(), 1000);
                } else {
                    toastr.error('Failed to delete image');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                toastr.error('Error deleting image');
            });
        }

        function removeNewAdditionalImage(button) {
            button.parentElement.remove();
        }

        function handleBackButton(event) {
            event.preventDefault();

            // Check if product has main image
            fetch('{{ route("product-images.check-before-back", $product->id) }}', {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.hasImage) {
                    // Has main image, proceed to back
                    window.location.href = '{{ route("product-images.index") }}';
                } else {
                    // No main image, ask if user wants to delete product
                    Swal.fire({
                        title: 'No Main Image Added!',
                        html: '<p>Product "<strong>' + data.productName + '</strong>" does not have a main image.</p><p>Add main image or delete the product?</p>',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#dc3545',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Yes, Delete Product',
                        cancelButtonText: 'No, Keep Product'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Delete product
                            deleteProductWithoutImages(data.productId);
                        }
                        // If cancelled, stay on page
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                toastr.error('Error checking product images');
            });
        }

        function deleteProductWithoutImages(productId) {
            fetch('{{ route("product-images.delete-product-without-images", ":productId") }}'.replace(':productId', productId), {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    toastr.success('Product deleted successfully');
                    setTimeout(() => {
                        window.location.href = '{{ route("product-images.index") }}';
                    }, 1000);
                } else {
                    toastr.error('Failed to delete product');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                toastr.error('Error deleting product');
            });
        }

        // Handle browser back button and page navigation
        let canLeavePage = false;
        let pageHistoryPushed = false;

        // Push state to detect back button
        if (!pageHistoryPushed) {
            window.history.pushState(null, null, window.location.href);
            pageHistoryPushed = true;
        }

        window.addEventListener('popstate', function(event) {
            // User clicked browser back button
            // Use server-side check for accurate image state
            fetch('{{ route("product-images.check-before-back", $product->id) }}', {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                }
            })
            .then(response => response.json())
            .then(data => {
                if (!data.hasImage) {
                    // No main image on server
                    event.preventDefault();
                    window.history.pushState(null, null, window.location.href);

                    Swal.fire({
                        title: 'No Main Image Added!',
                        html: '<p>Product does not have a main image.</p><p>Do you want to delete this product?</p>',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#dc3545',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Yes, Delete Product',
                        cancelButtonText: 'No, Keep Product'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Delete product
                            canLeavePage = true;
                            deleteProductWithoutImages({{ $product->id }});
                        } else {
                            // Stay on page
                            window.history.pushState(null, null, window.location.href);
                        }
                    });
                } else {
                    // Has main image, proceed with navigation
                    canLeavePage = true;
                    window.history.back();
                }
            })
            .catch(error => {
                console.error('Error:', error);
                // On error, allow back navigation
                canLeavePage = true;
                window.history.back();
            });
        });

        window.addEventListener('beforeunload', function(event) {
            if (canLeavePage) {
                return;
            }

            // Check if main image preview has content
            const preview = document.getElementById('mainImagePreview');
            if (!preview) {
                return;
            }

            const hasMainImage = !preview.textContent.includes('No image selected');

            if (!hasMainImage) {
                // Show browser's native confirmation dialog
                event.preventDefault();
                event.returnValue = '';
            }
        });

        // Handle navigation links
        document.addEventListener('click', function(event) {
            const target = event.target.closest('a');
            if (target && target.href && !target.href.includes('#')) {
                const preview = document.getElementById('mainImagePreview');
                if (!preview) {
                    return;
                }

                const hasMainImage = !preview.textContent.includes('No image selected');

                if (!hasMainImage) {
                    event.preventDefault();
                    Swal.fire({
                        title: 'Warning!',
                        html: '<p>Product does not have a main image.</p><p>Are you sure you want to leave without adding an image?</p>',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#dc3545',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Yes, Leave',
                        cancelButtonText: 'No, Stay'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            canLeavePage = true;
                            window.location.href = target.href;
                        }
                    });
                }
            }
        }, true);
    </script>
@endsection
