<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gathery</title>
        <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/header.css')}}">
        <link rel="stylesheet" href="{{asset('css/load.css')}}">
        <link rel="stylesheet" href="{{asset('css/show.css')}}">
        <script src="{{asset('js/loading.js')}}"></script>
        <script src="{{asset('js/showApi.js')}}"></script>
        <script src="{{asset('js/app.js')}}" defer></script>
        <script src="https://maps.googleapis.com/maps/api/js?lang=ja&key={{ config('app.api_key') }}&libraries=places&callback=initMap" async defer></script>
    </head>
    <body>
        <div id="loading">
            <div class="half-circle-spinner">
                <div class="circle circle-1"></div>
                <div class="circle circle-2"></div>
            </div>
        </div>
        
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
                    <a class="header-link" href="/places/ranking">ランキング</a>
                </li>
                
                <li class="bar">|</li>
                
                <li>
                    <a class="header-link" href="/mypage/wants">マイページ</a>
                </li>
            </ul>
        </nav>
        
        <input type="hidden" id="keyword" value="{{ $place->name }}">
        <input type="hidden" id="lat" value="{{ $place->lat }}">
        <input type="hidden" id="lng" value="{{ $place->lng }}">
        
        <div id="star">
            <h2 class="title">
                {{ $place->name }}
            </h2>
            
            <div class="category">
                <p>{{ $place->category->name }}</p>
            </div>
            
            <div class="content">
                <div class="left-side">
                    <div class="place-img-box">
                        <img class="place-img" src="" id="photo">
                    </div>
                </div>
                
                <div class="right-side">
                    <div class="address data-ttl">
                        <h3>住所</h3>
                        <p>{{ $place->prefecture->name }}{{ $place->address }}</p>    
                    </div>
                    
                    <div class="opening-time data-ttl">
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
                        <div class="tel data-ttl">
                            <h3>電話番号</h3>
                            <p>{{ $place->tel }}</p>
                        </div>
                    @endif
                    
                    <div class="score data-ttl">
                        <h3>評価</h3>
                        <div>
                            <star-rating 
                            v-bind:increment="0.1"
                            v-bind:star-size="25"
                            :rating="{{ $place->score }}"
                            :read-only="true"
                            ></star-rating>
                        </div>
                    </div>
            
                    @auth
                        @if(empty($want))
                            <form method="POST" action="/wants/{{ $place->id }}">
                                @csrf
                                <input class="showpage-btn want" type="submit" value="行きたい！">
                            </form>
                        @else
                            <div class="btn-list">
                                <a class="showpage-btn bbs" href="/bbses/{{ $place->id }}">掲示板に移動する</a>
                                <form method="POST" action="/wants/{{ $want->id }}/{{ $place->id }}">
                                    @csrf
                                    @method('delete')
                                    <input class="showpage-btn cansel" type="submit" name="want_show" value="行きたい！解除">
                                </form>
                            </div>
                        @endif
                    @else
                        <form method="POST" action="/wants/{{ $place->id }}">
                            @csrf
                            <input class="showpage-btn want" type="submit" value="行きたい！" disabled>
                        </form>
                        <p class="description">※ログイン後に行きたい！登録が可能になります</p>
                    @endauth
                </div>
            </div>
            
            <div class="bottom">
                <div id="map"></div>
                
                <div class="reviews">
                    <h3>レビュー</h3>
                    @foreach ($reviews as $review)
                        <div class="review">
                            <div class="review-user">
                                <div class="icon-img-box">
                                    @if (empty($review->user->image))
                                        <img src="/img/image.png">
                                    @else
                                        <img src="{{ $review->user->image }}">
                                    @endif
                                </div>
                                <p>{{ $review->user->name }}</p>
                            </div>
                    
                            <div>
                                <star-rating 
                                v-bind:increment="1"
                                v-bind:star-size="25"
                                :rating="{{ $review->score }}"
                                :read-only="true"
                                :show-rating="false"
                                ></star-rating>
                            </div>
                            
                            <p>{{ $review->title }}</p>
                            
                            <p class="comment">{{ $review->comment }}</p>
                            
                            <p>{{ $review->updated_at->format('Y/m/d') }}</p>
                        </div>
                    @endforeach
                    
                    <div class="paginate">
                        {{ $reviews->links() }}
                    </div>
                </div>
            </div>
            
            <div class="footer">
                <a href="/">戻る</a>
            </div>
        </div>
    </body>
</html>