<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('assets/fav/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/fav/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/fav/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('assets/fav/site.webmanifest')}}">
    <link rel="mask-icon" href="{{asset('assets/fav/safari-pinned-tab.svg')}}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- CSRF Token -->

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" crossorigin="anonymous">
    <link href="https://code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet">
    <link href="{{asset('assets/lib/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/rickshaw/1.6.6/rickshaw.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/starlight.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rickshaw/1.6.6/rickshaw.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>

    @yield('style', '')

</head>
<body>

<!-- ########## START: LEFT PANEL ########## -->
<div class="sl-logo" style="padding: 0 0px;">
    <a href="{{route('dashboard')}}"><img
                src="{{asset('assets/img/logo.png')}}"></a>
</div>
<div class="sl-sideleft">
    <label class="sidebar-label">Navigation</label>
    <div class="sl-sideleft-menu">
        @if(in_array('admin', Route::getCurrentRoute()->action['middleware']))
            <a href="{{route('admin.dashboard')}}" class="sl-menu-link {{ Route::currentRouteName() != 'admin.dashboard'?: 'active'}}">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios7-home-outline tx-22"></i>
                    <span class="menu-item-label">Dashboard</span>
                </div>
                <!-- menu-item -->
            </a><!-- sl-menu-link -->
            <a href="{{route('settings')}}" class="sl-menu-link {{ Route::currentRouteName() != 'support'?: 'active'}}">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-help tx-22"></i>
                    <span class="menu-item-label">Support</span>
                </div>
                <!-- menu-item -->
            </a><!-- sl-menu-link -->
            <a href="{{route('admin.users')}}"
               class="sl-menu-link {{ Route::currentRouteName() != 'admin.users'?: 'active'}}">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-person tx-22"></i>
                    <span class="menu-item-label">Benutzer</span>
                </div>
                <!-- menu-item -->
            </a><!-- sl-menu-link -->
            <a href="{{route('settings')}}" class="sl-menu-link {{ Route::currentRouteName() != 'support'?: 'active'}}">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-cube tx-22"></i>
                    <span class="menu-item-label">Hostsysteme</span>
                </div>
                <!-- menu-item -->
            </a><!-- sl-menu-link -->
        @else
            <a href="{{route('dashboard')}}"
               class="sl-menu-link {{ Route::currentRouteName() != 'dashboard'?: 'active' }}">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios7-home-outline tx-22"></i>
                    <span class="menu-item-label">Dashboard</span>
                </div>
                <!-- menu-item -->
            </a><!-- sl-menu-link -->
            <a href="{{route('bots')}}" class="sl-menu-link {{ Route::currentRouteName() != 'bots'?: 'active'}}">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-navicon-round tx-22"></i>
                    <span class="menu-item-label">Bots</span>
                </div>
                <!-- menu-item -->
            </a><!-- sl-menu-link -->
            <a href="{{route('support')}}" class="sl-menu-link {{ Route::currentRouteName() != 'support'?: 'active'}}">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-help tx-22"></i>
                    <span class="menu-item-label">Support</span>
                </div>
                <!-- menu-item -->
            </a><!-- sl-menu-link -->
        @endif
    </div><!-- sl-sideleft-menu -->
    @yield('sidebar')
    <br>
</div><!-- sl-sideleft -->
<!-- ########## END: LEFT PANEL ########## -->

<!-- ########## START: HEAD PANEL ########## -->
<div class="sl-header">
    <div class="sl-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href="#"><i class="icon ion-navicon-round"></i></a>
        </div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href="#"><i class="icon ion-navicon-round"></i></a>
        </div>
    </div><!-- sl-header-left -->
    <div class="sl-header-right">
        <nav class="nav">
            <div class="dropdown">
                <a href="#" class="nav-link nav-link-profile" data-toggle="dropdown">
                    <span class="logged-name">{{Auth::user()->name}}<span class="hidden-md-down"></span></span>
                    <img src="{{Auth::user()->profile_image_url == null? asset('assets/img/img3.jpg') : Auth::user()->profile_image_url}}"
                         class="wd-32 rounded-circle" alt="">
                </a>
                <div class="dropdown-menu dropdown-menu-header wd-200">
                    <ul class="list-unstyled user-profile-nav">
                        @if(\Illuminate\Support\Facades\Auth::user()->role == 'admin')
                            <li><a href="{{route('admin.dashboard')}}"><i class="icon ion-bug"></i> Admindashboard</a>
                            </li>
                        @endif
                        <li><a href="{{route('settings')}}"><i class="icon ion-settings"></i> Einstellungen</a></li>
                        @if(session()->has('admin_id'))
                            <li><a href="{{route('back2admin')}}"><i class="icon ion-power"></i> Vom User abmelden</a>
                            </li>
                        @else
                            <li><a href="{{route('logout')}}"><i class="icon ion-power"></i> Abmelden</a></li>
                        @endif
                    </ul>
                </div><!-- dropdown-menu -->
            </div><!-- dropdown -->
        </nav>
    </div><!-- sl-header-right -->
</div><!-- sl-header -->
<!-- ########## END: HEAD PANEL ########## -->

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">

    @yield('breadcrumbs')

    <div class="sl-pagebody">

        @yield('content')

    </div><!-- sl-pagebody -->
    <footer class="sl-footer">
        <div class="footer-left">
            <div class="mg-b-2">Copyright &copy; 2019. YourRadioBots.eu. Alle Rechte vorbehalten.</div>
        </div>
        <div class="footer-right d-flex align-items-center">
            <span class="tx-uppercase mg-r-10">Teilen:</span>
            <a target="_blank" class="pd-x-5"
               href="https://twitter.com/rexlManu"><i class="fa fa-twitter tx-20"></i></a>
        </div>
    </footer>
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->

<script src="{{asset('assets/lib/jquery/jquery.js')}}"></script>
<script src="{{asset('assets/lib/popper.js/popper.js')}}"></script>
<script src="{{asset('assets/lib/bootstrap/bootstrap.js')}}"></script>
<script src="{{asset('assets/lib/jquery-ui/jquery-ui.js')}}"></script>
<script src="{{asset('assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js')}}"></script>
<script src="{{asset('assets/lib/jquery.sparkline.bower/jquery.sparkline.min.js')}}"></script>
<script src="https://d3js.org/d3.v5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rickshaw/1.6.6/rickshaw.min.js"></script>
<script src="{{asset('assets/lib/chart.js/Chart.js')}}"></script>
<script src="{{asset('assets/lib/Flot/jquery.flot.js')}}"></script>
<script src="{{asset('assets/lib/Flot/jquery.flot.pie.js')}}"></script>
<script src="{{asset('assets/lib/Flot/jquery.flot.resize.js')}}"></script>
<script src="{{asset('assets/lib/flot-spline/jquery.flot.spline.js')}}"></script>
<script src="https://unpkg.com/ionicons@4.5.4/dist/ionicons.js"></script>
<script src="{{asset('assets/js/jquery.countdown.min.js')}}"></script>

<script src="{{asset('assets/js/starlight.js')}}"></script>
<script src="{{asset('assets/js/ResizeSensor.js')}}"></script>
<script src="{{asset('assets/js/dashboard.js')}}"></script>

@include('toast::messages-jquery')

@yield('script', '')

</body>


</html>
