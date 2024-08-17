<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Biblioteque</title>

    @livewireStyles

    @vite(['resources/css/app.css', 'resources/css/bootstrap.css', 'resources/js/app.js', 'resources/js/bootstrap.bundle.js', 'resources/js/echo.js'])
    @stack('styles')


</head>

<body>

    @include('components.navigation')

    <main class="main">

        @include('components.alerts')
        @yield('content')

    </main>

    @include('components.footer')

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    @livewireScripts

    @yield('scripts')

    @stack('scripts')


    <script>
        // console.log(window.Echo);


        // Echo.channel('wBSOCKET')
        //     .listen('TestEvent', e => {
        //         console.log(e.text)
        //     })
    </script>

</body>

</html>
