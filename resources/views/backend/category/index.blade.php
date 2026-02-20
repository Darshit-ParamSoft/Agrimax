@extends('backend.layouts.master')

@section('title')
    {{ $title }}
@endsection

@section('content')
    @component('backend.common-components.breadcrumb')
        @slot('pagetitle')
            Categories
        @endslot
        @slot('title')
            Manage Categories
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Categories List</h5>
                    <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm">
                        <i class="uil uil-plus"></i> Add New Category
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive" style="overflow: visible;">
                        <table id="categoriesTable" class="table table-hover mb-0 datatables" style="table-layout: fixed; width: 100%;">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 8%;">No.</th>
                                    <th style="width: 25%;">Name</th>
                                    <th style="width: 25%;">Slug</th>
                                    <th style="width: 12%;">Status</th>
                                    <th style="width: 30%;">Actions</th>
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
            $('#categoriesTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("categories.index") }}',
                    type: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
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
                    { data: 'status_badge', name: 'status', orderable: false },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
                order: [[1, 'asc']],
                lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
                pageLength: 10,
                language: {
                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>',
                    emptyTable: 'No categories found',
                    zeroRecords: 'No matching categories found',
                    infoFiltered: '(filtered from _MAX_ total categories)',
                }
            });

            // Toggle status click handler
            $(document).on('click', '.toggle-status', function() {
                const categoryId = $(this).data('category-id');
                toggleCategoryStatus(categoryId);
            });
        });

        function toggleCategoryStatus(categoryId) {
            Swal.fire({
                title: 'Toggle Status',
                text: 'Are you sure you want to toggle the status?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, toggle it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch('{{ route("categories.toggle-status", ":id") }}'.replace(':id', categoryId), {
                        method: 'PATCH',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json',
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            toastr.success('Status updated successfully');
                            $('#categoriesTable').DataTable().ajax.reload();
                        } else {
                            toastr.error('Failed to update status');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        toastr.error('Error updating status');
                    });
                }
            });
        }
    </script>
@endsection
