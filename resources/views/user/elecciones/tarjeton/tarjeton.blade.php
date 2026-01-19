@extends('layouts.plantilla')

@section('css')

<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/colors/palette-gradient.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/users.css')}}">

@endsection

@section('contenido')


<div class="row">
	@if(count($candidatos) >0)
	<div class="col-md-12">
		<h4 class="text-uppercase"> 
			{{ $candidatos[0]->eleccion }}
		</h4>
		<p>Por favor realice el voto!</p>
	</div>  
	@endif
	@forelse ($candidatos as $can)

	@include('user.elecciones.tarjeton.partials.tarjeton')	
	@include('user.elecciones.tarjeton.confirmarvot')
	@empty
	<div class="col-md-12">
		<h4 class="text-uppercase"> 
			No hay votaciones en este momento
		</h4>
		<p>intentalo mas tarde!</p>
	</div> 
	@endforelse
</div>
@endsection

@section('js')
<style type="text/css"> 
	#capa1{ position:relative; z-index:100; background-color:#f2f7e3; }
</style>
@endsection
