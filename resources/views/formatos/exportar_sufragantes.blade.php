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
<p><strong>&nbsp;&nbsp;Proceso de : {{ $eleccion->nombre }}</strong></p>
<p><strong>&nbsp; &nbsp;</strong></p>
</td>
</tr>
<tr>
<td style="width: 279px;">&nbsp;<strong>Departamento:</strong> Valle del Cauca</td>
<td style="width: 280px;">&nbsp;<strong>Municipio:</strong> Tuluá </td>
</tr>
<tr>
<td style="width: 279px;">&nbsp;<strong>Lugar:</strong> Unidad Central del Valle del Cauca</td>
<td style="width: 280px;">&nbsp;&nbsp;<strong>Personas habilitadas para sufragar:</strong>&nbsp;</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>

<!-- -->



<p>&nbsp;</p>

<p><strong>GÉNERO INFORME:</strong> {{ Auth::user()->name }}</p>

<p>&nbsp;</p>
</div>



</body>
</html>
