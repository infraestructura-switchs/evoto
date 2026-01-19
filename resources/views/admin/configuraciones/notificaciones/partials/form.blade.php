 <h4 class="form-section"><i class="ft-mail"></i> EMAIL</h4>
 {{-- <hr color="gray" size=3> --}}
 <div class="row">

 	<div class="col-md-6 col-sm-12 col-xs-12" >
 		<div class="form-group" >
 			<b>{{ Form::label('nombre', 'Enviar Email al iniciar elección a todos los usuarios asignados ') }}</b>
 			<p> </p>
 			<div>
 				@if( $em_inicio_elecc_s === 'true')

 				No {{ Form::checkbox('em_inicio_elecc','SI', true, ['class' => 'form-control switchery','data-size'=>'sm']) }} Si

 				@else

 				No {{ Form::checkbox('em_inicio_elecc','SI', false, ['class' => 'form-control switchery','data-size'=>'sm']) }} Si

 				@endif
 			</div>
 		</div>
 	</div>


 	<div class="col-md-6 col-sm-12 col-xs-12" >
 		<div class="form-group" >
 			<b>{{ Form::label('nombre2', 'Enviar Email al realizar el Voto ') }}</b>
 			<p> </p>
 			<div>
 				@if( $em_conf_voto_s === 'true')

 				No {{ Form::checkbox('em_conf_voto','SI', true, ['class' => 'form-control switchery','data-size'=>'sm']) }} Si

 				@else

 				No {{ Form::checkbox('em_conf_voto','SI', false, ['class' => 'form-control switchery','data-size'=>'sm']) }} Si

 				@endif
 			</div>
 		</div>
 	</div>

</div>
 <h4 class="form-section"><i class="ft-smartphone"></i>SMS</h4>
        {{-- <hr color="gray" size=3> --}}
<div class="row">
 	<div class="col-md-6 col-sm-12 col-xs-12" >
 		<div class="form-group" >
 			<b>{{ Form::label('nombre3', 'Enviar SMS al iniciar elección a todos los usuarios asignados ') }}</b>
 			<p> </p>
 			<div>
 				@if( $sms_inicio_elecc_s === 'true')

 				No {{ Form::checkbox('sms_inicio_elecc','SI', true, ['class' => 'form-control switchery','data-size'=>'sm']) }} Si

 				@else

 				No {{ Form::checkbox('sms_inicio_elecc','SI', false, ['class' => 'form-control switchery','data-size'=>'sm']) }} Si

 				@endif
 			</div>
 		</div>
 	</div>


 	<div class="col-md-6 col-sm-12 col-xs-12" >
 		<div class="form-group" >
 			<b>{{ Form::label('nombre4', 'Enviar SMS al realizar el Voto ') }}</b>
 			<p> </p>
 			<div>
 				@if( $sms_conf_voto_s === 'true')

 				No {{ Form::checkbox('sms_conf_voto','SI', true, ['class' => 'form-control switchery','data-size'=>'sm']) }} Si

 				@else

 				No {{ Form::checkbox('sms_conf_voto','SI', false, ['class' => 'form-control switchery','data-size'=>'sm']) }} Si

 				@endif
 			</div>
 		</div>
 	</div>



 </div>


 <!-- Botones -->

 <div class="form-actions right">

 	{{ Form::submit('Guardar', ['class' => 'btn btn-primary']) }}

 	<a href="{{ route('notificaciones.index') }}"><button type="button" class="btn btn-warning mr-1">
 		Cancel
 	</button></a>			

 </div>



