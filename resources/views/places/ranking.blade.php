<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gathery</title>
        <link rel="stylesheet" href="{{asset('css/place/ranking.css')}}">
    </head>
    <body>
        @extends("layouts/header")
        @section("content")
        <div class="contents">
            <h2 class="section-ttl">ランキング</h2>
            
            <div class="places">
                @foreach ($places as $place)
                    <div class="place">
                        <div class="place-detail">
                            <a class="card" href="/places/{{ $place->id }}">
                                <p class="rank">{{ $loop->iteration }}</p>
                                
                                <div class="position">
                                    <h3>{{ $place->name }}</h3>
                                    <p>{{$place->prefecture->name }}{{ $place->address }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endsection
    </body>
</html>