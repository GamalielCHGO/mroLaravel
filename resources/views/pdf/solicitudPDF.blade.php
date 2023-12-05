<?php
// guardar imagen
$path = $_SERVER['DOCUMENT_ROOT'].'/public/img/T.png';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de envio</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            border: 0;
        }
        .contenedor{
            width: 100%;
            margin-left: 10px;
            margin-top: 10px;
            display: inline-block;
            /* float: left; add this line */
        }
        body{
            font-family:'Segoe UI', sans-serif;
        }
        table {
        }
        .titulo{
            font-size: 20px;
            margin-bottom: 3%;

        }
        .imagen{
            width: 20%;
            height: auto;
            margin-left: 20px;
            margin-top: 10px;
        }
        .tabla{
            font-size: 15px;
            padding: 10px;
            margin: 0 5px;
            width: 95%

        }
        .tabla>tbody>tr>td{
            font-size: 10px;
            border-bottom: solid 2px;
            margin: 0 5px;
            padding: 10px;
        }
        .encabezadoTabla{
            font-size: 10px;
            margin: 0 5px;
            background: gainsboro;
        }
        .encabezadoTabla>th{
            font-size: 15px;
            padding: 10px
        }
        .centrar{
            text-align: center;
        }
        .fondo{
            background: gainsboro;
        }
        .negrita{
            font-weight: bolder;
            font-size: 20px !important;
        }
        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 50px;
        }
    </style>
</head>

<body>
    <div class="contenedor">
        <img src="<?php echo $base64?>" class="imagen"/>
    </div>
    <div class="contenedor titulo">
        <span style="float: right; margin-top: -100px; margin-right: 50px"><h1>Vale de salida de material</h1></span>
        <span style="float: right; margin-top: -30px; margin-right: 50px"><h3>sistema de vales MRO  Fecha: <?= date('d-m-y') ?></h3></span>
    </div>
    <div class="contenedor">
        <table class="tabla centrar">
            <thead class="encabezadoTabla">
                <th>Codigo SAP</th>
                <th>Cantidad</th>
                <th>Descripcion</th>
                <th>CC</th>
                <th>Estacion</th>
            </thead>
            <tbody>
                @foreach ($solicitudes as $solicitud)
                    <tr>
                        <td>{{$solicitud->numero_parte}}</td>
                        <td>{{$solicitud->cantidad}}</td>
                        <td>{{$solicitud->descripcion}}</td>
                        <td>{{$solicitud->cc}}</td>
                        <td>{{$solicitud->estacion}}</td>
                    </tr>
                @endforeach      
            </tbody>
        </table>
        <hr>
        <table class="tabla centrar">
            <thead class="encabezadoTabla">
                <th colspan="5">Datos del solicitante</th>
            </thead>
            <thead>
                <th>Nombre completo</th>
                <th>SAP</th>
                <th>Correo</th>
                <th>Id Supervisor</th>
            </thead>
            <tbody>
                <tr>
                    <td>{{$usuario['name']}} {{$usuario['lastname']}}</td>
                    <td>{{$usuario['sap']}}</td>
                    <td>{{$usuario['email']}}</td>
                    <td>{{$usuario['idSupervisor']}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    
    
    
    

   
    
</body>


</html>