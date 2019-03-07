

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
        <link
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css"
            rel='stylesheet' type='text/css'>
        <link
            href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700"
            rel='stylesheet' type='text/css'>
        {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
        <!-- Styles -->

        @yield('style')
        <link
            href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"
            rel="stylesheet">
        <link
            href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
            rel="stylesheet">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
        <link rel="stylesheet" type="text/css"
            href="https://cdn.datatables.net/v/ju-1.12.1/dt-1.10.18/sl-1.2.6/datatables.min.css"
            />
        <!-- <link rel="stylesheet" type="text/css"
                href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/> -->
        <!-- <link rel="stylesheet" type="text/css"
            href="https://cdn.datatables.net/1.10.18/css/dataTables.jqueryui.min.css"
            /> -->
        <link rel="stylesheet" type="text/css"
            href="https://cdn.datatables.net/select/1.2.7/css/select.dataTables.min.css"
            />

    </head>

</head>
<body>
    <div id="app">
        <nav class="navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed"
                        data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse"
                    id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle"
                                data-toggle="dropdown" role="button"
                                aria-expanded="false">
                                {{ Auth::user()->email }} <span
                                    class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/account') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('user-account').submit();">
                                        Account
                                    </a>

                                    <form id="user-account" action="{{
                                        url('/users') }}" method="GET"
                                        style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{
                                        url('/logout') }}" method="POST"
                                        style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')

        <!-- jQuery -->
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <!-- <script type="text/javascript"
            src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
        <!--Datatables-->
        <script type="text/javascript"
            src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript"
            src="https://cdn.datatables.net/1.10.18/js/dataTables.jqueryui.min.js"></script>
        <script type="text/javascript"
            src="https://cdn.datatables.net/v/ju-1.12.1/dt-1.10.18/sl-1.2.6/datatables.min.js"></script>
        <!-- <script type="text/javascript"
            src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script> -->
        <!--Bootstrap Javascript-->
        <script
            src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}




        <!--App scripts-->
        @yield('scripts')







        <!-- <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script> -->
        <!-- <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script> -->
    </body>
</html>
