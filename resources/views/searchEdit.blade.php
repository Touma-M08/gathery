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
            
            <div class="content-item">
                <h3>場所検索</h3>
                
                <form action="/admin/place" method="get">
                    @csrf
                    <input type="text" name="keyword" value="{{ $keyword }}" class="input-area">
                    
                    <input class="submit-btn" type="submit" value="検索">
                </form>
            </div>
            
            @if(isset($places))
                <div class="places">
                    @foreach( $places as $place )
                        <div class="place">
                            <a href='/admin/{{ $place->id }}/edit'>{{ $place->name }}</a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
        @endsection
    </body>
</html>