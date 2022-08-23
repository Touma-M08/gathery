<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ScheduleRequest;
use App\Want;
use App\Schedule;
use Auth;

class ScheduleController extends Controller
{
    public function index(Want $want, Schedule $schedule, Request $request) 
    {
        return view('mypage/schedule')->with([
            "wants" => $want->getByAllWantPlace(),
            "schedules" => $schedule->getBySchedule($schedule),
            "page" => $request->page
            ]);
    }
    
    public function store(ScheduleRequest $request, Schedule $schedule)
    {
        if ($request->check == "on") {
            $request->time = null;
            $schedule->user_id = Auth::user()->id;
            $schedule->fill($request['schedule'])->save();
        } else {
            $schedule->user_id = Auth::user()->id;
            $schedule->fill($request['schedule'])->save();
        }
        
        return redirect("/mypage/schedule");
    }
    
    public function edit(Schedule $schedule, Want $want)
    {
        return view("mypage/scheduleEdit")->with([
            "editSchedule" => $schedule,
            "schedules" => $schedule->getBySchedule($schedule),
            "wants" => $want->getByWantPlace()
            ]);
    }
    
    public function update(Schedule $schedule, ScheduleRequest $request)
    {
        if ($request->check == "on") {
            $request->time = null;
            $schedule->fill($request['schedule'])->save();
        } else {
            $schedule->fill($request['schedule'])->save();
        }
        
        return redirect("/mypage/schedule");
    }
    
    public function delete(Schedule $schedule)
    {
        $schedule->delete();
        
        return redirect('/mypage/schedule');
    }
}
