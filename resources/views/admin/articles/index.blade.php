@extends('admin.template.main')

@section('title','Articulos')

@section('content')
    <a href="{{route('articles.create')}}" class="btn btn-info">Crear nuevo articulo</a>

    <!--BUSCADOR DE ARTICULOS  -->
    {!! Form::open(['route'=>'articles.index','method'=>'GET','class'=>'navbar-form pull-right']) !!}
        <div class="input-group">
            {!! Form::text('title',null,['class'=>'form-control mr-sm-2','placeholder'=>'Buscar','aria-describedby'=>'search']) !!}
            <span class="input-group-addon" id="search">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
            </span>
        </div>
    {!! Form::close() !!}
    <!-- FIN DE BUSCADOR -->


    <table class="table table-striped">
        <thead>
        <th>ID</th>
        <th>TITULO</th>
        <th>CATEGORIA</th>
        <th>USUARIO</th>
        <th>ACCIONES</th>
        </thead>
        <tbody>
            @foreach($articles as $article)
                <tr>
                    <td>{{$article->id}}</td>
                    <td>{{$article->title}}</td>
                    <td>{{$article->category->name}}</td>
                    <td>{{$article->user->name}}</td>
                    <td>
                        <a href="{{ route('articles.edit',[$article->id]) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>
                        <a href="{{ route('admin.articles.destroy',[$article->id]) }}" onclick="return confirm('¿Estas seguro que deseas eliminarlo?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center">
        {!! $articles->render() !!}
    </div>
@endsection