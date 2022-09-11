<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Gathery') }}</title>
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/load.css')}}">
    <script src="{{asset('js/loading.js')}}"></script>
    <script src="{{asset('js/sp.js')}}" defer></script>
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
                    <ul class="sp-header-list __normal">
                        <div class="header-profile">
                            @auth
                                <div class="header-icon-img-box">
                                    @if (empty(Auth::user()->image))
                                        <img src="/img/image.png">
                                    @else
                                        <img src="{{ Auth::user()->image }}">
                                    @endif
                                </div>
                                <p class="header-user-name">{{ Auth::user()->name }}</p>
                            @else
                                <div class="header-icon-img-box">
                                    <img src="img/image.png">
                                </div>
                                <p class="header-user-name">ゲスト</p>
                            @endauth
                        </div>
                        
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
                        
                        <li>
                            <a class="sp-header-link" href="/#name-pos" onclick="toggle()">名称で探す</a>
                        </li>
                                
                        <li>
                            <a class="sp-header-link" href="/#area-pos" onclick="toggle()">エリアから探す</a>
                        </li>
                                
                        <li>
                            <a class="sp-header-link" href="/#category-pos" onclick="toggle()">カテゴリーから探す</a>
                        </li>
                                
                        <li>
                            <a class="sp-header-link" href="/places/ranking?page=1" onclick="toggle()">ランキング</a>
                        </li>
                        
                        <li>
                            <a class="sp-header-link" href="/bbses" onclick="toggle()">掲示板</a>
                        </li>
                        
                        <li>
                            <a class="sp-header-link" href="/mypage/wants" onclick="toggle()">マイページ</a>
                        </li>
                    </ul>
                    
                    <ul class="sp-header-list __mypage">
                        <div class="header-profile">
                            @auth
                                <div class="header-icon-img-box">
                                    @if (empty(Auth::user()->image))
                                        <img src="/img/image.png">
                                    @else
                                        <img src="{{ Auth::user()->image }}">
                                    @endif
                                </div>
                                <p class="header-user-name">{{ Auth::user()->name }}</p>
                            @else
                                <div class="header-icon-img-box">
                                    <img src="img/image.png">
                                </div>
                                <p class="header-user-name">ゲスト</p>
                            @endauth
                        </div>
                        
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
                        
                        <li>
                            <a class="sp-header-link" href="/">トップに戻る</a>
                        </li>
                        <li>
                            <a class="sp-header-link" href="/mypage/wants">行きたい！一覧</a>
                        </li>
                        <li>
                            <a class="sp-header-link" href="/mypage/reviews">レビュー一覧</a>
                        </li>
                        <li>
                            <a class="sp-header-link" href="/mypage/schedule?page=1">予定登録</a>
                        </li>
                        <li>
                            <a class="sp-header-link" href="/mypage/setting">設定</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    
    <nav class="header-nav">
        <ul class="header-list">
            <li>
                <a class="header-link" href="/#name">名称で探す</a>
            </li>
                    
            <li class="bar">|</li>
            
            <li>                            
                <a class="header-link" href="/#area">エリアから探す</a>
            </li>
            
            <li class="bar">|</li>
            
            <li>
                <a class="header-link" href="/#category">カテゴリーから探す</a>
            </li>
                    
            <li class="bar">|</li>
            
            <li>
                <a class="header-link" href="/places/ranking?page=1">ランキング</a>
            </li>
            
            <li class="bar">|</li>
            
            <li>
                <a class="header-link" href="/bbses">掲示板</a>
            </li>
            
            <li class="bar">|</li>
            
            <li>
                <a class="header-link" href="/mypage/wants">マイページ</a>
            </li>
        </ul>
    </nav>
    @yield('content')
</body>
</html>