<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Gathery') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div>
        <a href="{{ url('/') }}">Gathery</a>
    </div>
    <ul>
        <li>
            <a href="/#name">名称で探す</a>
        </li>
        
        <li>                            
            <a href="/#area">エリアから探す</a>
        </li>
                
        <li>
            <a href="/#category">カテゴリーから探す</a>
        </li>
                
        <li>
            <a href="places/ranking">ランキング</a>
        </li>
        
        <li>
            <a href="/mypage/wants">マイページ</a>
        </li>
        @guest
            <li>
                <a href="{{ route('login') }}">ログイン</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a href="{{ route('register') }}">新規登録</a>
                </li>
            @endif
        @else
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    ログアウト
                </a>
            </li>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endguest
    </ul>
    @yield('content')
</body>
</html>