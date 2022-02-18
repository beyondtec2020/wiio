<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
class AllImage extends Model
{
    protected $guarded = [''];

    protected $table = "all_images";

    public function addlist()
    {
    	return $this->belongsTo('App\AddList');
    }

    public function getImageUrlAttribute(){    
        
        if(file_exists('public/images/'.$this->attributes['image'])){
            return asset('public/images/'.$this->attributes['image']);
        }else{            
            return 'http://cliquesdodia.com.br/public/images/w4HkNtaMjsujf1UtXinp.jpg';
        }
    }

}
