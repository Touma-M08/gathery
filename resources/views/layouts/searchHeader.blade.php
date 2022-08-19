<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Gathery') }}</title>

    <!-- Scripts -->
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
</head>
<body>
    <h1>
        <a href="{{ url('/') }}">Gathery</a>
    </h1>
    <nav class="header-nav">
        <ul class="header-list">
            <li>
                <a href="/">トップに戻る</a>
            </li>
            
            <li>|</li>
            
            <li>
                <a href="/places/ranking">ランキング</a>
            </li>
            
            <li>|</li>
            
            <li>
                <a href="/mypage/wants">マイページ</a>
            </li>
        </ul>
    </nav>
    <div class="login-logout">
        @guest
            <div class="login">
                <a href="{{ route('login') }}">ログイン</a>
            </div>
            @if (Route::has('register'))
                <div class="register">
                    <a href="{{ route('register') }}">新規登録</a>
                </div>
            @endif
        @else
            <div class="logout">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    ログアウト
                </a>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endguest
    </div>
    @yield('content')
</body>
</html>