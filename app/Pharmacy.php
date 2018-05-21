<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pharmacy extends Model
{
    //
    use SoftDeletes;

//    setting relationship


    public function orders(){
        return $this->hasMany(Order::class,'pharmacy_id','id');
    }

    public function owner(){
        return $this->belongsTo(User::class,'owner_id','id');
    }

}
