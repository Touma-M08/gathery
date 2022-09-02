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
                            <a href="/bbses/{{ $want->place->id }}">
                                <div>{{ $want->place->name }}</div>
                                <p>{{ $want->place->prefecture->name }}{{ $want->place->address }}</p>
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <p>行きたい！登録をすると掲示板が利用可能になります</p>
                <h3>レビューランキングTOP5</h3>
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
                                    <input class="want-btn" type="submit" name="want_bbs" value="行きたい！">
                                </form>
                                
                            @else
                                <form method="POST" action="/wants/{{ $place->id }}">
                                    @csrf
                                    <input class="want-btn" type="submit" value="行きたい！" disabled>
                                </form>
                                <p class="description">※ログイン後に行きたい！登録が可能になります</p>
                            @endauth
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
        @endsection
    </body>
</html>