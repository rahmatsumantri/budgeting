<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> @yield('title') </title>

    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon/favicon.ico') }}" />

    <link rel="stylesheet" href="{{ asset('css/font.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/fontawesome-free/css/all.min.css') }}">

    {{-- datatables --}}
    <link rel="stylesheet" href="{{ asset('libs/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    {{-- datatables --}}

    {{-- toastr --}}
    <link rel="stylesheet" href="{{ asset('libs/toastr/toastr.min.css') }}">
    {{-- toastr --}}

    {{-- daterange picker --}}
    <link rel="stylesheet" href="{{ asset('libs/daterangepicker/daterangepicker.css') }}">
    {{-- daterange picker --}}


    <!-- daterange picker -->

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

    {{-- datatables --}}
    <script src="{{ asset('libs/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('libs/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('libs/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('libs/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('libs/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('libs/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('libs/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('libs/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('libs/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('libs/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('libs/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    {{-- datatables --}}

    {{-- toastr --}}
    <script src="{{ asset('libs/toastr/toastr.min.js') }}"></script>
    {{-- toastr --}}

    {{-- daterange picker --}}
    <script src="{{ asset('libs/moment/moment.min.js') }}"></script>
    <script src="{{ asset('libs/daterangepicker/daterangepicker.js') }}"></script>
    {{-- daterange picker --}}

    <script src="{{ asset('js/main.min.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>

    <script>
        @if (session()->has('success'))
            toastr.success('{{ session('success') }}', 'BERHASIL!', {
                positionClass: 'toast-bottom-right'
            });
        @elseif (session()->has('error'))
            toastr.error('{{ session('error') }}', 'GAGAL!', {
                positionClass: 'toast-bottom-right'
            });
        @endif
    </script>

</body>


</html>
