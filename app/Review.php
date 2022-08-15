<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'place_id', 'user_id', 'title', 'comment', 'score'
    ];
    
    public function getReview(int $limit_count = 5)
    {
        return $this->orderBy('created_at', 'desc')->paginate($limit_count);
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
