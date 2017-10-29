@extends('admin.template.main')

@section('title','Agregar articulos')

@section('content')
    <!-- El 'files'=>true es para despues poder usar imagenes -->
    {!! Form::open(['route'=>'articles.store','method'=>'POST','files'=>true]) !!}

    <div class="form-group">
        {!! Form::label('title','Titulo') !!}
        {!! Form::text('title',null,['class'=>'form-control','placeholder'=>'Titulo del articulo','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('cateegory_id','Categoria') !!}
        {!! Form::select('category_id',$categories,null,['class'=>'form-control select-category','required']) !!}
    </div>


    <div class="form-group">
        {!! Form::label('content','Contenido') !!}
        {!! Form::textarea('content',null,['class'=>'form-control','placeholder'=>'Articulo','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('tags','Tags') !!}
        <!-- Los [] en el el select es para que nos regrese el id de todos los tags seleccionados-->
        {!! Form::select('tags[]',$tags,null,['class'=>'form-control select-tag','multiple','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('image','Imagen') !!}
        {!! Form::file('image') !!}
    </div>


    <div class="form-group">
        {!! Form::submit('Agregar articulo',['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
@endsection

@section('js')
    <script>
        $('.select-tag').chosen({
            placeholder_text_multiple:'Seleccione un maximo de 3 tags',
            max_selected_options:3,
            search_contains:true,
            no_result_text:'No se encontrarón estos tags'
        });

        $('.select-category').chosen({
            placeholder_text_single:'Selecciona una opción'
        });


    </script>
@endsection