<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Gathery') }}</title>

    <!-- Scripts -->
    <script src="{{asset('js/loading.js')}}"></script>
    <script src="{{asset('js/sp.js')}}" defer></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/load.css')}}">
</head>
<body>
    <div id="loading">
        <div class="half-circle-spinner">
            <div class="circle circle-1"></div>
            <div class="circle circle-2"></div>
        </div>
    </div>
    
    <div class="header-bg">
        <div class="top">
            <h1 class="site-logo">
                <a href="{{ url('/') }}">Gathery</a>
            </h1>
            
            <div class="login-logout">
                @guest
                    <div class="login">
                        <a class="btn" href="{{ route('login') }}">ログイン</a>
                    </div>
                    @if (Route::has('register'))
                        <div class="register">
                            <a class="btn" href="{{ route('register') }}">新規登録</a>
                        </div>
                    @endif
                @else
                    <div class="logout">
                        <a class="btn" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            ログアウト
                        </a>
                    </div>
        
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
            </div>
            
                        <div class="sp-header">
                <div id="hamburger" class="hamburger" onclick="toggle()">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                
                <nav id="nav" class="sp-header-nav">
                    <ul class="sp-header-list">
                        @guest
                            <li>
                                <a class="sp-header-link" href="{{ route('login') }}">ログイン</a>
                            </li>
                            
                            @if (Route::has('register'))
                                <li>
                                    <a class="sp-header-link" href="{{ route('register') }}">新規登録</a>
                                </li>
                            @endif
                            
                        @else
                            <li>
                                <a class="sp-header-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    ログアウト
                                </a>
                            </li>
                        @endguest
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    @yield('content')
</body>
</html>
