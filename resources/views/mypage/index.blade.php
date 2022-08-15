<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gathery</title>
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
            @endforeach
        </div>
        @endsection
    </body>
</html>