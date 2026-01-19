 <div class="modal animated bounceInRight text-left" id="modal-cerrar-{{ $ele->id }}" tabindex="-1"
 	role="dialog" aria-labelledby="myModalLabel49" aria-hidden="true">
 	<div class="modal-dialog" role="document" >
 		<div class="modal-content">
 			<div class="modal-header bg-info white">
 				<h4 class="modal-title" id="myModalLabel49">Cerrar Elección</h4>
 				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 					<span aria-hidden="true">&times;</span>
 				</button>
 			</div>
 			
 			<div class="modal-body">
 				<p>Confirme si desea Cerrar esta elección</p>
 				
 			</div>
 			<div class="modal-footer">
 				
 				<a href="{{ route('cerrar.eleccio',$ele->id ) }}" >
 					<button  class="btn btn-outline-primary">Cerrar</button></a>
 					<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Cerrar</button>
 				</div>
 			
 			</div>
 		</div>
 	</div>