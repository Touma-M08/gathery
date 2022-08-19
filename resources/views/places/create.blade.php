<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gathery</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <script src="{{asset('js/createApi.js')}}"　defer></script>
        <script src="https://maps.googleapis.com/maps/api/js?lang=ja&key=AIzaSyA6Lp_xec2eOGHFfngrx1-o2-MGqV9DaFs&libraries=places&callback=initMap" async defer></script>
    </head>
    <body>
        <h2 class=section-ttl>新規場所登録</h2>
        <input type="text" id="keyword" >
        <button id="search">検索実行</button>
        <div id="map" style="height:300px; width:300px"></div>
        
        <form action="/places" method="POST">
            @csrf
            <input type="text" name="place[name]" id="name" value="" ><br>
          
            <select id="category" name="place[category_id]">
                <option value="">カテゴリーを選択してください</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select><br>
            
            <div id="address" style="display:none"></div><br>
            <input type="text" name="region" id="region" value="" ><br>
            <input type="text" name="place[address]" id="street-address" value="" ><br>
            
            <input type="text" name="tel" id="phone-number" value="" ><br>
            
            <input type="text" name="place[time_mon]" id="hours-0" value="" ><br>
            <input type="text" name="place[time_tue]" id="hours-1" value="" ><br>
            <input type="text" name="place[time_wed]" id="hours-2" value="" ><br>
            <input type="text" name="place[time_thu]" id="hours-3" value="" ><br>
            <input type="text" name="place[time_fri]" id="hours-4" value="" ><br>
            <input type="text" name="place[time_sat]" id="hours-5" value="" ><br>
            <input type="text" name="place[time_sun]" id="hours-6" value="" ><br>
  
            <input type="hidden" name="place[lat]" id="lat" value="" ><br>
            <input type="hidden" name="place[lng]" id="lng" value="" ><br>
            
            <input type="submit" value="保存">
        </form>
        <a href="/places/search">戻る</a>
    </body>
</html>