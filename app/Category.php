<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //Nombre de la tabla para la que va a funcionar el modelo
    protected $table="categories";
    //Datos que se mostraran en los objetos jason
    protected $fillable=['name'];
}
