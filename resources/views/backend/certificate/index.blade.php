@extends('backend.layouts.master')

@section('title')
    {{ $title }}
@endsection

@section('content')
    @component('backend.common-components.breadcrumb')
        @slot('pagetitle')
            Certificates
        @endslot
        @slot('title')
            Manage Certificates
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Certificates List</h5>
                    <a href="{{ route('certificates.create') }}" class="btn btn-primary btn-sm">
                        <i class="uil uil-plus"></i> Add New Certificate
                    </a>
                </div>
                <div class="card-body">
                    <style>
                        #certificatesTable tbody td {
                            overflow: visible !important;
                            white-space: normal;
                        }
                    </style>
                    <div class="table-responsive" style="overflow: visible;">
                        <table id="certificatesTable" class="table table-hover mb-0 datatables">
                            <thead class="table-light">
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Logo</th>
                                    <th>PDF & Images</th>
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
            $('#certificatesTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("certificates.index") }}',
                    type: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    error: function(xhr, status, error) {
                        console.error('DataTables AJAX Error:', xhr);
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
                    { data: 'logo_preview', name: 'logo', orderable: false, searchable: false },
                    { data: 'pdf_preview', name: 'pdf', orderable: false, searchable: false },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
                order: [[1, 'asc']],
                lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
                pageLength: 10,
                language: {
                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>',
                    emptyTable: 'No certificates found',
                    zeroRecords: 'No matching certificates found',
                    infoFiltered: '(filtered from _MAX_ total certificates)',
                }
            });
        });

        function showNotification(message, type) {
            const toastrType = type === 'danger' ? 'error' : type;
            toastr[toastrType](message);
        }
    </script>
@endsection
