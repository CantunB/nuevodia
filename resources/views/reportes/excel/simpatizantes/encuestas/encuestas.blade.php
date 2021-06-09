<table class="table table-sm" border="1">
    <thead>
        <tr>
        <th align="left">{{$mov}}</th>
        <th>DIRECCION</th>
        <th>CELULAR</th>
        <th colspan="2">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tocados as $key => $tocado)
            <tr>
                <td>{{$tocado->getInfo->nombre}} {{$tocado->getInfo->paterno}} {{$tocado->getInfo->materno}}</td>
                <td>CALLE {{$tocado->getInfo->calle}} {{$tocado->getInfo->cruzamiento}} {{$tocado->getInfo->no_ext}} {{$tocado->getInfo->no_int}} {{$tocado->getInfo->colonia}} {{$tocado->getInfo->cp}}</td>
                <td align="center"width="60px" >{{$tocado->getInfo->celular}}</td>
                <td width="50px" align="center" >SI</td>
                <td width="50px" align="center">NO</td>
            </tr>
        @endforeach
    </tbody>
