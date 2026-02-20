@extends('backend.layouts.master')

@section('title')
    {{ $title }}
@endsection

@section('content')
    @component('backend.common-components.breadcrumb')
        @slot('pagetitle')
            Home Content
        @endslot
        @slot('title')
            Manage Home Sections
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Home Sections List</h5>
                    <a href="{{ route('home-sections.create') }}" class="btn btn-primary btn-sm">
                        <i class="uil uil-plus"></i> Add New Section
                    </a>
                </div>
                <div class="card-body">
                    <style>
                        #homeSectionsTable tbody td {
                            overflow: visible !important;
                            white-space: normal;
                        }
                        .value-preview {
                            max-width: 400px;
                            white-space: normal;
                            word-wrap: break-word;
                            display: inline-block;
                            line-height: 1.4;
                            color: #666;
                            font-size: 0.9rem;
                        }
                        .value-preview.empty {
                            color: #ccc;
                            font-style: italic;
                        }
                    </style>
                    <div class="table-responsive" style="overflow: visible;">
                        <table id="homeSectionsTable" class="table table-hover mb-0 datatables">
                            <thead class="table-light">
                                <tr>
                                    <th>No.</th>
                                    <th>Section Key</th>
                                    <th>Value Preview</th>
                                    <th>Created At</th>
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
            $('#homeSectionsTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("home-sections.index") }}',
                    type: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    error: function(xhr, status, error) {
                        console.error('DataTables AJAX Error:', xhr);
                        console.error('Status:', status);
                        console.error('Error:', error);
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
                    { data: 'section_key', name: 'section_key' },
                    { data: 'value_preview', name: 'value_preview', orderable: false, searchable: false },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
                order: [[1, 'asc']],
                lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
                pageLength: 10,
                language: {
                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>',
                    emptyTable: 'No home sections found',
                    zeroRecords: 'No matching sections found',
                    infoFiltered: '(filtered from _MAX_ total sections)',
                }
            });
        });

        function showNotification(message, type) {
            const toastrType = type === 'danger' ? 'error' : type;
            toastr[toastrType](message);
        }
    </script>
@endsection
