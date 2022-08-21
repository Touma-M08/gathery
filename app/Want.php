<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;
use App\Place;

class Want extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'user_id', 'place_id'
    ];
    
    public function getByWantPlace(int $limit_count = 5)
    {
        return $this::with('place','user')->where('user_id', Auth::user()->id)->get();
    }
    
    public function getWant($place)
    {
        return $this->where([['user_id', Auth::user()->id], ['place_id', $place->id]])->first();
    }
    
    public function getTrashedWant($place)
    {
        return $this->withTrashed()->where([['user_id', Auth::user()->id], ['place_id', $place->id]])->first();
    }
    
    public function user() {
        return $this->belongsTo('App\User');
    }
    
    public function place() {
        return $this->belongsTo('App\Place');
    }
    
    public function schedules() {
        return $this->hasMany('App\Schedule');
    }
}
