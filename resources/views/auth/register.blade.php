@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">新規登録</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row border">
                            <label for="name" class="col-md-4 col-form-label text-md-right">ユーザー名</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror input" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row border">
                            <label for="age" class="col-md-4 col-form-label text-md-right">年齢</label>

                            <div class="col-md-6">
                                @for ($i = 1; $i <= 9; $i += 1)
                                    <input id="age-{{ $i }}" type="radio" name="age" value="{{ $i }}"><label for="age-{{ $i }}">{{ $i }}0代</label>
                                @endfor
                                
                                <p class="errors">{{ $errors->first('age') }}</p>
                            </div>
                        </div>
                        
                        <div class="form-group row border">
                            <span class="col-md-4 col-form-label text-md-right">性別</span>

                            <div class="col-md-6">
                                <input id="male" type="radio" name="sex" value="0"><label for="male">男性</label>
                                <input id="female" type="radio" name="sex" value="1"><label for="female">女性</label>
                                <input id="other" type="radio" name="sex" value="2"><label for="other">その他</label>
                            </div>
                            </br>
                            <p class="errors">{{ $errors->first('sex') }}</p>
                        </div>

                        <div class="form-group row border">
                            <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror input" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row border">
                            <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror input" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row border">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">パスワード（再入力）</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control input" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">アイコン画像</label>

                            <div class="col-md-6">
                                <!-- アップロードフォームの作成 -->
                                <input type="file" name="image">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="border-btn btn-primary">
                                    登録
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
