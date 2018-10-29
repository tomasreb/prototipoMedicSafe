<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\User;
class Medic extends Authenticatable
{
    use Notifiable;
    protected $guard ="medic";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'img_profile', 'specialty', 'tel_cel', 'matricula', 'tel_fijo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function users(){
        return $this->belongsToMany('App\User')->withTimestamps();;
    }


    public function parts(){
        return $this->hasMany('App\Part');
    }
    public function studies(){
        return $this->hasMany('App\Study');
    }
}
