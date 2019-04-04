@extends('backend.layouts.main')

@section('title','Listado de Noticias')

@section('menu-contextual')
	@parent
	<li><a href="{{ route('backend.noticia.create') }}">Nueva</a></li>
@endsection

@section('content')
	@foreach($listado as $noticia)
		<p><b>Titulo:</b> {{ $noticia->titulo }}</p>
	@endforeach
@endsection