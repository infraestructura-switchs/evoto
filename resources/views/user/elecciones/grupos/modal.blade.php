 <div class="modal animated bounceInRight text-left" id="modal-delete-{{ $gru->id }}" tabindex="-1"
 	role="dialog" aria-labelledby="myModalLabel49" aria-hidden="true">
 	<div class="modal-dialog" role="document" >
 		<div class="modal-content">
 			<div class="modal-header bg-danger white">
 				<h4 class="modal-title" id="myModalLabel49">Eliminar grupo</h4>
 				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 					<span aria-hidden="true">&times;</span>
 				</button>
 			</div>
 			<div class="modal-body">
 				<p>Confirme si desea Eliminar el grupo</p>
 			</div>
 			<div class="modal-footer">
 				{!! Form::open(['route' => ['grupos.destroy', $gru->id], 'method' => 'DELETE']) !!}
 				<button  class="btn btn-outline-primary">Eliminar</button>
 				<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Cerar</button>
 				
 				{!! Form::close() !!}
 			</div>
 		</div>
 	</div>
 </div>