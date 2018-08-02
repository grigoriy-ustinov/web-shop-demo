<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Webshop</title>

        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/custom.css')}}">

    </head>
    <body>
        <div id='wrapper'>
            @include('layouts.navbar')
            @include('layouts.message')
            <div class="continer">
                @yield('content')
            </div>
        </div>

        <!-- Custom logic -->
        <script src="{{ asset('js/logic.js') }}"></script>
    </body>
</html>