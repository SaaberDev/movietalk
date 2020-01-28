<!DOCTYPE html>
<html lang="en">

@include("backend.admin-panel.inc.header")

<body class="">
<div class="wrapper ">
{{--    Left Sidebar --}}
    @include("backend.admin-panel.inc.leftSidebar")
    <div class="main-panel" id="main-panel">
{{--   Navbar --}}
    @include("backend.admin-panel.inc.navbar")

        @yield('body')
        @include("backend.admin-panel.inc.footer")
    </div>
</div>

@section('javascript')
    <!--   Core JS Files   -->
    <script src="{{ asset('admin-panel/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('admin-panel/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('admin-panel/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin-panel/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="{{ asset('admin-panel/js/plugins/chartjs.min.js') }}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('admin-panel/js/plugins/bootstrap-notify.js') }}"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('admin-panel/js/now-ui-dashboard.min.js?v=1.3.0') }}" type="text/javascript"></script>
    <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{ asset('admin-panel/demo/demo.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

        });
    </script>
    @endsection

</body>
</html>
