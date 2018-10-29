<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    protected $fillable = [
        'medic_id', 'history_id', 'motivo','sintomas', 'enfermedad_actual','diagnostico','tratamiento','solicito_estudios', 'estudio_solicitado','lugar_atencion'
    ];
    public function medics(){

        return $this->belongsTo('App\Medic')->withTimestamps();
    }

    public function history(){

        return $this->belongsTo('App\History')->withTimestamps();
    }
    public function studies(){

        return $this->hasMany('App\Part');
    }
}
