<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class Review extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'place_id', 'user_id', 'title', 'comment', 'score'
    ];
    
    public function getReview(int $limit_count = 5)
    {
        return $this->orderBy('created_at', 'desc')->paginate($limit_count);
    }
    
    public function searchReview($place)
    {
        return $this->where([['user_id', Auth::user()->id],['place_id', $place->id]])->first();
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function place()
    {
        return $this->belongsTo('App\Place');
    }
}
