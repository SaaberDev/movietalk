@extends("frontend.layouts.main")
@section("body")
    <!-- Page Header -->
    @include("frontend.inc.page_headerNoBanner")
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-10 mx-auto">
                <div class="post-preview">
                    <hr>
                    @foreach($posts as $post)
                        <a href="{{ route('singleBlog', $post->slug) }}">
                            <h2 class="post-title">
                                <img class="img-fluid img-thumbnail" style="width: 40%; height: 40%" src="{{ asset('/img/cover/' . $post->coverImage->cover_ImageFile) }}" alt="{{ $post->title }}">
                                <br>
                                {{ $post->title }}
                            </h2>
                            <h3 class="post-subtitle">
                                {{ $post->subTitle }}
                            </h3>
                        </a>

                        <p class="post-meta">Posted by
                            <a href="#">
                                @guest()
                                    {{ $post->users->name /*. ' ' . $post->users->last_name*/ }}
                                @else
                                    {{ $post->users->name /*. ' ' . $post->users->last_name*/ }}
                                @endguest
                            </a>
                            on {{ $post->created_at->format('l, jS F, Y') }}</p>
                        <hr>
                    @endforeach
                </div>


                <!-- Pager -->
                <div class="clearfix">
                    <a class="btn btn-primary float-right" href="{{ route('myBlog') }}">Older Posts &rarr;</a>
                </div>
            </div>
        </div>
    </div>
@stop
