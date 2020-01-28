<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>MovieTalk</title>
    @include("frontend.inc.header")
</head>
<body>
@include("frontend.inc.page_header_index")
<div id="app">
    <!-- Navigation -->
@include("errors.inc.nav")
<!-- Main Content -->
    @yield("content")
    <hr>
    <!-- Footer -->
    @include("frontend.inc.footer")
</div>
</body>
</html>
