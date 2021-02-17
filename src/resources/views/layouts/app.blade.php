<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="180x180" href="storage/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="storage/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="storage/favicon-16x16.png">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'DMH') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('dist/css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="ticketWrapper" data-route="{{ route('ticket.complete') }}">
    <div class="background-panel"></div>

    @include('snippets/nav/nav')

    <main class="py-1">
        @yield('content')
    </main>
</div>

<!-- Scripts -->
<script src="{{ asset('dist/js/app.js') }}" defer></script>

@yield('script')
</body>
</html>
