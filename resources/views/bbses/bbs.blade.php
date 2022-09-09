<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Gathery</title>
        <link rel="stylesheet" href="{{asset('css/bbs/bbs.css')}}">
        <script src="{{asset('js/delete.js')}}"></script>
    </head>
    <body>
        @extends("layouts/header")
        @section("content")
        
        <div class="contents">
            <div class="place-name">
                <h2>掲示板：{{ $place->name }}</h2>
            </div>
            
            <div class="comments">
                @foreach ($comments as $comment)
                    <div class="flex">
                        <div class="comment-content">
                            <div class="name">
                                <div class="icon-img-box">
                                    @if (empty($comment->user->image))
                                        <img src="/img/image.png">
                                    @else
                                        <img src="{{ $comment->user->image }}">
                                    @endif
                                </div>
                                <p>{{ $comment->user->name }}</p>
                            </div>
                            
                            <p class="comment">{{ $comment->comment }}</p>
                            
                            <p class="date-time">{{ $comment->updated_at->format('Y/m/d H:m:s') }}</p>
                        </div>
                        
                        
                        @if ($comment->user->id == Auth::user()->id)
                            <div class="delete-btn">
                                <form id="form_{{ $comment->id }}" method="POST" action="/comment/{{ $comment->id }}/{{ $comment->place->id }}">
                                    @csrf
                                    @method('delete')
                                    <button class="border-btn __delete" type="button" onclick="deleteComment({{ $comment->id }}); return false;">削除</button>
                                </form>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
            
            <div class='paginate'>
                {{ $comments->links() }}
            </div>
            
            <h3 class="comment-space">コメントを投稿する</h3>
            <p>{{ $errors->first('comment') }}</p>
            <form class="input-comment" method="post" action="/bbses/{{ $place->id }}">
                @csrf
                <textarea class="text" name="comment"></textarea>
                <div class="btn-pos">
                    <input class="border-btn" type="submit" value="送信"></input>
                </div>
            </form>
        </div>
        @endsection
        
    </body>
</html>