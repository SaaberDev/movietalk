@extends('frontend.layouts.main')
@section('body')
    @include("frontend.inc.page_header_index")
    <div class="container">
        <div class="main-content-container container-fluid px-4">
            <div class="card-body">
                <!-- Page Header -->
                <div class="page-header row no-gutters py-4">
                    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                        <h3 class="page-title">Edit Profile</h3>
                    </div>
                </div>
                <!-- End Page Header -->

                <!-- Default Light Table -->
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card card-small mb-4 pt-3">
                            <div class="card-header border-bottom text-center">
                                <div class="mb-3 mx-auto">
                                    <img class="rounded-circle" src="{{ asset('user_profile/images/avatars/0.jpg') }}" alt="User Avatar" width="110"> </div>
                                <h4 class="mb-0">{{ $user->name }}</h4>
                                <span class="text-muted d-block mb-2">Project Manager</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="card card-small mb-4">
                            <div class="card-header border-bottom">
                                <h6 class="m-0">Account Details</h6>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item p-3">
                                    <div class="row">
                                        <div class="col">
                                            <form action="{{ route('UpdateUserProfile', $user) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('patch')
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="feFirstName">First Name</label>
                                                        <input type="text" name="name" class="form-control" id="feFirstName" value="{{ $user->name }}">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="feLastName">Last Name</label>
                                                        <input type="text" class="form-control" id="feLastName" value="{{ $user->name }}">
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="feEmailAddress">Email</label>
                                                        <input type="email" name="email" class="form-control" id="feEmailAddress" value="{{ $user->email }}">
                                                    </div>

                                                    <div class="col-md-6 pr-1">
                                                        <label for="inlineFormInputGroup">Username</label>
                                                        <div class="form-group input-group mb-2">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">@</div>
                                                            </div>
                                                            <input type="text" name="username" class="form-control" id="inlineFormInputGroup">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="feInputAddress">Address</label>
                                                    <input type="text" class="form-control" id="feInputAddress" placeholder="1234 Main St"> </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="feInputCity">City</label>
                                                        <input type="text" class="form-control" id="feInputCity">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="feInputCity">State</label>
                                                        <input type="text" class="form-control" id="feInputCity">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="inputZip">Zip</label>
                                                        <input type="text" class="form-control" id="inputZip"> </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label for="feDescription">Description</label>
                                                        <textarea class="form-control" name="feDescription" rows="5"></textarea>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Update Information</button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Default Light Table -->
            </div>
        </div>
    </div>
@endsection




{{--<div class="container">
    <div class="main-content-container container-fluid px-4">
        <!-- Page Header -->
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Overview</span>
                <h3 class="page-title">User Profile</h3>
            </div>
        </div>
        <!-- End Page Header -->

        <!-- Default Light Table -->
        <div class="row">
            <div class="col-lg-4">
                <div class="card card-small mb-4 pt-3">
                    <div class="card-header border-bottom text-center">
                        <div class="mb-3 mx-auto">
                            <img class="rounded-circle" src="{{ asset('user_profile/images/avatars/0.jpg') }}" alt="User Avatar" width="110"> </div>
                        <h4 class="mb-0">Sierra Brooks</h4>
                        <span class="text-muted d-block mb-2">Project Manager</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card card-small mb-4">
                    <div class="card-header border-bottom">
                        <h6 class="m-0">Account Details</h6>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item p-3">
                            <div class="row">
                                <div class="col">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="feFirstName">First Name</label>
                                                <input type="text" class="form-control" id="feFirstName" placeholder="First Name" value="Sierra">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="feLastName">Last Name</label>
                                                <input type="text" class="form-control" id="feLastName" placeholder="Last Name" value="Brooks">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="feEmailAddress">Email</label>
                                                <input type="email" class="form-control" id="feEmailAddress" placeholder="Email" value="sierra@example.com">
                                            </div>

                                            <div class="col-md-6 pr-1">
                                                <label for="inlineFormInputGroup">Username</label>
                                                <div class="form-group input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">@</div>
                                                    </div>
                                                    <input type="text" name="username" class="form-control" id="inlineFormInputGroup">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="feInputAddress">Address</label>
                                            <input type="text" class="form-control" id="feInputAddress" placeholder="1234 Main St"> </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="feInputCity">City</label>
                                                <input type="text" class="form-control" id="feInputCity">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="feInputCity">State</label>
                                                <input type="text" class="form-control" id="feInputCity">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="inputZip">Zip</label>
                                                <input type="text" class="form-control" id="inputZip"> </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="feDescription">Description</label>
                                                <textarea class="form-control" name="feDescription" rows="5"></textarea>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update Account</button>
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Default Light Table -->
    </div>
</div>--}}

