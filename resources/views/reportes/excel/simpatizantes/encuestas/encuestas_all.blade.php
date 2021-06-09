<table class="table table-sm" border="1">
    <thead>
        <tr>
        <th>#</th>
        <th>NOMBRE</th>
        <th>DIRECCION</th>
        <th>CELULAR</th>
        <th>DISTRITO</th>
        <th>SECCION
        </tr>
    </thead>
    <tbody>
        @foreach ($tocados as $key => $tocado)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{$tocado->getTocado->nombre}} {{$tocado->getTocado->paterno}} {{$tocado->getTocado->materno}}</td>
                <td>CALLE {{$tocado->getTocado->calle}} {{$tocado->getTocado->cruzamiento}} {{$tocado->getTocado->no_ext}} {{$tocado->getTocado->no_int}} {{$tocado->getTocado->colonia}} {{$tocado->getTocado->cp}}</td>
                <td align="center"width="60px" >{{$tocado->getTocado->celular}}</td>
                <td>{{ $tocado->getTocado->distrito }}</td>
                <td>{{ $tocado->getTocado->seccion }}</td>
            </tr>
        @endforeach
    </tbody>
