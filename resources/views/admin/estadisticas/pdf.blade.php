<!DOCTYPE html>
<html>
<head>
	<title>ACTA DE ESCRUTINIO GENERAL</title>
</head>
<body>


<div> 
	
	<table style="height: 65px; width: 700px;" border="1" cellspacing="0">
<tbody>
<tr>
<td style="width: 177px;" rowspan="2">&nbsp;<center><img src="{{asset('logos/logo_uceva.png')}}" class="gallery-thumbnail card-img-top responsive" height="90px" width="auto" /></center></td>
<td style="width: 277px; text-align: center;">
<p><strong>UNIDAD CENTRAL DEL VALLE DEL CAUCA</strong></p>
</td>
<td style="width: 171px;"><strong>&nbsp;Reporte ID:&nbsp;{{ $codigo }}</strong></td>
</tr>
<tr>
<td style="width: 277px; text-align: center;"><strong>ACTA DE ESCRUTINIO GENERAL</strong></td>
<td style="width: 171px;"><strong>&nbsp;Versi&oacute;n: 01</strong></td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<table style="height: 65px;" border="1" width="700px" cellspacing="0">
<tbody>
<tr>
<td style="width: 700px;" colspan="2">
<p><strong>&nbsp;&nbsp;Proceso de : {{ $nombreEleccion[0] }}</strong></p>
<p><strong>&nbsp; &nbsp;</strong></p>
</td>
</tr>
<tr>
<td style="width: 279px;">&nbsp;<strong>Departamento:</strong> Valle del Cauca</td>
<td style="width: 280px;">&nbsp;<strong>Municipio:</strong> Tuluá </td>
</tr>
<tr>
<td style="width: 279px;">&nbsp;<strong>Lugar:</strong> Unidad Central del Valle del Cauca</td>
<td style="width: 280px;">&nbsp;&nbsp;<strong>Personas habilitadas para sufragar:</strong>&nbsp; {{ $sufragantes }}</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<table style="height: 65px; width: 700px;" border="1" cellspacing="0">
<tbody>
<tr>
<td style="width: 158px; text-align: center;">&nbsp;<strong>Candidato(s)</strong></td>
{{-- <td style="width: 48px; text-align: center;">&nbsp;<strong>No. tarjet&oacute;n</strong></td> --}}
<td style="width: 84px; text-align: center;">&nbsp;<strong>Total votos /candidato</strong></td>
<td style="width: 41.4219px; text-align: center;">&nbsp;<strong>% de Votaci&oacute;n</strong></td>
<td style="width: 66.5781px; text-align: center;">&nbsp;<strong>% del total de &nbsp;personas habilitadas </strong></td>
</tr>
 @foreach ($candidatos as $can)
<tr>
<td style="width: 158px;text-align: center;text-transform: uppercase;">&nbsp;{{$can->nombre.' '.$can->apellido}}</td>
{{-- <td style="width: 48px;text-align: center;">&nbsp;{{ $can->numero_tarjeton}}</td> --}}
<td style="width: 84px;text-align: center;">&nbsp;{{ $can->votos}}</td>
<td style="width: 41.4219px;text-align: center;">&nbsp;{{  round(($can->votos/$voto_realizados)*100,2) }} %</td>
<td style="width: 66.5781px;text-align: center;">&nbsp;{{ round(($can->votos/$sufragantes)*100,3) }} %</td>
</tr>
@endforeach
</tbody>
</table>
<p>&nbsp;</p>
<!-- -->

<table style="height: 65px; width: 700px;" border="1" cellspacing="0">
<tbody>
<tr>
<td style="width: 189.766px; text-align: center;">&nbsp;<strong><p>&nbsp;Votos realizados</p></strong></td>
{{-- <td style="width: 189.766px; text-align: center;">&nbsp;<strong>Votos no marcados</strong></td> --}}
<td style="width: 189.766px; text-align: center;">&nbsp;<strong>&nbsp;% de participaci&oacute;n</strong></td>
</tr>
<tr>
<td style="width: 189.766px; text-align: center;"><p>&nbsp;{{ $voto_realizados }}</p></td>
{{-- <td style="width: 189.766px; text-align: center;">&nbsp;{{ $voto_no_marcado }}</td> --}}
<td style="width: 189.766px; text-align: center;">&nbsp;{{ round(($voto_realizados/$sufragantes)*100,2) }} % </td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>

<p><strong>GÉNERO INFORME:</strong> {{ Auth::user()->name }}</p>
<p ><strong>FECHA:</strong> {{ $date }} </p>
<p>&nbsp;</p>
</div>



</body>
</html>
