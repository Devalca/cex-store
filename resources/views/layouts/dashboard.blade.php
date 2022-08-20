<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
    <div class="body_bg">
        <x-navbar></x-navbar>
        <div class="container-fluid py-3">
            <div class="row">
                <div class="col-md-3">
                    <x-sidebar></x-sidebar>
                </div>
                <div class="col-md-9">
                    @yield('body')
                </div>
            </div>
        </div>
    </div>
</body>

</html>