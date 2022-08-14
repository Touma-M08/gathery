<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
     protected $fillable = [
        'user_id', 'place_id', 'comment'
    ];
    
    public function user() {
        return $this->belongsTo('App\User');
    }
    
    public function place() {
        return $this->belongsTo('App\Place');
    }
}
