<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gathery</title>
        <link rel="stylesheet" href="{{asset('css/mypage/reviewIndex.css')}}">
        <script src="{{asset('js/delete.js')}}"></script>
        <script src="{{asset('js/app.js')}}" defer></script>
    </head>
    <body>
        @extends("layouts/mypageFrame")
        @section("mypage-content")
        <section class="main-content" id="star">
            <h2 class="section-ttl">評価一覧</h2>
            <div class="wrap">
                @foreach ($reviews as $review)
                    <div class="place">
                        <div class="place-detail">
                            <h3><a href="/places/{{ $review->place_id }}">{{ $review->place->name }}</a></h3>
                            <p>{{ $review->title }}</p>
                            <div>
                                <star-rating 
                                v-bind:increment="1"
                                v-bind:star-size="25"
                                :rating="{{ $review->score }}"
                                :read-only="true"
                                :show-rating="false"
                                ></star-rating>
                            </div>
                            <p>{{ $review->comment }}</p>
                        </div>
                        
                        <div class="any-btn">
                            <a class="link-btn __edit" href="/reviews/{{ $review->id }}/edit">編集</a>
                            <form id="form_{{ $review->id }}" method="POST" action="/reviews/{{ $review->id }}/{{$review->place->id }}">
                                @csrf
                                @method('delete')
                                <button class="link-btn" type="button"　onclick="deleteReview({{ $review->id }}); return false;">削除</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </dev>
        </section>
        @endsection
    </body>
</html>