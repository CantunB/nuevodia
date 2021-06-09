@extends('layouts.app')
@section('content')
<style>
    .dataTables_filter {
       width: 70%;
       float: right;
       text-align: right;
    }
</style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">TOCADOS</li>
                        </ol>
                    </div>
                    <h4 class="page-title">LISTA DE TOCADOS S/C</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <!-- <h4 class="header-title">VEHICULOS</h4>-->
                        <button style="margin: 4px" type="button" class="btn btn-sm btn-blue waves-effect waves-light float-right" data-toggle="modal" data-target="#full-width-modal">
                            <i class="mdi mdi-plus-circle"></i> Nuevo Tocado
                        </button>
                        <div class="table-responsive">
                            <table id="table" class="table table-bordered mdl-data-table" style="width:100%" cellspacing="0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>NOMBRE</th>
                                        <th>DIRECCION</th>
                                        <th>CELULAR</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                               <!-- foreach($simpatizantes as $key => $simpatizante)
                                    <tr>
                                            <td>{$loop->iteration}}</td>
                                            <td>{$simpatizante->nombre .' '. $simpatizante->paterno .' '. $simpatizante->materno}}</td>
                                            <td>{'Calle '.$simpatizante->calle .' por '. $simpatizante->cruzamiento .' Colonia '.$simpatizante->colonia}}</td>
                                            <td>{$simpatizante->celular}}</td>
                                            <td>s{$simpatizante->correo}}</td>
                                            <td>
                                                @can('update_simpatizantes_sc')
                                                    <a href="{route('Simpatizantes.edit', $simpatizante->id)}}" class="action-icon">
                                                        <i data-feather="edit" class="icons-xs icon-dual-warning"></i>
                                                    </a>
                                                @endcan
                                                @can('delete_simpatizantes_sc')
                                                    <a class="action-icon"
                                                        onclick="event.preventDefault();
                                                        document.getElementById('delete{$simpatizante->id}}').submit();">
                                                        <i data-feather="trash-2" class="icons-xs icon-dual-danger"></i>
                                                    </a>
                                                    <form id="delete{$simpatizante->id}}"
                                                          action="{route('Simpatizantes.destroy',$simpatizante->id)}}"
                                                          method="POST" style="display: none">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                @endcan
                                            </td>
                                        </tr>
                                    endforeach -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container -->
@include('simpatizantes.create-modal')
@include('alerts.alerts')
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                },
                ajax: '{!! route('Simpatizantes.index') !!}',
                dom: 'Bfrtip',
                buttons: [
                    //  { extend: 'copy', className: 'btn btn-primary glyphicon glyphicon-duplicate'},
                    // { extend: 'csv', className: 'btn btn-primary glyphicon glyphicon-save-file' },
                    { extend: 'excel', className: 'btn btn-sm btn-success float-right', text:'<i class="mdi mdi-file-excel-outline"></i>', title: 'Tocados S/C'},
                    // { extend: 'pdf', className: 'btn btn-primary glyphicon glyphicon-file' },
                    { extend: 'print', className: 'btn btn-sm btn-danger float-right', text:'<i class="mdi mdi-file-pdf"></i>', title: 'Tocados S/C' }
                ],
                columns: [
                     /*0*/ {data: 'DT_RowIndex', name:'DT_RowIndex', class:'text-center', width:'5px', orderable:true, searchable:false},
                     /*0*/ {data: 'fullname', name:'fullname', width:'30px', orderable:false, searchable:false},
                     /*0*/ {data: 'fulladdress', name:'fulladdress', width:'20px', orderable:false, searchable:false},
                     /*0*/ {data: 'celular', name:'celular', width:'20px', orderable:false, searchable:false},
                     /*0*/ {data: 'actions', name:'actions', width:'10px', orderable:false, searchable:false},
                     ],
            });
        } );
    </script>
    <script>
        $('#form').parsley();
    </script>
@endpush
@endsection
