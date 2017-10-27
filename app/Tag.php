<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table="tags";
    protected $fillable=['name'];

    public function articles()
    {
        return $this->belongsToMany('App\Article');
    }

    //Crea el scope para las busquedas de tags
    public function scopeSearch($query,$name)
    {
        return $query->where('name','LIKE',"%$name%");
    }
}
