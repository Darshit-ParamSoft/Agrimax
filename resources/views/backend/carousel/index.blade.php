@extends('backend.layouts.master')

@section('title')
    {{ $title }}
@endsection

@section('content')
    @component('backend.common-components.breadcrumb')
        @slot('pagetitle')
            Carousel
        @endslot
        @slot('title')
            Manage Homepage Product Carousel
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Carousel Items</h5>
                    <a href="{{ route('carousel.create') }}" class="btn btn-primary btn-sm">
                        <i class="uil uil-plus"></i> Add New Item
                    </a>
                </div>
                <div class="card-body">

                    <style>
                        .carousel-table tbody tr {
                            cursor: move;
                        }
                        .carousel-table tbody tr.dragging {
                            opacity: 0.5;
                            background-color: #f0f0f0;
                        }
                        .carousel-table tbody tr.drag-over {
                            border-top: 3px solid #0066cc;
                        }
                        .drag-handle {
                            cursor: grab;
                            padding: 8px;
                            color: #999;
                        }
                        .drag-handle:active {
                            cursor: grabbing;
                        }
                        .product-image {
                            max-width: 60px;
                            max-height: 60px;
                            object-fit: cover;
                            border-radius: 4px;
                        }
                        .toggle-status {
                            display: inline-block;
                            cursor: pointer;
                            padding: 0.25rem 0.5rem;
                            border: 1px solid #dee2e6;
                            border-radius: 0.25rem;
                            background-color: #f8f9fa;
                            transition: all 0.3s ease;
                        }
                        .toggle-status:hover {
                            background-color: #e9ecef;
                        }
                        .status-active {
                            color: #28a745;
                        }
                        .status-inactive {
                            color: #dc3545;
                        }
                    </style>

                    @if($carouselItems->count() > 0)
                        <div class="table-responsive">
                            <table id="carouselTable" class="table table-hover mb-0 carousel-table">
                                <thead class="table-light">
                                    <tr>
                                        <th></th>
                                        <th>Order</th>
                                        <th>Image</th>
                                        <th>Product</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="sortable-carousel">
                                    @foreach($carouselItems as $item)
                                        <tr data-id="{{ $item->id }}" draggable="true" class="carousel-row">
                                            <td><i class="uil uil-ellipsis-v"></i></td>
                                            <td>
                                                <span class="drag-handle">
                                                </span>
                                                <span class="sort-order">{{ $item->sort_order }}</span>
                                            </td>
                                            <td>
                                                @php
                                                    // Get compressed variant for index display (shows faster with smaller file)
                                                    $compressedImage = $item->imageFiles()
                                                        ->where('file_type', 'carousel')
                                                        ->where('image_variant', 'compressed')
                                                        ->first();

                                                    // Fallback to thumbnail
                                                    if (!$compressedImage) {
                                                        $compressedImage = $item->imageFiles()
                                                            ->where('file_type', 'carousel')
                                                            ->where('image_variant', 'thumbnail')
                                                            ->first();
                                                    }

                                                    // Fallback to original
                                                    if (!$compressedImage) {
                                                        $compressedImage = $item->imageFiles()
                                                            ->where('file_type', 'carousel')
                                                            ->where('image_variant', 'original')
                                                            ->first();
                                                    }
                                                @endphp
                                                @if($compressedImage)
                                                    <img src="{{ $compressedImage->url }}" class="product-image" alt="Carousel Image">
                                                @else
                                                    <img src="{{ asset('assets/images/placeholder.png') }}" class="product-image" alt="No Image">
                                                @endif
                                            </td>
                                            <td>
                                                <strong>{{ $item->product ? $item->product->name : 'Deleted Product' }}</strong>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-light toggle-status"
                                                    data-item-id="{{ $item->id }}"
                                                    title="Click to toggle status"
                                                    style="cursor: pointer; padding: 0.25rem 0.5rem;">
                                                    <i class="uil uil-eye{{ !$item->status ? '-slash' : '' }} {{ $item->status ? 'status-active' : 'status-inactive' }}"></i>
                                                    <span class="status-text">{{ $item->status ? 'Active' : 'Inactive' }}</span>
                                                </button>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="{{ route('carousel.edit', $item->id) }}" class="btn btn-info btn-sm" title="Edit">
                                                        <i class="uil uil-pen"></i> Edit
                                                    </a>
                                                    <form action="{{ route('carousel.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this carousel item?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                                            <i class="uil uil-trash"></i> Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info text-center">
                            <p class="mb-0">No carousel items found. <a href="{{ route('carousel.create') }}">Click here</a> to add one.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            initDragAndDrop();
            initToggleStatus();
        });

        function initDragAndDrop() {
            const sortableCarousel = document.getElementById('sortable-carousel');
            let draggedElement = null;

            sortableCarousel.addEventListener('dragstart', function(e) {
                draggedElement = e.target.closest('tr');
                draggedElement.classList.add('dragging');
                e.dataTransfer.effectAllowed = 'move';
            });

            sortableCarousel.addEventListener('dragend', function(e) {
                if (draggedElement) {
                    draggedElement.classList.remove('dragging');
                    draggedElement = null;
                }
            });

            sortableCarousel.addEventListener('dragover', function(e) {
                e.preventDefault();
                e.dataTransfer.dropEffect = 'move';

                const draggingRows = sortableCarousel.querySelectorAll('tr.dragging');
                if (draggingRows.length === 0) return;

                const afterElement = getDragAfterElement(sortableCarousel, e.clientY);

                if (afterElement == null) {
                    sortableCarousel.appendChild(draggedElement);
                } else {
                    sortableCarousel.insertBefore(draggedElement, afterElement);
                }
            });

            sortableCarousel.addEventListener('drop', function(e) {
                e.preventDefault();
                updateSortOrder();
            });
        }

        function getDragAfterElement(container, y) {
            const draggableElements = [...container.querySelectorAll('tr:not(.dragging)')];

            return draggableElements.reduce((closest, child) => {
                const box = child.getBoundingClientRect();
                const offset = y - box.top - box.height / 2;

                if (offset < 0 && offset > closest.offset) {
                    return { offset: offset, element: child };
                } else {
                    return closest;
                }
            }, { offset: Number.NEGATIVE_INFINITY }).element;
        }

        function updateSortOrder() {
            const sortOrder = [];
            const rows = document.querySelectorAll('#sortable-carousel tr');

            rows.forEach((row, index) => {
                const itemId = row.dataset.id;
                sortOrder.push(itemId);
                row.querySelector('.sort-order').textContent = index + 1;
            });

            // AJAX request to save the new sort order
            fetch('{{ route("carousel.updateSortOrder") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '{{ csrf_token() }}',
                },
                body: JSON.stringify({
                    sort_order: sortOrder
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    toastr.success(data.message, 'Success', {
                        positionClass: 'toast-top-right',
                        timeOut: 3000,
                        progressBar: true
                    });
                }
            })
            .catch(error => {
                console.error('Error updating sort order:', error);
                toastr.error('Error updating sort order. Please try again.', 'Error', {
                    positionClass: 'toast-top-right',
                    timeOut: 3000,
                    progressBar: true
                });
            });
        }

        function initToggleStatus() {
            const toggleButtons = document.querySelectorAll('.toggle-status');

            toggleButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const itemId = this.dataset.itemId;

                    fetch(`/carousel/${itemId}/toggle-status`, {
                        method: 'PATCH',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '{{ csrf_token() }}',
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const icon = this.querySelector('i');
                            const statusText = this.querySelector('.status-text');

                            if (data.status) {
                                icon.classList.remove('status-inactive', 'uil-eye-slash');
                                icon.classList.add('status-active', 'uil-eye');
                                statusText.textContent = 'Active';
                            } else {
                                icon.classList.remove('status-active', 'uil-eye');
                                icon.classList.add('status-inactive', 'uil-eye-slash');
                                statusText.textContent = 'Inactive';
                            }
                            toastr.success('Status updated successfully', 'Success', {
                                positionClass: 'toast-top-right',
                                timeOut: 2000,
                                progressBar: true
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error toggling status:', error);
                        toastr.error('Error updating status. Please try again.', 'Error', {
                            positionClass: 'toast-top-right',
                            timeOut: 3000,
                            progressBar: true
                        });
                    });
                });
            });
        }
    </script>
@endsection
