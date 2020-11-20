<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personaldetail extends Model
{
    protected $fillable=['description','email','dob','image','status','website','user_id'];
    public function userDetail(){
        return $this->belongsTo('App\Username','user_id');
    }
}
