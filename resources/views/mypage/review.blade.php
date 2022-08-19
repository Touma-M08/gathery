<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gathery</title>

        <link rel="stylesheet" href="{{asset('css/mypage.css')}}">
    </head>
    <body>
        <h2>レビュー</h3>
        <h3>{{ $place->name }}</h3>
        <form method="post" action="/reviews/{{ $place->id }}">
            @csrf
            <p>タイトル</p>
            <input type="text" name="review[title]">
            <p>{{ $errors->first('review.title') }}</p>
            <p>本文</p>
            <textarea name="review[comment]"></textarea>
            <p>{{ $errors->first('review.comment') }}</p>

            <p>スコア：大きいほど高評価</p>
            <select name="review[score]">
                 @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
            <p>{{ $errors->first('review.score') }}</p>
            
            <input type="submit" value="送信">
        </form>
       
        <div class="footer">
            <a href="/mypage/wants">戻る</a>
        </div>
       
    </body>
</html>