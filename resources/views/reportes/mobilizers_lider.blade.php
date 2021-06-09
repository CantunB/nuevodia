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
<h2>Lista de movilidaores</h2><p align="right"></p>
<table>
    <thead>
    <tr>
        <th>LIDER</th>
        <th>MOVILIZADORES</th>
        <th>DIRECCION</th>
        <th>CELULAR</th>
        <th>CREDENCIAL</th>
        <th>DISTRITO</th>
        <th>SECCION</th>
    </tr>
    </thead>
        <tbody>
        @foreach($movilizadores as $simpatizante)
            <tr>
                <td>{{ $simpatizante->getInfoLider->nombre }} {{ $simpatizante->getInfoLider->paterno }} {{ $simpatizante->getInfoLider->materno }}</td>
                <td>{{ $simpatizante->getInfo->nombre }} {{ $simpatizante->getInfo->paterno }} {{ $simpatizante->getInfo->materno }}</td>
                <td>{{ $simpatizante->getInfo->colonia}} Calle {{ $simpatizante->getInfo->calle}} {{ $simpatizante->getInfo->cruzamieto}}</td>
                <td style="text-align: center">{{ $simpatizante->getInfo->celular }}</td>
                <td style="text-align: center">{{ $simpatizante->getInfo->clave_elector}}</td>
                <td style="text-align: center">{{ $simpatizante->getInfo->distrito}}</td>
                <td style="text-align: center">{{ $simpatizante->getInfo->seccion}}</td>
            </tr>
        @endforeach
        </tbody>
</table>
</body>
</html>
