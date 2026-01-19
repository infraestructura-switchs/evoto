<!DOCTYPE html>
<html>
<head>
	<title>ACTA DE INSCRIPCIÓN </title> 
</head>
<body>

<p>&nbsp;</p>
<div>
<table style="height: 65px; width: 700px;" border="1" cellspacing="0">
<tbody>
<tr>
<td style="width: 177px;" rowspan="2">&nbsp;<center><img class="gallery-thumbnail card-img-top responsive" src="{{asset('logos/logo_uceva.png')}}" width="auto" height="90px" /></center></td>
<td style="width: 277px; text-align: center;">
<p><strong>SECRETARÍA GENERAL</strong></p>
</td>
<td style="width: 171px;"><strong>&nbsp;Código:&nbsp;1005-36.9-002-F</strong></td>
</tr>
<tr>
<td style="width: 277px; text-align: center;"><strong>FORMULARIO DE INSCRIPCIÓN   </strong></td>
<td style="width: 171px;"><strong>&nbsp;Versi&oacute;n: 03</strong></td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<p><strong>NOMBRE DE LA ELECCI&Oacute;N:</strong> {{ $eleccion->nombre }} Representante de&nbsp; los estudiantes ante el consejo directivo.</p>
<p>&nbsp;</p>

<p><strong>PER&Iacute;ODO:</strong> {{ $eleccion->periodo_eleccion_desde }} - {{ $eleccion->periodo_eleccion_hasta }}&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>N&Uacute;MERO DE INSCRIPCI&Oacute;N:</strong> 12123123(por definir)</p>
{{-- <p>&nbsp;</p> --}}
<p>&nbsp;</p>
<p><strong>FECHA DE LA ELECCI&Oacute;N (dd/mm/aa):</strong> {{ date('d/m/Y',strtotime($eleccion->fecha_inicio_eleccion))}}</p>
<p>&nbsp;</p>
{{-- <p>&nbsp;</p> --}}
<p>En la plataforma EVOTO de la Unidad Central del Valle del Cauca, siendo las {{ date('h:m A',strtotime($aspirante->fecha_inscripcion))}} del d&iacute;a {{ date('d',strtotime($aspirante->fecha_inscripcion))}}&nbsp; de {{ \Carbon\Carbon::parse($aspirante->fecha_inscripcion, 'UTC')->translatedFormat('F') }} del {{ \Carbon\Carbon::parse($aspirante->fecha_inscripcion, 'UTC')->translatedFormat('Y') }} , se recibi&oacute;  la solicitud de postulaci&oacute;n como aspirante de la eleccion "{{ $eleccion->nombre }}", de <b>{{ $aspirante->nombre }} {{ $aspirante->apellido }}</b>, quien se identific&oacute; con el documento <b>{{ $aspirante->tipo_documento }}. {{ $aspirante->documento }} de {{ $aspirante->lugar_expedicion }}</b>, remitiendo los siguientes documentos:</p>
<p><b> - </b>Fotocopia de la c&eacute;dula de ciudadan&iacute;a</p>

@if($aspirante->declaracion != null)

<p><b> -</b> Declaraci&oacute;n de No encontrarse incurso en ninguna inhabilidad e incompatibilidades establecidas por la Constituci&oacute;n y las normas internas de la Instituci&oacute;n (para los aspirantes a Representantes en el Consejo Directivo).</p>
@endif
{{-- <p><strong>&nbsp;</strong></p> --}}
<p>&nbsp;</p>
<p><b>TOTAL DE DOCUMENTOS&nbsp;&nbsp; RECIBIDOS:</b> {{ $total_documentos }}</p>
<p>&nbsp;</p>
<p><b>Observaciones:</b></p>
{{-- <p>&nbsp;</p> --}}
<p>La Instituci&oacute;n tramitar&aacute; internamente los documentos necesarios para verificar el cumplimiento de requisitos; tales como: acad&eacute;micos, disciplinarios, laborales, paz y salvos financieros, de no pertenencia a otros Consejos de la Instituci&oacute;n y los dem&aacute;s que se requieran de acuerdo con los requisitos establecidos en el Estatuto General para el cargo y estamento a que aspira.</p>
<p><strong><u>&nbsp;</u></strong></p>

<p><b>Esta acta se genera (dd/mm/aa):</b> {{ date('d/m/Y',strtotime(now()))}}</p>
</div>

</body>
</html>
