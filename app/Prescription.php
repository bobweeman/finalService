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
}
