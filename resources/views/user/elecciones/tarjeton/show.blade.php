 <div class="modal animated rollIn text-left" id="modal-show-{{ $can->id }}" tabindex="-1"
 	role="dialog" aria-labelledby="myModalLabel49" aria-hidden="true">
 	<div class="modal-dialog" role="document" >
 		<div class="modal-content">
 			<div class="modal-header bg-info white">
 				<h4 class="modal-title" id="myModalLabel49">CONFIRMACIÓN DE VOTO</h4>
 				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 					<span aria-hidden="true">&times;</span>
 				</button>
 			</div>
 			<div class="modal-body">
 				<div class="form-body"> 					
 					<P> </P> 				
 					<div class="row">
 						<div class="col-md-12 col-sm-12 col-xs-12">
 							<div class="form-group">
 								<p><strong>NOMBRE: </strong> {{ $can->nombre }} {{ $can->apellido }}   	</p>
 							</div>
 						</div>
 						<div class="col-md-12 col-sm-12 col-xs-12">
 							<div class="form-group">
 								<center><img src="{{asset('storage/candidatos/'.$can->foto)}}" class="rounded-circle  height-150" alt="Card image">  </center>
 							</div>
 						</div>
 						
 					</div>
 					<div class="row">
 						<div class="col-md-12 col-sm-12 col-xs-12" >
 							<div class="position-relative has-icon-left">
 								<input type="text" id="documento" class="form-control" placeholder="Numero Documento Identificación" name="documento" required="true">
 								<div class="form-control-position"><span style="color:red;">
 									*
 								</span>
 								<i class="ft-user"></i>
 							</div>
 						</div>
 					</div>
 				</div>
 				<p></p>
 				<div class="row">
 					<div class="col-md-12 col-sm-12 col-xs-12" >
 						<div class="position-relative has-icon-left">
 							<input type="text" id="telefono" class="form-control" placeholder="Número de Teléfono" name="telefono">
 							<div class="form-control-position">
 								<i class="ft-phone"></i>
 							</div>
 						</div>
 					</div> 				 
 				</div>
 				<p> </p>
 				<div class="row">
 					<div class="col-md-12 col-sm-12 col-xs-12" >
 						{{-- <label for="captcha">Captcha</label> --}}
 						{!! NoCaptcha::renderJs() !!}
 						{!! NoCaptcha::display() !!}
 						<span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>

 					</div> 				 
 				</div>


 			</div>
 		</div>
 		<div class="modal-footer">
 			{{ Form::submit('VOTAR', ['class' => 'btn btn-primary']) }}
 			<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Cancelar</button>
 		</div> 			
 	</div>
 </div>
</div>