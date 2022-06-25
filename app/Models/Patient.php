<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable=['name','created_at','updated_at'];
    protected $hidden=['created_at','updated_at'];
    public function doctor()
    {
        return $this->hasOneThrough('App\Models\Doctor','App\Models\medical','patient_id','medical_id');
    }
    //
}
