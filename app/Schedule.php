<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class Schedule extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'place_id', 'date', 'time', 'user_id'
    ];
    
    protected $dates = [
        'date'
    ];
    
    public function getBySchedule($schedule)
    {
        return $this::with('place')->where('user_id', Auth::user()->id)->orderBy('date', 'asc')->orderBy('time', 'asc')->paginate(10);
    }
    
    public function want() {
        return $this->belongsTo('App\Want');
    }
    
    public function place() {
        return $this->belongsTo('App\Place');
    }
    
    public function user() {
        return $this->belongsTo('App\User');
    }
}
