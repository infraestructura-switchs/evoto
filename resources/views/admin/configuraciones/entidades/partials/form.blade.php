<h4 class="form-section"><i class="ft-edit-2"></i> Información basica</h4>
<div class="row">
	<!-- Nit -->
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="form-group" >
			{{ Form::label('nit', 'Nit') }}
			<span style="color:red;">
				*
			</span>
			{{ Form::text('nit', null, ['class' => 'form-control', 'id' => 'nit', 'required' => "required"]) }}
		</div>
	</div>
	<!-- Nit -->
	<!-- Nombre -->
	<div class="col-md-6 col-sm-6 col-xs-12" >
		<div class="form-group" >
			{{ Form::label('nombre', 'Nombre ') }}
			<span style="color:red;">
				*
			</span>
			{{ Form::text('nombre', null, ['class' => 'form-control  ', 'id' => 'nombre', 'required' => "required"]) }}
		</div>
	</div>
	<!-- Nombre -->

</div>

<div class="row">
	<!-- direccion -->
	<div class="col-md-6 col-sm-6 col-xs-12" >
		<div class="form-group" >
			{{ Form::label('direccion', 'Direccion') }}
			<span style="color:red;">
				*
			</span>
			{{ Form::text('direccion', null, ['class' => 'form-control', 'id' => 'direccion', 'required' => "required"]) }}
		</div>
	</div>
	<!-- direccion -->
	<!-- telefono -->
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="form-group" >
			{{ Form::label('telefono', 'Telefono') }}
			<span style="color:red;">
				*
			</span>
			{{ Form::text('telefono', null, ['class' => 'form-control', 'id' => 'telefono', 'required' => "required"]) }}
		</div>
	</div>
	<!-- telefono -->
</div>

<div class="row">
	<!-- email -->
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="form-group" >
			{{ Form::label('email', 'Correo Electronico') }}
			<span style="color:red;">
				*
			</span>
			{{ Form::email('email', null, ['class' => 'form-control novalidate', 'id' => 'email', 'required' => "required"]) }}
		</div>
	</div>
	<!-- email -->
	<!-- sitio web -->
	<div class="col-md-6 col-sm-6 col-xs-12" >
		<div class="form-group" >
			{{ Form::label('sitio_web', 'Sitio Web') }}
			{{ Form::text('sitio_web', null, ['class' => 'form-control novalidate', 'id' => 'sitio_web']) }}
		</div>
	</div>
	<!-- sitio web -->
	
</div>

<div class="row">
	<!-- logo-->

	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="form-group">
			{{ Form::label('logo', 'Logo ') }}
			{{ Form::file('logo'),['class' => 'form-control'] }}
		</div>
	</div>
	<!-- logo-->
</div>
<p> </p>


<!-- Botones -->

<div class="form-actions right">

	{{ Form::submit('Guardar', ['class' => 'btn btn-primary']) }}

	<a href="{{ route('entidad.index') }}"><button type="button" class="btn btn-warning mr-1">
		Cancel
	</button></a>			

</div>



