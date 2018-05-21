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
        return $this->hasMany(Drug::class,'drug_id','id');
    }


}
