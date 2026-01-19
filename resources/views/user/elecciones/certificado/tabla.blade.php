   @if(count($votaciones) > 0)
   {{-- INICIO DE TABLA --}}
   <table class="table table-striped table-bordered zero-configuration" id="tabla">
   	<thead>
   		<tr>
   			<th>DESCARGAR</th>
   			<th>ELECCIÓN</th>
   		</tr>
   	</thead>
   	<tbody>
   		@foreach($votaciones as $votacion)
   		<tr>
   			<td>

   				<a href="{{ route('elecciones.certificado', $votacion->id_eleccion) }}"
   					target="_blank">
   					<button type="button"
   					class="btn btn-icon btn-success btn-sm box-shadow-1"
   					data-toggle="tooltip"
   					data-original-title="Generar"><i
   					class="la la-file-pdf-o"></i>Descargar Certificado
   				</button>
   			</a>
   		</td>
   		<td>{{ $votacion->nombre }}</td>
   	</tr>
   	@endforeach

   </tbody>

</table>
{{-- FIN TABLA --}}
@endif