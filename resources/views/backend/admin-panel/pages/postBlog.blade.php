@extends("backend.admin-panel.layouts.main")
@section('body')
    <div class="panel-header panel-header-sm">
    </div>

    <div class="container">
        <div class="card shadow mb-0 mx-0 mt-3">
            <div class="card-header py-3">
                <button class="font-weight-bold btn btn-primary" onclick="location.href='{{ route('BlogListAdmin') }}'">Blog List</button>
                <h3 class="m-0 font-weight-bold text-center text-primary">
                    Post a Blog
                </h3>
            </div>

            <div class="card-body mx-3 mt-3">
                <form action="{{ route('storePostAdmin') }}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-row form-group font-weight-bold text-primary">
                        <div class="col">
                            <label for="exCategory">Movie Name</label>
                            <input type="text" name="title" class="form-control" id="exCategory" aria-describedby="exCategoryHelp" placeholder="">
                        </div>
                    </div>

                    <div class="form-row form-group font-weight-bold text-primary">
                        <div class="col">
                            <label for="exCategory">Subtitle</label>
                            <input type="text" name="subtitle" class="form-control" id="exCategory" aria-describedby="exCategoryHelp" placeholder="">
                        </div>
                    </div>

                    <div class="form-row form-group font-weight-bold text-primary">
                        <div class="col">
                            <label for="inputGroupSelect01">Category</label>
                            <select class="font-weight-bold form-control custom-select" name="category" id="inputGroupSelect01">
                            <option selected value="">Please Choose a Category</option>
                                @foreach($primaryCategory as $categories)
                            <option value="{{ $categories->id }}">{{ $categories->title }}</option>
                                @endforeach
                        </select>
                        </div>
                    </div>

                    <div class="form-row form-group font-weight-bold text-primary">
                        <div class="col">
                            <label for="exCategory">Release Date</label>
                            <input type="date" name="releaseDate" class="form-control date-picker" value="10/05/2016" data-datepicker-color="primary">
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

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="font-weight-bold">Paragraph One</label>
                        <textarea class="form-control" name="story" id="exampleFormControlTextarea1" rows="6"></textarea>
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

                    <div class="form-group">
                        <label for="formGroupExampleInput" class="font-weight-bold">Caption</label>
                        <input type="text" name="caption" class="form-control" id="formGroupExampleInput">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="font-weight-bold">Paragraph Two</label>
                        <textarea class="form-control" name="story_two" id="exampleFormControlTextarea1" rows="6"></textarea>
                    </div>

                    <button type="submit" class="btn btn-success float-right">POST</button>
                </form>
            </div>
        </div>
    </div>

@endsection
