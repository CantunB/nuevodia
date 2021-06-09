<tbody>
@foreach($tocados as $simpatizante)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>@if( true === ( $simpatizante->movilizadores->getInfoLider ?? null ) )
                {{  $simpatizante->movilizadores->getInfoLider   }}
            @endif
        </td>
        <td>
            {{ $simpatizante->movilizadores->nombre .' '. $simpatizante->movilizadores->paterno .' '. $simpatizante->movilizadores->materno}}
        </td>
        <td>
            {{ $simpatizante->getInfo->nombre .' '. $simpatizante->getInfo->paterno .' '. $simpatizante->getInfo->materno}}
        </td>
        <td>
            {{ $simpatizante->getInfo->created_at}}
        </td>
        <td>
            {{ $simpatizante->getUser->nombre }}
        </td>
        <td>
            @can('update_tocados')
                <a href="{{route('Tocados.edit',$simpatizante->id)}}" class="action-icon">
                    <i data-feather="edit" class="icons-xs icon-dual-warning"></i></a>
            @endcan
            @can('delete_tocados')
                <a class="action-icon"
                   onclick="event.preventDefault();
                       document.getElementById('delete{{$simpatizante->id}}').submit();">
                    <i data-feather="trash-2" class="icons-xs icon-dual-danger"></i>
                </a>
                <form id="delete{{$simpatizante->id}}"
                      action="{{route('Tocados.destroy',$simpatizante->id)}}"
                      method="POST" style="display: none">
                    @csrf
                    @method('DELETE')
                </form>
            @endcan
        </td>
    </tr>
@endforeach
</tbody>  -->

////////////////////////////////////////////////////////////////
<tbody>
@foreach($sympathizers as $simpatizante)
    <tr>
        <td>{{$simpatizante->id}}</td>
        <td>{{ $simpatizante->nombre }} {{ $simpatizante->paterno }} {{ $simpatizante->materno }}</td>
        <td>{{ $simpatizante->celular }}</td>
        <td>{{ $simpatizante->clave_elector}}</td>
        <td style="text-align: center">
            {{--$simpatizante->getLideres_check--}}
            <input type="checkbox" id="chk{{ $simpatizante->id }}" name="permission[]"
                   value="{{ $simpatizante->id }}" {{$simpatizante->getLideres_check->pluck('id')->contains($simpatizante->id) ? 'checked' : ''}}>                                             {{-- $roles->permissions->pluck('id')->contains($val->id) ? 'checked' : '' --}}
        </td>
        <td style="text-align: center">
            {{--$simpatizante->getMovilizadores_check--}}
            <input type="checkbox" name="chk_movilizador[]" id="chk_movilizador{{$simpatizante->id}}"
                   value="{{ $simpatizante->id }}" {{$simpatizante->getMovilizadores_check->pluck('id')->contains($simpatizante->id) ? 'checked' : ''}}>
        </td>
        <td>
            {{--$simpatizante->getTocados_check--}}
            <input type="checkbox" name="chk_tocado[]" id="chk_tocado{{$simpatizante->id}}"
                   value="{{ $simpatizante->id }}" {{$simpatizante->getTocados_check->pluck('id')->contains($simpatizante->id) ? 'checked' : ''}}>
        </td>
        <td>
            <a class="action-icon"
               onclick="event.preventDefault();
                   document.getElementById('delete{{$simpatizante->id}}').submit();">
                <i class="mdi mdi-trash-can"></i></a>
            <form id="delete{{$simpatizante->id}}"
                  action="{{route('Sympathizers.destroy',$simpatizante->id)}}"
                  method="POST" style="display: none">
                @csrf
                @method('DELETE')
            </form>
        </td>
    </tr>
@endforeach
</tbody>




<tbody>
@foreach($tocados as $key => $tocado)
    <tr>
        <td>{{$loop->iteration}}</td>
        <!--lider-->

        <!--movilizador-->
        <td>{{ $tocado->movilizadores->nombre .' '. $tocado->movilizadores->paterno .' '. $tocado->movilizadores->materno}}</td>
        <!--tocado -->
        <td>{{ $tocado->getInfo->nombre }} {{ $tocado->getInfo->paterno }} {{ $tocado->getInfo->materno }}</td>
        <td>{{ $tocado->getInfo->distrito }}</td>
        <td>{{ $tocado->getInfo->seccion }}</td>
        <td>{{ $tocado->getInfo->celular }}</td>
        <td>{{ $tocado->getInfo->gestion }}</td>
        <td>
            @if($tocado->getInfo->estatus_gestion === null)
                <span class="badge badge-secondary">
                                                <a href="{{ route('Sympathizers.edit',$tocado->tocado_id) }}"
                                                   class="badge-secondary editar"
                                                   onclick="event.preventDefault(); document.getElementById('edit{{$tocado->tocado_id}}').submit();">
                                                    Gestion en espera
                                                </a>

                                                <form id="edit{{$tocado->tocado_id}}"
                                                      action="{{ route('Sympathizers.update',$tocado->tocado_id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" class="form-control" name="movilizador" value="{{$tocado->mobilizer_id}}">
                                                    <input type="hidden" class="form-control" name="estatus_gestion" value="COMPLETA">
                                                </form>
                                            </span>
            @else
                <span class="badge badge-success">Completa</span>
            @endif
        </td>
        <td>
            @can('update_tocados')
                <a href="{{ route('Sympathizers.edit',$tocado->getInfo->id) }}" class="action icon">
                    <i class="mdi mdi-pencil"></i>
                </a>
            @endcan
            @can('delete_tocados')
                <a class="action-icon"
                   onclick="event.preventDefault();
                       document.getElementById('delete{{$tocado->id}}').submit();">
                    <i data-feather="trash-2" class="icons-xs icon-dual-danger"></i>
                </a>
                <form id="delete{{$tocado->id}}"
                      action="{{route('Tocados.destroy',$tocado->id)}}"
                      method="POST" style="display: none">
                    @csrf
                    @method('DELETE')
                </form>
            @endcan
        </td>
    </tr>
@endforeach
</tbody>

<thead>
<tr>
    <th>NO</th>
    <th>NOMBRE</th>
    <th>CREDENCIAL</th>
    <th>DISTRITO</th>
    <th>SECCION</th>
    <th>CELULAR</th>
    <th></th>
</tr>
</thead>


@foreach ($value->getLeaders($value->getUser->id) as $val)

@foreach($value->getMobilizers($value->getUser->id) as $movilizadores)
<tr>
    <td>{{$value->getUser->nombre}}</td>
    <td>{{$val->getInfo->nombre}} {{ $val->getInfo->paterno }} {{ $val->getInfo->materno }}</td>
    <td>{{$movilizadores->getInfo->nombre}} {{$movilizadores->getInfo->paterno}} {{$movilizadores->getInfo->materno}}</td>
</tr>
@endforeach
@endforeach

@foreach ($datos as $lideres)
@foreach($lideres->getMovilizadores($lideres->leader_id) as $movilizadores)
<tr>
    <td>{{$loop->iteration}}</td>
    <td>{{$lideres->getInfo->nombre}} {{$lideres->getInfo->paterno}} {{$lideres->getInfo->materno}} </td>
    <td>{{$movilizadores}}</td>
</tr>
@endforeach
@endforeach



 @foreach ($datos as $i => $lideres)
            @foreach($lideres->getMovilizadoresReportGral($lideres->leader_id) as $j => $movilizadores)
                @foreach($lideres->getTocadosReportGral($movilizadores->getInfo->id) as $k => $tocados)
                    <tr>
                        @if($loop->iteration == 1)
                        <td>{{ $loop->index }} {{ $loop->remaining	 }} {{ $loop->first	 }} {{$loop->iteration}}   {{ $loop->count }} {{ $loop->even }} {{ $loop->odd	 }} {{ $loop->depth	 }} {{ $i }}</td>
                        <td>{{$lideres->getInfo->nombre}} {{$lideres->getInfo->paterno}} {{$lideres->getInfo->materno}} {{ $i }}</td>
                        <td>M-{{$loop->iteration}} {{$movilizadores->getInfo->nombre}} {{$movilizadores->getInfo->paterno}} {{$movilizadores->getInfo->materno}} {{ $j }}</td>
                        @else
                        <td></td>
                        <td></td>
                        <td></td>
                        @endif

                        <td>T-{{ $loop->iteration }} {{$tocados->getInfo->nombre }} {{$tocados->getInfo->paterno }} {{$tocados->getInfo->materno }} {{ $k }}</td>
                        <td>{{ $tocados->getInfo->gestion }}</td>
                        <td>{{ $tocados->getInfo->estatus_gestion ? $tocados->getInfo->estatus_gestion : 'SIN ENTREGAR' }}</td>
                    </tr>
                @endforeach
            @endforeach
        @endforeach
