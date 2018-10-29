<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Study extends Model
{

    protected $fillable = [
        'name', 'part_id', 'ruta_imagen', 'informe','medic_id','lugar_atencion','ruta_imagen_informe',
    ];

    public function part(){
        return $this->belongsTo('App\Part');

    }
    public function medic(){
        return $this->belongsTo('App\Medic');
    }
}
