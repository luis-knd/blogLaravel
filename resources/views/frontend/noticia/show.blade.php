@extends('backend.layouts.main')

@section('title','Noticia: ')

@section('menu-contextual')
	@parent
	<li><a href="{{ route('backend.noticia.index') }}">Listado</a></li>
	<li><a href="{{ route('frontend.noticia.show', ['id' => $noticia->id]) }}">Ver en Frontend</a></li>
	<li><a href="#">Editar</a></li>
	<li><a href="#">Eliminar</a></li>
@endsection

@section('content')
    <h1>{{ $noticia->titulo }}</h1>
    <p>{{ $noticia->cuerpo }}</p>
@endsection