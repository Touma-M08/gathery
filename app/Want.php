<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Want extends Model
{
    protected $fillable = [
        'user_id', 'place_id'
    ];
    
    public function getByWantPlace(int $limit_count = 5)
    {
        return $this::with('place','user')->where('user_id', Auth::user()->id)->get();
    }
    
    public function user() {
        return $this->belongsTo('App\User');
    }
    
    public function place() {
        return $this->belongsTo('App\Place');
    }
}
