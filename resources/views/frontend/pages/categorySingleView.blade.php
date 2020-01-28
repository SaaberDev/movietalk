@extends("frontend.layouts.main")
@section('body')
    @include("frontend.inc.page_header_index")

    @foreach($TitleByCategory as $CatTitle)
        <h3 class="text-center">{{ $CatTitle->title }}</h3>
    @endforeach

    <div class="container-fluid">
        <!-- Grid row -->
        <div class="row">
            <!-- Page Content -->
            <div class="container">
                <div class="row text-center text-lg-left">
                    {{-- if data is available will show everything otherwise show a message --}}
                    @if(($PostByCategory->count() > 0))
                        @foreach ($PostByCategory as $post)
                            <div class="col-lg-3 col-md-4 col-6 c-tom">
                                <a href="{{ route('singleBlog', $post->slug) }}" class="d-block">
                                    {{-- Retrieving Category Image [While Image in same table] --}}
                                    <img class="img-fluid img-thumbnail img-custom box-custom box-large-custom box-small-custom" src="{{ asset('/img/cover/' . $post->coverImage->cover_ImageFile) }}" alt="{{ $post->title }}">
                                    <h5 class="post-title">
                                        {{ $post->title }}
                                    </h5>
                                </a>
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
