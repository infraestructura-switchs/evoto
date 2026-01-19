 <h4 class="form-section"><i class="ft-list"></i> Información General</h4>

 <div class="row">
 	{{-- empresa --}}

 	<div class="form-group col-md-12 col-sm-12 col-xs-12">
 		{{ Form::label('id_empresa', 'Empresa') }}
 		{{ Form::select('id_empresa', $empresas, null, ['class' => 'form-control']) }}

 	</div>
 	{{-- empresa --}}
 	{{-- profecion --}}

 	<div class="form-group col-md-12 col-sm-12 col-xs-12">
 		{{ Form::label('id_profesion', 'Profesión') }}
 		{{ Form::select('id_profesion', $profesiones, null, ['class' => 'form-control']) }}

 	</div>
 	{{-- profecion --}}
 </div>
 <h4 class="form-section"><i class="ft-user"></i> Información Personal</h4>
 <div class="row">
 	{{-- nombre --}}
 	<div class="form-group col-md-12 col-sm-12 col-xs-12" >
 		{{ Form::label('nombre', 'Nombre Completo ') }}
 		<span style="color:red;">
 			*
 		</span>
 		{{ Form::text('nombre', null, ['class' => 'form-control  ', 'id' => 'nombre', 'required' => "required"]) }}
 	</div>
 	{{-- nombre --}}
 	
 </div>
 <div class="row">
 	{{-- tipo documento --}}
 	<div class="form-group col-md-6 col-sm-6 col-xs-12">
 		{{ Form::label('tipo_documento', 'Tipo Documento') }}
 		<span style="color:red;">
 			*
 		</span>
 		{{Form::select('tipo_documento', ['CC' => 'Cedula', 'TI' => 'Tarjeta Identidad','PA' => 'Pasaporte'], null,['class' => 'form-control ']) }}
 	</div>
 	{{-- tipo documento --}}
 	{{-- numero documetno --}}

 	<div class="form-group col-md-6 col-sm-6 col-xs-12">
 		{{ Form::label('documento', 'Numero Documento') }}
 		<span style="color:red;">
 			*
 		</span>
 		{{ Form::text('documento', null, ['class' => 'form-control', 'id' => 'documento', 'required' => "required"]) }}

 	</div>
 	{{-- numero documento --}}
 </div>
 <div class="row">
 	
 	{{-- telefono1 --}}
 		<div class="form-group col-md-6 col-sm-6 col-xs-12">
 			{{ Form::label('telefono1', 'Telefono 1') }}

 			{{ Form::text('telefono1', null, ['class' => 'form-control', 'id' => 'telefono1']) }}
 		</div>
 		{{-- telefono1 --}}
 		{{-- telefono2 --}}
 		<div class="form-group col-md-6 col-sm-6 col-xs-12">
 			{{ Form::label('telefono2', 'Telefono 2') }}

 			{{ Form::text('telefono2', null, ['class' => 'form-control', 'id' => 'telefono2']) }}
 		</div>
 		{{-- telefono2 --}}
 	</div>
 	<div class="row">
 		{{-- direccion --}}

 		<div class="form-group col-md-6 col-sm-6 col-xs-12">
 			{{ Form::label('direccion', 'Direccion') }}

 			{{ Form::text('direccion', null, ['class' => 'form-control', 'id' => 'direccion']) }}
 		</div>
 		{{-- direccion --}}
 		
 		
 	</div>
 	
 	<div class="row">
 		{{-- descripcion --}}

 		<div class="form-group col-md-12 col-sm-12 col-xs-12">
 			{{ Form::label('descripcion', 'Descripcion') }}
 			{{ Form::textarea('descripcion', null, ['class' => 'form-control', 'rows' => '2']) }}
 		</div>
 		{{-- descripcion --}}
 		{{-- estado --}}

 		<p> </p>
 		<div class="form-group col-md-12 col-sm-12 col-xs-12">

 			@if( $estado_S === 'true')

 			Inactivo {{ Form::checkbox('estado','Activo', true, ['class' => 'form-control switchery','data-size'=>'sm']) }} Activo

 			@else

 			Inactivo {{ Form::checkbox('estado','Activo', false, ['class' => 'form-control switchery','data-size'=>'sm']) }} Activo

 			@endif

 		</div>
 		{{-- estado --}}
 	</div>
 	<!-- Botones -->

 	<div class="form-actions right">

 		{{ Form::submit('Guardar', ['class' => 'btn btn-primary']) }}

 		<a href="{{ route('empleados.index') }}"><button type="button" class="btn btn-warning mr-1">
 			Cancel
 		</button></a>			

 	</div>