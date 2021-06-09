<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lideres</title>
</head>
<style>
    table {
        border: black 2px solid;
        border-collapse: collapse;
        width: 100%;
    }
</style>
<body>
<h2>LISTA DE LIDERES</h2>
<table id="tech-companies-1" class="table table-sm" border="1">
    <thead>
    <tr>
        <th data-priority="2">#</th>
        <th data-priority="1">Nombre completo</th>
        <th data-priority="3">Direccion</th>
        <th data-priority="3">Clave</th>
        <th data-priority="3">Celular</th>
        <th data-priority="3">C.P</th>
        <th data-priority="3">Distrito</th>
        <th data-priority="3">Seccion</th>
    </tr>
    </thead>
    <tbody>
    @foreach($leaders as $i => $simpatizante)
        <tr>
            <td style="text-align: center">{{$loop->iteration}}</td>
            <th style="text-align: left">{{$simpatizante->getInfo->nombre}} {{$simpatizante->getInfo->paterno}} {{$simpatizante->getInfo->materno}}</th>
            <td style="text-align: left">{{ 'Calle '.$simpatizante->getInfo->calle
                                .' Por'.$simpatizante->getInfo->cruzamiento
                                .', Colonia '. $simpatizante->getInfo->colonia
                                .', '.$simpatizante->getInfo->cp}}
            </td>
            <td>{{$simpatizante->getInfo->clave_elector}}</td>
            <td>{{$simpatizante->getInfo->celular}}</td>
            <td style="text-align: center">{{$simpatizante->getInfo->cp}}</td>
            <td style="text-align: center">{{$simpatizante->getInfo->distrito}}</td>
            <td style="text-align: center">{{$simpatizante->getInfo->seccion}}</td>
        </tr>
    @endforeach

    </tbody>
</table>
</body>
</html>
