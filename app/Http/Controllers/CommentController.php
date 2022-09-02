<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Comment;
use Auth;
use App\Place;
use App\Want;

class CommentController extends Controller
{
    public function index(Place $place, Want $want)
    {
        if (Auth::user()) {
            $isWant = $want->getByWantPlace(1)->isEmpty();
            
            if ($isWant) {
                return view('bbses/index')->with([
                    'places' => $place->ranking(5),
                ]);
            } else {
                 return view('bbses/index')->with([
                    'wants' => $want->getByWantPlace(5)
                ]);
            }
        } else {
            return view('bbses/index')->with([
                'places' => $place->ranking(5),
            ]);
        }
    }
    
    public function show(Comment $comment, Place $place, Want $want)
    {
        if (!(empty($want->getWant($place)))) {
            return view('bbses/bbs')->with([
                'place' => $place,
                'comments' => $comment->where("place_id", $place->id)->paginate(30)
                ]);
        } else {
            return redirect('/');
        }
    }
    
    public function store(CommentRequest $request, Comment $comment, Place $place)
    {
        $comment->user_id = Auth::user()->id;
        $comment->place_id = $place->id;
        $comment->comment = $request->comment;
        $comment->save();
        
        return redirect('/bbses/'.$place->id);
    }
    
    public function delete(Comment $comment, Place $place)
    {
        $comment->delete();
        
        return redirect('/bbses/'.$place->id);
    }
}
