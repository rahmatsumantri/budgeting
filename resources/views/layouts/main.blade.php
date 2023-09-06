<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> @yield('title') </title>

    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon/favicon.ico') }}" />

    <link rel="stylesheet" href="{{ asset('css/font.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.min.css') }}">

</head>


<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        {{-- Navbar --}}
        @include('layouts.partials.navbar')
        {{-- Navbar --}}

        {{-- Content --}}
        @yield('content')
        {{-- Content --}}

        {{-- Footer --}}
        @include('layouts.partials.footer')
        {{-- Footer --}}

    </div>

    <script src="{{ asset('libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/main.min.js') }}"></script>
</body>


</html>
