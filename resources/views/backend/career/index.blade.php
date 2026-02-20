@extends('backend.layouts.master')

@section('title')
    {{ $title }}
@endsection

@section('content')
    @component('backend.common-components.breadcrumb')
        @slot('pagetitle')
            Careers
        @endslot
        @slot('title')
            Manage Careers
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Careers List</h5>
                    <a href="{{ route('careers.create') }}" class="btn btn-primary btn-sm">
                        <i class="uil uil-plus"></i> Add New Career
                    </a>
                </div>
                <div class="card-body">
                    <style>
                        #careersTable tbody td {
                            overflow: visible !important;
                            white-space: normal;
                        }
                        .toggle-status {
                            display: inline-block !important;
                            visibility: visible !important;
                            opacity: 1 !important;
                        }
                        .description-preview {
                            max-width: 300px;
                            white-space: normal;
                            word-wrap: break-word;
                            display: inline-block;
                            line-height: 1.4;
                            color: #666;
                            font-size: 0.9rem;
                        }
                        .description-preview.empty {
                            color: #ccc;
                            font-style: italic;
                        }
                    </style>
                    <div class="table-responsive" style="overflow: visible;">
                        <table id="careersTable" class="table table-hover mb-0 datatables">
                            <thead class="table-light">
                                <tr>
                                    <th>No.</th>
                                    <th>Career Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
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
            $('#careersTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("careers.index") }}',
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
                    {
                        data: 'desc',
                        name: 'desc',
                        orderable: false,
                        searchable: false,
                        render: function(data) {
                            if (!data) return '<span class="description-preview empty">No description</span>';
                            const preview = data.replace(/<[^>]*>/g, '').substring(0, 150);
                            return '<span class="description-preview" title="' + (data.replace(/<[^>]*>/g, '').substring(0, 200)) + '">' + preview + (preview.length < 150 ? '' : '...') + '</span>';
                        }
                    },
                    { data: 'status_badge', name: 'status', orderable: false, searchable: false },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
                order: [[1, 'asc']],
                lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
                pageLength: 10,
                language: {
                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>',
                    emptyTable: 'No careers found',
                    zeroRecords: 'No matching careers found',
                    infoFiltered: '(filtered from _MAX_ total careers)',
                },
                drawCallback: function(settings) {
                    attachToggleEventHandlers();
                }
            });

            function attachToggleEventHandlers() {
                // Toggle Status
                $('.toggle-status').off('click').on('click', function(e) {
                    e.preventDefault();
                    const careerId = $(this).data('career-id');
                    const button = $(this);

                    $.ajax({
                        url: '{{ route('careers.toggle-status') }}',
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        data: {
                            id: careerId
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
