<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddviewsLog extends Model
{

    protected $table = 'addviews_log';

    protected $fillable = ['addlist_id','user_id','latitude','longitude','ip'];

}