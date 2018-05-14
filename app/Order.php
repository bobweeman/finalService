<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;


//    relationships
    public function drug(){
        return $this->hasOne(Drug::class);
    }

    public function buyer(){
        return $this->hasOne(User::class,'id','buyer_id');
    }

    public function doctor(){
        return $this->hasOne(User::class,'id','doctor_id');
    }

    public function pharmacy(){
        return $this->hasOne(User::class,'id','pharmacy_id');
    }

}
