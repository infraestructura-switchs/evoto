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
 					<h4 class="card-title">Sufragantes Asignados a una Elección</h4>
 					<a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>

 				</div>
 				<div class="card-content">
 					<div class="card-body">
 						<div class="form-group"> 

 							@include('admin.elecciones.asignados.search')
 							@if(count($asignados) > 0)
 							<h4><b>Elección: {{ $seleccionada->nombre }}</b></h4>
 						{{-- 	<p>
 								<div class="col-md-12">
 									<h4 class="text-uppercase"> 
 										<a href="{{URL::action('User\EleccionController@excel_sufragantes', $seleccionada->id)}}">
 											<button type="button" class="btn btn-icon btn-info btn-sm" data-toggle="tooltip" data-original-title="Crear Nuevo">
 												<i class="la la-file-excel-o"></i>
 												Exportar Excel
 											</button>
 										</a>
 									</h4>
 								</div>
 							</p> --}}
 							<div class="row">
 							<div class="col-md-12">
 								<div class="form-group">
 									<!-- Button Dropdowns Sizes with Icons -->
 									<div class="btn-group mr-1 mb-1">
 										<button type="button" class="btn btn-info dropdown-toggle " data-toggle="dropdown"
 										aria-haspopup="true" aria-expanded="false"><i class="la la-download"></i> EXPORTAR</button>
 										<div class="dropdown-menu">
 											<a class="dropdown-item" href="{{URL::action('User\EleccionController@excel_sufragantes', $seleccionada->id)}}">Exportar EXCEL</a>
 											<a class="dropdown-item" href="{{URL::action('User\EleccionController@pdf_sufragantes', $seleccionada->id)}}" target="_blank">Exportar PDF</a> 
 											{{-- <a class="dropdown-item" href="#">Something else here</a> --}}
 											<div class="dropdown-divider"></div>
 											{{-- <a class="dropdown-item" href="#">Separated link</a> --}}
 										</div>
 									</div>
 								</div>
 							</div>



						{{-- 	<a href="{{ route('carnet_obra',$nombre_obra->id) }}">
								<button type="button" class="btn btn-icon btn-success btn-sm" data-toggle="tooltip" data-original-title="GENERAR CARNETS"><i class="la la-user">GENERAR CARNET</i>
								</button>
							</a> --}}
						</div>

						
						<table class="table table-striped table-bordered zero-configuration" id="tabla">
							<thead>
								<tr>
									<th  width="10px">ID</th>
									<th width="130px">NUM.DOCUMENTO </th>
									<th width="200px">NOMBRE</th>
									<th >CORREO ELECTRONICO</th>                 
									<th width="130px"><center>OPCIONES</center></th>
								</tr>
							</thead>
							<tbody>
								@foreach($asignados as $use)
								<tr>
									<td >{{ $loop->iteration}}</td> 
									<td >{{ $use->documento }}</td> 
									<td >{{ $use->name }} {{ $use->apellido }}</td>                
									<td >{{ $use->email }}</td>
									{{-- <td >{{ $use->role }}</td> --}}

									<td>


										<a href="{{ route('usuarios.edit', $use->id) }}">
											<button type="button" class="btn btn-icon btn-success btn-sm box-shadow-1" data-toggle="tooltip" data-original-title="Editar"><i class="la la-pencil"></i></button>
										</a>

										<a  data-target="#modal-delete-{{ $use->id }}" data-toggle="modal">
											<button type="button" class="btn btn-icon btn-danger btn-sm box-shadow-1"  data-toggle="tooltip" data-original-title="Eliminar"><i class="la la-trash"></i></button> 
										</a>                          

									</td>

								</tr>
								{{-- @include('admin.configuraciones.usuarios.modal') --}}
								{{-- @include('admin.configuraciones.usuarios.reset') --}}
								@endforeach

							</tbody>

						</table>
						{{-- FIN TABLA --}}
					</div>


					@else
					<h4 class="card-title">No se encuentran Usuarios en esta Elección!!!</h4>
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