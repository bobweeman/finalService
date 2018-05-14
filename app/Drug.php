<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Drug extends Model
{
    //
    use SoftDeletes;

//    setting relationship


    public function category(){
        return $this->hasOne(DrugCategory::class);
    }

    public function composition(){
        return $this->hasOne(DrugComposition::class);
    }


}
