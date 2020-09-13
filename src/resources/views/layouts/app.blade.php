<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'DMH') }}</title>

    <!-- Fonts -->
{{--    <link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
{{--    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">--}}

<!-- Styles -->
    <link href="{{ asset('dist/app.css') }}" rel="stylesheet">

</head>
<body>
<div class="ticketWrapper" data-route="{{ route('task-complete') }}">

    <div id="large-header" class="large-header">
        <canvas id="demo-canvas"></canvas>
    </div>

    <div id="main"></div>

    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container" style="padding: 0 10px">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'DMH v0.0.1') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}"
                    style="padding: 0;">
                <i class="fas fa-bars"></i>
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
                            <a class="nav-link" href="{{ route('login') }}">{{ __('LOGIN') }}</a>
                        </li>|
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('REGISTER') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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

    <main class="py-1">
        @yield('content')
    </main>
</div>

<!-- Scripts -->
<script src="{{ asset('dist/manifest.js') }}" defer></script>
<script src="{{ asset('dist/vendor.js') }}" defer></script>
<script src="{{ asset('dist/app.js') }}" defer></script>

<!-- Animated background -->
<script src="{{ asset('storage/TweenLite.min.js') }}" defer></script>
<script src="{{ asset('storage/EasePack.min.js') }}" defer></script>
<script src="{{ asset('storage/demo.js') }}" defer></script>

<!-- fontawesome -->
<script src="https://use.fontawesome.com/f426accb80.js"></script>

@yield('script')

</body>
</html>
