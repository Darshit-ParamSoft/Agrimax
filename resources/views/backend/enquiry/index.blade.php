@extends('backend.layouts.master')

@section('title')
    {{ $title }}
@endsection

@section('content')
    @component('backend.common-components.breadcrumb')
        @slot('pagetitle')
            Enquiries
        @endslot
        @slot('title')
            Manage Enquiries
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Enquiries List</h5>
                </div>
                <div class="card-body">
                    <table id="enquiriesTable" class="table table-hover mb-0 datatables">
                        <thead class="table-light">
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Product</th>
                                <th>Message</th>
                                <th>Date</th>
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
            $('#enquiriesTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("enquiries.index") }}',
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
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'phone', name: 'phone' },
                    { data: 'product_name', name: 'product_name', orderable: false, searchable: false },
                    { data: 'message_preview', name: 'message', orderable: false, searchable: false },
                    { data: 'created_at', name: 'created_at', render: function(data) {
                        return new Date(data).toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' });
                    }},
                    { data: 'actions', name: 'actions', orderable: false, searchable: false }
                ],
                order: [[1, 'asc']],
                lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
                pageLength: 10,
                language: {
                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>',
                    emptyTable: 'No enquiries found',
                    zeroRecords: 'No matching enquiries found',
                    infoFiltered: '(filtered from _MAX_ total enquiries)',
                },
                drawCallback: function(settings) {
                    // Any additional setup after table draw
                }
            });
        });
    </script>
@endsection
