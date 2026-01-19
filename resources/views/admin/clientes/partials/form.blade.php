 <h4 class="form-section"><i class="ft-list"></i> Información General</h4>

 <div class="row">
 	{{-- empresa --}}

 		<div class="form-group col-md-12 col-sm-12 col-xs-12">
 			{{ Form::label('id_empresa', 'Empresa') }}
 			{{ Form::select('id_empresa', $empresas, null, ['class' => 'form-control']) }}

 		</div>
 		{{-- empresa --}}
 	{{-- nombre --}}
 	<div class="form-group col-md-6 col-sm-6 col-xs-12" >
 		{{ Form::label('nombres', 'Nombres ') }}
 		<span style="color:red;">
 			*
 		</span>
 		{{ Form::text('nombres', null, ['class' => 'form-control  ', 'id' => 'nombres', 'required' => "required"]) }}
 	</div>
 	{{-- nombre --}}
 	{{-- apellido --}}
 	<div class="form-group col-md-6 col-sm-6 col-xs-12" >
 		{{ Form::label('apellidos', 'Apellidos ') }}
 		<span style="color:red;">
 			*
 		</span>
 		{{ Form::text('apellidos', null, ['class' => 'form-control  ', 'id' => 'apellidos', 'required' => "required"]) }}
 	</div>
 	{{-- apellido --}}
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
 		{{ Form::label('num_documento', 'Numero Documento') }}
 		<span style="color:red;">
 			*
 		</span>
 		{{ Form::text('num_documento', null, ['class' => 'form-control', 'id' => 'num_documento', 'required' => "required"]) }}

 	</div>
 	{{-- numero documento --}}
 </div>
 <div class="row">
 	
 	{{-- fecha nacimiento --}}
 	<div class="form-group col-md-6 col-sm-6 col-xs-12">
 		{{ Form::label('fecha_nacimiento', 'Fecha Nacimiento') }}
 		<fieldset>

 			{{ Form::date('fecha_nacimiento', null, ['class' => 'form-control ']) }}</fieldset>
 		</div>
 		{{-- fecha nacimiento --}}
 		{{-- telefono --}}
 		<div class="form-group col-md-6 col-sm-6 col-xs-12">
 			{{ Form::label('telefono', 'Telefono') }}

 			{{ Form::text('telefono', null, ['class' => 'form-control', 'id' => 'telefono']) }}
 		</div>
 		{{-- telefono --}}
 	</div>
 	<div class="row">
 		{{-- direccion --}}

 		<div class="form-group col-md-6 col-sm-6 col-xs-12">
 			{{ Form::label('direccion', 'Direccion') }}

 			{{ Form::text('direccion', null, ['class' => 'form-control', 'id' => 'direccion']) }}
 		</div>
 		{{-- direccion --}}
 		{{-- ciudad --}}
 	<div class="form-group col-md-6 col-sm-6 col-xs-12">
 		{{ Form::label('id_ciudad', 'Ciudad') }}
 		@if($bandera === "00")
 		{{ Form::select('id_ciudad', $ciudades, null, ['class' => 'form-control']) }}
 		@else
 		{{ Form::select('id_ciudad', $ciudades, '1', ['class' => 'form-control']) }}
 		@endif
 	</div>
 	{{-- ciudad --}}
 		
 	</div>
 	<div class="row">
 		{{-- email --}}
 		<div class="form-group col-md-6 col-sm-6 col-xs-12">
 			{{ Form::label('email', 'Email') }}
 			{{ Form::email('email', null, ['class' => 'form-control novalidate', 'id' => 'email']) }}
 		</div>
 		{{-- email --}}
 		
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
		
	<a href="{{ route('clientes.index') }}"><button type="button" class="btn btn-warning mr-1">
		Cancel
	</button></a>			

</div>