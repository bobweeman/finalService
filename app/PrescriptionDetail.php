<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrescriptionDetail extends Model
{
    //
    //
    use SoftDeletes;


//    relationships
    public function details(){
        return $this->belongsTo(Prescription::class);
    }
}
