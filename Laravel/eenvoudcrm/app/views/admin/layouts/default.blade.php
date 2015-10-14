<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>
        @section('title')
            Administration
        @show
    </title>

    <meta name="keywords" content="@yield('keywords')" />
    <meta name="author" content="@yield('author')" />
    <!-- Google will often use this as its description of your page/site. Make it good. -->
    <meta name="description" content="@yield('description')" />

    <!-- Speaking of Google, don't forget to set your site up: http://google.com/webmasters -->
    <meta name="google-site-verification" content="">

    <!-- Dublin Core Metadata : http://dublincore.org/ -->
    <meta name="DC.title" content="Project Name">
    <meta name="DC.subject" content="@yield('description')">
    <meta name="DC.creator" content="@yield('author')">

    <!--  Mobile Viewport Fix -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- This is the traditional favicon.
     - size: 16x16 or 32x32
     - transparency is OK
     - see wikipedia for info on browser support: http://mky.be/favicon/ -->
    <link rel="shortcut icon" href="{{{ asset('assets/ico/favicon.png') }}}">

    <!-- iOS favicons. -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{{ asset('assets/ico/apple-touch-icon-144-precomposed.png') }}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{{ asset('assets/ico/apple-touch-icon-114-precomposed.png') }}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{{ asset('assets/ico/apple-touch-icon-72-precomposed.png') }}}">
    <link rel="apple-touch-icon-precomposed" href="{{{ asset('assets/ico/apple-touch-icon-57-precomposed.png') }}}">

    <!-- datatables + editor -->
    <link rel="stylesheet" href="{{asset('assets/datatables/media/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/datatables/extensions/TableTools/css/dataTables.tableTools.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/datatables/extensions/Editor-1.3.3/css/dataTables.editor.min.css')}}">

    <!-- CSS -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap-theme.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/wysihtml5/prettify.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/wysihtml5/bootstrap-wysihtml5.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/datatables-bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/colorbox.css')}}">

    <link rel="stylesheet" href="{{asset('assets/vendor/dropzone-3.10.2/downloads/css/basic.css')}}">
    <link rel="stylesheet" href="//cdn.quilljs.com/0.19.7/quill.snow.css" />

    <link rel="stylesheet" href="{{asset('assets/css/style.min.css')}}">

    <style>
    body {
        padding: 60px 0;
    }
    </style>

    @yield('styles')

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Container -->
    <div class="container">
        <!-- Navbar -->
        <div class="navbar navbar-default navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <li{{ (Request::is('admin/') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/') }}}"><span class="glyphicon glyphicon-dashboard"></span> Home</a></li>
                        <li{{ (Request::is('admin/companies*') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/companies') }}}"><span class="glyphicon glyphicon-globe"></span> Bedrijven</a></li>
                        <li{{ (Request::is('admin/projects*') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/projects') }}}"><span class="glyphicon glyphicon-briefcase"></span> Projecten</a></li>
                        <li{{ (Request::is('admin/werklogs*') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/werklogs') }}}"><span class="glyphicon glyphicon-tasks"></span> Werklogs</a></li>
                        <li{{ (Request::is('admin/subscriptions*') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/subscriptions') }}}"><span class="glyphicon glyphicon-calendar"></span> Abonnementen</a></li>
                        <li{{ (Request::is('admin/accounting*') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/accounting') }}}"><span class="glyphicon glyphicon-euro"></span> Accounting</a></li>
                        <li{{ (Request::is('admin/reporting*') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/reporting') }}}"><span class="glyphicon glyphicon-stats"></span> Reporting</a></li>


<!--                         <li{{ (Request::is('admin/reminders*') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/reminders') }}}"><span class="glyphicon glyphicon-cloud"></span> Herinneringen</a></li> -->

                        <li class="dropdown{{ (Request::is('admin/settings*') ? ' active' : '') }}">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="{{{ URL::to('admin/settings') }}}">
                                <span class="glyphicon glyphicon-cog"></span> Settings <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li{{ (Request::is('admin/settings/services*') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/settings/services') }}}"><span class="glyphicon glyphicon-user"></span> Services</a></li>
                            </ul>
                        </li>

                    </ul>
                    <ul class="nav navbar-nav pull-right">
                        <li><a href="{{{ URL::to('/admin/') }}}">View Homepage</a></li>
                        <li class="divider-vertical"></li>
                        <li class="dropdown{{ (Request::is('admin/users*|admin/roles*') ? ' active' : '') }}">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="{{{ URL::to('admin/users') }}}">
                                <span class="glyphicon glyphicon-leaf"></span> Users <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li{{ (Request::is('admin/users*') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/users') }}}"><span class="glyphicon glyphicon-user"></span> Users</a></li>
                                <li{{ (Request::is('admin/roles*') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/roles') }}}"><span class="glyphicon glyphicon-user"></span> Roles</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <span class="glyphicon glyphicon-user"></span> {{{ Auth::user()->username }}}   <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{{ URL::to('user/settings') }}}"><span class="glyphicon glyphicon-wrench"></span> Settings</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{{ URL::to('user/logout') }}}"><span class="glyphicon glyphicon-share"></span> Logout</a></li>
                                </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- ./ navbar -->

        <!-- Notifications -->
        @include('notifications')
        <!-- ./ notifications -->

        <!-- Content -->
        @yield('content')
        <!-- ./ content -->

        <!-- Footer -->
        <footer class="clearfix">
            @yield('footer')
        </footer>
        <!-- ./ Footer -->

    </div>
    <!-- ./ container -->
    <div id="ajax-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="false"></div>

    <!-- jQuery -->
    <!--
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js"></script>
    -->
    <script src="{{asset('assets/vendor/DataTables-1.10.4/media/js/jquery.js')}}"></script>

    <!-- undercore -->
    <script src="{{asset('assets/vendor/underscore/underscore-min.js')}}"></script>

    <!-- bootstrap -->
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- datatables -->
    <script src="{{asset('assets/vendor/DataTables-1.10.4/media/js/jquery.dataTables.js')}}"></script>
    <!--
    <script src="{{asset('assets/datatables/media/js/jquery.dataTables.js')}}"></script>
    -->
    <script src="{{asset('assets/datatables/extensions/TableTools/js/dataTables.tableTools.js')}}"></script>
    <script src="{{asset('assets/datatables/extensions/Editor-1.3.3/js/dataTables.editor.js')}}"></script>
    <script src="{{asset('assets/js/datatables-bootstrap.js')}}"></script>
    <!-- jquery extra -->
    <script src="{{asset('assets/js/jquery.colorbox.js')}}"></script>
    <script src="{{asset('assets/js/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- bootstrap extra -->

    <script src="{{asset('assets/js/bootstrap-modal/js/bootstrap-modalmanager.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-modal/js/bootstrap-modal.js')}}"></script>

    <script src="//cdn.quilljs.com/0.19.7/quill.js"></script>
    <script src="{{asset('assets/vendor/dropzone-3.10.2/downloads/dropzone.js')}}"></script>

    <!-- typeahead -->
    <!-- <script src="{{asset('assets/vendor/typeahead.js/dist/typeahead.bundle.min.js')}}"></script> -->
    <script src="{{asset('assets/vendor/typeahead.js/dist/typeahead.bundle.min.js')}}"></script>
    <!-- other -->
    <script src="{{asset('assets/js/prettify.js')}}"></script>

    <script src="http://code.highcharts.com/highcharts.js"></script>
    <script src="http://code.highcharts.com/modules/exporting.js"></script>

    <!-- main -->
    <script src="{{asset('assets/js/scripts.min.js')}}"></script>

    @yield('scripts')

</body>

</html>
