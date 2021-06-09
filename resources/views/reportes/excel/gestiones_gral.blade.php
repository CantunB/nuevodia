<table class="table">
    <thead>
        <tr>
            <th>CAPTURO</th>

            <th>LIDER</th>
            <th>DISTRITO</th>
            <th>SECCION</th>
            <th>DIRECCION</th>
            <th>CELULAR</th>

            <th>MOVILIZADOR</th>
            <th>DISTRITO</th>
            <th>SECCION</th>
            <th>DIRECCION</th>
            <th>CELULAR</th>

            <th>TOCADO</th>
            <th>DISTRITO</th>
            <th>SECCION</th>
            <th>DIRECCION</th>
            <th>CELULAR</th>
        </tr>
    </thead>
    <tbody>
<<<<<<< HEAD
        @foreach($lideres as $key => $value)
        <tr>
            <td>{{ $loop->iteration }}
            <td>{{ $value->getUser->nombre}}</td>
            <td>{{ $value->getLideresReportIndividual($value->getUser->id)->count() }}
            <td>{{ $value->getMovilizadoresReportIndividual($value->getUser->id)->count() }}</td>
            <td>{{ $value->getTocadosReportIndividual($value->getUser->id)->count() }}</td>
        </tr>
=======
        @foreach($lideres as $i => $lider)
        @foreach($lider->getMovilizadoresReportGral($lider->getLiderInfo->id) as $j => $movilizadores)
            @foreach($lider->getTocadosReportGral($movilizadores->getInfo->id) as $k => $tocados)
            <tr>
                <td>{{$lider->getUser->nombre }}</td>

                <td>{{$lider->getLiderInfo->nombre}} {{$lider->getLiderInfo->paterno}} {{$lider->getLiderInfo->materno}}</td>
                <td>{{$lider->getLiderInfo->distrito}}</td>
                <td>{{$lider->getLiderInfo->seccion}}</td>
                <td>Calle {{$lider->getLiderInfo->calle}} {{ $lider->getLiderInfo->no_ext}} {{$lider->getLiderInfo->no_int}} {{$lider->getLiderInfo->colonia}} {{$lider->getLiderInfo->cp}} </td>
                <td>{{$lider->getLiderInfo->celular}}</td>

                <td>{{$movilizadores->getInfo->nombre}} {{$movilizadores->getInfo->paterno}} {{$movilizadores->getInfo->materno}}</td>
                <td>{{$movilizadores->getInfo->distrito}}</td>
                <td>{{$movilizadores->getInfo->seccion}}</td>
                <td>Calle {{$movilizadores->getInfo->calle}} {{ $movilizadores->getInfo->no_ext}} {{$movilizadores->getInfo->no_int}} {{$movilizadores->getInfo->colonia}} {{$movilizadores->getInfo->cp}} </td>
                <td>{{$movilizadores->getInfo->celular}}</td>

                <td>{{$tocados->getInfo->nombre}} {{$tocados->getInfo->paterno}} {{$tocados->getInfo->materno}}</td>
                <td>{{$tocados->getInfo->distrito}}</td>
                <td>{{$tocados->getInfo->seccion}}</td>
                <td>Calle {{$tocados->getInfo->calle}} {{ $tocados->getInfo->no_ext}} {{$tocados->getInfo->no_int}} {{$tocados->getInfo->colonia}} {{$tocados->getInfo->cp}} </td>
                <td>{{$tocados->getInfo->celular}}</td>
            </tr>
            @endforeach
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
        @endforeach
    @endforeach
    </tbody>
</table>
