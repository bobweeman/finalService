<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Drug extends Model
{

    protected $fillable=[
      'name','composition','drug_category_id'
    ];
    //
    use SoftDeletes;

//    setting relationship


    public function category(){
        return $this->hasOne(DrugCategory::class,'id','drug_category_id');
    }


}
