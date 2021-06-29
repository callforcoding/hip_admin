<!DOCTYPE html>
<html lang="en">
   <head>
      <title>@yield("title","")</title>
      <meta charset="utf-8">
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
      <meta name="author" content="Codedthemes" />
      <link rel="icon" href="{{ asset('assets/images/favicon.ico') }} " type="image/x-icon">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('assets/pages/waves/css/waves.min.css') }}" type="text/css" media="all">
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap/css/bootstrap.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/pages/waves/css/waves.min.css') }}" type="text/css" media="all">
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/themify-icons/themify-icons.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome-n.min.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery.mCustomScrollbar.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
      {{--<link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}">
      <link rel="stylesheet" href="{{ asset('css/alert.css') }}">--}}
      <link rel="stylesheet" href="{{ asset('css/jquery.toast.css') }}">

      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

      @yield('page_css')
   </head>
   <body>
      <!-- Pre-loader start -->
      <div class="theme-loader">
         <div class="loader-track">
            <div class="preloader-wrapper">
               <div class="spinner-layer spinner-blue">
                  <div class="circle-clipper left">
                     <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                     <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                     <div class="circle"></div>
                  </div>
               </div>
               <div class="spinner-layer spinner-red">
                  <div class="circle-clipper left">
                     <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                     <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                     <div class="circle"></div>
                  </div>
               </div>
               <div class="spinner-layer spinner-yellow">
                  <div class="circle-clipper left">
                     <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                     <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                     <div class="circle"></div>
                  </div>
               </div>
               <div class="spinner-layer spinner-green">
                  <div class="circle-clipper left">
                     <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                     <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                     <div class="circle"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- Pre-loader end -->
      <div id="pcoded" class="pcoded">
         <div class="pcoded-overlay-box"></div>
         <div class="pcoded-container navbar-wrapper">
            <nav class="navbar header-navbar pcoded-header">
               <div class="navbar-wrapper">
                  <div class="navbar-logo">
                     <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="javascript:void(0)">
                     <i class="ti-menu"></i>
                     </a>
                     <div class="mobile-search waves-effect waves-light">
                        <div class="header-search">
                           <div class="main-search morphsearch-search">
                              <div class="input-group">
                                 <span class="input-group-prepend search-close"><i class="ti-close input-group-text"></i></span>
                                 <input type="text" class="form-control" placeholder="Enter Keyword">
                                 <span class="input-group-append search-btn"><i class="ti-search input-group-text"></i></span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <a href="{{ url('/') }}">
                     <img class="img-fluid" src="{{ asset('logo/logo.png')}}" alt="Theme-Logo" width="90px"/>
                     </a>
                     <a class="mobile-options waves-effect waves-light">
                     <i class="ti-more"></i>
                     </a>
                  </div>
                  <div class="navbar-container container-fluid">
                     <ul class="nav-left">
                        <li>
                           <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                        </li>
                        <li>
                           <a href="javascript:void(0)" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                           <i class="ti-fullscreen"></i>
                           </a>
                        </li>
                     </ul>
                     <ul class="nav-right">
                        {{--notifications--}}
                        <li class="header-notification">
                           <a href="#!" class="waves-effect waves-light">
                           <i class="ti-bell"></i>
                           <span class="badge bg-c-red"></span>
                           </a>
                           <ul class="show-notification">
                              <li>
                                 <h6>Notifications</h6>
                                 <label class="label label-danger">New</label>
                              </li>
                              <li class="waves-effect waves-light">
                                 <div class="media">
                                    <img class="d-flex align-self-center img-radius" src="assets/images/avatar-2.jpg" alt="Generic placeholder image">
                                    <div class="media-body">
                                       <h5 class="notification-user">John Doe</h5>
                                       <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                       <span class="notification-time">30 minutes ago</span>
                                    </div>
                                 </div>
                              </li>
                              <li class="waves-effect waves-light">
                                 <div class="media">
                                    <img class="d-flex align-self-center img-radius" src="{{ asset('assets/images/avatar-4.jpg') }}" alt="Generic placeholder image">
                                    <div class="media-body">
                                       <h5 class="notification-user">Joseph William</h5>
                                       <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                       <span class="notification-time">30 minutes ago</span>
                                    </div>
                                 </div>
                              </li>
                              <li class="waves-effect waves-light">
                                 <div class="media">
                                    <img class="d-flex align-self-center img-radius" src="assets/images/avatar-3.jpg" alt="Generic placeholder image">
                                    <div class="media-body">
                                       <h5 class="notification-user">Sara Soudein</h5>
                                       <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                       <span class="notification-time">30 minutes ago</span>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                        </li>
                        {{--dropdown-here--}}
                        <li class="user-profile header-notification">
                           <a href="javascript:void(0)" class="waves-effect waves-light">
                           <img src="{{ asset('logo/profile.png') }}" class="img-radius" alt="User-Profile-Image">
                           <span>{{ Auth()->user()->first_name }}</span>
                           <i class="ti-angle-down"></i>
                           </a>
                           <ul class="show-notification profile-notification">
                              <li class="waves-effect waves-light">
                                 <a href="#!">
                                 <i class="ti-settings"></i> Settings
                                 </a>
                              </li>
                              <li class="waves-effect waves-light">
                                 <a href="user-profile.html">
                                 <i class="ti-user"></i> Profile
                                 </a>
                              </li>
                              <li class="waves-effect waves-light">
                                 <a href="email-inbox.html">
                                 <i class="ti-email"></i> My Messages
                                 </a>
                              </li>
                              <li class="waves-effect waves-light">
                                 <a href="auth-lock-screen.html">
                                 <i class="ti-lock"></i> Lock Screen
                                 </a>
                              </li>
                              <li class="waves-effect waves-light">
                                 <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    href="{{ route('logout') }}">
                                 <i class="ti-layout-sidebar-left"></i>
                                 Logout
                                 </a>
                                 <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">@csrf</form>
                              </li>
                           </ul>
                        </li>
                        {{--dropdown-ends-here--}}
                     </ul>
                  </div>
               </div>
            </nav>
            <div class="pcoded-main-container">
               <div class="pcoded-wrapper">
                  <nav class="pcoded-navbar">
                     <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="icon-close icons"></i></a></div>
                     <div class="pcoded-inner-navbar main-menu">
                        <div class="">
                           <div class="main-menu-header">
                              <img class="img-80 img-radius" src="{{ asset('logo/profile.png') }}" alt="User-Profile-Image">
                              <div class="user-details">
                                 <span id="more-details">{{ Auth::user()->first_name }}<i class="fa fa-caret-down"></i></span>
                              </div>
                           </div>
                           {{-- profile_pic --}}
                           <div class="main-menu-content">
                              <ul>
                                 <li class="more-details">
                                    <a href="{{ url('profile') }}"><i class="ti-user"></i>View Profile</a>
                                    <a href="javascript:void(0)"><i class="ti-settings"></i>Settings</a>
                                    <a onclick="event.preventDefault(); document.getElementById('logout_form').submit()"
                                       href="javascript:void(0)">
                                    <i class="ti-layout-sidebar-left"></i>Logout</a>
                                    <form id="logout_form" method="POST" action="{{ route('logout') }}">@csrf</form>
                                 </li>
                              </ul>
                           </div>
                        </div>
                        {{--search--}}
                        <div class="p-15 p-b-0">
                           <form class="form-material">
                              <div class="form-group form-primary">
                                 <input type="text" name="footer-email" class="form-control">
                                 <span class="form-bar"></span>
                                 <label class="float-label"><i class="fa fa-search m-r-10"></i>Search Friend</label>
                              </div>
                           </form>
                        </div>
                        <ul class="pcoded-item pcoded-left-item">
                           <li class="active">
                              <a href="{{ route("dashboard") }}" class="waves-effect waves-dark">
                              <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                              <span class="pcoded-mtext">Dashboard</span>
                              <span class="pcoded-mcaret"></span>
                              </a>
                           </li>
                        </ul>
                        <ul class="pcoded-item pcoded-left-item">
                           <li class="pcoded-hasmenu">
                              <a href="javascript:void(0)" class="waves-effect waves-dark">
                              <span class="pcoded-micon"><i class="fa fa-users"></i><b>BC</b></span>
                              <span class="pcoded-mtext">Users</span>
                              <span class="pcoded-mcaret"></span>
                              </a>
                              <ul class="pcoded-submenu">
                                 <li class=" ">
                                    <a href="{{ url('freelancer') }}" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Freelancers</span>
                                    <span class="pcoded-mcaret"></span>
                                    </a>
                                 </li>
                                 <li class=" ">
                                    <a href="{{ url('employeer') }}" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Employers</span>
                                    <span class="pcoded-mcaret"></span>
                                    </a>
                                 </li>

                              </ul>
                           </li>
                        </ul>

                        <ul class="pcoded-item pcoded-left-item">
                           <li class="pcoded-hasmenu">
                              <a href="javascript:void(0)" class="waves-effect waves-dark">
                              <span class="pcoded-micon"><i class="fa fa-graduation-cap"></i><b>BC</b></span>
                              <span class="pcoded-mtext">Skills</span>
                              <span class="pcoded-mcaret"></span>
                              </a>
                              <ul class="pcoded-submenu">
                                 <li class=" ">
                                    <a href="{{ url('skill') }}" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Skills</span>
                                    <span class="pcoded-mcaret"></span>
                                    </a>
                                 </li>
                                 <li class=" ">
                                    <a href="{{ url('skills_categ') }}" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Skills Category</span>
                                    <span class="pcoded-mcaret"></span>
                                    </a>
                                 </li>
                              </ul>
                           </li>
                        </ul>

                        <ul class="pcoded-item pcoded-left-item">
                           <li class="pcoded-hasmenu">
                              <a href="javascript:void(0)" class="waves-effect waves-dark">
                              <span class="pcoded-micon"><i class="fa fa-hand-o-right"></i><b>BC</b></span>
                              <span class="pcoded-mtext">Categories</span>
                              <span class="pcoded-mcaret"></span>
                              </a>
                              <ul class="pcoded-submenu">
                                 <li class=" ">
                                    <a href="{{ url('categories') }}" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Category</span>
                                    <span class="pcoded-mcaret"></span>
                                    </a>
                                 </li>
                                 <li class=" ">
                                    <a href="{{ url('sub_categ') }}" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Sub-category</span>
                                    <span class="pcoded-mcaret"></span>
                                    </a>
                                 </li>
                              </ul>
                           </li>
                        </ul>

                        <ul class="pcoded-item pcoded-left-item">
                            <li class="">
                                <a href="{{ url('job_duration') }}" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="fa fa-clock-o"></i><b>FC</b></span>
                                <span class="pcoded-mtext">Job Duration</span>
                                <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>

                        <ul class="pcoded-item pcoded-left-item">
                            <li class="">
                                <a href="{{ url('job') }}" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="fa fa-handshake-o"></i><b>FC</b></span>
                                <span class="pcoded-mtext">Jobs</span>
                                <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>
                        <ul class="pcoded-item pcoded-left-item">
                            <li class="">
                                <a href="{{ url('proposal') }}" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="fa fa-certificate"></i><b>FC</b></span>
                                <span class="pcoded-mtext">Proposals</span>
                                <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>
                        <ul class="pcoded-item pcoded-left-item">
                            <li class="">
                                <a href="{{ url('contract') }}" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="fa fa-street-view" aria-hidden="true"></i><b>FC</b></span>
                                <span class="pcoded-mtext">Contract</span>
                                <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>

                        <ul class="pcoded-item pcoded-left-item">
                        <li class="pcoded-hasmenu">
                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="fa fa-shopping-bag"></i><b>BC</b></span>
                            <span class="pcoded-mtext">Packages</span>
                            <span class="pcoded-mcaret"></span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class=" ">
                                    <a href="{{ url('packages') }}" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext">Package</span>
                                    <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        </ul>

                        <ul class="pcoded-item pcoded-left-item">
                        <li class="">
                            <a href="{{ url('location') }}" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="fa fa-location-arrow"></i><b>FC</b></span>
                            <span class="pcoded-mtext">location</span>
                            <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        </ul>


                        <ul class="pcoded-item pcoded-left-item">
                           <li class="">
                              <a href="{{ url('profile') }}" class="waves-effect waves-dark">
                              <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                              <span class="pcoded-mtext">Profile</span>
                              <span class="pcoded-mcaret"></span>
                              </a>
                           </li>
                        </ul>

                     </div>
                  </nav>
                  <div class="pcoded-content">
                     <!-- Page-header start -->
                     <div class="page-header">
                        <div class="page-block">
                           <div class="row align-items-center">
                              <div class="col-md-8">
                                 <div class="page-header-title">
                                    <h5 class="m-b-10">Dashboard</h5>
                                    <p class="m-b-0"></p>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <ul class="breadcrumb">
                                    <li class="breadcrumb-item">
                                       <a href="index.html"> <i class="fa fa-home"></i> </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">@yield("title","")</a>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Page-header end -->
                     <div class="pcoded-inner-content">
                        <!-- Main-body start -->
                        <div class="main-body">
                           <div class="page-wrapper">
                              <!-- Page-body start -->
                              <div class="page-body">
                                 <div class="row">
                                    @yield("content")
                                 </div>
                              </div>
                              <!-- Page-body end -->
                           </div>
                           <div id="styleSelector"></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Warning Section Ends -->
      <!-- Required Jquery -->


      <script type="text/javascript" src="{{ asset('assets/js/jquery/jquery.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/js/jquery-ui/jquery-ui.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/js/popper.js/popper.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/js/bootstrap/js/bootstrap.min.js') }}"></script>
      <!-- waves js -->
      <script src="{{ asset('assets/pages/waves/js/waves.min.js') }}"></script>
      <!-- jquery slimscroll js -->
      <script type="text/javascript" src="{{ asset('assets/js/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
      <!-- slimscroll js -->
      <script src="{{ asset('assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
      <!-- menu js -->
      <script src="{{ asset('assets/js/pcoded.min.js') }}"></script>
      <script src="{{ asset('assets/js/vertical/vertical-layout.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/js/script.js') }}"></script>
      <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

      {{-- <script src="{{ asset('js/sweetalert.min.js') }}"></script>
      <script src="{{ asset('js/alert.js') }}"></script> --}}
      <script src="{{ asset('js/jquery.toast.js') }}"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
      @yield('page_js');
   </body>
</html>
