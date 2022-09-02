<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gathery</title>
        
        <link rel="stylesheet" href="{{asset('css/mypage/schedule.css')}}">
        <script src="{{asset('js/schedule.js')}}" defer></script>
    </head>
    <body>
        @extends("layouts/mypageFrame")
        @section("mypage-content")
        <section class="main-content">
            <h2 class="section-ttl">予定編集</h2>
            <div class="wrap">
                @foreach ($schedules as $schedule)
                    <div class="place">
                        <div class="place-detail __edit">
                            @if ($schedule->id == $editSchedule->id)
                                <form method="post" action="/schedule/{{ $schedule->id }}">
                                    @csrf
                                    @method('put')
                                    <select name="schedule[place_id]">
                                        @foreach ($wants as $want)
                                            @if ($want->place_id == $editSchedule->place_id)
                                                <option value={{ $want->place_id }} selected>{{ $want->place->name }}</option>
                                            @else
                                                <option value={{ $want->place_id }}>{{ $want->place->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <p>{{ $errors->first('schedule.place_id') }}</p>
                                    
                                    <input id="date" type="date" name="schedule[date]" value="{{ $schedule->date->format('Y-m-d') }}">
                                    <p>{{ $errors->first('schedule.date') }}</p>
                                    
                                    @if ( $schedule->time == null )
                                        <input id="time" type="time" name="schedule[time]" value="00:00" disabled>
                                        <input id="check-box" type="checkbox" name="check" onclick="boxClick()" checked><label for="check-box">終日</label>
                                    @else
                                        <input id="time" type="time" name="schedule[time]" value="{{ substr($schedule->time, 0, 5) }}">
                                        <input id="check-box" type="checkbox" name="check" onclick="boxClick()"><label for="check-box">終日</label>
                                    @endif
                                    
                                    <div class="btn-pos">
                                        <input class="link-btn" type="submit" value="保存">
                                    </div>
                                </form>
                            @else
                                <h3>{{ $schedule->place->name }}</h3>
                                <p>{{ $schedule->date->format('Y/m/d') }}</p>
                                <p>{{ substr($schedule->time, 0, 5) }}</p>
                            @endif
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