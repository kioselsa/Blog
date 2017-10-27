@extends('admin.template.main')

@section('title','Editar tag ' .$tag->name)

@section('content')
    {!! Form::model($tag, array('route' => array('tags.update', $tag->id), 'method' => 'PUT')) !!}

    <div class="form-group">
        {!! Form::label('name','Nombre') !!}
        {!! Form::text('name',$tag->name,['class'=>'form-control','placeholder'=>'Nombre del tag','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Editar',['class'=>'btn btn-primary']) !!}
    </div>


    {!! Form::close() !!}

@endsection