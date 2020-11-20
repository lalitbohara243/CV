<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Frontend extends Model
{
    protected $table = 'frontends';
    protected $fillable=['name','email','message'];
}
