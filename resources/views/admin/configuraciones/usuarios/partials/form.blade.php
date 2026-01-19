 <h4 class="form-section"><i class="ft-list"></i> Información General</h4>
 <div class="row">
 	{{-- role --}}
 	<div class="col-md-12 col-sm-12 col-xs-12" >
 		<div class="form-group">
 			{{ Form::label('id_entidad', 'Entidad o Institucion') }}
 			{{ Form::select('id_entidad', $entidades, null, ['class' => 'form-control']) }}

 		</div>
 	</div>
 	{{-- role --}}
 	{{-- role --}}
 	<div class="col-md-6 col-sm-6 col-xs-12" >
 		<div class="form-group">
 			{{ Form::label('id_grupo', 'Grupo de Usuarios') }}
 			{{ Form::select('id_grupo', $grupos, null, ['class' => 'form-control']) }}

 		</div>
 	</div>
 	{{-- role --}}

 	{{-- role --}}
 	<div class="col-md-6 col-sm-6 col-xs-12" >
 		<div class="form-group">
 			{{ Form::label('id_role', 'Rol') }}
 			{{ Form::select('id_role', $roles, null, ['class' => 'form-control']) }}

 		</div>
 	</div>
 	{{-- role --}}
 </div>
 <h4 class="form-section"><i class="ft-user"></i> Información Personal</h4>
 
 <div class="row">
 	<!-- Nombre -->
 	<div class="col-md-6 col-sm-6 col-xs-12" >
 		<div class="form-group" >
 			{{ Form::label('nombre', 'Nombre ') }}
 			<span style="color:red;">
 				*
 			</span>
 			{{ Form::text('name', null, ['class' => 'form-control  ', 'id' => 'name', 'required' => "required", 'autocomplete' => "off"]) }}
 		</div>
 	</div>
 	<!-- Nombre -->
 	<!-- apellido -->
 	<div class="col-md-6 col-sm-6 col-xs-12" >
 		<div class="form-group" >
 			{{ Form::label('apellido', 'Apellido ') }}
 			<span style="color:red;">
 				*
 			</span>
 			{{ Form::text('apellido', null, ['class' => 'form-control  ', 'id' => 'apellido', 'required' => "required", 'autocomplete' => "off"]) }}
 		</div>
 	</div>
 	<!-- apellido -->

 </div>

 <div class="row">
 	<!-- documento -->
 	<div class="col-md-12 col-sm-12 col-xs-12" >
 		<div class="form-group" >
 			{{ Form::label('documento', 'Numero de documento ') }}
 			<span style="color:red;">
 				*
 			</span>
 			{{ Form::text('documento', null, ['class' => 'form-control  ', 'id' => 'documento', 'required' => "required", 'autocomplete' => "off"]) }}
 		</div>
 	</div>
 	<!-- documento -->
 

 	<!-- email -->
 	<div class="col-md-6 col-sm-6 col-xs-12" >
 		<div class="form-group" >
 			{{ Form::label('email', 'Correo Electrónico') }}
 			<span style="color:red;">
 				*
 			</span>
 			{{ Form::email('email', null, ['class' => 'form-control  ', 'id' => 'email', 'required' => "required", 'autocomplete' => "off"]) }}
 		</div>
 	</div>
 	<!-- email -->
 	<!-- email -->
 	<div class="col-md-6 col-sm-6 col-xs-12" >
 		<div class="form-group" >
 			{{ Form::label('email_confirmation', 'Confirmación Correo Electrónico') }}
 			<span style="color:red;">
 				*
 			</span>
 			{{ Form::email('email_confirmation', null, ['class' => 'form-control  ', 'id' => 'email_confirmation', 'required' => "required", 'autocomplete' => "off"]) }}
 		</div>
 	</div>
 	<!-- email -->
 		<!-- telefono -->
 	<div class="col-md-6 col-sm-6 col-xs-12" >
 		<div class="form-group" >
 			{{ Form::label('telefono', 'Numero de telefono ') }}
 			
 			{{ Form::text('telefono', null, ['class' => 'form-control  ', 'id' => 'telefono', 'autocomplete' => "off"]) }}
 		</div>
 	</div>
 	<!-- telefono -->
 	


 </div>

{{--  <div class="row">
 	<!-- password -->
 	<div class="col-md-6 col-sm-6 col-xs-12" >
 		<div class="form-group" >
 			{{ Form::label('password', 'Contraseña ') }}
 			<span style="color:red;">
 				*
 			</span>
 			{{ Form::password('password',['class' => 'form-control  ', 'id' => 'password', 'required' => "required", 'autocomplete' => "off"]) }}

 		</div>
 	</div>
 	<!-- password -->
 	confirmacion password
 	<div class="col-md-6 col-sm-6 col-xs-12" >
 		<div class="form-group" >
 			{{ Form::label('password_confirmation', 'Contraseña ') }}
 			<span style="color:red;">
 				*
 			</span>
 			{{ Form::password('password_confirmation',['class' => 'form-control  ', 'id' => 'password_confirmation', 'required' => "required", 'autocomplete' => "off"]) }}

 		</div>
 	</div>
 	<!-- confirmacion de password -->
 </div> --}}
 <!-- Botones -->

 <div class="form-actions right">

 	{{ Form::submit('Guardar', ['class' => 'btn btn-primary']) }}

 	<a href="{{ route('usuarios.index') }}"><button type="button" class="btn btn-warning mr-1">
 		Cancel
 	</button></a>			

 </div>



