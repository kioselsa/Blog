<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Laracasts\Flash\Flash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users=User::orderby('id','asc')->paginate(5); //Consulta todos los usuarios y los ordena, ademas pagina la consulta
      return view('admin.users.index')->with('users',$users); //Llama a la vista y le envia los usuarios
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User($request->all());
        //Para encriptar la contraseña ponemos lo siguiente
        $user->password=bcrypt($request->password);
        //Comando para guardar el registro
        $user->save();
        Flash::success('Se ha registrado '.$user->name.' De forma exitosa');
        return redirect()->route('users.index');
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
        $user=User::find($id);//Busca el registro
        return view('admin.users.edit')->with('user',$user);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);//Busca el registro
        $user->delete();//Elimina el registro
        Flash::error('El usuario '. $user->name .' a sido borrado de forma exitosa');//Envia mensaje
        return redirect('admin/users');//llama a la pagina de consultas
    }
}
