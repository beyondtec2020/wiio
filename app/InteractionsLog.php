<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InteractionsLog extends Model
{

    protected $table = 'interactions_log';

    protected $fillable = ['addlist_id','user_id','message','email_from','name_from','latitude','longitude','ip', 'coupon_code'];

    public function addlist(){
        return $this->belongsTo(AddList::class,'addlist_id');
    }
}