<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>Laravel Blog</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/css/adminlte.css')}}">
  <link rel="stylesheet" href="{{asset('admin/css/bootstrap-tagsinput.css')}}">
  <link rel="stylesheet" href="{{asset('admin/css/sweet-alert.css')}}">
</head>


<body class="hold-transition sidebar-mini">

<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true">
            <i class="far fa-user-circle"></i> {{auth()->user()->name}}
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
          
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> Account Info
            </a>

            <div class="dropdown-divider"></div>
            <a href="/logout" class="dropdown-item dropdown-footer">Logout</a>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->



    @include('admin.layouts.sidebar')


    @yield('content')



    
    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        Anything you want
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->


@if (Session::has('success_msg'))
  <input type="hidden" id="success" value="{{ Session::get('success_msg') }}">
@endif

@if (Session::has('error_msg'))
<input type="hidden" id="error" value="{{ Session::get('error_msg') }}">
@endif


<!-- jQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/js/adminlte.min.js')}}"></script>
<script src="{{asset('admin/js/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{asset('admin/js/sweet-alert.min.js')}}"></script>
<script src="{{asset('admin/js/tata.js')}}"></script>
<script src="{{asset('admin/js/custom.js')}}"></script>

</body>
</html>
