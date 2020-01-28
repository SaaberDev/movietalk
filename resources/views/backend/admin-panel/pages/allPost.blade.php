@extends("backend.admin-panel.layouts.main")
@section('body')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h4> Manage Posts</h4>
                        </div>
                        <div class="card-btn">
                            <button class="btn btn-primary ml-auto">Add new Post</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-center data-table">
                                <thead class="text-uppercase text-primary">
                                <th> # </th>
                                <th> Title </th>
                                <th> Posted By </th>
                                {{--<th> Ip </th>
                                <th> Mac Address </th>
                                <th> Approval </th>
                                <th> Status </th>--}}
                                <th> Action </th>
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
                ajax: "{{ route('getPosts') }}",
                columns: [
                    {data: 'serialNo', name: 'serialNo'},
                    {data: 'title', name: 'title'},
                    {data: 'PostByUser', name: 'PostByUser'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@endsection


