<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DrugCategory extends Model
{
    //
        use SoftDeletes;


    //    relationships
        public function drugs(){
            return $this->hasMany(Drug::class);
        }
}
