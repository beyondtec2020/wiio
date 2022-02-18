<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [''];

	protected $table = "categories";
	
    public function addlists()
    {
        return $this->hasMany('App\AddList','cat_id');
    }

    public function getCategoryImageAttribute(){
        return asset('public/images/'.$this->attributes['cat_image']);
    }
}
