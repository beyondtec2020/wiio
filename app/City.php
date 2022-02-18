<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded = [''];

    protected $table = "cities";

    public function addlists()
    {
        return $this->hasMany('App\AddList', 'city_id');
    }
    
    public function getImageUrlAttribute(){
        return asset('public/images/'.$this->attributes['city_image']);
    }
}
