<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table="job";
    protected $fillable=['id','job','job_id'];
    public $timestamps=false;

    public function than(){
    	return $this->belongsTomany('App\than');
    }
}
