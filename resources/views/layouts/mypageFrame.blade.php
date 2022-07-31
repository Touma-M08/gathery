<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gathery</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{asset('css/main.css')}}">
        <link rel="stylesheet" href="{{asset('css/mypage.css')}}">
    </head>
    <body>
        @extends("layouts/app")
        @section("content")
        <div class="contents">
            <section class="profile">
                <img src="{{ auth::user()->image }}">
                <p>ログイン中のユーザー</p>
                <p>{{ auth::user()->name }}</p>
                <ul>
                    <li class="list-item">
                        <a href="/mypage">予定一覧</a>
                    </li>
                    <li class="list-item">
                        <a href="/mypage/want">行きたい！一覧</a>
                    </li>
                    <li class="list-item">
                        <a href="/mypage/evaluation">評価一覧</a>
                    </li>
                    <li class="list-item">
                        <a href="/mypage/dm">メンバーDM</a>
                    </li>
                    <li class="list-item">
                        <a href="/mypage/setting">設定</a>
                    </li>
                </ul>
            </section>
            @yield("mypage-content")
        </div>
        @endsection
    </body>
</html>