@extends("backend.admin-panel.layouts.main")
@section('body')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            {{-- =======================================
               ============== CARD START ===============
               ======================================= --}}
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">Edit Profile</h5>
                    </div>
                    {{-- =====================================
                       ============== FORM START =============
                       ===================================== --}}
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" name="first_name" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" name="last_name" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <label for="inlineFormInputGroup">Username</label>
                                    <div class="form-group input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">@</div>
                                        </div>
                                        <input type="text" name="username" class="form-control" id="inlineFormInputGroup">
                                    </div>
                                </div>

                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="email" name="email" class="form-control" placeholder="example@example.com" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="address" class="form-control" placeholder="House Name, Road, House, Apartment, Floor#" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" name="city" class="form-control" placeholder="Dhaka" value="">
                                    </div>
                                </div>

                                <div class="col-md-4 px-1">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <input type="text" name="country" class="form-control" placeholder="Bangladesh" value="">
                                    </div>
                                </div>

                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label>Postal Code</label>
                                        <input type="number" name="postal_code" class="form-control" placeholder="1362" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>About Me</label>
                                        <textarea rows="4" cols="80" name="bio" class="form-control" placeholder="Write Something About Yourself"></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{-- =======================================
                         ============== FORM END ===============
                         ======================================= --}}
                </div>
            </div>
            {{-- =======================================
               ============== CARD END =================
               ======================================= --}}

            <div class="col-md-4">
                {{-- =======================================
                    USER PROFILE VIEW (RIGHT SIDEBAR) START
                   ======================================= --}}
                <div class="card card-user">
                    <div class="image">
                        <img src="{{ asset('admin-panel/img/bg5.jpg') }}" alt="...">
                    </div>
                    <div class="card-body">
                        <div class="author">
                            <a href="#">
                                <img class="avatar border-gray" src="{{ asset('admin-panel/img/mike.jpg') }}" alt="...">
                                <h5 class="title">{{ $user->name }}</h5>
                            </a>
                            <p class="description">
                                michael24
                            </p>
                        </div>
                        <p class="description text-center">
                            "Lamborghini Mercy
                            <br> Your chick she so thirsty
                            <br> I'm in that two seat Lambo"
                        </p>
                    </div>
                    <hr>
                    <div class="button-container">
                        <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                            <i class="fab fa-facebook-f"></i>
                        </button>
                        <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                            <i class="fab fa-twitter"></i>
                        </button>
                        <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                            <i class="fab fa-google-plus-g"></i>
                        </button>
                    </div>
                </div>
                {{-- =======================================
                    USER PROFILE VIEW (RIGHT SIDEBAR) END
                   ======================================= --}}
            </div>
        </div>
    </div>
@endsection
