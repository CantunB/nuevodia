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
        <h2>LIDERES</h2>
        <table>
            <thead>
                <tr>
                    <th>NOMBRE</th>
                    <th>CELULAR</th>
                    <th>CREDENCIAL</th>
                    <th>DISTRITO</th>
                    <th>SECCION</th>
                    <th>DISTRITO</th>
                </tr>
            </thead>
            <tbody>
            @foreach($lideres as $lider)
                <tr>
                    <td>{{ $lider->getInfo->nombre .' '. $lider->getInfo->paterno .' '.$lider->getInfo->materno}}</td>
                    <td style="text-align: center">{{ $lider->getInfo->celular }}</td>
                    <td style="text-align: center">{{ $lider->getInfo->clave_elector}}</td>
                    <td style="text-align: center">{{ 'Calle '.$lider->getInfo->calle
                                .'Por'.$lider->getInfo->cruzamiento
                                .', Colonia'. $lider->getInfo->colonia
                                .', '.$lider->getInfo->cp}}
                    </td>
                    <td style="text-align: center">{{ $lider->getInfo->distrito}}</td>
                    <td style="text-align: center">{{ $lider->getInfo->seccion}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </body>
</html>
