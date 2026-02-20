@extends('backend.layouts.master')

@section('title')
    {{ $title }}
@endsection

@section('content')
    @component('backend.common-components.breadcrumb')
        @slot('pagetitle')
            Applications
        @endslot
        @slot('title')
            Manage Applications
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Job Applications</h5>
                </div>
                <div class="card-body">
                    <style>
                        #applicationsTable tbody td {
                            overflow: visible !important;
                            white-space: normal;
                        }
                        .cover-letter-preview {
                            max-width: 250px;
                            white-space: normal;
                            word-wrap: break-word;
                            display: inline-block;
                            line-height: 1.4;
                            color: #666;
                            font-size: 0.9rem;
                        }
                    </style>
                    <div class="table-responsive" style="overflow: visible;">
                        <table id="applicationsTable" class="table table-hover mb-0 datatables">
                            <thead class="table-light">
                                <tr>
                                    <th>No.</th>
                                    <th>Full Name</th>
                                    <th>Phone</th>
                                    <th>Career Position</th>
                                    <th>Qualification</th>
                                    <th>Experience</th>
                                    <th>Applied On</th>
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
            $('#applicationsTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("applications.index") }}',
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
                    { data: 'fullname', name: 'fullname', orderable: false, searchable: false },
                    { data: 'phone_display', name: 'phone' },
                    { data: 'career_name', name: 'career_name', orderable: false, searchable: false },
                    { data: 'qualifications_display', name: 'qualification', orderable: false, searchable: false },
                    { data: 'experience_display', name: 'years_of_experience', orderable: false, searchable: false },
                    { data: 'created_at_display', name: 'created_at' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
                order: [[0, 'desc']],
                lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
                pageLength: 10,
                language: {
                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>',
                    emptyTable: 'No applications found',
                    zeroRecords: 'No matching applications found',
                    infoFiltered: '(filtered from _MAX_ total applications)',
                }
            });
        });
    </script>
@endsection
