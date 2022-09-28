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
            <div class="search-word __normal">
                <div>
                    @if (isset($key_name)) <p>場所:<span>{{ $key_name }}</span></p> @endif
                    
                    <div class="flex">
                        @if (isset($pref)) <p>都道府県:<span>{{ $pref->name }}</span></p> @endif
                        @if (isset($key_city)) <p>市区町村:<span>{{ $key_city }}</span></p> @endif
                        @if (isset($cat)) <p>カテゴリー:<span>{{ $cat->name }}</span></p> @endif
                    </div>
                </div>
                
                @auth
                    <div class="create-btn-pos">
                        <a class="link-btn" href="/places/create">場所の新規登録</a>
                    </div>
                @endauth
            </div>
            
            <div class="search-word __sp">
                <div>
                    @if (isset($key_name)) <p>場所:<span>{{ $key_name }}</span></p> @endif
                    @if (isset($cat)) <p>カテゴリー:<span>{{ $cat->name }}</span></p> @endif
                    
                    <div class="flex">
                    @if (isset($pref)) <p>都道府県:<span>{{ $pref->name }}</span></p> @endif
                    @if (isset($key_city)) <p>市区町村:<span>{{ $key_city }}</span></p> @endif
                    </div>
                </div>
            </div>
            
             {{-- 検索 --}}
            <div class="search __normal">
                <form method="get" action="/places/search">
                    @csrf
                    <div class="search-box">
                        <div>
                            <p>場所名</p>
                            <input class="input" type="search" name="name">
                        </div>
                        
                        <div>
                            <p>都道府県</p>
                            <select class="input" name="prefecture">
                                <option value="">都道府県を選択</option>
                                @foreach ($prefectures as $prefecture)
                                    <option value="{{ $prefecture->id }}">{{ $prefecture->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div>
                            <p>市区町村</p>
                            <input class="input" type="search" name="city">
                        </div>
                        
                        <div>
                            <p>カテゴリー</p>
                            <select class="input" name="category">
                                <option value="">カテゴリーを選択</option>
                                @foreach ($foodCategories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                                @foreach ($leisureCategories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="btn-position">
                        <input class="link-btn" type="submit" value="絞り込む"></input>
                    </div>
                </form>
            </div>
            
            
            <div class="search __sp">
                <form method="get" action="/places/search">
                    @csrf
                    <div class="search-box">
                        <div class="w100">
                            <p>場所名</p>
                            <input class="input" type="search" name="name">
                        </div>
                        
                        <div class="w100">
                            <p>カテゴリー</p>
                            <select class="input" name="category">
                                <option value="">カテゴリーを選択</option>
                                @foreach ($foodCategories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                                @foreach ($leisureCategories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div>
                            <p>都道府県</p>
                            <select class="input" name="prefecture">
                                <option value="">都道府県を選択</option>
                                @foreach ($prefectures as $prefecture)
                                    <option value="{{ $prefecture->id }}">{{ $prefecture->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div>
                            <p>市区町村</p>
                            <input class="input" type="search" name="city">
                        </div>
                    </div>
                    <div class="btn-position">
                        <input class="link-btn" type="submit" value="絞り込む"></input>
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
                            <a class="card" href="/places/{{ $place->id }}">
                                <h2 class="title">{{ $place->name }}</h2>
                                <p>{{ $place->category->name }}</p>
                                <p><span>{{ $place->prefecture->name }}</span><span>{{ $place->address }}</span></p>
                            </a>
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