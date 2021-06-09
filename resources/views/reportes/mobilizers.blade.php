<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movilizadores</title>
</head>
<style>
    table {
        border: black 2px solid;
        border-collapse: collapse;
        width: 100%;
    }
</style>
<body>
<h4>Relacion de Movilizadores</h4>
<table id="tech-companies-1" class="table" border="1">
    <thead>
    <tr>
        <th data-priority="2">#</th>
        <th data-priority="1">Nombre completo</th>
        <th data-priority="3">Direccion</th>
        <th data-priority="6">Colonia</th>
        <th data-priority="3">Clave</th>
        <th data-priority="3">Telefono</th>
        <th data-priority="3">C.P</th>
        <th data-priority="3">Distrito</th>
        <th data-priority="3">Seccion</th>
        <th data-priority="3">Observacion</th>
    </tr>
    </thead>
    <tbody>
    @foreach($mobilizers as $i => $simpatizante)
        <tr>
            <td>{{$loop->iteration}}</td>
            <th style="text-align: left">{{$simpatizante->getInfo->nombre}} {{$simpatizante->getInfo->paterno}} {{$simpatizante->getInfo->materno}}</th>
            <td>Calle {{$simpatizante->getInfo->calle}} No {{$simpatizante->getInfo->cruzamiento}}</td>
            <td>{{$simpatizante->getInfo->colonia}}</td>
            <td>{{$simpatizante->getInfo->clave_elector}}</td>
            <td>{{$simpatizante->getInfo->celular}}</td>
            <td style="text-align: center">{{$simpatizante->getInfo->cp}}</td>
            <td style="text-align: center">{{$simpatizante->getInfo->distrito}}</td>
            <td style="text-align: center">{{$simpatizante->getInfo->seccion}}</td>
            <td>{{$simpatizante->getInfo->observacion}}</td>
        </tr>
    @endforeach

    </tbody>
</table>
</body>
</html>
