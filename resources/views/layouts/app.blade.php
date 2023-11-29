<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Vármegyék') }}</title>
    <link rel="icon" type="image/x-icon" href="/img/favicon.ico">

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style type="text/css">
        body {
            background-color: #f2f2f2;
        }

        i {
            font-size: 20px !important;
        }

        .navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #ddd;
            padding: 10px;
        }

        .navbar-brand {
            font-size: 1.5em;
            color: #000000;
        }

        .navbar-toggler-icon {
            color: #000000;
        }

        .navbar-nav {
            margin-left: 0;
        }

        .navbar-nav button {
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            margin-right: auto;
            padding: 8px 15px;
        }

        .navbar-nav button a {
            color: white;
            text-decoration: none;
        }

        .navbar-nav button:hover {
            background-color: #0056b3;
        }

        .navbar-collapse {
            margin-top: 10px;
        }

        .navbar-nav li {
            display: inline-block;
            margin-right: auto;
        }

        .navbar-nav li button {
            display: inline-block;
            padding: 8px 15px;
        }

        footer {
            background-color: #343a40;
            color: white;
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <div id="app">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light shadow-sm">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ url('/') }}"><i class="fa fa-home"></i></a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li>
                                <button><a href="{{route('varmegyek')}}">Vármegyék</a></button>
                            </li>
                        </ul>

                        <ul class="navbar-nav">
                            <!-- Authentication Links -->
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <main class="py-4">
            @yield('content')
        </main>

        <footer>
            {{ config('app.name', 'Vármegyék') }} v{{ env('APP_VERSION') }} (PHP v{{ PHP_VERSION }})
        </footer>
    </div>
</body>
</html>
