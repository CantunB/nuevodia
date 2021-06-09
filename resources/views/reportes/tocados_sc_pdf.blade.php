<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TOCADOS S/C</title>
</head>
<style>
    table {
        border: black 2px solid;
        border-collapse: collapse;
        width: 100%;
    }
</style>
<body>
<h4>TOCADOS SIN CLAVE</h4>
                        <table id="tech-companies-1" class="table" border="1">
                            <thead>
                            <tr>
                                <th data-priority="2">#</th>
                                <th data-priority="1">Nombre</th>
                                <th data-priority="3">Apellido Paterno</th>
                                <th data-priority="1">Apellido Materno</th>
                                <th data-priority="3">Localidad</th>
                                <th data-priority="3">Direccion</th>
                                <th data-priority="6">Colonia</th>
                                <th data-priority="3">C.P.</th>
                                <th data-priority="3">Telefono</th>
                                <th data-priority="3">Observacion</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($simpatizantes as $i => $simpatizante)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <th style="text-align: left">{{$simpatizante->nombre}}</th>
                                    <td>{{$simpatizante->paterno}}</td>
                                    <td>{{$simpatizante->materno}}</td>
                                    <td>CARMEN</td>
                                    <td>Calle {{$simpatizante->calle}} No {{$simpatizante->cruzamiento}}</td>
                                    <td>{{$simpatizante->colonia}}</td>
                                    <td>{{$simpatizante->cp}}</td>
                                    <td>{{$simpatizante->celular}}</td>
                                    <td>{{$simpatizante->observacion}}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
</body>
</html>
