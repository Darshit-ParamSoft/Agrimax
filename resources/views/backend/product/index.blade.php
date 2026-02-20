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
            Manage Products
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Products List</h5>
                    <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">
                        <i class="uil uil-plus"></i> Add New Product
                    </a>
                </div>
                <div class="card-body">
                    <style>
                        #productsTable tbody td {
                            overflow: visible !important;
                            white-space: normal;
                        }
                        .toggle-status, .toggle-featured, .toggle-is-main {
                            display: inline-block !important;
                            visibility: visible !important;
                            opacity: 1 !important;
                        }
                        .long-description-preview {
                            max-width: 250px;
                            white-space: normal;
                            word-wrap: break-word;
                            display: inline-block;
                            line-height: 1.4;
                            color: #666;
                            font-size: 0.9rem;
                        }
                        .long-description-preview.empty {
                            color: #ccc;
                            font-style: italic;
                        }
                    </style>
                    <div class="table-responsive" style="overflow: visible;">
                        <table id="productsTable" class="table table-hover mb-0 datatables">
                            <thead class="table-light">
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Category</th>
                                    <th>Division</th>
                                    <th>Featured</th>
                                    <th>Status</th>
                                    <th>Main Product</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#productsTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("products.index") }}',
                    type: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    error: function(xhr, status, error) {
                        console.error('DataTables AJAX Error:', xhr);
                        console.error('Status:', status);
                        console.error('Error:', error);
                        console.error('Response:', xhr.responseText);
                    }
                },
                columns: [
                    {
                        data: null,
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    { data: 'name', name: 'name' },
                    { data: 'slug', name: 'slug' },
                    { data: 'category_name', name: 'category_name', orderable: false, searchable: false },
                    { data: 'division_badge', name: 'division', orderable: false, searchable: false },
                    { data: 'featured_badge', name: 'featured', orderable: false, searchable: false },
                    { data: 'status_badge', name: 'status', orderable: false, searchable: false },
                    { data: 'is_main_badge', name: 'is_main', orderable: false, searchable: false },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
                order: [[1, 'asc']],
                lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
                pageLength: 10,
                language: {
                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>',
                    emptyTable: 'No products found',
                    zeroRecords: 'No matching products found',
                    infoFiltered: '(filtered from _MAX_ total products)',
                },
                drawCallback: function(settings) {
                    attachToggleEventHandlers();
                }
            });

            function attachToggleEventHandlers() {
                // Toggle Status
                $('.toggle-status').off('click').on('click', function(e) {
                    e.preventDefault();
                    const productId = $(this).data('product-id');
                    const button = $(this);

                    $.ajax({
                        url: '/products/' + productId + '/toggle-status',
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        success: function(response) {
                            if (response.success) {
                                const icon = button.find('i');
                                if (response.status) {
                                    icon.removeClass('uil-eye-slash').addClass('uil-eye');
                                    icon.css('color', '#28a745');
                                } else {
                                    icon.removeClass('uil-eye').addClass('uil-eye-slash');
                                    icon.css('color', '#dc3545');
                                }
                                showNotification('Status updated successfully!', 'success');
                            }
                        },
                        error: function(xhr) {
                            console.error('Toggle Status Error:', xhr);
                            showNotification('Error updating status', 'danger');
                        }
                    });
                });

                // Toggle Featured
                $('.toggle-featured').off('click').on('click', function(e) {
                    e.preventDefault();
                    const productId = $(this).data('product-id');
                    const button = $(this);

                    $.ajax({
                        url: '/products/' + productId + '/toggle-featured',
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        success: function(response) {
                            if (response.success) {
                                const icon = button.find('i');
                                if (response.featured) {
                                    icon.removeClass('uil-star').addClass('uil-star');
                                    icon.css('color', '#ffc107');
                                } else {
                                    icon.removeClass('uil-star').addClass('uil-star');
                                    icon.css('color', 'inherit');
                                }
                                showNotification('Featured status updated successfully!', 'success');
                            }
                        },
                        error: function(xhr) {
                            console.error('Toggle Featured Error:', xhr);
                            showNotification('Error updating featured status', 'danger');
                        }
                    });
                });

                // Toggle Is Main
                $('.toggle-is-main').off('click').on('click', function(e) {
                    e.preventDefault();
                    const productId = $(this).data('product-id');
                    const button = $(this);

                    $.ajax({
                        url: '/products/' + productId + '/toggle-is-main',
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        success: function(response) {
                            if (response.success) {
                                const icon = button.find('i');
                                if (response.is_main) {
                                    icon.removeClass('uil-toggle-off').addClass('uil-toggle-on');
                                    icon.css('color', '#28a745');
                                } else {
                                    icon.removeClass('uil-toggle-on').addClass('uil-toggle-off');
                                    icon.css('color', '#dc3545');
                                }
                                showNotification('Main product status updated successfully!', 'success');
                            }
                        },
                        error: function(xhr) {
                            console.error('Toggle Is Main Error:', xhr);
                            showNotification('Error updating main product status', 'danger');
                        }
                    });
                });
            }

            function showNotification(message, type) {
                const toastrType = type === 'danger' ? 'error' : type;
                toastr[toastrType](message);
            }

            // Initial attach
            attachToggleEventHandlers();
        });
    </script>
@endsection
