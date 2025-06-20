<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'Hotel Holly' }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
        }
        .navbar {
            border-bottom: 2px solid #d4af37;
            box-shadow: 0 4px 16px rgba(0,0,0,0.04);
        }
        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-weight: bold;
            letter-spacing: 2px;
            color: #00008b !important;
            font-size: 1.7rem;
        }
        .navbar-nav .nav-link {
            color: #00008b !important;
            font-weight: 600;
            margin-right: 8px;
            border-radius: 16px;
            transition: background 0.2s, color 0.2s;
        }
        .navbar-nav .nav-link.active, .navbar-nav .nav-link:hover {
            background: #d4af37;
            color: #000 !important;
        }
        .dropdown-menu {
            border-radius: 16px;
            border: 1.5px solid #d4af37;
        }
        .dropdown-item {
            font-weight: 500;
        }
        .card {
            border-radius: 24px;
            border: 2px solid #d4af37;
            background: #fff;
            box-shadow: 0 4px 16px rgba(0,0,0,0.07);
        }
        .card-header {
            background: #00008b !important;
            color: #fff !important;
            font-weight: bold;
            border-radius: 22px 22px 0 0 !important;
            letter-spacing: 1px;
        }
        .btn, .btn-sm, .btn-md {
            border-radius: 20px !important;
            font-weight: bold !important;
        }
        .btn-primary {
            background: #00008b !important;
            color: #fff !important;
            border: none;
        }
        .btn-warning {
            background: #d4af37 !important;
            color: #000 !important;
            border: none;
        }
        .btn-success {
            background: #28a745 !important;
            color: #fff !important;
            border: none;
        }
        .btn-danger {
            background: #dc3545 !important;
            color: #fff !important;
            border: none;
        }
        .alert-success, .alert-danger {
            border-radius: 12px;
            font-weight: 500;
            border: 1.5px solid #d4af37;
        }
        table.dataTable {
            border-radius: 18px !important;
            overflow: hidden;
            background: #fff;
            border: 2px solid #d4af37;
        }
        table.dataTable thead {
            background: #00008b;
            color: #fff;
        }
        table.dataTable tbody tr {
            background: #fffbe6;
            color: #000;
        }
        /* Scrollbar styling for luxury feel */
        ::-webkit-scrollbar {
            width: 8px;
            background: #f8f9fa;
        }
        ::-webkit-scrollbar-thumb {
            background: #d4af37;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('#home') }}">
                    <span style="color:#00008b;">Hotel</span> <span style="color:#d4af37;">Holly</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">

                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            @if (Auth::user()->role == 'admin')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('roomtype.index') }}">{{ __('Tipe Kamar') }}</a>
                                </li>

                            @elseif(Auth::user()->role == 'resepsionis')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('receptionis.logs') }}">{{ __('Logs') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('receptionis.checkin') }}">{{ __('Check In') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('receptionis.checkin.pdata') }}">{{ __('Check In with Personal Data') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('receptionis.reservations') }}">{{ __('Reservations') }}</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="#kamar">{{ __('Kamar') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#fasilitas">{{ __('Fasilitas') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tentang">{{ __('Tentang') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#kontak">{{ __('Kontak') }}</a>
                                </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @yield('script')
    <script>
        setTimeout(function() {
            $('.alert').fadeOut('fast');
        }, 3000); // <-- time in milliseconds
    </script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

</body>
</html>