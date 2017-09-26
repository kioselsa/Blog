<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table="articles";
    protected $fillable=['title','content','category_id','user_id'];

    //Relacion con la tablas de categorias, uno a muchos
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    //Relacion con la tabla de usuarios, uno a muchos
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    //Relacion con la tabla de imagenes, uno a muchos
    public function images()
    {
        return $this->hasMany('App\Image');
    }

    //Relacion con la tabla de tags, muchos a muchos
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
