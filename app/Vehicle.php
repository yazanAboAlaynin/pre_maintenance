<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    public function parts(){
        return $this->hasMany(Part::class);
    }
}
