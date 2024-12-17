<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Clipedia | Dashboard </title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{url('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('dist/css/adminlte.min.css')}}">
  @yield('css')
  <link rel="shortcut icon" href="{{url('dist/img/sql.png')}}" />
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
   <div class="col-md-12">
     <p class="pt-2" align="center">
      Selamat Datang {{Auth::user()->name}} Di Panel Load Testing
      <a class="fa fa-sign-out" style="cursor: pointer;color: black;" 
         href="{{ route('logout') }}"
         onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          Keluar Sistem
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
      </form>
    </p>
   </div>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
      <img src="{{url('dist/img/sql.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: 0">
      <span class="brand-text font-weight-light">Load Testing</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{url('dist/img/user.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">Menu</li>
          <li class="nav-item">
            <a href="{{url('home')}}" class="nav-link {{Request::segment(1) == 'home'?'active':''}}">
              <i class="nav-icon fa fa-tachometer"></i>
              <p>Dashboard</p>
            </a>
          </li>
      <!--   <li class="nav-header">Individu</li> -->
         <!--  <li class="nav-item">
            <a href="{{url('pendaftar')}}" class="nav-link {{Request::segment(1) == 'pendaftar'?'active':''}}">
              <i class="nav-icon fa fa-user"></i>
              <p>Pendaftar Waiting</p>
            </a>
          </li> -->
          <li class="nav-item">
            <a href="{{url('load_testing')}}" class="nav-link {{Request::segment(1) == 'load_testing'?'active':''}}">
              <i class="nav-icon fa fa-edit"></i>
              <p>Data Load Testing</p>
            </a>
          </li>
<!--           <li class="nav-item">
            <a href="{{url('pendaftar_lunas')}}" class="nav-link {{Request::segment(1) == 'pendaftar_lunas'?'active':''}}">
              <i class="nav-icon fa fa-check"></i>
              <p>Pendaftar Lunas</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('pendaftar_cancel')}}" class="nav-link {{Request::segment(1) == 'pendaftar_cancel'?'active':''}}">
              <i class="nav-icon fa fa-close"></i>
              <p>Pendaftar Cancel</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('import_pendaftar')}}" class="nav-link {{Request::segment(1) == 'import_pendaftar'?'active':''}}">
              <i class="nav-icon fa fa-users"></i>
              <p>Import Pendaftar</p>
            </a>
          </li> -->
         <!--  <li class="nav-item">
            <a href="{{url('pendaftar_hadir')}}" class="nav-link {{Request::segment(1) == 'pendaftar_hadir'?'active':''}}">
              <i class="nav-icon fa fa-qrcode"></i>
              <p>Kehadiran Pendaftar</p>
            </a>
          </li> -->
         <!--  <li class="nav-header">Grup</li> -->
         <!--  <li class="nav-item">
            <a href="{{url('pendaftar')}}" class="nav-link {{Request::segment(1) == 'pendaftar'?'active':''}}">
              <i class="nav-icon fa fa-user"></i>
              <p>Pendaftar Waiting</p>
            </a>
          </li> -->
        <!--   <li class="nav-item">
            <a href="{{url('pendaftar_pending_grup')}}?status=pending" class="nav-link {{Request::segment(1) == 'pendaftar_pending_grup'?'active':''}}">
              <i class="nav-icon fa fa-edit"></i>
              <p>Pendaftar Pending</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('pendaftar_lunas_grup')}}?status=approve" class="nav-link {{Request::segment(1) == 'pendaftar_lunas_grup'?'active':''}}">
              <i class="nav-icon fa fa-check"></i>
              <p>Pendaftar Lunas</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('pendaftar_cancel_grup')}}?status=cancel" class="nav-link {{Request::segment(1) == 'pendaftar_cancel_grup'?'active':''}}">
              <i class="nav-icon fa fa-close"></i>
              <p>Pendaftar Cancel</p>
            </a>
          </li> -->
          <!-- <li class="nav-item">
            <a href="{{url('import_pendaftar')}}" class="nav-link {{Request::segment(1) == 'import_pendaftar'?'active':''}}">
              <i class="nav-icon fa fa-users"></i>
              <p>Import Pendaftar</p>
            </a>
          </li> -->
          <!-- <li class="nav-item">
            <a href="{{url('pendaftar_hadir')}}" class="nav-link {{Request::segment(1) == 'pendaftar_hadir'?'active':''}}">
              <i class="nav-icon fa fa-qrcode"></i>
              <p>Kehadiran Pendaftar</p>
            </a>
          </li> -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright © {{date('Y')}} | Clipedia </strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{url('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('dist/js/adminlte.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{url('dist/js/demo.js')}}"></script>


@yield('script')
<!-- PAGE SCRIPTS -->


</body>
</html>
