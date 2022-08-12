<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gathery</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <script src="{{asset('js/showApi.js')}}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?lang=ja&key=AIzaSyA6Lp_xec2eOGHFfngrx1-o2-MGqV9DaFs&libraries=places&callback=initMap" async defer></script>
    </head>
    <body>
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

                <div class="tel">
                    <h3>電話番号</h3>
                    <p>{{ $place->tel }}</p>
                </div>
            </div>
        </div>
        
        <div id="map" style="height:450px; width:450px"></div>
        
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>