<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>MovieTalk</title>
        @include("frontend.inc.header")
    </head>
    <body>

        <div id="app">
            <!-- Navigation -->
            @include("frontend.inc.nav")
            <!-- Main Content -->
            @yield("body")
            <hr>
            <!-- Footer -->
            @include("frontend.inc.footer")
        </div>
    </body>
</html>
