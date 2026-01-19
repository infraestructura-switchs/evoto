{!! Form::open(array('url'=>'configuraciones/ciudades','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}

<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
										<div class="input-group">
											<input type="text" class="form-control" name="searchText" value="{{ $searchText }}" placeholder="Escribe texto...">
											<span class="input-group-btn">
												<button class="btn btn-default" type="button">Buscar</button>
											</span>
										</div>
									</div>

{{Form::close()}}