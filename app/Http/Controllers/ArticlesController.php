<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Tag;
use App\Article;
use App\Image;
use Laracasts\Flash\Flash; //Es el paquete para poder usar los mensajes de alerta tipo bootstrap
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ArticleRequest;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articles=Article::Search($request->title)->orderBy('id','asc')->paginate(5); //Traemos la lista de todos los articulos
        //Esta funcion trae todas las relaciones de la tabla articulos
        $articles->each(function ($articles){
            //La funcion each, hace un recorrido por cada articulo y busca sus datos relacionados
            $articles->user;
        });

        return view('admin.articles.index')->with('articles',$articles); //Le mandamos los datos de los articulos a la vista
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::orderBy('name','asc')->pluck('name','id');//Traemos todas las categorias que existen en la bd
        $tags=Tag::orderBy('name','asc')->pluck('name','id');//Trae todos los tags


       return view('admin.articles.create')
           ->with('categories',$categories) //Le passamos las categorias a la vista de create
           ->with('tags',$tags); //Le pasamos todos los tags a la vista de create
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        //Manipulacion de imagenes
        if($request->file('image'))//Validamos si existe una imagen
        {
            //En el metodo file ponemos el nombre del campo file que pusimos en la vista, que sera el que tenga los datos de la imagen
            $file=$request->file('image');
            //Para evitar nombres repetidos en las imagenes, creamos un nombre antes de guardar
            $name='blogITSCH_'.time().'.'.$file->getClientOriginalExtension();
            //Generamos la ruta donde se guardaran las imagenes de los articulos
            $path=public_path().'/images/articles/';
            //Guardamos la imagen en la carpeta creada en la ruta que marcamos anteriormente
            $file->move($path,$name);
        }

        $article=new Article($request->all()); //Obtiene todos los datos del articulo de la vista create
        $article->user_id=\Auth::user()->id;//Obtiene el id del usuario que esta logueado
        $article->save();//Guarda el articulo en su tabla

        $article->tags()->sync($request->tags);//Guarda los datos de los tags en la tabla pivote,ademas complementa con el id del articulo

        $image=new Image();//obtiene los datos de la imagen de el formulario de la vista
        $image->name=$name;//Obtiene el nombre que se genero para guardarlo en la bd
        $image->article()->associate($article);//Guarda el id aociado del articulo con la imagen
        $image->save();//Guarda la imagen en la bd.

        Flash::success('El articulo '.$article->title.' se guardo con exito');
        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article=Article::find($id);
        $article->category;//Trae la categoria del articulo en cuestion, usando la relacion con esta tabla
        $categories=Category::orderBy('name','DESC')->pluck('name','id');//Nos trae todas las categorias y las pone en un objeto
        $tags=Tag::orderBy('name','DESC')->pluck('name','id');//Nos trae todos los tags y los pone en un objeto

        $my_tags=$article->tags->pluck('id')->toArray(); //Obtenemos la lista de tags correspondientesss a un articulo
        //y los guardamos en un arreglo para usarlos en el select multiple.

        return view('admin.articles.edit')
            ->with('categories',$categories)
            ->with('article',$article)
            ->with('tags',$tags)
            ->with('my_tags',$my_tags);
        //Le pasamos con with todos los datos a la vista edit
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Guarda los cambios de la edicion en las tablas correspondientes

        //Guarda los datos del articulo
        $article=Article::find($id);
        $article->fill($request->all());
        $article->save();

        //Guarda los tags
        $article->tags()->sync($request->tags);//Como son varios y estan relacionados con los articulos usaremos sync

        //Mensaje de edicion
        Flash::warning('Se ha editado el articulo '.$article->title.' de forma correcta');

        return redirect()->route('articles.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article=Article::find($id);
        $article->delete();

        //Mensaje de edicion
        Flash::error('Se ha borrado el articulo '.$article->title.' de forma correcta');

        return redirect()->route('articles.index');
    }
}
