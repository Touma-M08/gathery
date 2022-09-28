<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ["name", "type"];
    
    public $timestamps = false;
    
    
    public function foodCategory() 
    {
        return $this->where('type', 1)->get();
    }
    
    public function leisureCategory() 
    {
        return $this->where('type', 2)->get();
    }
    
    public function places() 
    {
        return $this->hasMany('App\Place');
    }
}
