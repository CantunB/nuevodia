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
                            <li class="breadcrumb-item active">Administrador</li>
                        </ol>
                    </div>
                    <h4 class="page-title">TOCADOS</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-12">

                <div class="card">

                    <div class="card-body">
                        @can('create_permisos')
                            <a href="{{route('export_tocados')}}" class="btn btn-sm btn-soft-success waves-effect waves-light"><i class="fas  fas fa-file-csv"></i> Exportar CSV</a>
                        @endcan
                            <a href="{{route('export_general')}}" class="btn btn-sm btn-soft-success waves-effect waves-light"><i class="fas  fas fa-file-excel"></i> Exportar </a>

                            <a href="javascript: history.go(-1)" style="margin: 4px" type="button" class="btn btn-sm btn-outline-danger waves-effect waves-light float-right" >
                            <i class="mdi mdi-page-first"></i> Regresar
                        </a>
                        @can('create_tocados')
                        <button style="margin: 4px" type="button" class="btn btn-sm btn-blue waves-effect waves-light float-right" data-toggle="modal" data-target="#full-width-modal">
                            <i class="mdi mdi-plus-circle"></i> Nuevo Tocado
                        </button>
                        @endcan
                        <div class="table-responsive">
                            <table id="table" class="table dt-responsive nowrap w-100">
                                <thead>
                                <tr>
                                    <th>Movilizador</th>
                                    <th>Tocado</th>
                                    <th>Fecha de registro del tocado</th>
                                    <th>Capturo</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div>
        </div>
    </div> <!-- container -->
@include('alerts.alerts')
@include('administrador.tocados.partials.create')
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $('#table').DataTable({
           // processing: true,
           // serverSide: true,
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            },
            "oSearch": {
                "bSmart": false,
                "bRegex": true,
                "sSearch": ""
            },
            ajax: '{!! route('admin.tocados') !!}',
            columns: [
                {data: 'movilizador', name:'movilizadores.nombre'},
                {data: 'tocado', name:'getInfo.nombre'},
                {data: 'created_at', name: 'created_at', orderable:false, searchable: false},
                {data: 'user_id', name: 'getUser.nombre'},
                {data: 'action', name: 'action', orderable: false, searchable: false},

            ]
        });
    } );
</script>
<script>
    function deleteConfirmation(id){
        Swal.fire({
            title:  '¿Desea eliminar el registro?',
            text:   '¡Asegurate y luego confirma!',
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Si, eliminar!",
            cancelButtonText: "No, cancelar!",
            closeOnConfirm: false,
            closeOnCancel: false
        }).then(function (e){
            if(e.value === true){
                $.ajax({
                    type: 'DELETE',
                    data: {
                      _method: 'delete',
                        _token: '{{csrf_token()}}',
                      id: id
                    },
                    dataType: 'JSON',
                    success: function (results)
                    {
                        if (results.success === true) {
                            swal("Realizado!", results.message, "success");
                            window.location.href = '{!! route('admin.tocados') !!}'
                        }   else {
                            swal("Error!", results.message, "error");
                        }
                    }
                });
            } else {
                e.dismiss;
            }
        });
    }
</script>
<script>
    $('#form').parsley();
</script>
<script>
    $(document).ready(function() {
        $('.movilizador').select2();
    });
</script>
<script>
    $(document).ready(function() {
        $('.tocado').select2();
    });
</script>
@endpush
@endsection
