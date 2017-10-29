@extends('admin.template.main')

@section('title','Articulos')

@section('content')
    <a href="{{route('articles.create')}}" class="btn btn-info">Crear nuevo articulo</a>
@endsection