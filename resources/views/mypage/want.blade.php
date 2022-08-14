<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gathery</title>

        <link rel="stylesheet" href="{{asset('css/mypage.css')}}">
    </head>
    <body>
        @extends("layouts/mypageFrame")
        @section("mypage-content")
        <section class="want">
            <p class="section-ttl">行きたい！一覧</p>
            <ul>
                @foreach ($wants as $want)
                    
                        <a href="/places/{{ $want->place->id }}">{{ $want->place->name }}</a></br>
                        <p style="display:inline-block">{{ $want->place->prefecture->name }}{{ $want->place->address }}</p>
                        
                        <a href="/bbses/{{ $want->place->id }}">掲示板</a>
                        <a href="/reviews/{{ $want->place->id }}">評価する</a></br>
                   
                @endforeach
            </ul>
        </section>
        @endsection
    </body>
</html>