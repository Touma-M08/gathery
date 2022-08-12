<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = [
        'name', 'address', 'category_id', 'prefecture_id', 'time_mon',
        'time_tue', 'time_wed', 'time_thu', 'time_fri', 'time_sat', 'time_sun',
        'tel', 'image', 'lat', 'lng'
    ];
    
    public function prefecture() {
        return $this->belongsTo('App\Prefecture');
    }
    
    public function category() {
        return $this->belongsTo('App\Category');
    }
}
