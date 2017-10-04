@extends('admin.template.main')

@section('title','Editar el usuario | '.$user->name)

@section('content')
    {!! Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) !!}


    <div class="form-group">
        {!! Form::label('name','Nombre') !!}
        {!! Form::text('name',$user->name,['class'=>'form-control','placeholder'=>'Nombre Completo','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('mail','Correo Electronico') !!}
        {!! Form::text('email',$user->email,['class'=>'form-control','placeholder'=>'example@mail.com','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('type','Tipo') !!}
        {!! Form::select('type',[''=>'Seleccione un elemento','member'=>'Miembro','admin'=>'Administrador'],null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Editar',['class'=>'btn btn-primary']) !!}
    </div>


    {!! Form::close() !!}

@endsection