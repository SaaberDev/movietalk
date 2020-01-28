@extends('errors.layouts.main_error')
@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-primary" href="{{ route('index') }}">
                    <i class="fas fa-arrow-circle-left"></i> &nbsp; Go To Homepage
                </a>
                <img class="img-fluid" src="{{ asset('img/errors/401.jpg') }}" alt="authorization required">
            </div>
        </div>
    </div>
    <!-- content end -->


    {{-- NOTE --}}
    <!-- breadcrumb start -->
    {{--<div class="breadcrumb-container">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">401 Error</li>
            </ol>
        </div>
    </div>--}}
    <!-- breadcrumb end -->

@endsection
