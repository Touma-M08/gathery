<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gathery</title>

        <link rel="stylesheet" href="{{asset('css/mypage/want.css')}}">
    </head>
    <body>
        @extends("layouts/mypageFrame")
        @section("mypage-content")
        <section class="main-content">
            <h2 class="section-ttl">行きたい！一覧</h2>
            <div class="wrap">
                @foreach ($wants as $want)
                    <div class="place">
                        <div class="place-detail">
                            <h3><a href="/places/{{ $want->place->id }}">{{ $want->place->name }}</a></h3>
                            <p>{{ $want->place->prefecture->name }}{{ $want->place->address }}</p>
                        </div>
                        
                        <div class="any-btn">
                            <a class="link-btn" href="/bbses/{{ $want->place->id }}">掲示板</a>
                            <a class="link-btn __review" href="/reviews/{{ $want->place->id }}">レビュー</a>
                            <form method="POST" action="/wants/{{ $want->id }}/{{ $want->place->id }}">
                                @csrf
                                @method('delete')
                                <input class="link-btn __delete" type="submit" name="want_mypage" value="削除"></input>
                            </form>
                        </div>
                    </div>
                @endforeach
                
                <div class="paginate">
                    {{ $wants->links() }}
                </div>
            </div>
            
        </section>
        @endsection
    </body>
</html>