 <div class="modal animated bounceInRight text-left" id="modal-reset-{{ $use->id }}" tabindex="-1"
 	role="dialog" aria-labelledby="myModalLabel49" aria-hidden="true">
 	<div class="modal-dialog" role="document" >
 		<div class="modal-content">
 			<div class="modal-header bg-info white">
 				<h4 class="modal-title" id="myModalLabel49">Restablecer Contraseña Usuario</h4>
 				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 					<span aria-hidden="true">&times;</span>
 				</button>
 			</div>
 			<div class="modal-body">
 				<p>Confirme si desea la contrasena de: </p>
 				<div> <b>{{ $use->name }} {{ $use->apellido }}</b></div>
 				<div><b>{{ $use->email }}</b></div>
 			</div>
 			<div class="modal-footer"> 				
 				 <a href="{{ route('usuarios.reset_password', $use->id) }}">
 				 	<button  class="btn btn-outline-primary">Restablcer</button>
 				 </a>
 				<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Cerrar</button>				
 		
 			</div>
 		</div>
 	</div>
 </div>