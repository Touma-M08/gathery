<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
use Auth;
use App\Want;

class WantController extends Controller
{
    public function want(Want $want)
    {
        return view('mypage/want')->with(['wants' => $want->getByWantPlace()]);
    }
    
    public function store(Want $want, Place $place)
    {
        $want_regi = $want->getTrashedWant($place);
        if (empty($want_regi)) {
            $want->user_id = Auth::user()->id;
            $want->place_id = $place->id;
            $want->save();
        } else {
            $want_regi->restore();
        }
        return redirect('/places/'.$place->id);
    }
    
    public function delete(Want $want, Place $place)
    {
        $want->delete();
        
        return redirect('/places/'.$place->id);
    }
}
