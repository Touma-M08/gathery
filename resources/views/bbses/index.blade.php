<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Gathery</title>
        <script src="{{asset('js/delete.js')}}"></script>
    </head>
    <body>
        @extends("layouts/app")
        @section("content")
        @foreach ($comments as $comment)
            <p>{{ $comment->user->name }}</p>
            <p>{{ $comment->comment }}</p>
            @if ($comment->user->id == Auth::user()->id)
                <form method="POST" action="/comment/{{ $comment->id }}/{{ $comment->place->id }}">
                    @csrf
                    @method('delete')
                    <input type="submit" onclick="deleteComment({{ $comment->id }})" value="削除"></input>
                </form>
            @endif
        @endforeach
        
        <div class='paginate'>
            {{ $comments->links() }}
        </div>
        
        <p>{{ $errors->first('comment') }}</p>
        <form method="post" action="/bbses/{{ $place->id }}">
            @csrf
            <textarea name="comment"></textarea>
            <input type="submit" value="送信"></input>
        </form>
        @endsection
    </body>
</html>