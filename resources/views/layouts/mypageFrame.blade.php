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
        @extends("layouts/header")
        @section("content")
        <div class="contents">
            <section class="profile">
                <img src="{{ auth::user()->image }}">
                <p>ログイン中のユーザー</p>
                <p>{{ auth::user()->name }}</p>
                <ul>
                    <li class="list-item">
                        <a href="/mypage/wants">行きたい！一覧</a>
                    </li>
                    <li class="list-item">
                        <a href="/mypage/reviews">評価一覧</a>
                    </li>
                    <li class="list-item">
                        <a href="/mypage/schedule">予定登録</a>
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