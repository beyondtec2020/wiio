<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cartalyst\Sentinel\Users\EloquentUser;
use Tymon\JWTAuth\Contracts\JWTSubject;

class UserAPI extends Authenticatable implements JWTSubject
{
    use Notifiable;    
    
    protected $table='users';

    protected $guarded = [''];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function byEmail($email)
    {
        return static::whereEmail($email)->first();
    }


    public function addlists()
    {
        return $this->hasMany('App\AddList', 'user_id');
    }
    
    public function bookmark()
    {
        return $this->hasMany('App\Bookmark', 'user_id');
    }

    public function getProfileUrlAttribute(){    
        
        if($this->attributes['profile'] != null && file_exists('public/images/'.$this->attributes['profile'])){
            return asset('public/images/'.$this->attributes['profile']);
        }else{
            return asset('public/assets/admin/images/pro.png');
        }
    }    

    public function getJWTIdentifier(){
        return $this->getKey();
    }
    
    public function getJWTCustomClaims(){
        return [];
    }
}
