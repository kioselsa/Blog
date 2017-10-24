<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //Relacion con la tabla de Usuarios(Uno)-Articulos(Muchos)
    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    //Relacion con la tabla de usuarios
    public function user()
    {
        return $this->belongsTo('App\Article');
    }
}
