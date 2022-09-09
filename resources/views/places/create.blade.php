<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gathery</title>
        <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/load.css')}}">
        <link rel="stylesheet" href="{{asset('css/place/create.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
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
        
        <div class="header-bg">
            <div class="top">
                <h1 class="site-logo">
                    <a href="{{ url('/') }}">Gathery</a>
                </h1>
            </div>
        </div>
        
        <div class="contents">
            <a class="back-btn" href="/places/search">
                <i class="fa-solid fa-arrow-left"></i>検索ページに戻る
            </a>
            
            <h2 class="section-ttl">新規場所登録</h2>
            
            <div class="search">
                <div class="left-side">
                    <p>登録したい場所を入力してください</p>
                    <div class="flex">
                        <input class="input" type="text" id="keyword">
                        <button class="search-btn" id="search">検索実行</button>
                    </div>
                    <p class="errors">{{ $errors->first('place.name') }}</p>
                    
                    <div id="map"></div>
                </div>
                
                <div class="right-side">
                    <h3>登録内容</h3>
                    <form action="/places" method="POST">
                        @csrf
                        <div class="place-contents">
                            <p>場所:</p>
                            <div id="show-name">{{ old('place.name') }}</div>
                        </div>
                        
                        <div class="place-contents">
                            <p>カテゴリー:</p>
                            <select class="input" id="category" name="place[category_id]">
                                <option value="">カテゴリーを選択してください</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select><br>
                            <p class="errors">{{ $errors->first('place.category_id') }}</p>
                        </div>
                        
                        <div class="place-contents">
                            <p>住所:</p>
                            <div class="address">
                                <div id="show-region">{{ old('region') }}</div>
                                <div id="show-street-address">{{ old('place.address') }}</div>
                            </div>
                        </div>
                        
                        <div class="place-contents">
                            <p>電話番号:</p>
                            <div id="show-phone-number">{{ old('tel') }}</div>
                        </div>
                        
                        <div class="place-contents __open">
                            <p>営業時間:</p>
                            <div id="show-hours-0">{{ old('place.time_mon') }}</div>
                            <div id="show-hours-1">{{ old('place.time_tue') }}</div>
                            <div id="show-hours-2">{{ old('place.time_wed') }}</div>
                            <div id="show-hours-3">{{ old('place.time_thu') }}</div>
                            <div id="show-hours-4">{{ old('place.time_fri') }}</div>
                            <div id="show-hours-5">{{ old('place.time_sat') }}</div>
                            <div id="show-hours-6">{{ old('place.time_sun') }}</div>
                        </div>
                    
                    {{-- 送信用 --}}
                        <input type="hidden" name="place[name]" id="name" value="{{ old('place.name') }}" >
                        <div id="address" hidden></div>
                        <input type="hidden" name="region" id="region" value="{{ old('region') }}">
                        <input type="hidden" name="place[address]" id="street-address" value="{{ old('place.address') }}">
                        
                        <input type="hidden" name="tel" id="phone-number" value="{{ old('tel') }}">
                        
                        <input type="hidden" name="place[time_mon]" id="hours-0" value="{{ old('place.time_mon') }}">
                        <input type="hidden" name="place[time_tue]" id="hours-1" value="{{ old('place.time_tue') }}">
                        <input type="hidden" name="place[time_wed]" id="hours-2" value="{{ old('place.time_wed') }}">
                        <input type="hidden" name="place[time_thu]" id="hours-3" value="{{ old('place.time_thu') }}">
                        <input type="hidden" name="place[time_fri]" id="hours-4" value="{{ old('place.time_fri') }}">
                        <input type="hidden" name="place[time_sat]" id="hours-5" value="{{ old('place.time_sat') }}">
                        <input type="hidden" name="place[time_sun]" id="hours-6" value="{{ old('place.time_sun') }}">
              
                        <input type="hidden" name="place[lat]" id="lat" value="{{ old('place.lat') }}">
                        <input type="hidden" name="place[lng]" id="lng" value="{{ old('place.lng') }}">
                    
                        <input class="store-btn" type="submit" value="保存">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>