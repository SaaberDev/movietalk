@extends("frontend.layouts.main")
@section('body')
    <!-- Page Header -->
    @include("frontend.inc.page_header_index")
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <form action="{{ route('update', $editPosts->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="formGroupExampleInput" class="font-weight-bold">Movie Name</label>
                        <input type="text" name="title" value="{{ $editPosts->title }}" class="form-control" id="formGroupExampleInput">
                    </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput" class="font-weight-bold">Subtitle</label>
                        <input type="text" name="subtitle" value="{{ $editPosts->subTitle }}" class="form-control" id="formGroupExampleInput">
                    </div>

                    <div class="form-row form-group font-weight-bold">
                        <div class="col">
                            <label for="inputGroupSelect01" class="font-weight-bold">Category</label>
                            <select class="font-weight-bold form-control custom-select" name="category" id="inputGroupSelect01">
                                <option selected value="">Please Choose a Category</option>
                                @foreach($primaryCategory as $categories)
                                    <option value="{{ $categories->id }}" {{ $categories->id ? 'selected' : '' }}>{{ $categories->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <label for="formGroupExampleInput" class="font-weight-bold">Cover Photo</label>
                    <div class="form-row form-group font-weight-bold text-primary">
                        <div class="col-md-12">
                            <div class="input-group md-3">
                                <input type="text" class="form-control" placeholder="No File Selected" readonly>
                                <div class="input-group-btn">
            <span class="fileUpload btn btn-info">
              <span class="upl" id="upload">Browse</span>
              <input type="file" name="uploadCoverFile" class="upload up" id="up" onchange="readURL(this);"/> <!-- Use 'multiple' at the end of the closing such this ("readURL(this);" multiple/>) way -->
            </span><!-- btn-orange -->
                                </div><!-- btn -->
                            </div><!-- group -->
                        </div><!-- form-group -->
                    </div>

                    <div class="form-group text-center">
                        <label for="exampleFormControlTextarea1" class="font-weight-bold">Preview</label>
                        <div class="row" style="justify-content: center;">
                                @if (!empty($coverImage))
                                    <img class="img-fluid img-thumbnail img-custom box-custom box-large-custom box-small-custom" src="{{ asset('/img/cover/' . $coverImage->cover_ImageFile) }}">
                                @else
                                    <p>No image found</p>
                                @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput" class="font-weight-bold">Release Date</label>
                        <input type="date" name="date" value="{{ $editPosts->releaseDate }}" class="form-control" id="formGroupExampleInput">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="font-weight-bold">Paragraph One</label>
                        <textarea class="form-control" name="story" id="exampleFormControlTextarea1" rows="6">{{ $editPosts->story }}</textarea>
                    </div>

                    <label for="formGroupExampleInput" class="font-weight-bold">Content Photo</label>
                    <div class="form-row form-group font-weight-bold text-primary">
                        <div class="col-md-12">
                            <div class="input-group md-3">
                                <input type="text" class="form-control" placeholder="No File Selected" readonly>
                                <div class="input-group-btn">
            <span class="fileUpload btn btn-info">
              <span class="upl" id="upload">Browse</span>
              <input type="file" name="uploadFile[]" class="upload up" id="up" onchange="readURL(this);" multiple/> <!-- Use 'multiple' at the end of the closing such this ("readURL(this);" multiple/>) way -->
            </span><!-- btn-orange -->
                                </div><!-- btn -->
                            </div><!-- group -->
                        </div><!-- form-group -->
                    </div>

                    <div class="form-group text-center">
                        <label for="exampleFormControlTextarea1" class="font-weight-bold">Preview</label>
                        <div class="row" style="justify-content: center;">
                            @foreach($editPosts->image as $ShowImg)
                                @if ( $ShowImg->image_file )
                                    <img class="img-fluid img-thumbnail img-custom box-custom box-large-custom box-small-custom" src="{{ asset('/img/posts/' . $ShowImg->image_file) }}">
                                @else
                                    <p>No image found</p>
                                @endif
                            @endforeach
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="formGroupExampleInput" class="font-weight-bold">Caption</label>
                        <input type="text" name="caption" value="{{ $postImage->image_caption }}" class="form-control" id="formGroupExampleInput">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="font-weight-bold">Paragraph Two</label>
                        <textarea class="form-control" name="story_two" id="exampleFormControlTextarea1" rows="6">{{ $editPosts->story_two }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-success float-right">POST</button>

                </form>

            </div>
        </div>
    </div>

    {{--<header class="masthead" style="background-image: url('/img/home-bg.jpg')">
        <div class="overlay"></div>

    </header>--}}
@endsection
