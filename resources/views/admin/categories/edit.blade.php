@extends('admin.template.main')

@section('title','Editar Categoria '.$category->name)

@section('content')

    {!! Form::model($category, array('route' => array('categories.update', $category->id), 'method' => 'PUT')) !!}

    <div class="form-group">
        {!! Form::label('name','Nombre') !!}
        {!! Form::text('name',$category->name,['class'=>'form-control','placeholder'=>'Nombre de la categoria','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Editar',['class'=>'btn btn-primary']) !!}
    </div>


    {!! Form::close() !!}


@endsection