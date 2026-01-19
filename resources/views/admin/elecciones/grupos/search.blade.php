{!!Form::open(array('url'=>'asignargrupo','method'=>'GET','autocomplete'=>'off'))!!}
{{-- {!! Form::open(array('url'=>'asignargrupo','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!} --}}
{{Form::token()}}
<div class="row form-group">
{{-- <div class="col-10"> --}}
		{{-- <input type="text" class="form-control" name="searchText" value="{{ $searchText }}" placeholder="Escribe texto..."> --}}
		<div class="col-2">
			
		<b>	{{ Form::label('idgrupo', 'Grupo de Usuarios') }}</b>
		</div>
		<div class="col-8">
			{{ Form::select('idgrupo', $grupos, $gruposelected, ['class' => 'form-control','required' => "required", 'placeholder'=>"Seleccione una opcion..."]) }}
		</div>
	{{-- </div> --}}
		<div class="col-2">
		<span class="input-group-btn">
			<button class="btn btn-info" type="submit">Buscar</button>
		</span>
</div>
</div>
{{ Form::close() }}
<hr size="19" noshade="noshade"/>