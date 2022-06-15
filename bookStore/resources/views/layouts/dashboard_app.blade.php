<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> @yield('page_title', 'Dashboard') </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('backend_assests') }}/images/icon.png">

    <!-- App css -->
    <link href="{{ asset('backend_assets') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="{{ asset('backend_assets') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend_assets') }}/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />

    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">

                    <li class="dropdown d-none d-lg-block">
                        <a class="nav-link dropdown-toggle mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{ asset('backend_assets') }}/images/flags/us.jpg" alt="user-image" class="mr-2" height="12"> <span class="align-middle">English <i class="mdi mdi-chevron-down"></i> </span>
                        </a>
                       
                    </li>

                    <li class="dropdown notification-list d-none d-md-inline-block">
                        <a href="#" id="btn-fullscreen" class="nav-link waves-effect waves-light">
                            <i class="mdi mdi-crop-free noti-icon"></i>
                        </a>
                    </li>

                    <li class="dropdown notification-list d-none d-md-inline-block">
                        <a href="#" id="btn-fullscreen" class="nav-link waves-effect waves-light">
                            {{ Auth::user()->name }}
                        </a>
                    </li>

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">  
                            <img src="{{ asset('uploads/profile_photos')}}/{{ Auth::user()->profile_image }}" alt="user-image" class="rounded-circle">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <!-- item-->
                          

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="mdi mdi-settings"></i>
                                <span>Settings</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="mdi mdi-lock"></i>
                                <span>Lock Screen</span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <a href="{{ route('logout') }} javascript:void(0);" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="sl-menu-link dropdown-item notify-item">
                                <div class="sl-menu-item">
                                  <i class="mdi mdi-power"></i>
                                  <span class="menu-item-label">Logout</span>
                                </div><!-- menu-item -->
                            </a><!-- sl-menu-link -->
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </div>
                    </li>

                </ul>
  
                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect waves-light">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </li>
        
                    <li class="d-none d-sm-block">
                        <form class="app-search">
                            <div class="app-search-box">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <div class="input-group-append">
                                        <button class="btn" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
            <!-- end Topbar -->
            
            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                    <div class="slimscroll-menu">
    
                        <!--- Sidemenu -->
                        <div id="sidebar-menu">
    
                            <div class="user-box">
                    
                                <div class="float-left">
                                    <img src="{{ asset('uploads/profile_photos')}}/{{ Auth::user()->profile_image }}" alt="" class="avatar-md rounded-circle">
                                </div>
                                <div class="user-info">
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i>
                                                        </a>
                                        <ul class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 29px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            
                                            
                                            <li><a href="javascript:void(0)" class="dropdown-item"><i class="mdi mdi-settings mr-2"></i> Settings</a></li>
                                            
                                            <li>
                                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="sl-menu-link dropdown-item">
                                                    <div class="sl-menu-item">
                                                      <i class="mdi mdi-power"></i>
                                                      <span class="menu-item-label">Logout</span>
                                                    </div><!-- menu-item -->
                                                  </a><!-- sl-menu-link -->
                                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                  </form>
                                            </li>
                                        </ul>
                                    </div>
                                    <p class="font-13 text-muted m-0">Administrator</p>
                                </div>
                            </div>
    
                            <ul class="metismenu" id="side-menu">

                                <li>
                                    <a href="{{ url('/') }}" class="waves-effect" target="_blank">
                                        <i class="mdi mdi-web"></i>
                                        <span> Book Store </span>
                                    </a>
                                </li>
    
                                <li>
                                    <a href="{{ route('home') }}" class="waves-effect">
                                        <i class="mdi mdi-alpha-d-circle"></i>
                                        <span> Dashboard </span>
                                    </a>
                                </li>

                        @if (Auth::user()->role == 1)
                       

                         <li>
                            <a href="javascript: void(0);" class="waves-effect">
                                <i class="mdi mdi-alpha-p-circle"></i>
                                <span> Book </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ route('book.index') }}">Book Insert</a></li>
                                <li><a href="{{ route('book.viewall') }}">Book View</a></li>
                            </ul>
                        </li>
                        @endif

                        <li>
                            <a href="{{ route('order.index') }}" class="waves-effect">
                                <i class="mdi mdi-cart-arrow-right"></i>
                                <span> Order</span>
                            </a>
                        </li>


                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="sl-menu-link">
                                        <div class="sl-menu-item">
                                          <i class="mdi mdi-power"></i>
                                          <span class="menu-item-label">Logout</span>
                                        </div><!-- menu-item -->
                                      </a><!-- sl-menu-link -->
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                      </form>
                                </li>



                            </ul>
    
                        </div>
                        <!-- End Sidebar -->
    
                        <div class="clearfix"></div>
    
                    </div>
                    <!-- Sidebar -left -->
    
                </div>
                <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!--  Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    @yield('dashboard_content')        

                </div>
                
            </div>

        </div>
        <!-- END wrapper -->
      

        <!-- Vendor js -->
        <script src="{{ asset('backend_assets') }}/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="{{ asset('backend_assets') }}/js/app.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

        @yield('footer_scripts')

    </body>


<!-- Mirrored from coderthemes.com/moltran/layouts/blue-vertical/pages-blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Jul 2020 06:48:33 GMT -->
</html>