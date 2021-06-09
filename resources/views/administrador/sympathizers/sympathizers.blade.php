@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">ADMINISTRADOR</li>
                        </ol>
                    </div>
                    <h4 class="page-title">ADMINISTRADOR DE SIMPATIZANTES</h4>
                </div>
            </div>
        </div>
        <div class="card mb-2">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="col-lg-8 text-lg-left">
                            @can('create_lideres')
                                <button
                                    class="btn btn-sm btn-soft-blue waves-effect waves-light"
                                    data-toggle="modal"
                                    data-target="#modal-lideres">
                                    <i class="fas fas fa-id-card-alt"></i>
                                    Nuevo Lider
                                </button>
                            @endcan
                            @can('create_movilizadores')
                                <button
                                    class="btn btn-sm btn-soft-blue waves-effect waves-light"
                                    data-toggle="modal"
                                    data-target="#modal-movilizadores">
                                    <i class="fas fas fa-id-card-alt"></i>
                                    Nuevo Movilizador
                                </button>
                            @endcan
                            @can('create_tocados')
                                <button
                                    class="btn btn-sm btn-soft-blue waves-effect waves-light"
                                    data-toggle="modal"
                                    data-target="#modal-tocados" >
                                    <i class="fas fas fa-id-card-alt"></i>
                                    Nuevo Tocado
                                </button>
                            @endcan
                        </div>
                    </div>

                    <div class="col-lg-4 text-lg-right">
                    @can('create_permisos')
                        <a href="{{route('export_sympathizers')}}" class="btn btn-soft-success waves-effect waves-light"><i class="fas  fas fa-file-csv"></i> Exportar</a>
                    @endcan
                    <a href="{{route('export_general')}}" class="btn btn-sm btn-soft-success waves-effect waves-light"><i class="fas  fas fa-file-excel"></i> Exportar </a>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                      <!--  <button style="margin: 4px" type="button" class="btn btn-sm btn-info waves-effect waves-light float-right"  data-toggle="modal" data-target="#full-width-modal">
                            <i class="mdi mdi-plus"></i>Actualizar Lideres
                        </button>
                        <button style="margin: 4px" type="button" class="btn btn-sm btn-info waves-effect waves-light float-right"  data-toggle="modal" data-target="#full-width-modal">
                            <i class="mdi mdi-plus"></i>Actualizar Movilizadores
                        </button> -->
                        <div class="table-responsive">
                            <table id="table" class="table table-sm dt-responsive nowrap w-100 data-table">
                                <thead>
                                <tr>
                                    <th style="text-align: center; background-color: #4682B4; color: #f0f6ff" colspan="4">INFORMACION SIMPATIZANTE</th>
                                    <th style="text-align: center; background-color: #B0C4DE; color: #f0f6ff" colspan="3">REGISTRADO</th>
                                    <th style="text-align: center; background-color: #ADD8E6; color: #f0f6ff" colspan="3">ACCIONES</th>
                                </tr>
                                <tr>
                                    <th>NOMBRE</th>
                                    <th>CLAVE ELECTOR</th>
                                    <th>CAPTURO</th>
                                    <th>FECHA DE REGISTRO</th>
                                    <th>LID</th>
                                    <th>MOV</th>
                                    <th>TOC</th>
                                    <th>LID</th>
                                    <th>MOV</th>
                                    <th>TOC</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->
    </div> <!-- container -->

@include('alerts.alerts')
@include('administrador.sympathizers.partials.modal-tocado')
@include('administrador.sympathizers.partials.modal-mobilizer')
@include('administrador.sympathizers.partials.modal-lider')
@push('scripts')

    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                processing: true,
                serverSide: true,
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                },
                ajax: '{!! route('admin.sympathizers') !!}',
                columns: [
                    {data: 'nombre', name:'nombre'},
                    {data: 'clave_elector', name: 'clave_elector'},
                    {data: 'user_id', name: 'getUser.nombre'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'isLider', name: 'isLider', orderable:false, searchable: false },
                    {data: 'isMovilizador', name: 'isMovilizador', orderable:false, searchable: false },
                    {data: 'isTocado', name: 'isTocado', orderable:false, searchable: false },
                    {data: 'isLiderAction', name: 'isLiderAction', orderable:false, searchable: false },
                    {data: 'isMovilizadorAction', name: 'isMovilizadorAction', orderable:false, searchable: false },
                    {data: 'isTocadoAction', name: 'isTocadoAction', orderable:false, searchable: false }

                ],
            });
        } );
    </script>
    <script>
        $('#form').parsley();
    </script>
    <script>
        $(document).ready(function() {
            $('.modal_lider_lider').select2();
            $('.modal_lider_user').select2();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.modal_mov_user').select2();
            $('.modal_mov_lider').select2();
            $('.modal_mov_mov').select2();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.modal_tocado_user').select2();
            $('.modal_tocado_mov').select2();
            $('.modal_tocado_tocado').select2();
        });
    </script>
    <script>
        /** DESTROY TOCADO*/
        function deleteConfirmationTocado(id) {
            swal({
                title: "Desea eliminar el Tocado?",
                text: "Por favor asegúrese y luego confirme!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "¡Sí, borrar!",
                cancelButtonText: "¡No, cancelar!",
                reverseButtons: !0
            }).then(function (e) {
                if (e.value === true) {
                    $.ajax({
                        type: 'DELETE',
                        url: "{{url('/Tocados')}}/" + id,
                        data: {
                            id: id,
                            _token: '{!! csrf_token() !!}'
                        },
                        dataType: 'JSON',
                        success: function (results) {
                            if (results.success === true) {
                                swal("Hecho!", results.message, "success");
                                $('.data-table').DataTable().ajax.reload();
                            } else {
                                swal("Error!", results.message, "error");
                            }
                        }
                    });
                } else {
                    e.dismiss;
                }
            }, function (dismiss) {
                return false;
            })
        }
        /** DESTROY TOCADO*/
    </script>
    <script>
        /** DESTROY MOVILIZADOR*/
        function deleteConfirmationMovilizador(id) {
            swal({
                title: "Desea eliminar el Movilizador?",
                text: "Por favor asegúrese y luego confirme!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "¡Sí, borrar!",
                cancelButtonText: "¡No, cancelar!",
                reverseButtons: !0
            }).then(function (e) {
                if (e.value === true) {
                    $.ajax({
                        type: 'DELETE',
                        url: "{{url('/Mobilizers')}}/" + id,
                        data: {
                            id: id,
                            _token: '{!! csrf_token() !!}'
                        },
                        dataType: 'JSON',
                        success: function (results) {
                            if (results.success === true) {
                                swal("Hecho!", results.message, "success");
                                $('.data-table').DataTable().ajax.reload();
                            } else {
                                swal("Error!", results.message, "error");
                            }
                        }
                    });
                } else {
                    e.dismiss;
                }
            }, function (dismiss) {
                return false;
            })
        }
        /** DESTROY MOVILIZADOR*/
    </script>
    <script>
        /** DESTROY LIDER*/
        function deleteConfirmationLider(id) {
            swal({
                title: "Desea eliminar el Lider?",
                text: "Por favor asegúrese y luego confirme!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "¡Sí, borrar!",
                cancelButtonText: "¡No, cancelar!",
                reverseButtons: !0
            }).then(function (e) {
                if (e.value === true) {
                    $.ajax({
                        type: 'DELETE',
                        url: "{{url('/Leaders')}}/" + id,
                        data: {
                            id: id,
                            _token: '{!! csrf_token() !!}'
                        },
                        dataType: 'JSON',
                        success: function (results) {
                            if (results.success === true) {
                                swal("Hecho!", results.message, "success");
                                $('.data-table').DataTable().ajax.reload();
                            } else {
                                swal("Error!", results.message, "error");
                            }
                        }
                    });
                } else {
                    e.dismiss;
                }
            }, function (dismiss) {
                return false;
            })
        }
        /** DESTROY LIDER*/
    </script>
    <script>
        /** DESTROY LIDER*/
        function deleteConfirmationSympathizers(id) {
            swal({
                title: "Desea eliminar el simpatizante?",
                text: "Eliminaras toda la informacion!",
                type: "info",
                showCancelButton: !0,
                confirmButtonText: "¡Sí, borrar!",
                cancelButtonText: "¡No, cancelar!",
                reverseButtons: !0
            })
               .then(function (e) {
                if (e.value === true) {
                    $.ajax({
                        type: 'DELETE',
                        url: "{{url('/Sympathizers')}}/" + id,
                        data: {
                            id: id,
                            _token: '{!! csrf_token() !!}'
                        },
                        dataType: 'JSON',
                        success: function (results) {
                            if (results.success === true) {
                                swal("Hecho!", results.message, "success");
                                $('.data-table').DataTable().ajax.reload();
                            } else {
                                swal("Error!", results.message, "error");
                            }
                        }
                    });
                } else {
                    e.dismiss;
                }
            }, function (dismiss) {
                return false;
            })
        }
        /** DESTROY LIDER*/
    </script>
@endpush
@endsection
