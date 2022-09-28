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
            <div>
                <ul>
                    <li>
                        <a href="/admin">カテゴリー追加</a>
                    </li>
                    
                    <li>
                        <a href="/admin/place">場所情報変更</a>
                    </li>
                </ul>
                
                <div class="content-item">
                    <h3>編集</h3>
                    
                    <p>{{ $place->name }}</p>
                    <form action="/admin/{{ $place->id }}" method="post">
                        @csrf
                        @method('put')
                        <select name="place[category_id]" class="input-area">
                            @foreach($foodCategories as $category)
                                @if( $place->category_id == $category->id )
                                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                @else
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                            @endforeach
                            @foreach($leisureCategories as $category)
                                @if( $place->category_id == $category->id )
                                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                @else
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        
                        <input type="text" name="place[time_mon]" value="{{ $place->time_mon }}" class="input-area">
                        <input type="text" name="place[time_tue]" value="{{ $place->time_tue }}" class="input-area">
                        <input type="text" name="place[time_wed]" value="{{ $place->time_wed }}" class="input-area">
                        <input type="text" name="place[time_thu]" value="{{ $place->time_thu }}" class="input-area">
                        <input type="text" name="place[time_fri]" value="{{ $place->time_fri }}" class="input-area">
                        <input type="text" name="place[time_sat]" value="{{ $place->time_sat }}" class="input-area">
                        <input type="text" name="place[time_sun]" value="{{ $place->time_sun }}" class="input-area">
                        <input type="text" name="place[tel]" value="{{ $place->tel }}" class="input-area">
                        
                        <input class="submit-btn" type="submit" value="保存">
                    </form>
                </div>
            </div>
        </div>
        @endsection
    </body>
</html>