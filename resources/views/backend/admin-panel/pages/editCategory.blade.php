@extends("backend.admin-panel.layouts.main")
@section('body')
    <div class="panel-header panel-header-sm">
    </div>

    <div class="container">
        <div class="card shadow mb-0 mx-0 mt-3">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-center text-primary">
                   Update Category
                </h3>
            </div>

            <div class="card-body mx-3 mt-3">
                <form action="{{ route('updateCategory', $editCategory->id) }}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-row form-group font-weight-bold text-primary">
                        <div class="col">
                            <label for="exCategory">Name</label>
                            <input type="text" name="titleCategory" value="{{ $editCategory->title }}" class="form-control" id="exCategory" aria-describedby="exCategoryHelp" placeholder="">
                            @if ($errors->has('titleCategory'))
                                <span class="text-danger">{{ $errors->first('titleCategory') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group font-weight-bold text-primary">
                        <label for="exDesc">Details</label>
                        <textarea class="form-control" name="categoryDesc" id="exDesc" rows="6">{{ $editCategory->desc }}</textarea>
                        @if ($errors->has('categoryDesc'))
                            <span class="text-danger">{{ $errors->first('categoryDesc') }}</span>
                        @endif
                    </div>

                    <div class="form-group font-weight-bold text-primary mb-5" id="prexEx">
                        <label for="exPrev">Preview</label>
                        <div id="exPrev">
                            <img src="{{ asset('admin-panel/img/category/' . $editCategory->image) }}" alt="{{ $editCategory->title }}">
                        </div>
                    </div>


                    <div class="form-row form-group font-weight-bold text-primary">
                        <div class="col-md-10">
                            <div class="input-group md-3">
                                <input type="text" name="file_name" value="{{ $editCategory->image }}" class="form-control" placeholder="No File Selected" readonly>
                                <div class="input-group-btn">
                            <span class="fileUpload btn btn-info">
                              <span class="upl" id="upload">Browse</span>
                              <input type="file" name="CategoryUploadFile" class="upload up" id="up" onchange="readURL(this);"> <!-- Use 'multiple' at the end of the closing such this ("readURL(this);" multiple/>) way -->
                            </span><!-- btn-orange -->
                                </div><!-- btn -->
                            </div><!-- group -->
                            @if ($errors->has('CategoryUploadFile'))
                                <span class="text-danger">{{ $errors->first('CategoryUploadFile') }}</span>
                            @endif
                        </div><!-- form-group -->

                        <div class="col">
                            <button type="submit" style="width: 100%" name="updateCategory" class="btn btn-primary float-right">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
