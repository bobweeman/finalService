<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrescriptionDetail extends Model
{
    //
    //
//    use SoftDeletes;

    protected $fillable=[
        'prescription_id','drug_id','dosage','quantity'
    ];
//    relationships
    public function details(){
        return $this->belongsTo(Prescription::class);
    }

    public function drugs(){
        return $this->hasOne(Drug::class);
    }
}
