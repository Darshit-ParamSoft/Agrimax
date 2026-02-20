@extends('backend.layouts.master')

@section('title')
    {{ $title }}
@endsection

@section('content')
    @component('backend.common-components.breadcrumb')
        @slot('pagetitle')
            Settings
        @endslot
        @slot('title')
            Manage Contact Settings
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Contact Settings List</h5>
                    <a href="{{ route('contact-settings.create') }}" class="btn btn-primary btn-sm">
                        <i class="uil uil-plus"></i> Add New Setting
                    </a>
                </div>
                <div class="card-body">
                    <table id="settingsTable" class="table table-hover mb-0 datatables">
                        <thead class="table-light">
                            <tr>
                                <th>No.</th>
                                <th>Key</th>
                                <th>Value</th>
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

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#settingsTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("contact-settings.index") }}',
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
                    { data: 'key', name: 'key' },
                    { data: 'value_truncated', name: 'value', orderable: false, searchable: false },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
                order: [[0, 'desc']],
                lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
                pageLength: 10,
                language: {
                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>',
                    emptyTable: 'No settings found',
                    zeroRecords: 'No matching settings found',
                    infoFiltered: '(filtered from _MAX_ total settings)',
                },
                drawCallback: function(settings) {
                    // Any additional setup after table draw
                }
            });
        });
    </script>
@endsection
