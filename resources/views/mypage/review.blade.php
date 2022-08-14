<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gathery</title>

        <link rel="stylesheet" href="{{asset('css/mypage.css')}}">
    </head>
    <body>
       <h2>レビューする</h3>
       <h3>{{ $place->name }}</h3>
       <form method="post" action="/reviews/{{ $place->id }}">
           @csrf
           <p>タイトル</p>
           <input type="text" name="review[title]">
           <p>本文</p>
           <textarea name="review[comment]"></textarea>

           <p>スコア：大きいほど高評価</p>
           <select name="review[score]">
               <option value-"1">1</option>
               <option value-"2">2</option>
               <option value-"3">3</option>
               <option value-"4">4</option>
               <option value-"5">5</option>
           </select>
           <input type="submit" value="送信">
       </form>
       
       <div class="footer">
            <a href="/mypage/wants">戻る</a>
        </div>
       
    </body>
</html>