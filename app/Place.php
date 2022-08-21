<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = [
        'name', 'address', 'category_id', 'prefecture_id', 'time_mon',
        'time_tue', 'time_wed', 'time_thu', 'time_fri', 'time_sat', 'time_sun',
        'tel', 'image', 'lat', 'lng', 'score'
    ];
    
    public function ranking(int $get_count)
    {
        return $this->orderBy('score', 'desc')->take($get_count)->get();
    }
    
    public function prefecture() 
    {
        return $this->belongsTo('App\Prefecture');
    }
    
    public function category() 
    {
        return $this->belongsTo('App\Category');
    }
    
    public function wants() 
    {
        return $this->hasMany('App\Want');
    }
    
    public function comments() 
    {
        return $this->hasMany('App\Comment');
    }
    
    public function reviews()
    {
        return $this->hasMany('App\Review');
    }
    
    public function schedules()
    {
        return $this->hasMany('App\Schedule');
    }
}
