{{-- Eleccion --}}
<div class="form-group">
	{{ Form::label('ideleccion', 'Elecciones') }}
	{{ Form::select('ideleccion', $elecciones, null, ['class' => 'form-control']) }}
	
</div>
{{-- Eleccion --}}
<hr color="gray" size=6>
<p> </p>
<div class="row">
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
	<!-- Apellido -->
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="form-group" >
			{{ Form::label('apellido', 'Apellido') }}
			<span style="color:red;">
				*
			</span>
			{{ Form::text('apellido', null, ['class' => 'form-control', 'id' => 'apellido', 'required' => "required"]) }}
		</div>
	</div>
	<!-- Apellido -->
</div>

<div class="row">
	<!-- numero tarjeton -->
	<div class="col-md-6 col-sm-6 col-xs-12" >
		<div class="form-group" >
			{{ Form::label('numero_tarjeton', 'Número de Inscripción Candidato') }}
			<span style="color:red;">
				*
			</span>
			{{ Form::number('numero_tarjeton', null, ['class' => 'form-control', 'id' => 'numero_tarjeton', 'required' => "required"]) }}
		</div>
	</div>
	<!-- numero tarjeton -->
	
</div>

<div class="row">

	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="form-group">
			{{ Form::label('foto', 'Foto de 150X150 px ') }}
			{{ Form::file('foto'),['class' => 'form-control'] }}
		</div>
	</div>
</div>


<!-- Botones -->

<div class="form-actions right">

	{{ Form::submit('Guardar', ['class' => 'btn btn-primary']) }}
		
	<a href="{{ route('candidatos.index') }}"><button type="button" class="btn btn-warning mr-1">
		Cancel
	</button></a>			

</div>



