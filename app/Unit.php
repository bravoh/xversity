<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    public function courses(){
        return $this->belongsTo(Course::class,'course');
    }
}
