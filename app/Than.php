<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class than extends Model
{
    protected $table='than';
    protected  $fillable=['id','cate_id'];
    public $timestamps=false;

    
    public function looking(){
    	return $this->belongsTo('App\Looking','look_id');
    }

    public function job(){
    	return $this->belongsToMany('App\Job','looking');
    }
}
