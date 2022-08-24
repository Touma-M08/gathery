<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gathery</title>
        
        <link rel="stylesheet" href="{{asset('css/mypage/profile.css')}}">
    </head>
    <body>
        @extends("layouts/mypageFrame")
        @section("mypage-content")
        
        @if (session('flash_message'))
            <div class="alert alert-success">
                {{ session('flash_message') }}
            </div>
        @endif
        <section class="main-content">
            <h2 class="section-ttl">設定</h2>
            
            <div class="setting">
                <a href="/mypage/setting">プロフィール</a>
                <p class="pass">パスワード</p>
            </div>
            
            <div class="wrap">
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
                    
                    <input class="link-btn" type="submit" value="保存">
                </form>
            </div>
        </section>
        @endsection
    </body>
</html>