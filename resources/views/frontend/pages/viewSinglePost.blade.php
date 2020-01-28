@extends("frontend.layouts.main")
@section('body')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url({{ asset('/img/cover/' . $posts->coverImage->cover_ImageFile) }});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1> {{ $posts->title }} </h1>
                        <h2 class="subheading"> {{ $posts->subTitle }} </h2>
                        <span> Release Date: {{ date('l, jS F, Y', strtotime($posts->releaseDate)) }} </span>
                        <span class="meta">Posted by
                          <a href="#">
                              {{-- Showing Post Owner Name --}}
                              @guest()
                                  {{ $posts->users->name /*. ' ' . $posts->users->last_name*/ }}
                              @else
                                  {{ $posts->users->name /*. ' ' . $posts->users->last_name*/ }}
                              @endguest
                          </a>
                            {{-- Showing Post created time/date --}}
                          on {{ date('l, jS F, Y', strtotime( $posts->created_at)) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <p>{!! $posts->story !!}</p>

                    <a href="#">
                        @php $i = 1; @endphp
                        @foreach ($posts->image as $img)
                            @if($i > 0)
                                <img class="img-fluid" src="{{ asset('/img/posts/' . $img->image_file) }}" alt="">
                                @php $i--; @endphp
                            @endif
                        @endforeach
                    </a>
                </div>
            </div>
        </div>
    </article>
@endsection
