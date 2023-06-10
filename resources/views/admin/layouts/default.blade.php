<!doctype html>
<html lang="en">
<head>
    @include('admin.layouts.includes.head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
        <!-- Navbar -->
        @include('admin.layouts.includes.navbar')
        <!-- Main Sidebar Container -->
        @include('admin.layouts.includes.mainSidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- Footer -->
        @include('admin.layouts.includes.footer')
        <!-- Control Sidebar -->
        @include('admin.layouts.includes.controlSidebar')
</div>
@include('admin.layouts.includes.script')
</body>
</html>
