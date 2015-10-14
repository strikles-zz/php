<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Basic Page Needs
        ================================================== -->
        <meta charset="utf-8" />
        <title>
            @section('title')
            Alda Live Data Application
            @show
        </title>
        <meta name="keywords" content="your, awesome, keywords, here" />
        <meta name="author" content="Jon Doe" />
        <meta name="description" content="Lorem ipsum dolor sit amet, nihil fabulas et sea, nam posse menandri scripserit no, mei." />

        <!-- Mobile Specific Metas
        ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        @section('styles')

        <!-- CSS
        ==================================================
        -->

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700|Roboto:400,100,300,500,700|Roboto+Condensed:400,300,700' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="{{asset('assets/css/vendor.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/admin_vendor_concat.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/angular_vendor_concat.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/style.min.css')}}">

        @show

        <script src="{{asset('assets/js/admin_vendor_concat.js')}}"></script>
        <script src="{{asset('assets/js/angular_vendor_concat.js')}}"></script>
        <script src="{{asset('assets/js/angular_scripts.min.js')}}"></script>

        <base href="/my-events">

    </head>

    <body class="default promoters">
        <!-- To make sticky footer need to wrap in a div -->
        <div id="wrap">
        <!-- Navbar -->
        <nav class="navbar navbar-default navbar-inverse navbar-fixed-top" id="nav-main">
             <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="{{{ URL::to('/my-events') }}}" id="logo-container">
                        <div></div>
                    </a>
                </div>

                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">

                        @if (Auth::check())

                        @if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('User'))
                        <li {{ (Request::is('search') ? ' class="active"' : '') }}><a href="{{{ URL::to('/search') }}}">Search</a></li>
                        <li {{ (Request::is('companies') ? ' class="active"' : '') }}><a href="{{{ URL::to('/companies') }}}">Companies</a></li>
                        <li {{ (Request::is('venues') ? ' class="active"' : '') }}><a href="{{{ URL::to('/venues') }}}">Venues</a></li>
                        <li {{ (Request::is('contacts') ? ' class="active"' : '') }}><a href="{{{ URL::to('/contacts') }}}">Contacts</a></li>
                        @endif

                        @if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('User'))
                        <li {{ (Request::is('events') ? ' class="active"' : '') }}><a href="{{{ URL::to('/events') }}}">Events</a></li>
                        @else
                        <li {{ (Request::is('events') ? ' class="active"' : '') }}><a href="{{{ URL::to('/my-events/') }}}">Events</a></li>
                        @endif

                        @if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('User'))
                        <li class="dropdown{{ (Request::is('tickets', 'hotels', 'airports', 'documents', 'countries') ? ' active' : '') }}">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Other <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li {{ (Request::is('hotels') ? ' class="active"' : '') }}><a href="{{{ URL::to('/hotels') }}}">Hotels</a></li>
                                <li {{ (Request::is('airports') ? ' class="active"' : '') }}><a href="{{{ URL::to('/airports') }}}">Airports</a></li>
                                <li {{ (Request::is('countries') ? ' class="active"' : '') }}><a href="{{{ URL::to('/countries') }}}">Countries</a></li>
                            </ul>
                        </li>
                        @endif
                        @endif
                    </ul>

                    <ul class="nav navbar-nav pull-right">
                        @if (Auth::check())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{{ Auth::user()->username }}} <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                @if (Auth::user()->hasRole('admin'))
                                <li><a class="visible-lg" href="{{{ URL::to('admin') }}}">Admin</a></li>
                                @endif
                                @if (Auth::user()->hasRole('promoter'))
                                <li><a href="{{{ URL::to('/my-events/registration') }}}">Company Details</a></li>
                                @endif
                                <li><a href="{{{ URL::to('/user') }}}">Account Details</a></li>
                                <li><a href="{{{ URL::to('/user/logout') }}}">Logout</a></li>
                            </ul>
                        </li>

                        @else
                        <li {{ (Request::is('user/login') ? ' class="active"' : '') }}><a href="{{{ URL::to('/user/login') }}}">Login</a></li>
                        @if (0)
                        <li {{ (Request::is('user/create') ? ' class="active"' : '') }}><a href="{{{ URL::to('/user/create') }}}">{{{ Lang::get('site.sign_up') }}}</a></li>
                        @endif
                        @endif
                    </ul>
                    <!-- ./ nav-collapse -->
                </div>
            </div>
        </div>
        <!-- ./ navbar -->

        <!-- Container -->
        <div class="container">
            <!-- Notifications -->
            @include('notifications')
            <!-- ./ notifications -->

            <!-- Content -->
            @yield('content')
            <!-- ./ content -->
        </div>
        <!-- ./ container -->

        <!-- the following div is needed to make a sticky footer -->
        <div id="push"></div>
        </div>
        <!-- ./wrap -->


        <div id="footer">
          <div class="container">

          </div>
        </div>

        <div id="ajax-modal" class="modal fade" tabindex="-1" style="display: none;"></div>

        <!-- Javascripts
        ================================================== -->

        @yield('scripts')
    </body>
</html>
