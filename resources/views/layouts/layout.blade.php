<!doctype html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="author" content="T.K." />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('/css/reset.css') }}">
    <link href=" {{ asset('/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
    @yield('css')
</head>

<body>
    <header class="header">
        @component('components.header')
        @endcomponent
    </header>
    <main class="content">
        @yield('content')
        @unless(Request::is('/') or Request::is('home'))
            <a href="/" class="homeLink">ホームへ戻る</a>
        @endunless
    </main>
    <footer class="footer">
        @component('components.footer')
        @endcomponent
    </footer>
</body>

</html>
