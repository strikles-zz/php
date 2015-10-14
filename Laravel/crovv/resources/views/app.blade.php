<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crovv</title>

    <link href="{{ elixir("css/vendor.css") }}" rel="stylesheet">
    <link href="{{ elixir("css/style.css") }}" rel="stylesheet">

    <link href="/css/jquery-ui-1.10.0.custom.min.css" rel="stylesheet">
    <link href="/css/jquery.ui.timepicker.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class={!! isset($bodyclass) ? $bodyclass : "app-main" !!}>

    <div class="header-wrapper">

        <div class="ppl-overlay"></div>

        <!-- top navigation -->
        <div class="container">

            <div class="row">
                <div class="col-xs-12">

	                <nav class="navbar navbar-default">

	                    <div class="navbar-header">
	                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	                            <span class="sr-only">Toggle Navigation</span>
	                            <span class="icon-bar"></span>
	                            <span class="icon-bar"></span>
	                            <span class="icon-bar"></span>
	                        </button>
	                        <a class="navbar-brand" href={!! url(!\Auth::check() ? '/home' : '/dashboard') !!}>Crovv</a>
	                    </div>

	                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

	                        <ul class="nav navbar-nav navbar-right">
	                            <li><a href="/how-to-use">Use</a></li>
	                            <li><a href="/subscription">Subscriptions</a></li>
	                            <li class="hidden-sm"><a href="/testimonial">Testimonials</a></li>
	                            <li class="hidden-sm"><a href="/trial">Trial</a></li>
	                            <li><a href="/press">Press</a></li>
	                            <li><a href="/contact">Contact</a></li>
	                            @if (\Auth::check())
                                <li class="divider-vertical"></li>
                                <li class="no-margin"><a href=""><i class="fa fa-user"></i></a></li>
                                <li class="no-margin"><a href=""><i class="fa fa-calendar"></i></a></li>
                                <li class="no-margin"><a href=""><i class="fa fa-comment"></i></a></li>
                                <li class="no-margin"><a href=""><i class="fa fa-envelope-o"></i></a></li>
                                <li class="no-margin"><a href=""><i class="fa fa-user"></i></a></li>
                                <li class="divider-vertical"></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{!! Auth::user()->first_name !!} <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="/auth/logout">Logout</a></li>
                                    </ul>
                                </li>
	                            @else
                                <li class="button button-join"><a href="/auth/register" class="nav-join">Join</a></li>
                                <li class="button button-login"><a href="/auth/login" class="nav-login">Login</a></li>
	                            @endif
	                        </ul>
	                    </div>

	                </nav>

                </div>
            </div>
        </div>

        <div class="header-content container">
            @yield('header')
        </div>

    </div>

    <div class="content-wrapper">
        @yield('content')
    </div>

    <footer>

        <div class="row footer-nav">
            <ul class="nav navbar-center">
                <li><a href="/how-to-use">How to use</a></li>
                <li><a href="/subscription">Subscriptions</a></li>
                <li><a href="/testimonial">Testimonials</a></li>
                <li><a href="/trial">Free Trial</a></li>
                <li><a href="/press">Press</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>
        </div>

        <div class="row disclaimer">
            <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, is niemand die van pijn zelf houdt, die het zoekt en die het hebben wil, eenvoudigweg omdat het pijn is...</p>
        </div>

        <!-- Scripts -->
        <script src="{{ elixir("js/vendor.js") }}"></script>
        <script src="{{ elixir("js/app.js") }}"></script>

    </footer>


</body>
</html>
