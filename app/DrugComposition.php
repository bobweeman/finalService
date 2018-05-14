<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DrugComposition extends Model
{
    use SoftDeletes;


//    relationships
    public function drugs(){
        return $this->hasMany(Drug::class);
    }
}
