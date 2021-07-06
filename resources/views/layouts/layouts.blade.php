<html>

<head>
    <title>@yield('title')</title>
    {{-- その他の情報 --}}
    <link href="{{ asset('/assets/css/style.css') }}" rel="stylesheet">
    @yield('css')
</head>

<body>
    <header class="header">
        @yield('header')
        @yield('css')
    </header>
    <h1>@yield('title')</h1>
    <main class="content">
        @yield('content')
        @yield('dev')
    </main>
    <footer class="footer">
        @yield('footer')
    </footer>
</body>

</html>
