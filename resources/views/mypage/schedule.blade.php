<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gathery</title>
        <link rel="stylesheet" href="{{asset('css/mypage/schedule.css')}}">
        <script src="{{asset('js/delete.js')}}" defer></script>
        <script src="{{asset('js/schedule.js')}}" defer></script>
    </head>
    <body>
        @extends("layouts/mypageFrame")
        @section("mypage-content")
        <section class="main-content">
            <h2 class="section-ttl">予定登録</h2>
            
            <form method="post" action="/schedule">
                @csrf
                <select name="schedule[place_id]">
                    <option value="">場所を選択してください</option>
                    @foreach ($wants as $want)
                        <option value={{ $want->place_id }}>{{ $want->place->name }}</option>
                    @endforeach
                </select>
                <p>{{ $errors->first('schedule.place_id') }}</p>
                
                <input id="date" type="date" name="schedule[date]">
                <p>{{ $errors->first('schedule.date') }}</p>
                
                <input id="time" type="time" name="schedule[time]" value="00:00">
                <input id="check-box" type="checkbox" name="check" onclick="boxClick()"><label for="check-box">終日</label>
                
                <input class="link-btn" type="submit" value="登録">
            </form>
            <div class="wrap">
                @foreach ($schedules as $schedule)
                    <div class="place">
                        <div class="place-detail">
                            <h3>{{ $schedule->place->name }}</h3>
                            
                            <p>{{ $schedule->date->format('Y/m/d') }}</p>
                            
                            @if (!(empty($schedule->time)))
                            <p>{{ substr($schedule->time, 0, 5) }}</p>
                            @endif
                        </div>
                    
                        <div class="any-btn">
                            <a class="link-btn __edit" href="/schedule/{{ $schedule->id }}/edit?page={{ $page }}">編集</a>
                                
                            <form id="form_{{ $schedule->id }}" method="POST" action="/schedule/{{ $schedule->id }}">
                                @csrf
                                @method('delete')
                                <button class="link-btn" onclick="deleteSchedule({{ $schedule->id }}); return false;">削除</button>
                            </form>
                        </div>
                    </div>
                @endforeach
                
                <div class="paginate">
                    {{ $schedules->links() }}
                </div>
            </div>
        </section>
        @endsection
    </body>
</html>