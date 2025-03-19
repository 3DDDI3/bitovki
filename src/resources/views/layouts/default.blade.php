<!doctype html>
<html lang="ru">

<head>
    @hasSection('head')
        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="16x16">

        @yield('head')
    @else
        @include('includes.head')
    @endif

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />

    {{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('lib/slick-1.8.1/slick/slick.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('lib/maskinput.js') }}"></script> --}}

    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    {{-- <link rel="stylesheet" href="/css/app.css"> --}}
    {{-- {!! $seo->buildGenerates() !!} --}}
</head>

<body class="body-visible">
    @csrf

    @include('includes.header')

    @yield('content')

    @include('includes.footer')

    @include ('includes.scripts')

    @yield('custom_script')

</body>

</html>
