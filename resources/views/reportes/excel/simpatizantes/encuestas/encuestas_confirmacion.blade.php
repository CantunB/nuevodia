<table class="table table-sm" border="1">
    <thead>
        <tr>
        <th>{{ $tocados[0]->movilizadores->nombre }} {{ $tocados[0]->movilizadores->paterno }} {{ $tocados[0]->movilizadores->materno }}</th>
        <th>DIRECCION</th>
        <th>CELULAR</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tocados as $key => $tocado)
            <tr>
                <td>{{$tocado->getInfo->nombre}} {{$tocado->getInfo->paterno}} {{$tocado->getInfo->materno}}</td>
                <td>CALLE {{$tocado->getInfo->calle}} {{$tocado->getInfo->cruzamiento}} {{$tocado->getInfo->no_ext}} {{$tocado->getInfo->no_int}} {{$tocado->getInfo->colonia}} {{$tocado->getInfo->cp}}</td>
                <td align="center"width="60px" >{{$tocado->getInfo->celular}}</td>
            </tr>
        @endforeach
    </tbody>
