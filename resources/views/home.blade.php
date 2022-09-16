<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gathery</title>
        
        <link rel="stylesheet" href="{{asset('css/home.css')}}">
        <script src="{{asset('js/home.js')}}" defer></script>
        <script src="{{asset('js/app.js')}}" defer></script>
    </head>
    <body>
        @extends("layouts/header")
        @section("content")
        <div class="contents">
            <main>
                <section class="name" id="name">
                    <div id="name-pos" class="pos"> </div>
                    
                    <p class="section-ttl">名称で探す</p>
                    <form class="search-text" method="get" action="/places/search">
                        <input class="search" type="search" name="name"/>
                        <input class="search-btn" type="submit" value="検索"/>
                    </form>
                </section>
                
                <section class="area" id="area">
                    <div id="area-pos" class="pos"> </div>
                    
                    <p class="section-ttl">エリアから探す</p>
                    
                    <div class="map">
                        <div class="map-bg" id="map-bg"></div>
                        
                        <div>
                            @foreach ($prefectures as $prefecture)
                                @if ($prefecture->id == 1)
                                    <form method="get" action="/places/search">
                                        <input type="hidden" name="prefecture" value="{{ $prefecture->id }}">
                                        <input type="submit" value="{{ $prefecture->name }}" class="region-btn __hokkaido pref-name" id="hokkaido" onmouseover="mouseOver(event)" onmouseout="mouseOut(event)">
                                    </form>
                                @endif
                            @endforeach
                        </div>
                        
                        
                        <div class="tohoku">
                            <div class="region-btn region-pref __tohoku" id="tohoku" onmouseover="mouseOver(event)" onmouseout="mouseOut(event)">
                                東北地方
                            </div>
                            
                            <div class="prefecture">
                                @foreach ($prefectures as $prefecture)
                                    @if ($prefecture->id >= 2 && $prefecture->id <= 7)
                                        <form method="get" action="/places/search">
                                            <input type="hidden" name="prefecture" value="{{ $prefecture->id }}">
                                            <input class="pref-name" type="submit" value="{{ $prefecture->name }}">
                                        </form>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        
                        <div class="kanto">
                            <div class="region-btn region-pref __kanto" id="kanto" onmouseover="mouseOver(event)" onmouseout="mouseOut(event)">
                                関東地方
                            </div>
                            
                            <div class="prefecture">
                                @foreach ($prefectures as $prefecture)
                                    @if ($prefecture->id >= 8 && $prefecture->id <= 14)
                                        <form method="get" action="/places/search">
                                            <input type="hidden" name="prefecture" value="{{ $prefecture->id }}">
                                            <input class="pref-name" type="submit" value="{{ $prefecture->name }}">
                                        </form>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        
                        <div class="chubu">
                            <div class="region-btn region-pref __chubu" id="chubu" onmouseover="mouseOver(event)" onmouseout="mouseOut(event)">
                                中部地方
                            </div>
                            
                            <div class="prefecture">
                                @foreach ($prefectures as $prefecture)
                                    @if ($prefecture->id >= 15 && $prefecture->id <= 23)
                                        <form method="get" action="/places/search">
                                            <input type="hidden" name="prefecture" value="{{ $prefecture->id }}">
                                            <input class="pref-name" type="submit" value="{{ $prefecture->name }}">
                                        </form>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        
                        <div class="kinki">
                            <div class="region-btn region-pref __kinki" id="kinki" onmouseover="mouseOver(event)" onmouseout="mouseOut(event)">
                                近畿地方
                            </div>
                            
                            <div class="prefecture">
                                @foreach ($prefectures as $prefecture)
                                    @if ($prefecture->id >= 24 && $prefecture->id <= 30)
                                        <form method="get" action="/places/search">
                                            <input type="hidden" name="prefecture" value="{{ $prefecture->id }}">
                                            <input class="pref-name" type="submit" value="{{ $prefecture->name }}">
                                        </form>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        
                        <div class="shikoku">
                            <div class="region-btn region-pref __shikoku" id="shikoku" onmouseover="mouseOver(event)" onmouseout="mouseOut(event)">
                                四国地方
                            </div>
                            
                            <div class="prefecture">
                                @foreach ($prefectures as $prefecture)
                                    @if ($prefecture->id >= 36 && $prefecture->id <= 39)
                                        <form method="get" action="/places/search">
                                            <input type="hidden" name="prefecture" value="{{ $prefecture->id }}">
                                            <input class="pref-name" type="submit" value="{{ $prefecture->name }}">
                                        </form>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        
                        <div class="chugoku">
                            <div class="region-btn region-pref __chugoku" id="chugoku" onmouseover="mouseOver(event)" onmouseout="mouseOut(event)">
                                中国地方
                            </div>
                            
                            <div class="prefecture">
                                @foreach ($prefectures as $prefecture)
                                    @if ($prefecture->id >= 31 && $prefecture->id <= 35)
                                        <form method="get" action="/places/search">
                                            <input type="hidden" name="prefecture" value="{{ $prefecture->id }}">
                                            <input class="pref-name" type="submit" value="{{ $prefecture->name }}">
                                        </form>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        
                        <div class="kyusyu">
                            <div class="region-btn region-pref __kyusyu" id="kyusyu" onmouseover="mouseOver(event)" onmouseout="mouseOut(event)">
                                九州地方
                            </div>
                            
                            <div class="prefecture">
                                @foreach ($prefectures as $prefecture)
                                    @if ($prefecture->id >= 40 && $prefecture->id <= 47)
                                        <form method="get" action="/places/search">
                                            <input type="hidden" name="prefecture" value="{{ $prefecture->id }}">
                                            <input class="pref-name" type="submit" value="{{ $prefecture->name }}">
                                        </form>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                    <div class="sp-map">
                        <form method="get" action="/places/search">
                            <select class="select-box" name="prefecture">
                                <option value="">都道府県を選択してください</option>
                                @foreach ( $prefectures as $prefecture )
                                    <option value={{ $prefecture->id }}>{{ $prefecture->name }}</option>
                                @endforeach
                            </select>
                            
                            <input class="search-btn" type="submit" value="検索"/>
                        </form>
                    </div>
                </section>
                
                <section class="category" id="category">
                    <div id="category-pos" class="pos"> </div>
                    
                    <p class="section-ttl">カテゴリから探す</p>
                    
                    <div class="category-frame">
                        <div class="category-wrap">
                            <p class="category-ttl">飲食店</p>
                            <ul class="category-list">
                                @foreach ($categories as $category)
                                    @if ($category->id >= 1 && $category->id <= 19)
                                        <li class="category-item">
                                            <form method="get" action="/places/search">
                                                <input type="hidden" name="category" value="{{ $category->id }}">
                                                <input class="category-name" type="submit" value="{{ $category->name }}">
                                            </form>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                            
                            <div class="sp-category-list">
                                <form method="get" action="/places/search">
                                    <select class="select-box" name="category">
                                        <option value="">カテゴリーを選択してください</option>
                                        
                                        @foreach ($categories as $category)
                                            @if ($category->id >= 1 && $category->id <= 19)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    
                                    <input class="search-btn" type="submit" value="検索"/>
                                </form>
                            </div>
                            
                            <p class="category-ttl">レジャー施設</p>
                            <ul class="category-list">
                                @foreach ($categories as $category) 
                                    @if ($category->id >= 20 && $category->id <= 28)
                                        <li class="category-item">
                                            <form method="get" action="/places/search">
                                                <input type="hidden" name="category" value="{{ $category->id }}">
                                                <input class="category-name" type="submit" value="{{ $category->name }}">
                                            </form>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                            
                            <div class="sp-category-list">
                                <form method="get" action="/places/search">
                                    <select class="select-box" name="category">
                                        <option value="">カテゴリーを選択してください</option>
                                        
                                        @foreach ($categories as $category)
                                            @if ($category->id >= 20 && $category->id <= 28)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    
                                    <input class="search-btn" type="submit" value="検索"/>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
            
            <aside>
                <section class="profile">
                    @auth
                        <div class="icon-img-box">
                            @if (empty(Auth::user()->image))
                                <img src="/img/image.png">
                            @else
                                <img src="{{ Auth::user()->image }}">
                            @endif
                        </div>
                        <p>ログイン中のユーザー</p>
                        <p class="user-name">{{ Auth::user()->name }}</p>
                        <div class="mypage-btn">
                            <a href="/mypage/wants">マイページ</a>
                        </div>
                    @else
                        <div class="icon-img-box">
                            <img src="/img/image.png">
                        </div>
                        <p>ログイン中のユーザー</p>
                        <p class="user-name">ゲスト</p>
                        <a href="/login">ログイン</a>
                    @endauth
                </section>
                
                <section class="ranking" id="star">
                    <h2 class="ranking-head">おすすめスポットTOP3</h2>
                
                    <div class="places">
                        @foreach ($places as $place)
                            <div class="ranking-num">
                                <img src="/img/no{{ $loop->iteration }}.png">
                            </div>
                            
                            <div class="place">
                                <h3><a href="/places/{{ $place->id }}">{{ $place->name }}</a></h3>
                                <div>
                                    <star-rating 
                                    v-bind:increment="1"
                                    v-bind:star-size="25"
                                    :rating="{{ $place->score }}"
                                    :read-only="true"
                                    ></star-rating>
                                </div>
                                <p class="place-address">{{$place->prefecture->name }}{{ $place->address }}</p>
                            </div>
                        @endforeach
                    </div>
                
                    <a class="more-ranking" href="/places/ranking?page=1">おすすめスポットをもっと見る</a>
                </section>
            </aside>
        </div>
        @endsection
    </body>
</html>
