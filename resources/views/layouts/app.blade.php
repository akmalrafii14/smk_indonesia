<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/chartjs/dist/Chart.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome/fontawesome.min.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <span style="color:#2980b9; font-weight:600;">SMK</span> Indonesia
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    @if(Auth::check())
    <div class="wrapper">
        <!-- Sidebar -->
        @if(auth()->user()->role == 1)
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>SMK Indonesia</h3>
            </div>

            <ul class="list-unstyled components">
                <p style="color: #424242;">Lorem ipsum dolor sit amet consectetur.</p>
                <li>
                    <a href="{{route('admin.home')}}">Home</a>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Data
                        Sekolah</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="/datasiswa">Data Siswa</a>
                        </li>
                        <li>
                            <a href="/dataguru">Data Guru</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenuTambah" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle">Tambah Data</a>
                    <ul class="collapse list-unstyled" id="pageSubmenuTambah">
                        <li>
                            <a href="{{route('admin.viewinputsiswa')}}">Tambah Data Siswa</a>
                        </li>
                        <li>
                            <a href="{{route('admin.viewinputguru')}}">Tambah Data Guru</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        @elseif(auth()->user()->role == 2)
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>SMK Indonesia</h3>
            </div>

            <ul class="list-unstyled components">
                <p>Lorem ipsum dolor sit amet consectetur.</p>
                <li>
                    <a href="{{route('guru.home')}}">Home</a>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Data
                        Sekolah</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="{{URL('guru/datasiswa')}}">Data Siswa</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        @elseif(auth()->user()->role == 3)
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>SMK Indonesia</h3>
            </div>

            <ul class="list-unstyled components">
                <p>Lorem ipsum dolor sit amet consectetur.</p>
                <li>
                    <a href="{{route('siswa.home')}}">Home</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        @endif
        <div id="content">
            <main class="py-4">
                @yield('content')
            </main>
        </div>

    </div>
    @else
    <div id="content">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @endif





</body>

</html>
