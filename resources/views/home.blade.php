<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gathery</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{asset('css/home.css')}}">
        <script src="{{asset('js/home.js')}}" defer></script>
    </head>
    <body>
        @extends("layouts/app")
        @section("content")
        <div class="contents">
            <main>
                <a href="places/create">新規作成</a>
                <section class="name" id="name">
                    <p class="section-ttl">名称で探す</p>
                    <form method="get" action="/places/search">
                        <input type="search" name="name"/>
                        <input type="submit" value="検索" />
                    </form>
                </section>
                
                <section class="area" id="area">
                    <p class="section-ttl">エリアから探す</p>
                    
                    <div class="map">
                        <div class="map-bg" id="map-bg"></div>
                        
                        <div>
                            @foreach ($prefectures as $prefecture)
                                @if ($prefecture->id == 1)
                                    <form method="get" action="/places/search">
                                        <input type="hidden" name="prefecture" value="{{ $prefecture->id }}"></input>
                                        <input type="submit" value="{{ $prefecture->name }}" class="region-btn __hokkaido" id="hokkaido" onmouseover="mouseOver(event)" onmouseout="mouseOut(event)"></input>
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
                                            <input type="hidden" name="prefecture" value="{{ $prefecture->id }}"></input>
                                            <input type="submit" value="{{ $prefecture->name }}"></input>
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
                                            <input type="hidden" name="prefecture" value="{{ $prefecture->id }}"></input>
                                            <input type="submit" value="{{ $prefecture->name }}"></input>
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
                                            <input type="hidden" name="prefecture" value="{{ $prefecture->id }}"></input>
                                            <input type="submit" value="{{ $prefecture->name }}"></input>
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
                                            <input type="hidden" name="prefecture" value="{{ $prefecture->id }}"></input>
                                            <input type="submit" value="{{ $prefecture->name }}"></input>
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
                                            <input type="hidden" name="prefecture" value="{{ $prefecture->id }}"></input>
                                            <input type="submit" value="{{ $prefecture->name }}"></input>
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
                                            <input type="hidden" name="prefecture" value="{{ $prefecture->id }}"></input>
                                            <input type="submit" value="{{ $prefecture->name }}"></input>
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
                                            <input type="hidden" name="prefecture" value="{{ $prefecture->id }}"></input>
                                            <input type="submit" value="{{ $prefecture->name }}"></input>
                                        </form>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
                
                <section class="category" id="category">
                    <p class="section-ttl">カテゴリから探す</p>
                    
                    <div class="category-frame">
                        <ul>飲食店
                            <li class="category-ttl">
                                @foreach ($categories as $category) 
                                    @if ($category->id >= 1 && $category->id <= 19)
                                        <form method="get" action="/places/search">
                                            <input type="hidden" name="category" value="{{ $category->id }}"></input>
                                            <input type="submit" value="{{ $category->name }}"></input>
                                        </form>
                                    @endif
                                @endforeach
                            </li>
                        </ul>
                        <ul>レジャー施設
                            <li class="category-ttl">
                                @foreach ($categories as $category) 
                                    @if ($category->id >= 20 && $category->id <= 28)
                                        <form method="get" action="/places/search">
                                            <input type="hidden" name="category" value="{{ $category->id }}"></input>
                                            <input type="submit" value="{{ $category->name }}"></input>
                                        </form>
                                    @endif
                                @endforeach
                            </li>
                        </ul>
                        <ul>その他
                            <li class="category-ttl">
                                @foreach ($categories as $category) 
                                    @if ($category->id >= 29 && $category->id <= 31)
                                        <form method="get" action="/places/search">
                                            <input type="hidden" name="category" value="{{ $category->id }}"></input>
                                            <input type="submit" value="{{ $category->name }}"></input>
                                        </form>
                                    @endif
                                @endforeach
                            </li>
                        </ul>
                    </div>
                </section>
            </main>
            
            <aside>
                <section class="profile">
                    <img src="{{ Auth::user()->image }}">
                    <p>ログイン中のユーザー</p>
                    <p>{{ Auth::user()->name }}</p>
                    <div class="mypage-btn">
                        <a href="/mypage/wants">マイページ</a>
                    </div>
                </section>
                
                <section class="ranking">
                    <p>おすすめスポットTOP3</p>
                    
                    @foreach ($places as $place)
                        <p>{{ $loop->index + 1 }}</p>
                        <h3>{{ $place->name }}</h3>
                        <p>{{$place->prefecture->name }}{{ $place->address }}</p>
                    @endforeach
                    
                    <a href="/places/ranking">おすすめスポットをもっと見る</a>
                </section>
            </aside>
        </div>
        @endsection
    </body>
</html>
