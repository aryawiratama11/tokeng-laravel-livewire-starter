<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/metro-all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/metro-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Script -->
    <script type="text/javascript" src="{{ asset('/js/jquery.min.js') }}"></script>
    

</head>

<body>
    <div id="app">
        <header class="bg-darkCyan fg-white d-flex flex-justify-between app-bar">
            <div class="app-bar-container float-none">
                <a class="app-bar-item bg-darkBlue" href="#"><span class="mif-opencart mif-2x fg-white"> </span> Toko
                    Engineering</a>
                @guest
            </div>
            @else
    </div>
    <div class="app-bar-container ml-auto">
        <div class="app-bar-contaniner float-left">
            <a href="#" class="dropdown-toggle">{{ Auth::user()->name }}</a>
            <ul class="d-menu place-right" data-role="dropdown">
                <li><a href="/profile">Rubah Password</a></li>
                <li><a href="/profile">Pengaturan Pengguna</a></li>
                <li class="divider bg-lightGray"></li>
                <li>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    @endguest
    </header>
    </div>
    <br>
    <br>
    <main class="py-4">
        @yield('content')
    </main>
    </div>
    <!-- Scripts -->
    
</body>
<script type="text/javascript" src="{{ asset('js/metro.min.js') }}"></script>
</html>