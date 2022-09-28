<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gathery</title>
        
        <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    </head>
    <body>
        @extends("layouts/app")
        @section("content")
        <div class="content">
            <ul>
                <li>
                    <a href="/admin">カテゴリー追加</a>
                </li>
                
                <li>
                    <a href="/admin/place">場所情報変更</a>
                </li>
            </ul>
            
            <h3>飲食店</h3>
            <div class="category">
                @foreach( $foodCategories as $foodCat )
                    <p>{{ $foodCat->name }}</p>
                @endforeach
            </div>
            
            <h3>レジャー施設</h3>
            <div class="category">
                @foreach( $leisureCategories as $leisureCat )
                    <p>{{ $leisureCat->name }}</p>
                @endforeach
            </div>
            
            <div class="content-item">
                <h3>カテゴリー追加</h3>
                <form action="/admin/category" method="post">
                    @csrf
                    <p>カテゴリー名</p>
                    <input type="text" name="name" class="input-area mt0">
                    <p class="errors">{{ $errors->first('name') }}</p>
                    
                    <p class="type">種類</p>
                    <select name="type" class='input-area mt0'>
                        <option value="" disabled selected>選択</option>
                        <option value=1>飲食店</option>
                        <option value=2>レジャー施設</option>
                    </select>
                    <p class="errors">{{ $errors->first('type') }}</p>
                    
                    <input class="submit-btn" type="submit" value="保存">
                </form>
            </div>
        </div>
        @endsection
    </body>
</html>