<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $guarded = [''];

    protected $table = "reports";

	public function addlist()
    {
    	return $this->belongsTo('App\AddList');
    }
}
