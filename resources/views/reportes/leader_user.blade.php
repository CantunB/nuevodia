<html>
<body>
<table>
    <thead>
    <tr>
        <th>LIDER</th>
        <th>MOVILIZADORES</th>
        <th>DIRECCION</th>
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
                <td style="text-align: center">{{ $simpatizante->getInfo->distrito}}</td>
                <td style="text-align: center">{{ $simpatizante->getInfo->seccion}}</td>
            </tr>
        @endforeach
        </tbody>
</table>
</body>
</html>
