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
    <p>FECHA: {{ $fecha1 }} - {{ $fecha2 }}</p>
        <table>
            <thead>
                <tr>
                    <th>LIDERES</th>
                    <th>MOVILIZADOR</th>
                    <th>SIMPATIZANTES</th>
                    <th>DIRECCION</th>
                    <th>CELULAR</th>

                    <th>DISTRITO</th>
                    <th>SECCION</th>
                    <th>GESTION</th>
                    <th>ESTATUS DE GESTION</th>
                </tr>
            </thead>
            @if(isset($lista))
            <tbody>
            @foreach($lista as $simpatizante)
                <tr>
                    <td>{{
                            $simpatizante->getLider->getInfoLider->nombre .' '.
                            $simpatizante->getLider->getInfoLider->paterno .' '.
                            $simpatizante->getLider->getInfoLider->materno
                    }}
                    </td>
                    <td>{{ $simpatizante -> movilizadores -> nombre }} {{ $simpatizante -> movilizadores -> paterno }} {{ $simpatizante -> movilizadores -> materno }}</td>
                    <td>{{ $simpatizante->getInfo->nombre }} {{ $simpatizante->getInfo->paterno }} {{ $simpatizante->getInfo->materno }}</td>
                    <td>{{ $simpatizante->getInfo->colonia}} Calle {{ $simpatizante->getInfo->calle}} {{ $simpatizante->getInfo->cruzamieto}}</td>
                    <td>{{ $simpatizante->getInfo->celular }}</td>

                    <td style="text-align: center">{{ $simpatizante->getInfo->distrito}}</td>
                    <td style="text-align: center">{{ $simpatizante->getInfo->seccion}}</td>
                    <td style="text-align: center">{{ $simpatizante->getInfo->gestion}}</td>
                    <td style="text-align: center">{{ $simpatizante->getInfo->estatus_gestion }}</td>
                </tr>
            @endforeach
            </tbody>
            @endif
        </table>
    </body>
</html>
