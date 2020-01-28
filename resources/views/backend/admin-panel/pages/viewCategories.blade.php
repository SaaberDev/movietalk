@extends("backend.admin-panel.layouts.main")
@section('body')
    <div class="panel-header panel-header-sm">
    </div>

    <div class="container">
        <div class="card shadow mb-0 mx-0 mt-3">
            <div class="col-md-12">
                <div class="card-header">
                    <h4 class="card-title text-center"> Categories </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="text-center text-primary">
                            <th> ID </th>
                            <th> Name </th>
                            <th> Description </th>
                            <th> Image </th>
                            <th>Last Updated</th>
                            <th>
                                Action
                            </th>
                            </thead>
                            <tbody>
                            @php
                                $i = 1
                            @endphp
                            @foreach($category as $showCategory)
                            <tr class="text-center">
                                <td> {{ $i }} </td>
                                <td> {{ $showCategory->title }} </td>
                                <td> {{ $showCategory->desc }} </td>
                                <td>
                                    @if ($showCategory == null)
                                        No Thumbnail Available
                                    @else
                                    <img src="{{ asset('admin-panel/img/category/' . $showCategory->image)  }}" alt="{{ $showCategory->title }}">
                                    @endif
                                </td>
                                <td>{{ $showCategory->updated_at->format('d-m-Y') }}</td>
                                <td class="text-right">
                                    <div class="btn-group">
                                        <button type="submit" name="edit" onclick="location.href='{{ route('editCategory', $showCategory->id) }}'" class="btn btn-success fas fa-edit"></button>
                                        <button type="submit" name="delete" onclick="location.href='#deleteCategory{{ $showCategory->id }}'" data-toggle="modal" data-target="#deleteCategory{{ $showCategory->id }}" class="btn btn-danger fas fa-trash-alt"></button>


                                        <!-- Modal -->
                                        <div class="modal fade" id="deleteCategory{{ $showCategory->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-contentX">
                                                    <div class="modal-headerX">
                                                        <h5 class="modal-title text-center" id="exampleModalLabel">Are you sure you want to delete?</h5>
                                                    </div>
                                                    <div class="modal-footerX">
                                                        <form action="{{ route('deleteCategory', $showCategory->id) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger">Yes</button>
                                                            <button type="submit" class="btn btn-success" data-dismiss="modal">No</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" name="view" class="btn btn-primary fas fa-eye"></button>
                                    </div>
                                </td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
