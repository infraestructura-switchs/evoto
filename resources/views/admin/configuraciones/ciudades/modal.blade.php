<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-delete-{{ $ciu->id }}">

<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">x</span>
			</button>
			<h4 class="modal-title">Eliminar Ciudades</h4>
		</div>
		<div class="modal-body">
			<p>Confirme si desea Eliminar el Ciudades</p>
		</div>
		<div class="modal-footer">
			

			{!! Form::open(['route' => ['ciudades.destroy', $ciu->id], 'method' => 'DELETE']) !!}
			<button  class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button class="btn btn-sm btn-primary">
				Eliminar
			</button>                           
			{!! Form::close() !!}
			
		</div>
	</div>
</div>

</div>