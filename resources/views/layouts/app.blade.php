<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"> --}}

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('vendors/iconfonts/mdi/css/materialdesignicons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.addons.css') }}">
    <!-- endinject -->
    <!-- vendor css for this page -->
    <link rel="stylesheet" href="{{ asset('vendors/iconfonts/flag-icon-css/css/flag-icon.min.css') }}">
    <!-- End vendor css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('css/shared/style.css') }}">
    <!-- endinject -->
    <!-- Layout style -->
    <link rel="stylesheet" href="{{ asset('css/demo_1/style.css') }}">
    <!-- Layout style -->
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" />
    <!-- Select 2 -->
    <link rel="shortcut icon" href="{{ asset('css/select2.min.css') }}" />
</head>
<body class="header-fixed">
    {{-- nav start --}}
    <nav class="t-header">
      <div class="t-header-brand-wrapper">
        <a href="/home">
         {{--  <h5 style="color:#525E5F; margin-left: 15px;"><strong>JsonTrader</strong></h5> --}}
          <img class="logo" src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 50px; width:50px;">
          {{-- <p style="margin-left: 1em;"><i>ERMS</i></p> --}}
          <img class="logo-mini" src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 50px; width:50px;">
        </a>
        <button class="t-header-toggler t-header-desk-toggler d-none d-lg-block">
          <svg class="logo" viewBox="0 0 200 200">
            <path class="top" d="
                M 40, 80
                C 40, 80 120, 80 140, 80
                C180, 80 180, 20  90, 80
                C 60,100  30,120  30,120
              "></path>
            <path class="middle" d="
                M 40,100
                L140,100
              "></path>
            <path class="bottom" d="
                M 40,120
                C 40,120 120,120 140,120
                C180,120 180,180  90,120
                C 60,100  30, 80  30, 80
              "></path>
          </svg>
        </button>
      </div>
      <div class="t-header-content-wrapper">
        <div class="t-header-content">
          <button class="t-header-toggler t-header-mobile-toggler d-block d-lg-none">
            <i class="mdi mdi-menu"></i>
          </button>
        </div>
      </div>
    </nav>
    {{-- nav end --}}
    {{-- Page Body Starts --}}
    
    <div class="page-body">
      <!-- partial:partials/_sidebar.html -->
      <!-- Sidebar -->
      <div class="sidebar">
        @guest
          <ul class="navigation-menu">           
            <li>
              <a href="#">
                <span class="link-title">About</span>
                <i class="mdi mdi-book-open link-icon"></i>
              </a>
            </li>
            <li>
              <a href="#">
                <span class="link-title">Contact</span>
                <i class="mdi mdi-account-card-details link-icon"></i>
              </a>
            </li>
          </ul>
          <div class="sidebar_footer">
              <ul class="navigation-menu">
                <li>
                    <a href="{{ route('login') }}">
                      <span class="link-title">Login</span>
                      <i class="mdi mdi-login-variant link-icon"></i>
                    </a>
                </li>
                @if (Route::has('register'))
                    <li>
                        <a href="{{ route('register') }}">
                          <span class="link-title">Register</span>
                          <i class="mdi mdi-account-plus link-icon"></i>
                        </a>
                    </li>
                @endif
              </ul>
          </div>
        @elseif(auth()->user()->roles_id == 3)
        <ul class="navigation-menu">
          {{-- Home --}}
          <li>
            <a href="#home" data-toggle="collapse" aria-expanded="false">
              <span class="link-title">Home</span>
              <i class="mdi mdi-home link-icon"></i>
            </a>
            <ul class="collapse navigation-submenu" id="home">
              <li>
                <a href="/home">Dashboard</a>
              </li>
            </ul>
          </li>
          {{-- End Home --}}

          {{-- Create Information Entry --}}
          <li>
            <a href="#data_entry" data-toggle="collapse" aria-expanded="false">
              <span class="link-title">Employee</span>
              <i class="mdi mdi-comment-plus-outline link-icon"></i>
            </a>
            <ul class="collapse navigation-submenu" id="data_entry">
              <li>
                <a href="/create/employee">New Entry</a>
              </li>
            </ul>
          </li>
          {{-- End Create Information Entry --}}
          
          {{-- Create Settings --}}
          <li>
            <a href="#settings" data-toggle="collapse" aria-expanded="false">
              <span class="link-title">Settings</span>
              <i class="mdi mdi-settings link-icon"></i>
            </a>
            <ul class="collapse navigation-submenu" id="settings">
              <li>
                <a href="/create/office">Office</a>
              </li>
              <li>
                <a href="/create/position">Position</a>
              </li>
            </ul>
          </li>
          {{-- End Create Settings --}}
        </ul>
        {{-- If Authenticated --}}
          <div class="sidebar_footer">
            <ul class="navigation-menu">
              <div class="user-account">
                {{-- <a class="user-profile-item" href="#"><i class="mdi mdi-account"></i> Profile</a>
                <a class="user-profile-item" href="#"><i class="mdi mdi-settings"></i> Account Settings</a> --}}
                <a class="btn btn-primary btn-logout" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </div>
              <div class="btn-group admin-access-level">
                <div class="user-type-wrapper">
                  <p class="user_name">Welcome!</p>
                  <div class="d-flex align-items-center">
                    <div class="status-indicator small rounded-indicator bg-success"></div>
                    <small class="user_access_level">{{ Auth::user()->name }}</small>
                  </div>
                </div>
                <i class="arrow mdi mdi-chevron-right"></i>
              </div>
            </ul>
          </div>
        {{-- End If Authenticated --}}
        @else
        <ul class="navigation-menu">
          {{-- Home --}}
          <li>
            <a href="#home" data-toggle="collapse" aria-expanded="false">
              <span class="link-title">Home</span>
              <i class="mdi mdi-home link-icon"></i>
            </a>
            <ul class="collapse navigation-submenu" id="home">
              <li>
                <a href="/home">Dashboard</a>
              </li>
            </ul>
          </li>
          {{-- End Home --}}
        </ul>
        {{-- If Authenticated --}}
          <div class="sidebar_footer">
            <ul class="navigation-menu">
              <div class="user-account">
                {{-- <a class="user-profile-item" href="#"><i class="mdi mdi-account"></i> Profile</a>
                <a class="user-profile-item" href="#"><i class="mdi mdi-settings"></i> Account Settings</a> --}}
                <a class="btn btn-primary btn-logout" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </div>
              <div class="btn-group admin-access-level">
                <div class="user-type-wrapper">
                  <p class="user_name">Welcome!</p>
                  <div class="d-flex align-items-center">
                    <div class="status-indicator small rounded-indicator bg-success"></div>
                    <small class="user_access_level">{{ Auth::user()->name }}</small>
                  </div>
                </div>
                <i class="arrow mdi mdi-chevron-right"></i>
              </div>
            </ul>
          </div>
        {{-- End If Authenticated --}}
        @endguest

      </div>
      <!-- End of Side bar -->
      <!-- partial -->
      <div class="page-content-wrapper">
        <div class="page-content-wrapper-inner">
          <div class="viewport-header">
          </div>
          <div class="content-viewport"> 
            @include('flash::message')
            @yield('content')
          </div>
        </div>
        <!-- content viewport ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="row">
            <div class="col-sm-8 text-center text-sm-left mt-3 mt-sm-0">
              <small class="text-muted d-block">Copyright © 2019. All rights reserved</small>
              <small class="text-gray mt-2">Developed By: Management Information System Division Office, Municipality of Quezon Bukidnon 8715</small>
            </div>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- page content ends -->
    </div>

    <!--page body ends -->
    <!-- SCRIPT LOADING START FORM HERE /////////////-->
    <!-- plugins:js -->
    {{-- <script src="{{ asset('js/jquery.min.js') }}"></script> --}}
    <script src="{{ asset('vendors/js/core.js') }}"></script>
    <script src="{{ asset('vendors/js/vendor.addons.js') }}"></script>
    <!-- endinject -->
    <!-- Vendor Js For This Page Ends-->
    <script src="{{ asset('vendors/chartjs/Chart.min.js') }}"></script>
    <!-- Vendor Js For This Page Ends-->
    <!-- build:js -->
    <script src="{{ asset('js/template.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/data-table.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    @yield('script')

    <script>
      $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    </script>
    <!-- endbuild -->
</body>
</html>