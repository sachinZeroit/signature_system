<meta charset="utf-8"/>
<title>@yield('title')</title>
<meta name="description" content=""/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
<!-- <link rel="apple-touch-icon" href="{{ asset('assets/dashboard/images/logo.png') }}"> -->
<meta name="apple-mobile-web-app-title" content="CMS">
<base href="{{ route('admin.home') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">

<meta name="mobile-web-app-capable" content="yes">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->

<!-- <link rel="shortcut icon" sizes="196x196" href="{{ asset('assets/dashboard/images/logo.png') }}"> -->
@stack('before-styles')
<link rel="stylesheet" href="{{ asset('assets/dashboard/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}" type="text/css"/>
<link rel="stylesheet" href="{{ asset('assets/dashboard/fontawesome-free/css/all.min.css') }}" type="text/css"/>



<link rel="stylesheet" href="{{ asset('assets/dashboard/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/dashboard/fontawesome-free/css/all.min.css')}}" type="text/css"/>
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" type="text/css"/>
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('assets/dashboard/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}" type="text/css"/>
  <!-- iCheck --> 
  <link rel="stylesheet" href="{{ asset('assets/dashboard/icheck-bootstrap/icheck-bootstrap.min.css')}}" type="text/css"/>
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('assets/dashboard/jqvmap/jqvmap.min.css')}}" type="text/css"/>
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dashboard/dist/css/adminlte.min.css')}}" type="text/css"/>
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('assets/dashboard/overlayScrollbars/css/OverlayScrollbars.min.css')}}" type="text/css"/>
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('assets/dashboard/daterangepicker/daterangepicker.css')}}" type="text/css"/>
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('assets/dashboard/summernote/summernote-bs4.min.css')}}" type="text/css"/>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  
    <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('assets/dashboard/select2/css/select2.min.css')}}">
  

  <link rel="stylesheet" href="{{ asset('assets/dashboard/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/dashboard/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
 @stack('after-styles')