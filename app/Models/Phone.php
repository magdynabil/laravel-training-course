<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable=['code','phone','user_id'];
    ############################ start relations###############
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    ############################ end relations###############

}
