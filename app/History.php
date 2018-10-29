<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{

    protected $fillable = ['name'];

    public function user(){

        return $this->belongsTo('App/User');
    }
    public function parts(){

        return $this->hasMany('App\Part');;
    }
}
