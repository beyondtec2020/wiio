<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $guarded = [''];

    protected $table = "reviews";

	public function addlist()
    {
    	return $this->belongsTo('App\AddList');
    }
    
    public function user()
    {
    	return $this->belongsTo('App\User','user_id');
    }
}
