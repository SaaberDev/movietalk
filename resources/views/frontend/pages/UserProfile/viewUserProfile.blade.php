@extends('frontend.layouts.main')
@section('body')
    @include("frontend.inc.page_header_index")
    <div class="container">
        <div class="main-content-container container-fluid px-4">
            <div class="card-body">
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
                                <h4 class="mb-0">{{ $user->name }}</h4>
                                <span class="text-muted d-block mb-2">Project Manager</span>
                            </div>
                        </div>

                        <div class="row">
                            {{-- About Me Start --}}
                            <div class="col-lg col-md-6 col-sm-6 mb-4">
                                <div class="stats-small stats-small--1 card card-small">
                                    <div class="card-body p-0 d-flex" style="margin-top: 20px; margin-bottom: 20px;">
                                        <div class="d-flex flex-column m-auto">
                                            <div class="stats-small__data text-center">
                                                <span class="stats-small__label text-uppercase">About Me</span>
                                                <h6 class="stats-small__value count my-3">Hello, I'm an Expert Laravel Developer. Love to create amazing web apps.</h6>
                                            </div>
                                        </div>
                                        <canvas height="120" class="blog-overview-stats-small-1"></canvas>
                                    </div>
                                </div>
                            </div> {{-- About Me End --}}
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg col-md-6 col-sm-6 mb-4">
                                <button type="submit" class="btn btn-primary" style="float: right; font-size: 8pt;" onclick="location.href='{{ route('EditUserProfile', $user) }}'">Edit Information</button>
                            </div>
                        </div>

                        <div class="card card-small mb-4">
                            <div class="card-header border-bottom">
                                <h6 class="m-0">Account Details</h6>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item p-3">
                                    <div class="row">
                                        <div class="col">

                                            {{-- User Information Stats START --}}
                                            <div class="row">
                                                {{-- Card One Start --}}
                                                <div class="col-lg col-md-6 col-sm-6 mb-4">
                                                    <div class="stats-small stats-small--1 card card-small">
                                                        <div class="card-body p-0 d-flex" style="margin-top: 20px; margin-bottom: 20px;">
                                                            <div class="d-flex flex-column m-auto">
                                                                <div class="stats-small__data text-center">
                                                                    <span class="stats-small__label text-uppercase">Posts</span>
                                                                    <h6 class="stats-small__value count my-3">{{ \Illuminate\Support\Facades\Auth::user() ->posts->count()}}</h6>
                                                                </div>
                                                            </div>
                                                            <canvas height="120" class="blog-overview-stats-small-1"></canvas>
                                                        </div>
                                                    </div>
                                                </div> {{-- Card One End --}}

                                                {{-- Card Two Start --}}
                                                <div class="col-lg col-md-6 col-sm-6 mb-4">
                                                    <div class="stats-small stats-small--1 card card-small">
                                                        <div class="card-body p-0 d-flex" style="margin-top: 20px; margin-bottom: 20px;">
                                                            <div class="d-flex flex-column m-auto">
                                                                <div class="stats-small__data text-center">
                                                                    <span class="stats-small__label text-uppercase">Fans</span>
                                                                    <h6 class="stats-small__value count my-3">2,390</h6>
                                                                </div>
                                                            </div>
                                                            <canvas height="120" class="blog-overview-stats-small-1"></canvas>
                                                        </div>
                                                    </div>
                                                </div> {{-- Card Two End --}}

                                                {{-- Card Three Start --}}
                                                <div class="col-lg col-md-6 col-sm-6 mb-4">
                                                    <div class="stats-small stats-small--1 card card-small">
                                                        <div class="card-body p-0 d-flex" style="margin-top: 20px; margin-bottom: 20px;">
                                                            <div class="d-flex flex-column m-auto">
                                                                <div class="stats-small__data text-center">
                                                                    <span class="stats-small__label text-uppercase">Likes</span>
                                                                    <h6 class="stats-small__value count my-3">2,390</h6>
                                                                </div>
                                                            </div>
                                                            <canvas height="120" class="blog-overview-stats-small-1"></canvas>
                                                        </div>
                                                    </div>
                                                </div> {{-- Card Three End --}}

                                                {{-- Card Four Start --}}
                                                <div class="col-lg col-md-6 col-sm-6 mb-4">
                                                    <div class="stats-small stats-small--1 card card-small">
                                                        <div class="card-body p-0 d-flex" style="margin-top: 20px; margin-bottom: 20px;">
                                                            <div class="d-flex flex-column m-auto">
                                                                <div class="stats-small__data text-center">
                                                                    <span class="stats-small__label text-uppercase">Comments</span>
                                                                    <h6 class="stats-small__value count my-3">390</h6>
                                                                </div>
                                                            </div>
                                                            <canvas height="120" class="blog-overview-stats-small-1"></canvas>
                                                        </div>
                                                    </div>
                                                </div> {{-- Card Four End --}}

                                            </div> {{-- User Information Stats END --}}

                                            {{-- User Information Start --}}
                                            <div class="col-lg col-md-6 col-sm-6 mb-4">
                                                <div class="stats-small stats-small--1 card card-small">
                                                    <div class="card-body p-0 d-flex" style="margin-top: 20px; margin-bottom: 20px;">
                                                        <div class="d-flex flex-column m-auto">
                                                            <div class="stats-small__data text-center">
                                                                <span class="stats-small__label text-uppercase">Address    <i class="fas fa-map-marker-alt"></i></span>
                                                                <h6 class="stats-small__value count my-3">C/4, Anandanagar, Badda, Dhaka</h6>
                                                            </div>
                                                            <hr>
                                                            <div class="stats-small__data text-center">
                                                                <span class="stats-small__label text-uppercase">Birthday    <i class="fas fa-birthday-cake"></i></span>
                                                                <h6 class="stats-small__value count my-3">27th September, 1996</h6>
                                                            </div>
                                                            <hr>
                                                            <div class="stats-small__data text-center">
                                                                <span class="stats-small__label text-uppercase">Bio</span>
                                                                <h6 class="stats-small__value count my-3">C/4, Anandanagar, Badda, Dhaka</h6>
                                                            </div>
                                                        </div>

                                                        <canvas height="120" class="blog-overview-stats-small-1"></canvas>
                                                    </div>
                                                </div>
                                            </div> {{-- User Information End --}}

                                            {{-- Account Opening Information Start --}}
                                            <div class="col-lg col-md-6 col-sm-6 mb-4">
                                                <div class="stats-small stats-small--1 card card-small">
                                                    <div class="card-body p-0 d-flex" style="margin-top: 20px; margin-bottom: 20px;">
                                                        <div class="d-flex flex-column m-auto">
                                                            <div class="stats-small__data text-center">
                                                                <span class="stats-small__label text-uppercase">User Since</span>
                                                                <h6 class="stats-small__value count my-3">1st January, 2012</h6>
                                                            </div>
                                                        </div>
                                                        <canvas height="120" class="blog-overview-stats-small-1"></canvas>
                                                    </div>
                                                </div>
                                            </div> {{-- Account Opening Information End --}}
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
