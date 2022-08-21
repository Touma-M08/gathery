<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gathery</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/load.css')}}">
        <script src="{{asset('js/loading.js')}}"></script>
        <script src="{{asset('js/createApi.js')}}"　defer></script>
        <script src="https://maps.googleapis.com/maps/api/js?lang=ja&key={{ config('app.api_key') }}&libraries=places&callback=initMap" async defer></script>
    </head>
    <body>
        <div id="loading">
            <div class="half-circle-spinner">
                <div class="circle circle-1"></div>
                <div class="circle circle-2"></div>
            </div>
        </div>
        
        <h2 class=section-ttl>新規場所登録</h2>
        <p>登録したい場所を入力してください</p>
        <input type="text" id="keyword" >
        <button id="search">検索実行</button>
        <p>{{ $errors->first('place.name') }}</p>
        
        <div id="map" style="height:300px; width:300px"></div>
        
        <form action="/places" method="POST">
            @csrf
            <p>場所</p>
            <div id="show-name"></div>
            
            <p>カテゴリー</p>
            <select id="category" name="place[category_id]">
                <option value="">カテゴリーを選択してください</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select><br>
            <p>{{ $errors->first('place.category_id') }}</p>
            
            <p>住所</p>
            <div id="show-region"></div>
            <div id="show-street-address"></div>
            
            <p>電話番号</p>
            <div id="show-phone-number"></div>
            
            <p>営業時間</p>
            <div id="show-hours-0"></div>
            <div id="show-hours-1"></div>
            <div id="show-hours-2"></div>
            <div id="show-hours-3"></div>
            <div id="show-hours-4"></div>
            <div id="show-hours-5"></div>
            <div id="show-hours-6"></div>
            
            {{-- 送信用 --}}
            <input type="hidden" name="place[name]" id="name" value="" >
            <div id="address" hidden></div>
            <input type="hidden" name="region" id="region" value="" >
            <input type="hidden" name="place[address]" id="street-address" value="" >
            
            <input type="hidden" name="tel" id="phone-number" value="" >
            
            <input type="hidden" name="place[time_mon]" id="hours-0" value="" >
            <input type="hidden" name="place[time_tue]" id="hours-1" value="" >
            <input type="hidden" name="place[time_wed]" id="hours-2" value="" >
            <input type="hidden" name="place[time_thu]" id="hours-3" value="" >
            <input type="hidden" name="place[time_fri]" id="hours-4" value="" >
            <input type="hidden" name="place[time_sat]" id="hours-5" value="" >
            <input type="hidden" name="place[time_sun]" id="hours-6" value="" >
  
            <input type="hidden" name="place[lat]" id="lat" value="" >
            <input type="hidden" name="place[lng]" id="lng" value="" >
            
            <input type="submit" value="保存">
        </form>
        <a href="/places/search">戻る</a>
    </body>
</html>