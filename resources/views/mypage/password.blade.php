<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gathery</title>
    </head>
    <body>
        @extends("layouts/mypageFrame")
        @section("mypage-content")
        <div class="setting">
            <a href="/mypage/setting">プロフィール</a>
            <p>パスワード</p>
        </div>
        
        <div>
            <form method="post" action="/setting/password">
                @csrf
                @method('put')
                <p>現在のパスワード</p>
                <input type="password" name="current_pass">
                <p>{{ $errors->first('current_pass') }}</p>
                
                <p>新しいパスワード</p>
                <input type="password" name="password">
                
                <p>新しいパスワード（確認用）</p>
                <input type="password" name="password_confirmation">
                <p>{{ $errors->first('password') }}</p>
                
                <input type="submit" value="送信">
            </form>
        </div>
        @endsection
    </body>
</html>