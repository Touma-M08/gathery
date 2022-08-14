<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gathery</title>
    </head>
    <body>
        @extends("layouts/app")
        @section("content")
        @foreach ($comments as $comment)
            <p>{{ $comment->user->name }}</p>
            <p>{{ $comment->comment }}</p>
        @endforeach
        
        <div class='paginate'>
            {{ $comments->links() }}
        </div>
        
        <form method="post" action="/bbses/{{ $place->id }}">
            @csrf
            <textarea name="comment"></textarea>
            <input type="submit" value="送信"></input>
        </form>
        @endsection
    </body>
</html>