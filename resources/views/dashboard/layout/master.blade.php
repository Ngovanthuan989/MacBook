<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin - Quản lí</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('/backend/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('/backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/backend/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        .layout-navbar-fixed .wrapper .content-wrapper {
            margin-top: 0px !important;
        }
    </style>
    @yield('css')
</head>
{{--dark-mode--}}
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    @include('elements.loading')
<div class="wrapper">

@include('dashboard.layout.header')
 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="{{asset('/backend/dist/img/logo_mac_tree-01.png')}}" alt="Admin Logo" class="brand-image" style="opacity: .8;">
      <span class="brand-text font-weight-light"></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
      <!-- Sidebar user panel (optional) -->
            <img src="{{asset('/uploads/images/'.$user->avatar.'')}}" class="img-circle elevation-2" alt="User Image" >
        </div>
        <div class="info">
          <a href="/" class="d-block">{{$user->full_name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
     @include('dashboard.layout.nav')
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      {{--<div class="container-fluid">--}}
        {{--<div class="row mb-2">--}}
          {{--<div class="col-sm-6">--}}
            {{-- <h1 class="m-0">Dashboard v2</h1> --}}
          {{--</div><!-- /.col -->--}}
          {{--<div class="col-sm-6">--}}
            {{--<ol class="breadcrumb float-sm-right">--}}
              {{--<li class="breadcrumb-item"><a href="/">Trang chủ</a></li>--}}
               {{--<li class="breadcrumb-item active">Dashboard v2</li>--}}
            {{--</ol>--}}
          {{--</div><!-- /.col -->--}}
        {{--</div><!-- /.row -->--}}
      {{--</div><!-- /.container-fluid -->--}}
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        @yield('main')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->

  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  @include('dashboard.layout.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('/backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('/backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/backend/dist/js/adminlte.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('/backend/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('/backend/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('/backend/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('/backend/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('/backend/plugins/chart.js/Chart.min.js')}}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{asset('/backend/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('/backend/dist/js/pages/dashboard2.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@include('elements.toastr')
@yield('js')

</body>
</html>
