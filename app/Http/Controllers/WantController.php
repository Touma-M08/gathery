<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
use Auth;
use App\Want;

class WantController extends Controller
{
    public function store(Want $want, Place $place)
    {
        $want->user_id = Auth::user()->id;
        $want->place_id = $place->id;
        $want->save();
        return redirect('/bbses/'.$place->id);
    }
}
