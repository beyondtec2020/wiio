<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddList extends Model
{
    protected $guarded = [''];

    protected $table = "add_lists";

    public function CountImage()
    {
        return $this->hasMany('App\AllImage', 'addlist_id');
    }
	public function review()
    {
        return $this->hasMany('App\Review', 'addlist_id');
    }
    public function totalAmenity()
    {
        return $this->hasMany('App\addlistAmenity','addlist_id');
    }
    public function report()
    {
        return $this->hasMany('App\Review', 'addlist_id');
    }
    public function reports()
    {
        return $this->hasMany('App\Report', 'addlist_id');
    }
    
    public function Bookmark()
	{
	    return $this->hasMany('App\Bookmark', 'addlist_id');
	}
	
	public function user()
    {
    	return $this->belongsTo('App\User');
    }
    public function city()
    {
    	return $this->belongsTo('App\City');
    }
    public function cat()
    {
    	return $this->belongsTo('App\Category');
    }

}
