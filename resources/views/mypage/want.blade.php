<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gathery</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{asset('css/mypage.css')}}">
    </head>
    <body>
        @extends("layouts/mypageFrame")
        @section("mypage-content")
        <section class="want">
            <p class="section-ttl">行きたい！一覧</p>
            <ul>
                <li>
                    <a href="">
                        <div class="img-box">
                            <img src="/img/place.jpg">
                        </div>
                    
                        <p><span>1.</span>○○○○○○○</p>
                    </a>
                </li>
            </ul>
        </section>
        @endsection
    </body>
</html>