<table class="table">
    <thead>
        <tr>
            <th>CAPTURO</th>
            <th>LIDER</th>
            <th>MOVILIZADOR</th>
            <th>TOCADO</th>
            <th>DIRECCION</th>
            <th>CELULAR</th>
<<<<<<< HEAD
=======
            <th>GESTION </th>
            <th>ESTADO </th>
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
        </tr>
    </thead>
    <tbody>
        @foreach($lideres as $i => $lider)
            @foreach($lider->getMovilizadoresReportGral($lider->getLiderInfo->id) as $j => $movilizadores)
                @foreach($lider->getTocadosReportGral($movilizadores->getInfo->id) as $k => $tocados)
                <tr>
                    <td>{{$lider->getUser->nombre }}</td>
                    <td>{{$lider->getLiderInfo->nombre}} {{$lider->getLiderInfo->paterno}} {{$lider->getLiderInfo->materno}}</td>
                    <td>{{$movilizadores->getInfo->nombre}} {{$movilizadores->getInfo->paterno}} {{$movilizadores->getInfo->materno}}</td>
                    <td>{{$tocados->getInfo->nombre}} {{$tocados->getInfo->paterno}} {{$tocados->getInfo->materno}}</td>
                    <td>Calle {{$tocados->getInfo->calle}} {{ $tocados->getInfo->no_ext}} {{$tocados->getInfo->no_int}} {{$tocados->getInfo->colonia}} {{$tocados->getInfo->cp}}</td>
                    <td>{{$tocados->getInfo->celular}}</td>
<<<<<<< HEAD
                    <td>SI</td>
                    <td>NO</td>
                    <!--<td>{-- $tocados->getInfo->gestion --}</td>
                    <td>{-- $tocados->getInfo->estatus_gestion ?  $tocados->getInfo->estatus_gestion : 'SIN GESTIONAR'--}</td> -->
=======
                    <td>{{ $tocados->getInfo->gestion }}</td>
                    <td>{{ $tocados->getInfo->estatus_gestion ?  $tocados->getInfo->estatus_gestion : 'SIN GESTIONAR' }}</td> 
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                </tr>
                @endforeach
            @endforeach
        @endforeach
    </tbody>
</table>
