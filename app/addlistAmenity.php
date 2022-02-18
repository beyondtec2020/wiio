<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
class addlistAmenity extends Model
{
    protected $guarded = [''];

    protected $table = "addlist_amenities";

    public function addlist()
    {
    	return $this->belongsTo('App\AddList');
    }

    public function amenity() {
        return $this->belongsTo('App\Amenity', 'amenities_id', 'id');
    }
}
