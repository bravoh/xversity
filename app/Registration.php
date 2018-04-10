<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    public function student(){
        return $this->belongsTo(User::class,'student_id');
    }

    public function unit(){
        return $this->belongsTo(Unit::class,'unit_id');
    }
}
