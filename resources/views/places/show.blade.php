<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gathery</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/header.css')}}">
        <script src="{{asset('js/showApi.js')}}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?lang=ja&key=AIzaSyA6Lp_xec2eOGHFfngrx1-o2-MGqV9DaFs&libraries=places&callback=initMap" async defer></script>
    </head>
    <body>
        <h1>
            <a href="{{ url('/') }}">Gathery</a>
        </h1>
        <nav class="header-nav">
            <ul class="header-list">
                <li>
                    <a href="/#name">名称で探す</a>
                </li>
                        
                <li>|</li>
                
                <li>                            
                    <a href="/#area">エリアから探す</a>
                </li>
                
                <li>|</li>
                
                <li>
                    <a href="/#category">カテゴリーから探す</a>
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
        
        <input type="hidden" id="keyword" value="{{ $place->name }}">
        <input type="hidden" id="lat" value="{{ $place->lat }}">
        <input type="hidden" id="lng" value="{{ $place->lng }}">
        
        <div class="content">
            <div class="left-side">
                <h2 class="title">
                    {{ $place->name }}
                </h2>
                
                <div class="category">
                    <p>{{ $place->category->name }}</p>
                </div>
                
                <button id="search">画像を表示する</button></br>
                <img src="" id="photo">
            </div>
            
            <div class="right-side">
                <div class="address">
                    <h3>住所</h3>
                    <p>{{ $place->prefecture->name }}{{ $place->address }}</p>    
                </div>
                
                <div class="opening-time">
                    <h3>営業時間</h3>
                    <p>{{ $place->time_mon }}</p>
                    <p>{{ $place->time_tue }}</p>
                    <p>{{ $place->time_wed }}</p>
                    <p>{{ $place->time_thu }}</p>
                    <p>{{ $place->time_fri }}</p>
                    <p>{{ $place->time_sat }}</p>
                    <p>{{ $place->time_sun }}</p>
                </div>
                
                @if (!(empty($place->tel)))
                    <div class="tel">
                        <h3>電話番号</h3>
                        <p>{{ $place->tel }}</p>
                    </div>
                @endif
                
                <div class="score">
                    <h3>評価</h3>
                    <p>{{ $place->score }}</p>
                </div>
            </div>
        </div>
        
        @auth
            @if(empty($want))
                <form method="POST" action="/wants/{{ $place->id }}">
                    @csrf
                    <input type="submit" value="行きたい！"></input>
                </form>
            @else    
                <a href="/bbses/{{ $place->id }}">掲示板に移動する</a>
                <form method="POST" action="/wants/{{ $want->id }}/{{ $place->id }}">
                    @csrf
                    @method('delete')
                    <input type="submit" name="want_show" value="行きたい！解除"></input>
                </form>
            @endif
        @else
            <p>ログイン後に行きたい！登録が可能になります</p>
            <form method="POST" action="/wants/{{ $place->id }}">
                @csrf
                <input type="submit" value="行きたい！" disabled></input>
            </form>
        @endauth
        
        <div id="map" style="height:450px; width:450px"></div>
        
        <div class="review">
            @foreach ($reviews as $review)
                <p>{{ $review->title }}:{{ $review->user->name }}</p>
                <p>{{ $review->score }}</p>
                <p>{{ $review->comment }}</p>
            @endforeach
        </div>
        
        <div class="paginate">
            {{ $reviews->links() }}
        </div>
        
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        
    </body>
</html>