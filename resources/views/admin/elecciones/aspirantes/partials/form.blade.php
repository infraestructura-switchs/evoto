{{-- Eleccion --}}
<div class="form-group">
	{{ Form::label('ideleccion', 'Elecciones Disponibles') }}
	{{ Form::select('ideleccion', $elecciones, null, ['class' => 'form-control']) }}
	
</div>
{{-- Eleccion --}}
<hr color="gray" size=6>
<p> </p>
<div class="row">
	<!-- Nombre -->
	<div class="col-md-6 col-sm-6 col-xs-12" >
		<div class="form-group" >
			{{ Form::label('nombre', 'Nombres ') }}
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
			{{ Form::label('apellido', 'Apellidos') }}
			<span style="color:red;">
				*
			</span>
			{{ Form::text('apellido', null, ['class' => 'form-control', 'id' => 'apellido', 'required' => "required"]) }}
		</div>
	</div>
	<!-- Apellido -->
	<!-- tipo_documento -->
	<div class="form-group col-md-3 col-sm-6 col-xs-12">
		{{ Form::label('tipo_documento', 'Tipo Identificación') }}
		<span style="color:red;">
			*
		</span>
		{{Form::select('tipo_documento', ['CC' => 'Cédula','TI' => 'Tarjeta Identidad', 'PA' => 'Pasaporte','CE' => 'Cédula Extranjeria','PE' => 'Permiso Especial'], null,['class' => 'form-control ']) }}
	</div>
	<!-- tipo_documento -->
	<!-- documento -->
	<div class="col-md-5 col-sm-12 col-xs-12" >
		<div class="form-group" > 
			{{ Form::label('documento', 'Documento ') }}
			<span style="color:red;">
				*
			</span>
			{{ Form::text('documento', null, ['class' => 'form-control  ', 'id' => 'documento', 'required' => "required", 'autocomplete' => "off"]) }}
		</div>
	</div>
	<!-- documento -->
	<!-- lugar_expedicion -->
	<div class="col-md-4 col-sm-12 col-xs-12" >
		<div class="form-group" > 
			{{ Form::label('lugar_expedicion', 'Lugar de expedición ') }}
			<span style="color:red;">
				*
			</span>
			{{ Form::text('lugar_expedicion', null, ['class' => 'form-control  ', 'id' => 'lugar_expedicion', 'required' => "required", 'autocomplete' => "off"]) }}
		</div>
	</div>
	<!-- lugar_expedicion -->
	<!-- email -->
	<div class="col-md-6 col-sm-12 col-xs-12" >
		<div class="form-group" > 
			{{ Form::label('email', 'Email ') }}
			<span style="color:red;">
				*
			</span>
			{{ Form::email('email', null, ['class' => 'form-control  ', 'id' => 'email', 'required' => "required", 'autocomplete' => "off"]) }}
		</div>
	</div>
	<!-- email -->
	<!-- telefono -->
	<div class="col-md-6 col-sm-12 col-xs-12" >
		<div class="form-group" > 
			{{ Form::label('telefono', 'Teléfono ') }}
			<span style="color:red;">
				*
			</span>
			{{ Form::text('telefono', null, ['class' => 'form-control  ', 'id' => 'telefono', 'required' => "required", 'autocomplete' => "off"]) }}
		</div>
	</div>
	<!-- telefono -->
	<!-- programa -->
	<div class="form-group col-md-6 col-sm-6 col-xs-12">
		{{ Form::label('programa', 'Programa') }}
		<span style="color:red;">
			*
		</span>
		{{ Form::select('programa', $programas, null, ['class' => 'form-control','required' => "required"]) }}
	</div>
	<!-- programa -->
	<!-- semestre -->
	<div class="form-group col-md-6 col-sm-6 col-xs-12">
		{{ Form::label('semestre', 'Semestre') }}
		<span style="color:red;">
			*
		</span>
		{{-- {{Form::seleselectRange('semestre', 10, 20, null,['class' => 'form-control ']) }} --}}
		{{ Form::selectRange('semestre', 1, 12,null,['class' => 'form-control ']) }}

	</div>
	<!-- semestre -->
</div>



<div class="row">
	<div class="col-md-8 col-sm-12 col-xs-12">
		<div class="form-group">
			<b>{{ Form::label('foto', 'Foto (imagen 500x500 px): ') }}</b>
			{{ Form::file('foto'),['class' => 'form-control','id' => 'foto'] }}
		</div>
	</div>

	<div class="col-md-4 col-sm-12 col-xs-12">

		@if($foto != null)
		@if($aspirante->foto)
		{{-- <div class="col-md-6 col-sm-6 col-xs-12"> --}}
			<div class="form-group">
				<p><strong><b>Foto (IMAGEN): </b></strong>
					<a href="{{asset('storage/candidatos/'.$aspirante->foto)}}" target="_blank" itemprop="contentUrl" data-size="450x450">
						<img class="img-thumbnail img-fluid" src="{{asset('storage/candidatos/'.$aspirante->foto)}}"
						itemprop="thumbnail" width="60px" alt="Image description" />
					</a></p>       
				{{-- </div> --}}
			</div>
			@endif

			@endif
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 col-sm-12 col-xs-12">
			<div class="form-group">
				<b>{{ Form::label('solicitud', 'Formato de inhabilidades (PDF): ') }}</b>
				{{ Form::file('solicitud'),['class' => 'form-control','id' => 'solicitud'] }}
			</div>
		</div>

		{{-- solicitud --}}
		<div class="col-md-4 col-sm-12 col-xs-12">

			@if($solicitud != null)
			@if($aspirante->solicitud)
			{{-- <div class="col-md-6 col-sm-6 col-xs-12"> --}}
				<div class="form-group">
					<p><strong>Formato de inhabilidades (PDF): </strong>
						<a href="{{asset('storage/solicitudes/'.$aspirante->solicitud)}}" target="_blank" itemprop="contentUrl" data-size="250x250">
							<img class="img-thumbnail img-fluid" src="{{asset('storage/image/pdf.png')}}"
							itemprop="thumbnail" width="60px" alt="Image description" />
						</a></p>       
					{{-- </div> --}}
				</div>
				@endif

				@endif
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 col-sm-12 col-xs-12">
				<div class="form-group">
					<b>{{ Form::label('declaracion', 'Formato tratamientos de Datos personales  (PDF): ') }}</b>
					{{ Form::file('declaracion'),['class' => 'form-control','id' => 'declaracion'] }}
				</div>
			</div>

			{{-- declaracion --}}
			<div class="col-md-4 col-sm-12 col-xs-12">

				@if($declaracion != null)
				@if($aspirante->declaracion)
				{{-- <div class="col-md-6 col-sm-6 col-xs-12"> --}}
					<div class="form-group">
						<p><strong>Formato tratamientos de Datos personales  (PDF): </strong>
							<a href="{{asset('storage/declaraciones/'.$aspirante->declaracion)}}" target="_blank" itemprop="contentUrl" data-size="250x250">
								<img class="img-thumbnail img-fluid" src="{{asset('storage/image/pdf.png')}}"
								itemprop="thumbnail" width="60px" alt="Image description" />
							</a></p>       
						{{-- </div> --}}
					</div>
					@endif

					@endif
				</div>
			</div>


			<!-- Botones -->

			<div class="form-actions right">

				{{ Form::submit('Guardar', ['class' => 'btn btn-primary']) }}

				<a href="{{ route('aspirantes.index') }}"><button type="button" class="btn btn-warning mr-1">
					Cancel
				</button></a>			

			</div>



