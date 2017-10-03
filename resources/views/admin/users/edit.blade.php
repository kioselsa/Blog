dd('Hola');

@extends('admin.template.main')

@section('title','Editar Usuario'.$user->name)

@section('content')

    {!! Form::open(['route'=>'users.edit','method'=>'GET']) !!}

    <div class="form-group">
        {!! Form::label('name','Nombre') !!}
        {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre Completo','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('mail','Correo Electronico') !!}
        {!! Form::text('email',null,['class'=>'form-control','placeholder'=>'example@mail.com','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password','Contraseña') !!}
        {!! Form::password('password',['class'=>'form-control','placeholder'=>'***********','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('type','Tipo') !!}
        {!! Form::select('type',[''=>'Seleccione un elemento','member'=>'Miembro','admin'=>'Administrador'],null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}
    </div>


    {!! Form::close() !!}

@endsection