@extends('layouts.plantilla')

@section('css')

<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/colors/palette-gradient.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/users.css')}}">

@endsection

@section('contenido')


<div class="row">
	{{-- filtro de busqueda --}}
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title" id="basic-layout-form">Filtro de Busqueda | Vista previa Tarjetón</h4>
				<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
				<div class="heading-elements">
					<ul class="list-inline mb-0">
						<li><a data-action="collapse"><i class="ft-minus"></i></a></li>          
					</ul>
				</div>
			</div>
			<div class="card-content collapse show">
				<div class="card-body">
					<div class="card-text">
					</div>
					<div class="form">
						<div class="form-body">
							{{ Form::open(['route' => 'tarjeton.preview', 'method' => 'GET']) }}
							<div class="row">
								<div class="col-md-9 col-sm-9 col-xs-12" >
									<div class="input-group">                 
										<div class="input-group-prepend">
											<span class="input-group-text bg-primary border-primary white" id="basic-addon7">Elección</span>
										</div>
										{{ Form::select('id_eleccion', $elecciones, null, ['class' => 'form-control','placeholder'=>"Seleccione una opcion..."]) }}
									</div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-12" >

									<div >
										{{ Form::submit('Buscar', ['class' => 'btn btn-info']) }}
									</div>
								</div>            
							</div>
						</div>     
					</div>

					{{ Form::close() }}

				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
{{-- / filtro de busqueda --}}
<div class="row">
	<div class="col-md-12">
		
		@if(count($candidatos) >= 1)
		<h4 class="text-uppercase"> 
			{{ $candidatos[0]->eleccion }}
		</h4>
		<b><p>Vista previa de Tarjetón.</p></b>
		@else
		<p>No se encontraron resultados.</p>
		@endif		
	</div>  
	@foreach($candidatos as $can)
	@include('user.elecciones.tarjeton.partials.tarjeton')
	
	@include('user.elecciones.tarjeton.show')
	@endforeach
</div>
@endsection
@section('js')
<style type="text/css"> 
	#capa1{ position:relative; z-index:100; background-color:#f2f7e3; }
</style>
@endsection
