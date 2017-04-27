<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restful extends Model
{
    protected $table = 'restful';

    protected $fillcable = ['name','email','age'];

    public $timestamps = false;
}
