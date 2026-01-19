<h4 class="form-section"><i class="ft-edit-2"></i> Información basica</h4>
<div class="form-group">
	{{ Form::label('nombre', 'Nombre') }}
	{{ Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre']) }}
</div>

<!-- Botones -->

<div class="form-actions right">

	{{ Form::submit('Guardar', ['class' => 'btn btn-primary']) }}

	<a href="{{ route('ciudades.index') }}"><button type="button" class="btn btn-warning mr-1">
		Cancel
	</button></a>			

</div>
