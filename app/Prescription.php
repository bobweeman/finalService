<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prescription extends Model
{
    //
    use SoftDeletes;

    protected $fillable=[
        'doctor_id','patient_id','diagnosis'
    ];

//    relationships
    public function details(){
        return $this->hasMany(PrescriptionDetail::class);
    }

    public function doctor(){
        return $this->hasOne(User::class,'id','doctor_id');
    }
    public function patient(){
        return $this->hasOne(User::class,'id','patient_id');
    }




}
