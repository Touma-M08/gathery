<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gathery</title>
        
        <link rel="stylesheet" href="{{asset('css/mypage/review.css')}}">
        <script src="{{asset('js/app.js')}}" defer></script>
    </head>
    <body>
        @extends("layouts/mypageFrame")
        @section("mypage-content")
        <section class="main-content">
            <h2 class="section-ttl">レビュー</h2>
            
            <div class="wrap">
                <h3>{{ $review->place->name }}</h3>
                <form method="post" action="/reviews/{{ $review->id }}/{{$review->place->id }}">
                    @csrf
                    @method('put')
                    <p class="item-name">タイトル</p>
                    @if ($errors->isEmpty())
                        <input class="input" type="text" name="review[title]" value="{{ $review->title }}">
                        
                        <p class="item-name">本文</p>
                        <textarea class="input" name="review[comment]">{{ $review->comment }}</textarea>
                    @else
                        <input class="input" type="text" name="review[title]" value="{{ old('review.title') }}">
                        <p>{{ $errors->first('review.title') }}</p>
                        
                        <p class="item-name">本文</p>
                        <textarea class="input" name="review[comment]">{{ old('review.comment') }}</textarea>
                        <p>{{ $errors->first('review.comment') }}</p>
                    @endif
                    
                    <p class="item-name">評価</p>
                    <div id="star">
                        <star-rating 
                        @rating-selected ="setRating"
                        v-bind:increment="1"
                        v-bind:star-size="50"
                        :rating="{{ $review->score }}"
                        :show-rating="true"></star-rating>
                        <input type="hidden" :value="this.rating" name="score">
                    </div>
                    
                    <div class="btn-pos">
                        <input class="link-btn" type="submit" value="送信">
                    </div>
                </form>
            </div>
        </section>
        
        <script>
            
        </script>
        @endsection
    </body>
</html>