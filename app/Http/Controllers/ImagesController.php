<?php

namespace App\Http\Controllers;

use App\Image;


class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images=Image::all();
        $images->each(function ($images){
            $images->article;//Es para llamar la relacion de la imagen a que articulo pertenece
        });

        return view('admin.images.index')->with('images',$images);
    }


}
