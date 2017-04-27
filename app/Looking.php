<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Looking extends Model
{
    protected $table='looking';
    protected $fillable=['id','look','look_id'];
    public $timestamps=false;

}
