@extends('backend.layouts.main)

@section('title','Noticia: ' . $noticia->titulo)

@section('menu-contextual')
	@parent
	<li><a href="{{ route('backend.noticia.index') }}">Ir al listado</a></li>
@endsection

@section('content')
	<h1>{{ $noticia->titulo }}</h1>
	<p>{{ $noticia->cuerpo }}</p>
@endsection