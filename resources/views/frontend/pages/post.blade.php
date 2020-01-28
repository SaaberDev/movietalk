@extends("frontend.layouts.main")
@section('body')
    <!-- Page Header -->
    @include("frontend.inc.page_header_index")
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="formGroupExampleInput" class="font-weight-bold">Movie Name</label>
                                <input type="text" name="title" class="form-control" id="formGroupExampleInput">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="formGroupExampleInput" class="font-weight-bold">Release Date</label>
                                <input type="date" name="date" class="form-control" id="formGroupExampleInput">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="formGroupExampleInput" class="font-weight-bold">Subtitle</label>
                                <input type="text" name="subtitle" class="form-control" id="formGroupExampleInput">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-row form-group font-weight-bold">
                                <div class="col">
                                    <label for="inputGroupSelect01" class="font-weight-bold">Category</label>
                                    <select class="font-weight-bold form-control custom-select" name="category" id="inputGroupSelect01">
                                        <option selected value="">Please Choose a Category</option>
                                        @foreach($primaryCategory as $categories)
                                            <option value="{{ $categories->id }}">{{ $categories->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>




                    {{-- Cover Photo Upload Start --}}
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
                    {{-- Cover Photo Upload End --}}

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="font-weight-bold">Write Content Here</label>
                        <textarea class="form-control" name="story" id="exampleFormControlTextarea1" rows="6"></textarea>
                    </div>

                    {{-- Content Photo Upload Start --}}
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
                    {{-- Content Photo Upload End --}}

                    {{--<div class="form-group">
                        <label for="formGroupExampleInput" class="font-weight-bold">Caption</label>
                        <input type="text" name="caption" class="form-control" id="formGroupExampleInput">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="font-weight-bold">Paragraph Two</label>
                        <textarea class="form-control" name="story_two" id="exampleFormControlTextarea1" rows="6"></textarea>
                    </div>--}}

                    <button type="submit" class="btn btn-success float-right">POST</button>

                </form>

            </div>
        </div>
    </div>

    {{--<header class="masthead" style="background-image: url('/img/home-bg.jpg')">
        <div class="overlay"></div>

    </header>--}}
@stop

@section('scripts')
    {{-- TinyMCE Editor --}}
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector:'textarea',
            plugins: 'link image autoresize',
            branding: false,
        });
    </script>
@stop
