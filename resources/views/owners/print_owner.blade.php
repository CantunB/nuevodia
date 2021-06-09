<html>
<head>
    <title>PDF</title>
</head>
<style>
    table, td, th {
        border: 1px solid black;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }
</style>
<body>
<h2>PROPIETARIOS</h2>
<table>
    <thead>
    <tr>
        <th>NOMBRE</th>
        <th>CELULAR</th>
        <th>CREDENCIAL</th>
        <th>DISTRITO</th>
        <th>SECCION</th>
    </tr>
    </thead>
    <tbody>
    @foreach($propietarios as $propietario)
        <tr>
            <td>{{ $propietario->nombre .' '. $propietario->paterno .' '.$propietario->materno}}</td>
            <td style="text-align: center">{{ $propietario->celular }}</td>
            <td style="text-align: center">{{ $propietario->clave_elector}}</td>
            <td style="text-align: center">{{ $propietario->distrito}}</td>
            <td style="text-align: center">{{ $propietario->seccion}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
