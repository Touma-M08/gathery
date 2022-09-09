<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gathery</title>
        
        <link rel="stylesheet" href="{{asset('css/bbs/index.css')}}">
    </head>
    <body>
        @extends("layouts/header")
        @section("content")
        <div class="contents">
            @if (isset($wants))
                <h2 class="page-ttl">掲示板一覧</h2>
                <div class="places">
                    @foreach ($wants as $want)
                        <div class="place">
                            <div class="left-side">
                                <h3 class="place-name">{{ $want->place->name }}</h3>
                                <p>{{ $want->place->prefecture->name }}{{ $want->place->address }}</p>
                            </div>
                            
                            <div class="right-side">
                                <a class="border-btn" href="/bbses/{{ $want->place->id }}">
                                    掲示板に移動
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p>行きたい！登録をすると掲示板が利用可能になります</p>
                <h3 class="rank">レビューランキングTOP5</h3>
                <div class="places">
                    @foreach ($places as $place)
                        <div class="place">
                            <div class="left-side">
                                <h3><a class="place-name" href="/places/{{ $place->id }}">{{ $place->name }}</a></h3>
                            
                                <p class="place-address">{{$place->prefecture->name }}{{ $place->address }}</p>
                            </div>
                            
                            <div class="right-side">
                                @auth
                                    <form method="POST" action="/wants/{{ $place->id }}">
                                        @csrf
                                        <input class="want-btn border-btn" type="submit" name="want_bbs" value="行きたい！">
                                    </form>
                                    
                                @else
                                    <a href="/login" class="want-btn border-btn">行きたい！</a>
                                @endauth
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
        @endsection
    </body>
</html>