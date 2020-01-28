@extends("frontend.layouts.main")
@section('body')
    @include("frontend.inc.page_header_index")
    <div class="container-fluid">
    <!-- Grid row -->
    <div class="row">
        <!-- Page Content -->
        <div class="container">
            <div class="row text-center text-lg-left">
                {{--
                ============================ Checking ============================
                if data is available will show everything otherwise show a message
                --}}
                @if(($myBlog->count() > 0))

                    @foreach ($myBlog as $post)
                        <div class="col-lg-3 col-md-4 col-6 c-tom">
                            <a href="{{ route('singleBlog', $post->slug) }}" class="d-block">
                                {{-- Fetching Cover photo from database as thumbnail --}}
                                <img class="img-fluid img-thumbnail img-custom box-custom box-large-custom box-small-custom" src="{{ asset('/img/cover/' . $post->coverImage->cover_ImageFile) }}" alt="{{ $post->title }}">
                                <h5 class="post-title">
                                    {{ $post->title }}
                                </h5>
                            </a>

                            <div class="text-center">
                                <button type="button" onclick="location.href='{{ route('edit', $post->id)}}'" class="btn btn-success"> Edit </button>
                                <!-- Button trigger modal for delete -->
                                <button type="button" onclick="location.href='#deleteBlog{{ $post->id }}'" class="btn btn-danger" data-toggle="modal" data-target="#deleteBlog{{ $post->id }}"> Delete </button>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="deleteBlog{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete?</h5>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('delete',  $post->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Yes</button>
                                                <button type="submit" class="btn btn-success" data-dismiss="modal">No</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    @endforeach

                    @else
                    <h1 class="font-weight-lighter text-center text-lg-left mt-4 mb-0">No Blog posted yet</h1>
                    @endif
            </div>
        </div>
        <!-- /.container -->
    </div>
    </div>
@endsection
