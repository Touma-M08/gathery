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
        @if (isset($wants))
            @foreach ($wants as $want)
                <div class="want-place">
                    <a href="/bbses/{{ $want->place->id }}">
                        <div>{{ $want->place->name }}</div>
                        <p>{{ $want->place->prefecture->name }}{{ $want->place->address }}</p>
                    </a>
                </div>
            @endforeach
        @else
            <p>行きたい！登録をすると掲示板が利用可能になります</p>
            <p>↓↓↓現在のレビューランキングTOP5はこちら↓↓↓</p>
            <div class="places">
                @foreach ($places as $place)
                    <div class="place">
                        <div>
                            <h3><a href="/places/{{ $place->id }}">{{ $place->name }}</a></h3>
                        
                            <p class="place-address">{{$place->prefecture->name }}{{ $place->address }}</p>
                        </div>
                        
                        @auth
                            <form method="POST" action="/wants/{{ $place->id }}">
                                @csrf
                                <input class="showpage-btn want" type="submit" name="want_bbs" value="行きたい！">
                            </form>
                            
                        @else
                            <form method="POST" action="/wants/{{ $place->id }}">
                                @csrf
                                <input class="showpage-btn want" type="submit" value="行きたい！" disabled>
                            </form>
                            <p class="description">※ログイン後に行きたい！登録が可能になります</p>
                        @endauth
                    </div>
                @endforeach
            </div>
        @endif
        @endsection
    </body>
</html>