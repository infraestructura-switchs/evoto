@extends('layouts.plantilla')

@section('contenido')
<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title" id="basic-layout-form">IMPORTAR USUARIOS</h4>
			<hr color="grey" size=8>
			<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
			<div class="heading-elements">
				<ul class="list-inline mb-0">
					<li><a data-action="collapse"><i class="ft-minus"></i></a></li>          
				</ul>
			</div>
			<div class="col-md-12">
    <div class="bs-callout-warning  callout-border-left p-1">
      <strong>IMPORTANTE</strong>
      <p>Para realizar la importación de los usuarios, previamente debe consultarlo con el proveedor para establecer los parámetros de importación.</p>
    </div>
    
  </div>
		</div>
		<div class="card-content collapse show">
			<div class="card-body">
				<div class="card-text">

				</div>

				<div class="form-body">

					{!! Form::open(['route' => 'usuario.import_excel', 'files' => true]) !!}

					{{-- GRUPO DE USUARIO --}}
					<div class="col-md-12 col-sm-12 col-xs-12" >
						<div class="form-group">
							{{ Form::label('id_grupo', 'Grupo de Usuarios') }}
							{{ Form::select('id_grupo', $grupos, null, ['class' => 'form-control','placeholder'=>"Seleccione una opción..."]) }}
						</div>
					</div>
					{{-- GRUPO DE USUARIO --}}
					{{-- FILES --}}

					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="form-group">
							{{ Form::label('excel', 'Archivo Excel (XLS,XLSX ) ') }}
							{{ Form::file('excel'),['class' => 'form-control'] }}
						</div>
					</div>
					{{-- FILES --}}

					<!-- Botones -->

					<div class="form-actions right">

						{{ Form::submit('Importar', ['class' => 'btn btn-primary']) }}

						<a href="{{ route('usuarios.index') }}"><button type="button" class="btn btn-warning mr-1">
							Cancel
						</button></a>			

					</div>
					{!! Form::close() !!}

				</div>


			</div>
		</div>
	</div>
</div>

@endsection