<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $guarded = [''];

    protected $table = "bookmarks";

    public function AddList()
    {
    	return $this->belongsTo('App\AddList','addlist_id');
    }
    public function user()
    {
    	return $this->belongsTo('App\User','user_id');
    }
}
