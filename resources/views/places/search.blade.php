<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gathery</title>
        
        <link rel="stylesheet" href="{{asset('css/place/search.css')}}">
    </head>
    <body>
        @extends("layouts/searchHeader")
        @section("content")
        <div class="contents">
            {{-- 検索内容表示 --}}
            <div class="search-word">
                <div>
                    @if (isset($key_name)) <p>場所:{{ $key_name }}</p> @endif
                    
                    <div class="flex">
                        @if (isset($pref)) <p>都道府県:{{ $pref->name }}</p> @endif
                        @if (isset($key_city)) <p>市区町村:{{ $key_city }}</p> @endif
                        @if (isset($cat)) <p>カテゴリー:{{ $cat->name }}</p> @endif
                    </div>
                </div>
                
                @auth
                    <div class="create-btn">
                        <a href="/places/create">場所の新規登録</a>
                    </div>
                @endauth
            </div>
            
             {{-- 検索 --}}
            <div class="search">
                <form method="get" action="/places/search">
                    @csrf
                    <div class="search-box">
                        <div>
                            <p>場所名</p>
                            <input type="search" name="name">
                        </div>
                        
                        <div>
                            <p>都道府県</p>
                            <select name="prefecture">
                                <option value="">都道府県を選択</option>
                                @foreach ($prefectures as $prefecture)
                                    <option value="{{ $prefecture->id }}">{{ $prefecture->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div>
                            <p>市区町村</p>
                            <input type="search" name="city">
                        </div>
                        
                        <div>
                            <p>カテゴリー</p>
                            <select name="category">
                                <option value="">カテゴリーを選択</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="btn-position">
                        <input class="search-btn" type="submit" value="絞り込む"></input>
                    </div>
                </form>
            </div>
            
             {{-- 検索結果 --}}
            <div class="places">
                @if ($places->isEmpty())
                    <p>場所が見つかりませんでした。</p>
                @else
                    @foreach ($places as $place)
                        <div class="place">
                            <h2 class="title"><a href="/places/{{ $place->id }}">{{ $place->name }}</a></h2>
                            <p>{{ $place->category->name }}</p>
                            <p><span>{{ $place->prefecture->name }}</span><span>{{ $place->address }}</span></p>
                        </div>
                    @endforeach
                @endif
            </div>
            
            <div class='paginate'>
                {{ $places->appends(request()->query())->links() }}
            </div>
            @endsection
        </div>
    </body>
</html>