
<div class="row">
	{{-- filtro de busqueda --}}
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title" id="basic-layout-form">Filtro de búsqueda | Estadísticas</h4>
				<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
				<div class="heading-elements">
					<ul class="list-inline mb-0">
						<li><a data-action="collapse"><i class="ft-minus"></i></a></li>          
					</ul>
				</div>
			</div>
			<div class="card-content collapse show">
				<div class="card-body">
					<div class="card-text">
					</div>
					<div class="form">
						<div class="form-body">
							{{ Form::open(['route' => 'estadisticas', 'method' => 'GET']) }}
							<div class="row">
								<div class="col-md-9 col-sm-9 col-xs-12" >
									<div class="input-group">                 
										<div class="input-group-prepend">
											<span class="input-group-text bg-primary border-primary white" id="basic-addon7">Elección</span>
										</div>
										{{ Form::select('id_eleccion', $elecciones, null, ['class' => 'form-control','placeholder'=>"Seleccione una opcion..."]) }}
									</div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-12" >

									<div >
										{{ Form::submit('Buscar', ['class' => 'btn btn-info']) }}
									</div>
								</div>            
							</div>
						</div>     
					</div>

					{{ Form::close() }}

				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
{{-- / filtro de busqueda --}}