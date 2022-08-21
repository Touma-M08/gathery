<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gathery</title>
        <script src="{{asset('js/delete.js')}}"></script>
        <script src="{{asset('js/app.js')}}" defer></script>
    </head>
    <body>
        @extends("layouts/mypageFrame")
        @section("mypage-content")
        <div id="star">
            @foreach ($reviews as $review)
                <h2><a href="/places/{{ $review->place_id }}">{{ $review->place->name }}</a></h2>
                <p>{{ $review->title }}</p>
                <div>
                    <star-rating 
                    v-bind:increment="1"
                    v-bind:star-size="25"
                    :rating="{{ $review->score }}"
                    :read-only="true"
                    ></star-rating>
                </div>
                <p>{{ $review->comment }}</p>
                <a href="/reviews/{{ $review->id }}/edit">編集</a>
                <form id="form_{{ $review->id }}" method="POST" action="/reviews/{{ $review->id }}/{{$review->place->id }}">
                    @csrf
                    @method('delete')
                    <button type="button"　onclick="deleteReview({{ $review->id }}); return false;">削除</button>
                </form>
            @endforeach
        </div>
        @endsection
    </body>
</html>