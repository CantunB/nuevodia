@extends('layouts.app')
@section('content')

    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <!--<li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>-->
                            <li class="breadcrumb-item active">TOCADOS</li>
                        </ol>
                    </div>
                    <h4 class="page-title">TOCADOS</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        @include('tocados.partials.searcher')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if(isset($fecha1) and isset($fecha2))
                            <div class="alert alert-primary" role="alert">
                                <span id="row-data">   <p style="text-align: left"><h4>FECHA DE BUSQUEDA  DEL: {{ $fecha1 }} AL {{ $fecha2 }}</h4></span>
                            </div>
                            <form action="{{ route('PrintSympathizers') }}" >
                                <input type="hidden"  name="fecha1" value="{{ $fecha1 }}" />
                                <input type="hidden"  name="fecha2" value="{{ $fecha2 }}" />
                                <input type="hidden" class="select2"  name="movilizador" value="{{ $movilizadorselect }}" />
                                <button  formtarget="_blank" style="margin: 4px" type="submit" class="btn btn-sm btn-danger waves-effect waves-light float-left" ><i class="mdi mdi-printer"></i>GENERAR PDF</button>
                            </form>
                            </p>
                        @endif
                        <a href="javascript: history.go(-1)" style="margin: 4px" type="button" class="btn btn-sm btn-outline-danger waves-effect waves-light float-right" >
                            <i class="mdi mdi-page-first"></i> Regresar
                        </a>
                        <button style="margin: 4px" type="button" class="btn btn-sm btn-blue waves-effect waves-light float-right" data-toggle="modal" data-target="#modal_tocados">
                            <i class="mdi mdi-plus-circle"></i> Nuevo Tocado
                        </button>
                        <div class="table-responsive">
                            <table id="tocado-table" class="table table-sm dt-responsive nowrap w-100">
                                <thead>
                                <tr>
                                    <th colspan="1" style="text-align: center; background-color: #B0C4DE; color: #f0f0f0">OPCIONES</th>
                                    <th colspan="1" style="text-align: center; background-color: #4682B4; color: #f0f0f0">MOVILIZADOR</th>
                                    <th colspan="6" style="text-align: center; background-color: #6495ED; color: #f0f0f0">INFORMACION DEL TOCADO</th>
                                </tr>
                                <tr>
                                    <th>#</th>
                                    <th>NOMBRE</th>
                                    <th>NOMBRE</th>
                                    <th>DISTRITO</th>
                                    <th>SECCION</th>
                                    <th>CELULAR</th>
                                    <th>GESTION</th>
                                    <th>ESTATUS GESTION</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tocados as $key => $tocado)
                                    <tr>
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
                                            {{$loop->iteration}}
                                        </td>
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

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div>
        </div>
    </div> <!-- container -->
    @include('alerts.alerts')
    @include('tocados.create-modal')
    @include('tocados.edit-modal')
    @push('scripts')
        <script>
            $('#form').parsley();
        </script>
        <script>
            $(document).ready(function(){
                $('#tocado-table').DataTable({
                    language: {
                        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                    },
                    dom: 'Bfrtip',
                    buttons: [
                        //  {extend: 'pdf', title: 'Relacion de Movilizadores por Tocados'},
                        // {extend: 'print', title: 'Relacion de Movilizadores por Tocados'},
                        {extend: 'print', className:'btn btn-soft-danger', text:'<i class="fas fa-print"></i> Imprimir', title: 'Relacion de Tocados'},

                    ],
                });
            });
        </script>
        <script>
            $(document).on('click', '.editar', function(){
                var table = $('#tocado-table').DataTable();
                $tr = $(this).closest('tr');
                var row = table.row($tr).data();
                console.log(row);
                var row_data = row;

                $('#id_tocado').val(row_data[0]);
            });
            $('#btn-edit').on('click',function(e){
                var table = $('#tocado-table').DataTable();
                var id_tocado = $('#id_tocado').val();
                var estatus = $('#estatus_gestion').val();
                console.log(estatus);
                e.preventDefault();
                $.ajax({
                    url: "{!! url('Sympathizers/{id_tocado}')  !!}",
                    data:{
                        'id': id_tocado,
                        'estatus_gestion': estatus,
                        '_token': "{{ csrf_token() }}"
                    },
                    type: "PUT",
                    success: function (response){
                        table.ajax.reload();
                        jQuery.noConflict();
                        $('#edit-modal').modal('hide');
                    }
                })
            })
        </script>
        <script>
            $(document).ready(function() {
                $('.movilizador').select2();
            });
             $(document).ready(function() {
                $('.select2').select2();
            });
        </script>
        <script>
            $(document).ready(function() {
                $('.create').select2();
            });
        </script>
    @endpush
@endsection
