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
        <section class="schedule">
            <p class="section-ttl">予定一覧</p>
            <ul>
                <li>
                    ○○○○○○○○
                </li>
            </ul>
        </section>
        @endsection
    </body>
</html>