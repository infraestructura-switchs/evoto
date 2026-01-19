 <div class="modal animated bounceInRight text-left" id="modal-validar-{{ $can->id }}" tabindex="-1"
 	role="dialog" aria-labelledby="myModalLabel49" aria-hidden="true">
 	<div class="modal-dialog" role="document" >
 		<div class="modal-content">
 			<div class="modal-header bg-info white">
 				<h4 class="modal-title" id="myModalLabel49">CONFIRME VALIDACIÓN DE ASPIRANTE</h4>
 				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 					<span aria-hidden="true">&times;</span>
 				</button>
 			</div>
 			<div class="modal-body">
 				<div class="form-body">
 					{!! Form::open(['route' => 'aspirantes_validar']) !!}
 					{{ Form::token() }}

 					{{ Form::hidden('id', $can->id) }}

 					<P> </P>
 					<div class="row">
 						<div class="col-md-12 col-sm-12 col-xs-12">
 							<div class="form-group">
 								<p><strong>Elección: </strong> {{ $can->eleccion }}</p>       
 							</div>
 						</div>

 					</div>
 					<div class="row">
 						<div class="col-md-6 col-sm-6 col-xs-12">
 							<div class="form-group">
 								<p><strong>Nombre: </strong> {{ $can->nombre }} {{ $can->apellido }}</p>       
 							</div>
 						</div>        

 					</div>
 					<div class="row">
 						<!-- programa -->
 						<div class="form-group col-md-6 col-sm-6 col-xs-12">
 							<b>{{ Form::label('estado', 'Estado') }}</b>
 							<span style="color:red;">
 								*
 							</span>
 							{{Form::select('estado', ['S' => 'Aprobado','R' => 'Rechazado'], null,['class' => 'form-control ','onChange'=>'pagoOnChange(this)']) }}
 						</div>
 						<!-- programa -->
 						<!-- numero_tarjeton -->
 						<div class="col-md-6 col-sm-12 col-xs-12" id="num_tarjeton" >
 							<div class="form-group" > 
 								<b>{{ Form::label('numero_tarjeton', 'Número Tarjetón') }}</b>
 								<span style="color:red;">
 									*
 								</span>
 								{{ Form::number('numero_tarjeton', null, ['class' => 'form-control  ', 'id' => 'numero_tarjeton', 'autocomplete' => "off"]) }}
 							</div>
 						</div>
 						<!-- numero_tarjeton -->
 						<!-- nota -->
 						<div class="col-md-12 col-sm-12 col-xs-12" >
 							<div class="form-group" > 
 								<b>{{ Form::label('nota', 'Nota ') }}</b>
 								<span style="color:red;">
 									*
 								</span>
 								{{ Form::textarea('nota', null, ['class' => 'form-control  ', 'id' => 'nota', 'required' => "required", 'autocomplete' => "off"]) }}
 							</div>
 						</div>
 						<!-- nota -->
 						
 					</div>



 				</div>
 			</div>
 			<div class="modal-footer">
 				{{ Form::submit('Validar', ['class' => 'btn btn-primary']) }}

 				<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Cerrar</button>


 			</div>
 			{!! Form::close() !!}
 		</div>
 	</div>
 </div>
 @section('js')

<script type="text/javascript">
	
	function pagoOnChange(sel) {
      
      if (sel.value=="S"){
          $("#num_tarjeton").show();
            	// $("#fcfdiv").hide();

      }else{

            $("#num_tarjeton").hide();
      }
}
</script>
 @endsection