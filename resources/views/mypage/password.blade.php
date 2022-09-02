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
                    <p class="item-name">現在のパスワード</p>
                    <input class="input" type="password" name="current_pass">
                    <p>{{ $errors->first('current_pass') }}</p>
                    
                    <p class="item-name">新しいパスワード</p>
                    <input class="input" type="password" name="password">
                    
                    <p class="item-name">新しいパスワード（確認用）</p>
                    <input class="input" type="password" name="password_confirmation">
                    <p>{{ $errors->first('password') }}</p>
                    
                    <div class="btn-pos">
                        <input class="link-btn" type="submit" value="保存">
                    </div>
                </form>
            </div>
        </section>
        @endsection
    </body>
</html>