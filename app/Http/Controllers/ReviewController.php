<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Place;
use App\Review;
use App\Want;

class ReviewController extends Controller
{
    public function review(Place $place)
    {
        return view('mypage/review')->with(['place' => $place]);
    }
    
    public function store(Request $request, Place $place, Review $review, Want $want)
    {
        $review->fill($request['review']);
        $review->user_id = Auth::user()->id;
        $review->place_id = $place->id;
        $review->save();
        
        $place->score = $review->where('place_id', $place->id)->avg('score');
        $place->save();
        
        $want->where([['user_id', Auth::user()->id],['place_id', $place->id]])->delete();
        
        return redirect('/places/'.$place->id);
    }
    
    public function index(Review $review)
    {
        return view('mypage/index')->with(['reviews' => $review->where('user_id', Auth::user()->id)->paginate(10)]);
    }
}
