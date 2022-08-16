<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gathery</title>
        <script src="{{asset('js/delete.js')}}"></script>
    </head>
    <body>
        @extends("layouts/mypageFrame")
        @section("mypage-content")
        <div>
            @foreach ($reviews as $review)
                <h2><a href="/places/{{ $review->place_id }}">{{ $review->place->name }}</a></h2>
                <p>{{ $review->score }}</p>
                <p>{{ $review->title }}</p>
                <p>{{ $review->comment }}</p>
                @if ($review->user->id == Auth::user()->id)
                <form method="POST" action="/review/{{ $review->id }}/{{$review->place->id }}">
                    @csrf
                    @method('delete')
                    <input type="submit" onclick="deleteReview({{ $review->id }})" value="削除"></input>
                </form>
            @endif
            @endforeach
        </div>
        @endsection
    </body>
</html>