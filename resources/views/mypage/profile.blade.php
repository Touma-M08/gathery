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
            <p>プロフィール</p>
            <a href="/mypage/setting/password">パスワード</a>
        </div>
        
        <div>
            <form method="post" action="/setting" enctype="multipart/form-data">
                @csrf
                @method('put')
                <input type="text" name="user[name]" value="{{ Auth::user()->name }}">
                <p>{{ $errors->first('user.name') }}</p>
            	
                <input type="text" name="user[age]" value="{{ Auth::user()->age }}">
                <p>{{ $errors->first('user.age') }}</p>
                
                @if (Auth::user()->sex == "male")
                    <input type="radio" name="user[sex]" value="male" checked>male
                    <input type="radio" name="user[sex]" value="female">female
                @else
                    <input type="radio" name="user[sex]" value="male">male
                    <input type="radio" name="user[sex]" value="female" checked>female
                @endif
                <p>{{ $errors->first('user.sex') }}</p>
                
                <input type="email" name="user[email]" value="{{ Auth::user()->email }}">
                <p>{{ $errors->first('user.email') }}</p>
                
                <input type="file" name="image">
                
                <input type="submit" value="送信">
            </form>
        </div>
        @endsection
    </body>
</html>