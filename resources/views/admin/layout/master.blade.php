<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Dashboard </title>




    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">


    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet"href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <!-- summernote -->js
    <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.min.css') }}">
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo"
                height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('dashboard.index') }}" class="nav-link">Home</a>
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
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
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

                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">

                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{ asset('backend/dist/img/upload/user') }}/{{ Auth::user()->profile }}"
                                    alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{ asset('backend/dist/img/user8-128x128.jpg') }}" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{ asset('backend/dist/img/user3-128x128.jpg') }}" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->



            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('dashboard.index') }}" class="brand-link">
                <img src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">AdminPage</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('backend/dist/img/upload/user') }}/{{ Auth::user()->profile_photo_path }}"
                            class="img-circle elevation-2">

                    </div>

                    <div class="info">
                        <a href="{{ route('dashboard.users.show', Auth::user()->id) }}"
                            class="d-block">{{ Auth::user()->name }}</a>


                    </div>
                    <div class="info">
                        <a href="{{ route('dashboard.users.logout') }}" class="d-block">Logout</a>
                    </div>

                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">

                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item menu-open">
                            <a href="{{ route('dashboard.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" id="myDIV">
                                <li class="nav-item">
                                    <a href="{{ route('dashboard.users.index') }}"
                                        class="nav-link  @if (Request::is('dashboard/users')) active @endif">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>User</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('dashboard.kind.index') }}"
                                        class="nav-link   @if (Request::is('dashboard/kind')) active @endif">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Category     </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('dashboard.post.index') }}"
                                        class="nav-link  @if (Request::is('dashboard/post')) active @endif">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Posts</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('dashboard.frontpage.index') }}"
                                        class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>USER PAGE</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                    </ul>
                </nav>
                <script>
                    // Add active class to the current button (highlight it)
                    var header = document.getElementById("myDIV");
                    var btns = header.getElementsByClassName("nav-link");
                    for (var i = 0; i < btns.length; i++) {
                        btns[i].addEventListener("click", function() {
                            var current = document.getElementsByClassName("active");
                            current[0].className = current[0].className.replace(" active", "");
                            this.className += " active";
                        });
                    }
                </script>

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
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminPage</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{ asset('/backend/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('/backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/backend/dist/js/adminlte.js') }}"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{ asset('/backend/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
    <script src="{{ asset('/backend/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('/backend/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
    <script src="{{ asset('/backend/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('/backend/plugins/chart.js/Chart.min.js') }}"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('/backend/dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('/backend/dist/js/pages/dashboard2.js') }}"></script>


    <!-- Bootstrap 4 -->

    <script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>


    <script src="{{ asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>

    <script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>

    <script src="{{ asset('backend/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/pdfmake/vfs_fonts.js') }}"></script>


    <script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>


    @yield('script')
    @yield('script2')
</body>

</html>
