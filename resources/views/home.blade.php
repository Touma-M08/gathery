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
                <section class="name" id="name">
                    <p class="section-ttl">名称で探す</p>
                    <form>
                        <input type="text" style="border:1px solid black" />
                        <input type="submit" value="検索" />
                    </form>
                </section>
                
                <section class="area" id="area">
                    <p class="section-ttl">エリアから探す</p>
                    
                    <div class="map">
                        <div class="map-bg" id="map-bg"></div>
                        
                        <a href="" class="region-btn __hokkaido" id="hokkaido" onmouseover="mouseOver(event)" onmouseout="mouseOut(event)">
                            北海道
                        </a>
                        <div class="region-btn __tohoku" id="tohoku" onmouseover="mouseOver(event)" onmouseout="mouseOut(event)">
                            東北地方
                        </div>
                        <div class="region-btn __kanto" id="kanto" onmouseover="mouseOver(event)" onmouseout="mouseOut(event)">
                            関東地方
                        </div>
                        <div class="region-btn __chubu" id="chubu" onmouseover="mouseOver(event)" onmouseout="mouseOut(event)">
                            中部地方
                        </div>
                        <div class="region-btn __kinki" id="kinki" onmouseover="mouseOver(event)" onmouseout="mouseOut(event)">
                            近畿地方
                        </div>
                        <div class="region-btn __shikoku" id="shikoku" onmouseover="mouseOver(event)" onmouseout="mouseOut(event)">
                            四国地方
                        </div>
                        <div class="region-btn __chugoku" id="chugoku" onmouseover="mouseOver(event)" onmouseout="mouseOut(event)">
                            中国地方
                        </div>
                        <div class="region-btn __kyusyu" id="kyusyu" onmouseover="mouseOver(event)" onmouseout="mouseOut(event)">
                            九州地方
                        </div>
                    </div>
                </section>
                
                <section class="category" id="category">
                    <p class="section-ttl">カテゴリから探す</p>
                    
                    <div class="category-frame">
                        <ul>飲食店
                            <li class="category-ttl">
                                <a class="category-link" href="">カフェ</a>
                            </li>
                        </ul>
                        <ul>レジャー施設
                            <li class="category-ttl">
                                <a class="category-link" href="">遊園地</a>
                            </li>
                        </ul>
                        <ul>その他
                            <li class="category-ttl">
                                <a class="category-link" href="">フェス</a>
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
                        <a href="/mypage">マイページ</a>
                    </div>
                </section>
                
                <section class="ranking">
                    <p>おすすめスポットTOP3</p>
                    
                    <ul>
                        <li>
                            <a href="/post/">
                                <div class="img-box">
                                    <img src="/img/place.jpg">
                                </div>
                                <p><span>1.</span>○○○○○○○</p>
                            </a>
                        </li>
                    </ul>
                    
                    <a href="">おすすめスポットをもっと見る</a>
                </section>
            </aside>
        </div>
        @endsection
    </body>
</html>
