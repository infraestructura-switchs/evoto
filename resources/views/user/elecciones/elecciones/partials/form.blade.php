<div class="row">
	<!-- Nombre -->
	<div class="col-md-12 col-sm-12 col-xs-12" >
		<div class="form-group" >
			{{ Form::label('nombre', 'Nombre de la Elección ') }}
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
			{{ Form::label('descripcion', 'Descripción de la Elección') }}
			<span style="color:red;">
				*
			</span>
			{{ Form::textarea('descripcion', null, ['class' => 'form-control  ', 'id' => 'descripcion', 'required' => "required"]) }}
		</div>
	</div>
	<!-- descripcion -->
	<div class="col-md-12 col-sm-12 col-xs-12" >
		<div class="form-group" >
			{{ Form::label('cargo_recibir', 'Cargo a Recibir') }}
			<span style="color:red;">
				*
			</span>
			{{ Form::text('cargo_recibir', null, ['class' => 'form-control  ', 'id' => 'cargo_recibir', 'required' => "required"]) }}
		</div>
	</div>
	<!-- Departamento -->
	{{-- <div class="col-md-6 col-sm-12 col-xs-12" >
		<div class="form-group" >
			{{ Form::label('departamento', 'Departamento ') }}
			<span style="color:red;">
				*
			</span>
			{{ Form::text('departamento', null, ['class' => 'form-control  ', 'id' => 'departamento', 'required' => "required", 'autocomplete' => "off"]) }}
		</div>
	</div> --}}
	{{ Form::hidden('departamento', "VALLE DEL CAUCA") }}
	<!-- Departamento -->
	<!-- Ciudad -->
	{{-- <div class="col-md-6 col-sm-12 col-xs-12" >
		<div class="form-group" >
			{{ Form::label('ciudad', 'Ciudad ') }}
			<span style="color:red;">
				*
			</span>
			{{ Form::text('ciudad', null, ['class' => 'form-control  ', 'id' => 'ciudad', 'required' => "required", 'autocomplete' => "off"]) }}
		</div>
	</div> --}}
	{{ Form::hidden('ciudad', "TULUÁ") }}

	<div class="col-md-6 col-sm-12 col-xs-12" >
		<div class="form-group" >
			{{ Form::label('periodo_eleccion_desde', 'Año inicio Periodo ') }}
			<span style="color:red;">
				*
			</span>
			{{ Form::text('periodo_eleccion_desde', null, ['class' => 'form-control  ', 'id' => 'periodo_eleccion_desde', 'required' => "required", 'autocomplete' => "off"]) }}
		</div>
	</div>
	<div class="col-md-6 col-sm-12 col-xs-12" >
		<div class="form-group" >
			{{ Form::label('periodo_eleccion_hasta', 'Año Finalización Periodo ') }}
			<span style="color:red;">
				*
			</span>
			{{ Form::text('periodo_eleccion_hasta', null, ['class' => 'form-control  ', 'id' => 'periodo_eleccion_hasta', 'required' => "required", 'autocomplete' => "off"]) }}
		</div>
	</div>
</div>
<!-- Ciudad -->
<h4 class="form-section"><i class="ft-calendar"></i> <b>FECHA DE INSCRIPCIÓN DE CANDIDATOS</b></h4>
{{-- <hr color="black" size=7> --}}
<div class="row">
	<!-- fecha_incio -->
	<div class="col-md-6 col-sm-12 col-xs-12" >
		<div class="form-group" >
			{{ Form::label('fecha_apertura_inscripcion', 'Fecha Apertura Inscripciones ') }}
			<span style="color:red;">
				*
			</span>
			{{ Form::date('fecha_apertura_inscripcion', null, ['class' => 'form-control  ', 'id' => 'fecha_apertura_inscripcion', 'required' => "required"]) }}

		</div>
	</div>
	<!-- fecha_incio -->
		<div class="col-md-6 col-sm-12 col-xs-12" >
		<div class="form-group" >
			{{ Form::label('hora_apertura_inscripcion', 'Hora Cierre Inscripción  ') }}
			<span style="color:red;">
				*
			</span>
			{{ Form::time('hora_apertura_inscripcion', null, ['class' => 'form-control  ', 'id' => 'hora_apertura_inscripcion', 'required' => "required"]) }}

		</div>
	</div>
	<!-- fecha_fin -->
	<div class="col-md-6 col-sm-12 col-xs-12" >
		<div class="form-group" >
			{{ Form::label('fecha_cierre_inscripcion', 'Fecha Cierre Inscripciones') }}
			<span style="color:red;">
				*
			</span>
			{{ Form::date('fecha_cierre_inscripcion', null, ['class' => 'form-control  ', 'id' => 'fecha_cierre_inscripcion', 'required' => "required"]) }}

		</div>
	</div>
	<!-- fecha_fin -->
		<div class="col-md-6 col-sm-12 col-xs-12" >
		<div class="form-group" >
			{{ Form::label('hora_cierre_inscripcion', 'Hora Cierre Inscripción  ') }}
			<span style="color:red;">
				*
			</span>
			{{ Form::time('hora_cierre_inscripcion', null, ['class' => 'form-control  ', 'id' => 'hora_cierre_inscripcion', 'required' => "required"]) }}

		</div>
	</div>

</div>

<h4 class="form-section"><i class="ft-calendar"></i> <b>FECHA DE LA ELECCIÓN</b></h4>
{{-- <hr color="black" size=7> --}}
<div class="row">
	<!-- fecha_incio -->
	<div class="col-md-6 col-sm-12 col-xs-12" >
		<div class="form-group" >
			{{ Form::label('fecha_inicio_eleccion', 'Fecha Apertura Elección ') }}
			<span style="color:red;">
				*
			</span>
			{{ Form::date('fecha_inicio_eleccion', null, ['class' => 'form-control  ', 'id' => 'fecha_inicio_eleccion', 'required' => "required"]) }}
		</div>
	</div>
	<div class="col-md-6 col-sm-12 col-xs-12" >
		<div class="form-group" >
			{{ Form::label('hora_apertura_eleccion', 'Hora Apertura elección ') }}
			<span style="color:red;">
				*
			</span>
			{{ Form::time('hora_apertura_eleccion',null, ['class' => 'form-control  ', 'id' => 'hora_apertura_eleccion', 'required' => "required"]) }}

		</div>
	</div>
	<!-- fecha_incio -->
	<!-- fecha_fin -->
	<div class="col-md-6 col-sm-12 col-xs-12" >
		<div class="form-group" >
			{{ Form::label('fecha_fin_eleccion', 'Fecha Cierre elección') }}
			<span style="color:red;">
				*
			</span>
			{{ Form::date('fecha_fin_eleccion', null, ['class' => 'form-control  ', 'id' => 'fecha_incio', 'required' => "required"]) }}

		</div>
	</div>
	<div class="col-md-6 col-sm-12 col-xs-12" >
		<div class="form-group" >
			{{ Form::label('hora_cierre_eleccion', 'Hora Cierre elección ') }}
			<span style="color:red;">
				*
			</span>
			{{ Form::time('hora_cierre_eleccion', null, ['class' => 'form-control  ', 'id' => 'hora_cierre_eleccion', 'required' => "required"]) }}

		</div>
	</div>
	<!-- fecha_fin -->

	
</div>
<h4 class="form-section"><i class="ft-list"></i> <b>INFORMACION ADICIONAL</b></h4>
{{-- <hr color="black" size=7> --}}
<div class="row">
	<!-- Lugar -->
	<div class="col-md-12 col-sm-12 col-xs-12" >
		<div class="form-group" >
			{{ Form::label('lugar', 'Lugar de la Elección') }}
			<span style="color:red;">
				*
			</span>
			{{ Form::text('lugar', "Unidad Central del Valle del Cauca", ['class' => 'form-control  ', 'id' => 'lugar', 'required' => "required", 'autocomplete' => "off"]) }}
		</div>
	</div>
	<!-- Lugar -->
	<div class="col-md-12 col-sm-12 col-xs-12" >
		<div class="form-group" >
			{{ Form::label('pagina_publicacion_convocatoria', 'Link Publicacion de la Convocatoria') }}
			<span style="color:red;">
				*
			</span>
			{{ Form::text('pagina_publicacion_convocatoria', null, ['class' => 'form-control  ', 'id' => 'fecha_incio', 'required' => "required"]) }}

		</div>
	</div>


</div>

<!-- Botones -->

<div class="form-actions right">

	{{ Form::submit('Guardar', ['class' => 'btn btn-primary']) }}

	<a href="{{ route('elecciones.index') }}"><button type="button" class="btn btn-warning mr-1">
		Cancelar
	</button></a>			

</div>



