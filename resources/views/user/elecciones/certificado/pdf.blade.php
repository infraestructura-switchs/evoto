<!DOCTYPE html>
<html>
<head>
    <title>CERTIFICADO ELECTORAL</title>
</head>
<body>
<div>

    <table style="height: 65px; width: 700px;" border="1" cellspacing="0">
        <tbody>
        <tr>
            <td style="width: 177px;" rowspan="2">&nbsp;<center><img src="{{asset('logos/logo_uceva.png')}}"
                                                                     class="gallery-thumbnail card-img-top responsive"
                                                                     height="90px" width="auto"/></center>
            </td>
            <td style="width: 277px; text-align: center;">
                <p><strong>UNIDAD CENTRAL DEL VALLE DEL CAUCA</strong></p>
            </td>
            <td style="width: 171px;"><strong>&nbsp;</strong></td>
        </tr>
        <tr>
            <td style="width: 277px; text-align: center;"><strong>CERTIFICADO ELECTORAL</strong></td>
            <td style="width: 171px;"><strong>&nbsp;Versi&oacute;n: 01</strong></td>
        </tr>
        </tbody>
    </table>
    <p>&nbsp;</p>
    <table style="height: 65px;" border="1" width="700px" cellspacing="0">
        <tbody>
        <tr>
            <td style="width: 700px; text-align: center;" colspan="2">
                <p><strong>&nbsp;&nbsp;A nombre de : {{ $votacion->name.' '.$votacion->apellido }}</strong></p>
                <p><strong>&nbsp; &nbsp;<strong>Cédula:</strong> {{$votacion->documento}}</strong></p>
                <p><strong>&nbsp; &nbsp;<strong>Elección:</strong> {{$votacion->nombre}}</strong></p>
            </td>
        </tr>
        <tr>
            <td style="width: 279px;">&nbsp;<strong>Departamento:</strong> Valle del Cauca</td>
            <td style="width: 280px;">&nbsp;<strong>Municipio:</strong> Tuluá</td>
        </tr>

        </tbody>
    </table>

    <p>&nbsp;</p>

    <p><strong>FECHA:</strong> {{ $date }} </p>
    <p>&nbsp;</p>
</div>

</body>
</html>
