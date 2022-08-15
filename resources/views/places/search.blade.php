<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gathery</title>
        
    </head>
    <body>
        @extends("layouts/app")
        @section("content")
         {{-- 検索内容表示 --}}
        <div>
            @if (isset($key_name)) <p>場所:{{ $key_name }}</p> @endif
            @if (isset($pref)) <p>都道府県:{{ $pref->name }}</p> @endif
            @if (isset($key_city)) <p>市区町村:{{ $key_city }}</p> @endif
            @if (isset($cat)) <p>カテゴリー:{{ $cat->name }}</p> @endif
        </div>
        
         {{-- 検索 --}}
        <div class="search">
            <form method="get" action="/places/search">
                @csrf
                <div>
                    <input type="search" name="name">
                </div>
                
                <select name="prefecture">
                    <option value="">都道府県を選択</option>
                    @foreach ($prefectures as $prefecture)
                        <option value="{{ $prefecture->id }}">{{ $prefecture->name }}</option>
                    @endforeach
                </select>
                
                <div>
                    <input type="search" name="city">
                </div>
              
                <select name="category">
                    <option value="">カテゴリーを選択</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                
                <input type="submit" value="検索"></input>
            </form>
        </div>
        
        <a href="/places/create">新規作成</a>
        
         {{-- 検索結果 --}}
        <div class="place">
            @if ($places->isEmpty())
                <p>場所が見つかりませんでした。</p>
            @else
                @foreach ($places as $place)
                    <h2 class="title"><a href="/places/{{ $place->id }}">{{ $place->name }}</a></h2>
                    <p>{{ $place->category->name }}</p>
                    <p><span>{{ $place->prefecture->name }}</span><span>{{ $place->address }}</span></p>
                @endforeach
            @endif
        </div>
        
        <div class='paginate'>
            {{ $places->links() }}
        </div>
        @endsection
    </body>
</html>