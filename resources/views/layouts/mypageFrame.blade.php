<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gathery</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{asset('css/mypage/mypage.css')}}">
    </head>
    <body>
        @extends("layouts/header")
        @section("content")
        <div class="contents">
            <section class="profile">
                <div class="icon-img-box">
                    @if (empty(Auth::user()->image))
                        <img src="/img/image.png">
                    @else
                        <img src="{{ Auth::user()->image }}">
                    @endif
                </div>
                <p>ログイン中のユーザー</p>
                <p class="user-name">{{ auth::user()->name }}</p>
                <ul>
                    <li class="list-item">
                        <a href="/mypage/wants">行きたい！一覧</a>
                    </li>
                    <li class="list-item">
                        <a href="/mypage/reviews">レビュー一覧</a>
                    </li>
                    <li class="list-item">
                        <a href="/mypage/schedule?page=1">予定登録</a>
                    </li>
                    <li class="list-item">
                        <a href="/mypage/setting">設定</a>
                    </li>
                    
                    @if( Auth::user()->admin == 1 )
                        <li class="list-item">
                            <a href="/admin">管理者設定</a>
                        </li>
                    @endif
                </ul>
            </section>
            @yield("mypage-content")
        </div>
        @endsection
    </body>
</html>