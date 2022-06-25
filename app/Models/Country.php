<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable=['name','created_at','updated_at'];
    protected $hidden=['created_at','updated_at','pivot'];
    public  function doctors()
    {
        return $this->hasManyThrough('App\Models\Doctor','App\Models\Hospital','county_id','hospital_id');
    }

}
