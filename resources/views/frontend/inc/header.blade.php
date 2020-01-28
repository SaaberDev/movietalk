<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Bootstrap core CSS -->
<link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

<!-- Custom fonts for this template -->
<link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

<!-- Custom styles for this template -->
<link href="{{ asset('css/clean-blog.min.css') }}" rel="stylesheet">

<!-- Optional theme -->
{{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">--}}

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


<!-- Custom scripts for this template -->
<script src="{{ asset('js/clean-blog.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>

<!-- Latest compiled and minified JavaScript -->
{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}

<!-- Multiple Image Upload CSS and JS -->
<link href="{{ asset('multi-upload/css/style.css') }}" rel="stylesheet">
<script src="{{ asset('multi-upload/js/multiUpload_js.js') }}"></script>

{{-- BootstrapCDN || JS, Popper.js, and jQuery --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

{{-- Custom CSS --}}
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
<link href="{{ asset('user_profile/styles/custom.css') }}" rel="stylesheet">

@yield('scripts')
