 <div class="modal animated bounceInRight text-left" id="modal-activar-{{ $ele->id }}" tabindex="-1"
 	role="dialog" aria-labelledby="myModalLabel49" aria-hidden="true">
 	<div class="modal-dialog" role="document" >
 		<div class="modal-content">
 			<div class="modal-header bg-danger white">
 				<h4 class="modal-title" id="myModalLabel49">Activar Elección</h4>
 				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 					<span aria-hidden="true">&times;</span>
 				</button>
 			</div>
 			 {!! Form::open(['route' => 'activar.eleccion']) !!}
 			  @csrf
 			<div class="modal-body">
 				<p>Confirme si desea Iniciar esta elección</p>
 				<div class="form-group">
 					{{ Form::hidden('id', $ele->id ) }}

 				<div>
 					<div> 
 						
 					<p>¿Desea activar para esta elección el <b>Voto en Blanco</b>?</p>
 					</div>

 					Inactivo {{ Form::checkbox('votoblanco','Activo', true, ['class' => 'form-control switchery','data-size'=>'sm']) }} Activo
 				</div>

 				

 				</div>

                    <!-- <form class="form-horizontal form-simple" action="index.html" novalidate> -->
                      <fieldset class="form-group position-relative has-icon-left mb-0">
                        <input type="text" class="form-control form-control-lg input-lg" id="email" name="email" placeholder="Correo Electronico"
                        required autocomplete="off">
                        <div class="form-control-position">
                          <i class="ft-user"></i>
                        </div>
                      </fieldset>
                      <p></p>
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="password" class="form-control form-control-lg input-lg" id="password"
                        placeholder="Contraseña" name="password" autocomplete="off" required>
                        <div class="form-control-position">
                          <i class="la la-key"></i>
                        </div>
                      </fieldset>
 			</div>
 			<div class="modal-footer">
 				{{ Form::submit('Guardar', ['class' => 'btn btn-primary']) }}
 				{{-- <a href="{{ route('activar.eleccion',[$ele->id,$blanco] ) }}" >
 					<button  class="btn btn-outline-primary">Iniciar</button></a> --}}
 					<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Cerrar</button>
 				</div>
 				 {!! Form::close() !!}
 			</div>
 		</div>
 	</div>