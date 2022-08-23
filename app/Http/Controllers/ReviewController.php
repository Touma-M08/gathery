<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;
use App\Http\Requests\ReviewEditRequest;
use Auth;
use App\Place;
use App\Review;
use App\Want;

class ReviewController extends Controller
{
    public function review(Place $place, Review $review)
    {
        // 以前のレビューがあるときは、編集ページへ行く
        $is_review = $review->searchReview($place);

        if (empty($is_review)) {
            return view('mypage/review')->with(['place' => $place]);
        } else {
            return view('mypage/reviewEdit')->with(['review' => $is_review]);
        }
    }
    
    public function store(ReviewRequest $request, Place $place, Review $review, Want $want)
    {
        $review->fill($request['review']);
        $review->user_id = Auth::user()->id;
        $review->place_id = $place->id;
        $review->save();
        
        $place->score = $review->where('place_id', $place->id)->avg('score');
        $place->save();
        
        $want->where([['user_id', Auth::user()->id],['place_id', $place->id]])->delete();
        
        return redirect('/mypage/reviews');
    }
    
    public function index(Review $review)
    {
        return view('mypage/index')->with(['reviews' => $review->where('user_id', Auth::user()->id)->paginate(10)]);
    }
    
    public function edit(Review $review)
    {
        return view('mypage/reviewEdit')->with(['review' => $review]);
    }
    
    public function update(Review $review, Place $place, ReviewEditRequest $request)
    {
        $review->fill($request['review']);
        
        if (isset($request->score)) {
            $review->score = $request->score;
        }
        $review->save();
        
        $place->score = $review->where('place_id', $place->id)->avg('score');
        $place->save();
        
        return redirect('/mypage/reviews');
    }
    
    public function delete(Review $review, Place $place)
    {
        $review->delete();
        
        $score = $review->where('place_id', $place->id)->avg('score');
        if (empty($score)) {
            $score = 0;
        }
        $place->score = $score;
        $place->save();
        
        return redirect('/mypage/reviews');
    }
}
