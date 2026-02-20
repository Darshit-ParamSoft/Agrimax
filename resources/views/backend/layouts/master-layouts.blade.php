<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('backend.layouts.title-meta')
    @include('backend.layouts.head')
</head>

@section('body')

    <body data-layout="horizontal" data-topbar="colored">
    @show

    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('backend.layouts.horizontal')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <!-- Start content -->
                <div class="container-fluid">
                    @yield('content')
                </div> <!-- content -->
            </div>
            @include('backend.layouts.footer')
        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    @include('backend.layouts.right-sidebar')
    <!-- END Right Sidebar -->

    @include('backend.layouts.vendor-scripts')
</body>

</html>
