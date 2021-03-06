<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DrugSubscribtion extends Model
{
    //
    protected $fillable=[
        'number','expiry','drug_id','pharmacy_id'
    ];


    public function drugs(){
        return $this->hasOne(Drug::class,'id','drug_id');
    }


}
