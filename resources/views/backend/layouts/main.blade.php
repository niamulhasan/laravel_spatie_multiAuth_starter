
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN: Head -->

<head>
    @include('backend.layouts.partials.styles')
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="app">
    <!-- BEGIN: Mobile Menu -->
    @include('backend.layouts.partials.mobile-menu')
    <!-- END: Mobile Menu -->
    <div class="flex">
        <!-- BEGIN: Side Menu -->
        @include('backend.layouts.partials.sidebar')
        <!-- END: Side Menu -->
        <!-- BEGIN: Content -->
        <div class="content">
            <!-- BEGIN: Top Bar -->
            @include('backend.layouts.partials.topbar')
            <!-- END: Top Bar -->
            
                @yield('admin-section')
            
            
        </div>
        <!-- END: Content -->
    </div>
    @include('backend.layouts.partials.footer')
    <!-- BEGIN: JS Assets-->
    @include('backend.layouts.partials.scripts')
    <!-- END: JS Assets-->
</body>

</html>