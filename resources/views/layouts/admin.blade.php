<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ config('app.name', 'Pay Per Report') }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="icon" href="{{ asset('favicon.png') }}" type='image/x-icon'>
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
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
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="{{ asset('dist/img/DailyTrustIcon.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Pay Per Report</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            {{-- <li class="nav-item menu-open"> --}}
            <li class="nav-item">
              {{-- <a href="#" class="nav-link active"> --}}
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              
            </li>
            <li class="nav-item {{ Request::is('admin/stories') || Request::is('admin/stories/create')  ? 'menu-open' : '' }}">
              <a href="#" class="nav-link {{ Request::is('admin/stories') || Request::is('admin/stories/create')  ? 'active' : '' }}">
                    <i class="nav-icon fas fa-sticky-note"></i>
                    <p>
                        Stories
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">

                    <li class="nav-item">
                        <a href="{{url('admin/stories/create')}}" class="nav-link {{ Request::is('admin/stories/create') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>
                                New Stories

                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('admin/stories')}}" class="nav-link {{ Request::is('admin/stories') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Manage Stories</p>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item {{ Request::is('admin/freelancers') || Request::is('admin/freelancers/create') ? 'menu-open' : '' }}">
              <a href="#" class="nav-link {{ Request::is('admin/freelancers') || Request::is('admin/freelancers/create') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Freelancer
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">

                    <li class="nav-item">
                        <a href="{{url('admin/freelancers/create')}}" class="nav-link {{ Request::is('admin/freelancers/create') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>
                                Register New

                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('admin/freelancers')}}" class="nav-link {{ Request::is('admin/freelancers') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Manage Freelancer</p>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item {{ Request::is('admin/formation') || Request::is('admin/category') || Request::is('admin/category-price') || Request::is('admin/page-size') || Request::is('admin/units') ? 'menu-open' : '' }}">
              <a class="nav-link {{ Request::is('admin/formation') || Request::is('admin/category') || Request::is('admin/category-price') || Request::is('admin/page-size') || Request::is('admin/units') ? 'active' : '' }}">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                  Setups
                  <i class="fas fa-angle-left right"></i>

                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('admin/category')}}" class="nav-link {{ Request::is('admin/category') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Categories</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('admin/formation')}}" class="nav-link {{ Request::is('admin/formation') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Formation</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('admin/category-price')}}" class="nav-link {{ Request::is('admin/category-price') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Category Price</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('admin/page-size')}}" class="nav-link {{ Request::is('admin/page-size') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Page Size</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('admin/units')}}" class="nav-link {{ Request::is('admin/units') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Units</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item {{ Request::is('admin/reports') ? 'menu-open' : '' }}">
              <a class="nav-link {{ Request::is('admin/reports') ? 'active' : '' }}">
                <i class="nav-icon far fa-user"></i>
                <p>
                  Reports
                  <i class="fas fa-angle-left right"></i>

                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('admin/reports')}}" class="nav-link {{ Request::is('admin/reports') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Stories Report</p>
                  </a>
                </li>             

              </ul>
            </li>
            <li class="nav-item {{ Request::is('admin/users') || Request::is('admin/roles') || Request::is('admin/permissions') ? 'menu-open' : '' }}">
              <a class="nav-link {{ Request::is('admin/users') || Request::is('admin/roles') || Request::is('admin/permissions') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tasks"></i>
                <p>
                  Services
                  <i class="fas fa-angle-left right"></i>

                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('admin/users')}}" class="nav-link {{ Request::is('admin/users') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Users</p>
                  </a>
                </li>             
                <li class="nav-item">
                  <a href="{{url('admin/roles')}}" class="nav-link {{ Request::is('admin/roles') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Roles</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('admin/permissions')}}" class="nav-link {{ Request::is('admin/permissions') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Permissions</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                    <i class="nav-icon far fa-circle text-danger"></i>
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      {{-- <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Starter Page</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Starter Page</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div> --}}
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        {{-- <div class="container-fluid">
          <div class="row"> --}}
            @yield('content')
          {{-- </div> --}}
          <!-- /.row -->
        {{-- </div><!-- /.container-fluid --> --}}
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-light">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->
<!-- Content Wrapper. Contains page content -->
       {{-- <div class="content-wrapper">
        </div> --}}
        <!-- /.content-wrapper -->
    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        Explore Beyound Technology
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2014-2021 <a href="#">Chris</a>.</strong> All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('dist/js/adminlte.js') }}"></script>
</body>

</html>