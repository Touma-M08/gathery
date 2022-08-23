<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gathery</title>
        
        <script src="{{asset('js/app.js')}}" defer></script>
    </head>
    <body>
        @extends("layouts/mypageFrame")
        @section("mypage-content")
        <div>
            <h2>レビュー</h3>
            <h3>{{ $review->place->name }}</h3>
            <form method="post" action="/reviews/{{ $review->id }}/{{$review->place->id }}">
                @csrf
                @method('put')
                <p>タイトル</p>
                <input type="text" name="review[title]" value="{{ $review->title }}">
                <p>{{ $errors->first('review.title') }}</p>
                
                <p>本文</p>
                <textarea name="review[comment]">{{ $review->comment }}</textarea>
                <p>{{ $errors->first('review.comment') }}</p>
    
                <p>評価</p>
                <div id="star">
                    <star-rating 
                    @rating-selected ="setRating"
                    v-bind:increment="1"
                    v-bind:star-size="50"
                    :rating="{{ $review->score }}"
                    :show-rating="true"></star-rating>
                    <input type="hidden" :value="this.rating" name="score">
                </div>
                
                <input type="submit" value="送信">
            </form>
        </div>
        
        <script>
            
        </script>
        @endsection
    </body>
</html>