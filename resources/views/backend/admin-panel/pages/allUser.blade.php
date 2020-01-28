@extends("backend.admin-panel.layouts.main")
@section('body')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Manage User</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-center data-table">
                                <thead class="text-uppercase text-primary">
                                <th> # </th>
                                <th> Name </th>
                                <th> Role </th>
                                <th> Email </th>
                                {{--<th> Ip </th>
                                <th> Mac Address </th>
                                <th> Approval </th>
                                <th> Status </th>--}}
                                <th> Action </th>
                                <th> Ban </th>
                                {{--<th> Ban </th>--}}
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Datatable JS --}}
    <script type="text/javascript">
        $(function () {
            const table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('manageUser') }}",
                columns: [
                    {data: 'serialNo', name: 'serialNo'},
                    {data: 'name', name: 'name'},
                    {data: 'UserRole', name: 'UserRole'},
                    {data: 'email', name: 'email'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                    {data: 'ban', name: 'ban', orderable: false, searchable: false},
                ]
            });

        });
    </script>
@endsection


