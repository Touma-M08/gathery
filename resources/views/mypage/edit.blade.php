<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gathery</title>
    </head>
    <body>
        <h2>レビュー</h3>
        <h3>{{ $review->place->name }}</h3>
        <form method="post" action="/reviews/{{ $review->id }}/{{$review->place->id }}">
            @csrf
            @method('put')
            <p>タイトル</p>
            <input type="text" name="review[title]" value="{{ $review->title }}">
            <p>本文</p>
            <textarea name="review[comment]">{{ $review->comment }}</textarea>

            <p>スコア：大きいほど高評価</p>
            <select name="review[score]">
                @for ($i = 1; $i <= 5; $i++)
                    @if ($i == $review->score)
                        <option value="{{ $i }}" selected="selected">{{ $i }}</option>
                    @else
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endif
                @endfor
            </select>
            <input type="submit" value="送信">
        </form>
    </body>
</html>