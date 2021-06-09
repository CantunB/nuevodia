<h3>CAPTURISTA: {{ $usuario->getUser->nombre }} {{ $usuario->getUser->paterno }}</h3>
<br>
<table class="table">
    <thead>
        <tr>
            <th>LIDERES</th>
            <th>MOVILIZADORES</th>
            <th>TOCADOS</th>
            <th>GESTIONES ENTREGADAS </th>
            <th>GESTIONS SIN ENTREGAR </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $usuario->getLideresReportIndividual($usuario->getUser->id)->count() }}
            <td>{{ $usuario->getMovilizadoresReportIndividual($usuario->getUser->id)->count() }}</td>
            <td>{{ $usuario->getTocadosReportIndividual($usuario->getUser->id)->count() }}</td>

        </tr>
    </tbody>
</table>



<table class="table">
    <thead>
        <tr>
            <th style="text-align: center">#</th>
            <th style="text-align: center">LIDER</th>
            <th style="text-align: center">DISTRITO</th>
            <th style="text-align: center">SECCION</th>
            <th style="text-align: center">MOVILIZADORES</th>
            <th style="text-align: center">TOCADOS</th>
        </tr>
    </thead>
    <tbody>
        <?php $p = 0 ?>
        @foreach ($datos as $i => $lideres)
            @foreach($lideres->getMovilizadoresReportGral($lideres->leader_id) as $j => $movilizadores)
                    <tr>

                            @if($loop->iteration == 1)
                                <td style="text-align: center">{{ $i+1 }}</td>
                                <td>{{ $lideres->getInfo->nombre }} {{ $lideres->getInfo->paterno }} {{ $lideres->getInfo->materno }}</td>
                                <td style="text-align: center">{{ $lideres->getInfo->distrito }}</td>
                                <td style="text-align: center">{{ $lideres->getInfo->seccion }}</td>
                            @else
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            @endif
                            @if($movilizadores->leader_id == $lideres->leader_id)
                            <td>
                                M-{{$j+1}}   {{ $movilizadores->getInfo->nombre }} {{ $movilizadores->getInfo->paterno }}  {{ $movilizadores->getInfo->materno }}
                            </td>
                            @endif
                            @foreach($lideres->getTocadosReportGral($movilizadores->mobilizer_id) as $k => $tocados)
                            <?php $toc = $lideres->getTocadosReportGral($movilizadores->getInfo->id)->count()?>
                            @endforeach
                            <td style="text-align: center">{{$toc}}</td>


                    </tr>
            @endforeach
        @endforeach
    </tbody>
</table>
