@extends('admin.template.main')

@section('title','Categoria')

@section('content')
    <a href="{{route('categories.create')}}" class="btn btn-info">Registrar nuevo usuario</a>

@endsection