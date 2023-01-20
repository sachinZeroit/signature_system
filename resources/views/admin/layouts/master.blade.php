<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.layouts.head')
</head>
<body  class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

@include('admin.layouts.header')


    <!-- Main Sidebar Container -->
    @include('admin.layouts.sidebar')
    <!-- Main Sidebar Container -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

    @yield('content')

    @include('admin.layouts.foot')
</div>

<!-- Content Wrapper. Contains page content -->
</div>
<!-- ./wrapper -->
@include('admin.layouts.footer')
</body>
</html>
