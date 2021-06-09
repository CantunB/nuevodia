<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>NOMBRE</th>
            <th>CELULAR</th>
            <th>DIRECCION</th>
            <th>DISTRITO</th>
            <th>SECCION</th>
        </tr>
    </thead>
    <tbody>
        @foreach($confirmados as $key => $c)
        <tr>
            <td>{{ $loop->iteration }}
            <td>{{ $c->nombre}} {{ $c->paterno }} {{ $c->materno }}</td>
            <td>{{ $c->celular }}
            <td>{{ $c->calle }} {{ $c->cruzamiento }} {{ $c->no_ext }} {{ $c->no_int }} {{ $c->colonia }} {{ $c->cp }}</td>
            <td>{{ $c->distrito }}</td>
            <td>{{ $c->seccion }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
