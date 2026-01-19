<div class="row">
	<!-- Nombre -->
	<div class="col-md-12 col-sm-12 col-xs-12" >
		<div class="form-group" >
			{{ Form::label('nombre', 'Nombre ') }}
			<span style="color:red;">
				*
			</span>
			{{ Form::text('nombre', null, ['class' => 'form-control  ', 'id' => 'nombre', 'required' => "required", 'autocomplete' => "off"]) }}
		</div>
	</div>
	<!-- Nombre -->
	<!-- descripcion -->
	<div class="col-md-12 col-sm-12 col-xs-12" >
		<div class="form-group" >
			{{ Form::label('descripcion', 'Descripción ') }}
			<span style="color:red;">
				*
			</span>
			{{ Form::textarea('descripcion', null, ['class' => 'form-control  ', 'id' => 'descripcion', 'required' => "required"]) }}
		</div>
	</div>
	<!-- descripcion -->

</div>

<div class="row">
	<!-- fecha_inicio -->
	<div class="col-md-6 col-sm-6 col-xs-12" >
		<div class="form-group" >
			{{ Form::label('fecha_inicio', 'Fecha de Inicio') }}
			<span style="color:red;">
				*
			</span>
			{{ Form::date('fecha_inicio', null, ['class' => 'form-control daterange', 'id' => 'fecha_inicio', 'required' => "required"]) }}
		</div>
	</div>
	<!-- fecha_inicio -->
	<!-- fecha_cierre -->
	<div class="col-md-6 col-sm-6 col-xs-12" >
		<div class="form-group" >
			{{ Form::label('fecha_cierre', 'Fecha de Cierre') }}
			<span style="color:red;">
				*
			</span>
			{{ Form::date('fecha_cierre', null, ['class' => 'form-control daterange', 'id' => 'fecha_cierre', 'required' => "required"]) }}
		</div>
	</div>
	<!-- fecha_cierre -->
	
</div>

<p> </p>
<div class="form-group">

	@if( $estado_S === 'true')

	Inactivo {{ Form::checkbox('estado','Activo', true, ['class' => 'form-control switchery','data-size'=>'sm']) }} Activo

	@else

	Inactivo {{ Form::checkbox('estado','Activo', false, ['class' => 'form-control switchery','data-size'=>'sm']) }} Activo

	@endif

</div>

<!-- Botones -->

<div class="form-actions right">

	{{ Form::submit('Guardar', ['class' => 'btn btn-primary']) }}
		
	<a href="{{ route('encuestas.index') }}"><button type="button" class="btn btn-warning mr-1">
		Cancel
	</button></a>			

</div>



