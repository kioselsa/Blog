<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class TestController extends Controller
{
  public  function view($id)
  {
      $article=Article::find($id); //Usa el modelo Article y busca el articulo con el id que pasamos como parametro
      $article->Category;
      $article->User;
      $article->Tag;

      //Para mandar datos a la vista ponemos:
      return view('misVistas.vista',['article'=>$article]);
  }
}
