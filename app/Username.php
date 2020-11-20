<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Username extends Model
{
    protected $fillable=['username','slug'];
    public function Personaldetail(){
        return $this->hasMany(Personaldetail::class);
    }
}
