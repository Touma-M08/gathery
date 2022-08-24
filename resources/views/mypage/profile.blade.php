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
                <p>プロフィール</p>
                <a class="pass" href="/mypage/setting/password">パスワード</a>
            </div>
        
            <div class="wrap">
                <form method="post" action="/setting" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <input type="text" name="user[name]" value="{{ Auth::user()->name }}">
                    <p>{{ $errors->first('user.name') }}</p>
                	
                	@for ($i = 1; $i <= 9; $i += 1)
                	    @if ($i == Auth::user()->age)
                            <input id="age-{{ $i }}" type="radio" name="user[age]" value="{{ $i }}" checked>
                            <label for="age-{{ $i }}">{{ $i }}0代</label>
                        @else
                            <input id="age-{{ $i }}" type="radio" name="user[age]" value="{{ $i }}">
                            <label for="age-{{ $i }}">{{ $i }}0代</label>
                        @endif
                    @endfor
                    <p>{{ $errors->first('user.age') }}</p>
                    
                    @for ($i = 0; $i <= 2; $i++)
                        @if (Auth::user()->sex == $i)
                            <input type="radio" id="{{ $sex[$i] }}" name="user[sex]" value="{{ $i }}" checked>
                            <label for="{{ $sex[$i] }}">{{ $sex[$i] }}</label>
                        @else
                            <input type="radio" id="{{ $sex[$i] }}" name="user[sex]" value="{{ $i }}">
                            <label for="{{ $sex[$i] }}">{{ $sex[$i] }}</label>
                        @endif
                    @endfor
                    <p>{{ $errors->first('user.sex') }}</p>
                    
                    <input type="email" name="user[email]" value="{{ Auth::user()->email }}">
                    <p>{{ $errors->first('user.email') }}</p>
                    
                    <input class="image" type="file" name="image">
                    <p>{{ $errors->first('image') }}</p>
                    
                    <input class="link-btn" type="submit" value="保存">
                </form>
            </div>
        </section>
        @endsection
    </body>
</html>