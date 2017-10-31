@extends('admin.template.main')

@section('title','Editar articulos')

@section('content')
    <!-- El 'files'=>true es para despues poder usar imagenes -->
    {!! Form::open(['route'=>['articles.update',$article],'method'=>'PUT']) !!}

    <div class="form-group">
        {!! Form::label('title','Titulo') !!}
        {!! Form::text('title',$article->title,['class'=>'form-control','placeholder'=>'Titulo del articulo','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('cateegory_id','Categoria') !!}
        {!! Form::select('category_id',$categories,$article->category->id,['class'=>'form-control select-category','required']) !!}
    </div>


    <div class="form-group">
        {!! Form::label('content','Contenido') !!}
        {!! Form::textarea('content',$article->content,['class'=>'form-control textarea-content','placeholder'=>'Articulo','required']) !!}
    </div>

    <div class="form-group">
    {!! Form::label('tags','Tags') !!}
    <!-- Los [] en el el select es para que nos regrese el id de todos los tags seleccionados-->
        {!! Form::select('tags[]',$tags,$my_tags,['class'=>'form-control select-tag','multiple','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Editar articulo',['class'=>'btn btn-primary']) !!}
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

        $('.textarea-content').trumbowyg();


    </script>
@endsection