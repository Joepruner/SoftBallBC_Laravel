<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!--Fonts-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet'
        type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <!-- Styles -->

    @yield('style')
    <style>
        @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,800,700,300);
        @import url(https://fonts.googleapis.com/css?family=Squada+One);

        body {
            background: #eee url(https://subtlepatterns.com/patterns/shattered.png);
        }

        #logo {
            font-family: 'Open Sans', sans-serif;
            color: #555;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 75px;
            font-weight: 800;
            letter-spacing: -3px;
            line-height: 1;
            text-shadow: #EDEDED 3px 2px 0;
            position: relative;
            left: 21vw;
            white-space: nowrap;

        }

        #logo:after {
            content: "softball BC";
            position: absolute;
            top: 20px;
            left: 7px;

        }

        #logo:after {
            /*background: url(https://subtlepatterns.com/patterns/crossed_stripes.png) repeat;*/
            background-image: -webkit-linear-gradient(left top, transparent 0%, transparent 25%, #555 25%, #555 50%, transparent 50%, transparent 75%, #555 75%);
            background-size: 4px 4px;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            z-index: -5;
            display: block;
            text-shadow: none;
        }

        #menu {
            width: 1090px;
            height: 42px;
            list-style: none;
            margin: 4px 0 0 0;
            padding: 25px 10px;
            border-top: 4px double #AAA;
            border-bottom: 4px double #AAA;
            position: relative;
            text-align: center;
        }

        #menu li {
            display: inline-block;
            width: 173px;
            margin: 0 10px;
            top: -20px;
            position: relative;
            -webkit-transform: skewy(-3deg);
            -webkit-backface-visibility: hidden;
            -webkit-transition: 200ms all;
        }

        #menu li a,
        #layout_drop_nav li a {
            text-transform: uppercase;
            font-family: 'Squada One', cursive;
            font-weight: 800;
            display: block;
            background: #FFF;
            padding: 2px 10px;
            color: #333;
            font-size: 25px;
            text-align: center;
            text-decoration: none;
            position: relative;
            z-index: 1;
            text-shadow:
                1px 1px 0px #FFF,
                2px 2px 0px #999,
                3px 3px 0px #FFF;
            background-image: -webkit-linear-gradient(top, transparent 0%, rgba(0, 0, 0, .05) 100%);
            -webkit-transition: 1s all;
            background-image: -webkit-linear-gradient(left top,
                transparent 0%, transparent 25%,
                rgba(0, 0, 0, .15) 25%, rgba(0, 0, 0, .15) 50%,
                transparent 50%, transparent 75%,
                rgba(0, 0, 0, .15) 75%);
            background-size: 4px 4px;
            box-shadow:
                0 0 0 1px rgba(0, 0, 0, .4) inset,
                0 0 20px -5px rgba(0, 0, 0, .4),
                0 0 0px 3px #FFF inset;
        }

        #menu li:hover {
            width: 203px;
            margin: 0 -5px;
        }

        #menu a:hover,
        #layout_drop_nav a:hover {
            color: #286090;
        }

        #menu li:after,
        #menu li:before {
            content: '';
            position: absolute;
            width: 50px;
            height: 100%;
            background: #BBB;
            -webkit-transform: skewY(8deg);
            x-index: -3;
            border-radius: 4px;
        }

        #menu li:after {
            background-image: -webkit-linear-gradient(left, transparent 0%, rgba(0, 0, 0, .4) 100%);
            right: 0;
            top: -4px;
        }

        #menu li:before {
            left: 0;
            bottom: -4px;
            background-image: -webkit-linear-gradient(right, transparent 0%, rgba(0, 0, 0, .4) 100%);
        }

        #layout_drop_nav {
            top: -95px;
            left: -68px;
            position: relative;
            -webkit-transform: skewy(-3deg);
            -webkit-backface-visibility: hidden;
            -webkit-transition: 200ms all;
        }

        #layout_drop_nav li a {
            font-weight: 150 !important;
            display: block;
            padding: 2px 10px;
            font-size: 22px !important;
            text-align: center;
            position: relative;
        }

    </style>

    <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/ju-1.12.1/dt-1.10.18/sl-1.2.6/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.jqueryui.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/select/1.2.7/css/select.dataTables.min.css" />


</head>

<body>
    <div id="app">
        <!-- <nav class="navbar-default navbar-static-top"> -->
        <!-- <div class="container"> -->

        <!-- <div class="navbar-header"> -->

        <!-- Collapsed Hamburger -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

    </div>


    </div>


    <div class="container">
        <div id="header">
            <a href="/" id="logo">Softball BC</a>
            @if (Auth::user())
            <ul id="menu">
                <li>
                    <a href="{{ route('people.show', Auth::user()) }}">
                        <span>People</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('teams.show', Auth::user()) }}">
                        <span>Teams</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('clubs.show', Auth::user()) }}">
                        <span>Clubs</span>
                    </a>
                </li>
            </ul>
            <div id="layout_drop_nav">
                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->email }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/account') }}" onclick="event.preventDefault();
                                                            document.getElementById('user-account').submit();">
                                    Account
                                </a>

                                <form id="user-account" action="{{
                                                            url('/users') }}" method="GET" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                            <li>
                                <a href="{{ url('/logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{
                                                            url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            @elseif(Auth::guest())

            <div id="layout_drop_nav">
                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Login or register <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            @endif
        </div>
        <!-- </nav> -->

        @yield('content')

        <!-- jQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <!--Datatables-->
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/dataTables.jqueryui.min.js"></script>
        <script type="text/javascript"
            src="https://cdn.datatables.net/v/ju-1.12.1/dt-1.10.18/sl-1.2.6/datatables.min.js">
        </script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js">
        </script>
        <script type="text/javascript"
            src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js">
        </script>
        <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.jqueryui.min.js">
        </script>
        <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <!-- <script type="text/javascript"
            src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script> -->
        <!-- <script type="text/javascript"
            src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script> -->
        <!--Bootstrap Javascript-->

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}




        <!--App scripts-->
        @yield('scripts')
</body>

</html>
