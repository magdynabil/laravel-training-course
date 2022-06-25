<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class medical extends Model
{
    protected $fillable=['pdf','patient_id','created_at','updated_at'];
    protected $hidden=['created_at','updated_at'];
}
