<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Auth;
use App\Place;

class CommentController extends Controller
{
    public function index(Comment $comment, Place $place)
    {
        return view('bbses/index')->with([
            'place' => $place,
            'comments' => $comment->where("place_id", $place->id)->paginate(5)
            ]);
    }
    
    public function store(Request $request, Comment $comment, Place $place)
    {
        $comment->user_id = Auth::user()->id;
        $comment->place_id = $place->id;
        $comment->comment = $request->comment;
        $comment->save();
        
        return redirect('/bbses/'.$place->id);
    }
}
