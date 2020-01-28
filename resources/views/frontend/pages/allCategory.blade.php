@extends("frontend.layouts.main")
@section('body')
    @include("frontend.inc.page_header_index")

    <h3 class="text-center">All Categories</h3>

    <div class="container-fluid">
        <!-- Grid row -->
        <div class="row">
            <!-- Page Content -->
            <div class="container">
                <div class="row text-center text-lg-left">
                    {{-- if data is available will show everything otherwise show a message --}}
                    @if(($showCategory->count() > 0))
                    {{-- Retrieving Category --}}
                        @foreach ($showCategory as $showCat)
                            <div class="col-lg-3 col-md-4 col-6 c-tom">
                                <a href="{{ route('PostByCategory', ['id' => $showCat->id, 'slug' => $showCat->slug]) }}" class="d-block">
                                    {{-- Retrieving Category Image [While Image in same table] --}}
                                    <img class="img-fluid img-thumbnail img-custom box-custom box-large-custom box-small-custom" src="{{ asset('admin-panel/img/category/' . $showCat->image) }}" alt="{{ $showCat->title }}">
                                    <h5 class="post-title">
                                        {{ $showCat->title }}
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
