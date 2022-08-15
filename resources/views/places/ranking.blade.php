<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gathery</title>
    </head>
    <body>
        <h2>ランキング</h2>
        @foreach ($places as $place)
            <p>{{ $loop->index + 1 }}</p>
            <h3><a href="/places/{{ $place->id }}">{{ $place->name }}</a></h3>
            <p>{{$place->prefecture->name }}{{ $place->address }}</p>
        @endforeach
    </body>
</html>