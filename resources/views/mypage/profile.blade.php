<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gathery</title>
        
        <link rel="stylesheet" href="{{asset('css/mypage/profile.css')}}">
        <script src="{{asset('js/ageSet.js')}}" defer></script>
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
                    <p class="item-name">ユーザー名</p>
                    <input class="input" type="text" name="user[name]" value="{{ Auth::user()->name }}">
                    <p>{{ $errors->first('user.name') }}</p>
                	
                	<p class="item-name">年齢</p>
                	<div class="age-radio">
                	    @for ($i = 1; $i <= 9; $i += 1)
                    	    @if ($i == Auth::user()->age)
                                <input class="age-num" id="age-{{ $i }}" type="radio" name="user[age]" value="{{ $i }}" checked>
                                <label for="age-{{ $i }}">{{ $i }}0代</label>
                            @else
                                <input class="age-num" id="age-{{ $i }}" type="radio" name="user[age]" value="{{ $i }}">
                                <label for="age-{{ $i }}">{{ $i }}0代</label>
                            @endif
                        @endfor
                    </div>
                    
                    <div class="age-select">
                        <select name="user[age]" class="age-selectbox" id="age-select">
                            @for ($i = 1; $i <= 9; $i += 1)
                                @if ($i == Auth::user()->age)
                                    <option value="{{ $i }}" selected>{{ $i }}0代</option>
                                @else
                                    <option value="{{ $i }}">{{ $i }}0代</option>
                                @endif
                            @endfor
                        </select>
                    </div>
                    <p>{{ $errors->first('user.age') }}</p>
                    
                    <p class="item-name">性別</p>
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
                    
                    <p class="item-name">メールアドレス</p>
                    <input class="input" type="email" name="user[email]" value="{{ Auth::user()->email }}">
                    <p>{{ $errors->first('user.email') }}</p>
                    
                    <p class="item-name">アイコン</p>
                    <input class="image" type="file" name="image">
                    <p>{{ $errors->first('image') }}</p>
                    
                    <div class="btn-pos">
                        <input class="link-btn" type="submit" value="保存">
                    </div>
                </form>
            </div>
        </section>
        @endsection
    </body>
</html>