@extends('layouts.plantilla')

@section('css')

<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/listbox/bootstrap-duallistbox.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/dual-listbox.css')}}">
{{-- <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/listbox/bootstrap-duallistbox.min.css">
 <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/dual-listbox.css">
 --}}
 @endsection

 @section('contenido')


 <!-- Dual ListBox with multiple selection start -->
 <section class="with-multi-selection">
 	<div class="row">
 		<div class="col-12">
 			<div class="card">
 				<div class="card-header">
 					<h4 class="card-title">Asignación  de usuarios</h4>
 					<a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>

 				</div>
 				<div class="card-content">
 					<div class="card-body">
 						<div class="form-group">

 							@include('admin.elecciones.grupos.search')
 							@if(count($usuario2) > 0)
 							{!!Form::open(array('url'=>'asignargrupo/guardar','method'=>'POST','autocomplete'=>'off'))!!}
 							{{Form::token()}}
 							
 							<div class="form-group">
 								{{ Form::label('ideleccion', 'Eleccion a asignar usuarios') }}
 								{{ Form::select('ideleccion', $elecciones, null, ['class' => 'form-control','required' => "required"]) }}
 							</div>
 						
 							<div class="form-group">
 								
 								{{ Form::select('id_users[]', $usuario2, null, 
 									['class' => 'duallistbox-custom-text' ,'selected'=>"selected",
 									'size'=>"16",								
 									'multiple'=>"multiple"]) }}

 								</div>

 								<div class="form-group">
 									<button class="btn btn-primary" type="submit">Guardar</button>
 									<button class="btn btn-danger" input onclick="history.back()" type="reset">Cancelar</button>
 								</div>
 								{!!Form::close()!!}
 								@else
 								<h4 class="card-title">No se encuentran Usuarios en este grupo!!!</h4>
 								@endif
 							</div>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</section>
 	<!-- Dual ListBox with multiple selection end -->


 	@endsection
 	@section('js')

 	<!-- BEGIN PAGE VENDOR JS-->
 	<script src="{{asset('app-assets/vendors/js/forms/listbox/jquery.bootstrap-duallistbox.min.js')}}" type="text/javascript"></script>
 	<!-- END PAGE VENDOR JS-->
 	<!-- BEGIN PAGE LEVEL JS-->
 	<script src="{{asset('app-assets/js/scripts/forms/listbox/form-duallistbox.js')}}" type="text/javascript"></script>
 	<!-- END PAGE LEVEL JS-->

 	<script src="{{asset('js/visiontic/jquery.min.js')}}"></script>

 	@endsection