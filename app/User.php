<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'age', 'sex', 'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
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
