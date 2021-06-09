@extends('layouts.app')
@section('content')
<style>
    table.dataTable td {
           word-wrap: break-word;
           word-break: break-all;
           white-space: normal;
           }
   table.dataTable  {
       font-size: 12px;
   }
   </style>
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
                        <li class="breadcrumb-item active">ADMINISTRADOR</li>
                    </ol>
                </div>
            <h4 class="page-title"></h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card-box">
                <h4 class="header-title mb-4"></h4>
                    <ul class="nav nav-pills nav-bordered">
                        <li class="nav-item">
                            <a href="#usuarios" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                <i class="mdi mdi-account-box"></i> USUARIOS
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#roles" data-toggle="tab" aria-expanded="true" class="nav-link " onclick="rolesDataTables()">
                                <i class="mdi mdi-account-key"></i> ROLES
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#permisos" data-toggle="tab" aria-expanded="false" class="nav-link" onclick="permisosDataTables()">
                                <i class="mdi mdi-account-lock"></i> PERMISOS
                            </a>
                        </li>
                    </ul>
        <div class="tab-content">
            <div class="tab-pane show active" id="usuarios">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="col-lg-12 text-lg-right">
                                <button type="button"
                                        class="btn btn-sm btn-success waves-effect waves-light"
                                        data-toggle="modal"
                                        data-target="#CreateModalUsers">
                                    <i class="mdi mdi-plus" ></i> Nuevo
                                </button>
                            </div>
                            <div class="card-body">
                                <!-- <h4 class="header-title">VEHICULOS</h4>-->
                                <div class="table-responsive">
                                    <table id="users_table" cellspacing="0" class="table table-sm table-hover table-bordered table-centered table-nowrap table-hover mb-0">
                                        <thead class="">
                                            <tr>
                                                <th></th>
                                                <th>NOMBRE</th>
                                                <th>CELULAR</th>
                                                <th>CORREO</th>
                                                <th>ROL</th>
                                                <th>OPCIONES</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="roles">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">

                            <div class="col-lg-12 text-lg-right">
                                <button type="button"
                                        class="btn btn-sm btn-success waves-effect waves-light"
                                        data-toggle="modal"
                                        data-target="#create-modal">
                                    <i class="mdi mdi-plus"></i> Nuevo
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="roles_table" cellspacing="0" class="table table-sm table-hover table-bordered table-centered table-nowrap table-hover mb-0">
                                        <thead >
                                        <tr>
                                            <th>#</th>
                                            <th>ROL</th>
                                            <th>PERMISOS</th>
                                            <th>USUARIOS</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <div class="tab-pane" id="permisos">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-lg-12 text-lg-right">
                                @can('create_permisos')
                            <a href="{{ route('permisos.create') }}"
                                class="btn btn-sm btn-success  waves-effect waves-light mb-2 float-right">  <i class="mdi mdi-plus" ></i>Crear permisos</a>
                            @endcan
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="permisos_table" cellspacing="0" class="table table-sm table-hover table-bordered table-centered table-nowrap table-hover mb-0">
                                            <thead class="">
                                            <tr>
                                                <th>#</th>
                                                <th>USUARIO</th>
                                                <th>ROL</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end card-box-->
    </div> <!-- end col -->
    </div>
</div> <!-- container -->
@include('alerts.alerts')
@include('administrador.usuarios.partials.create-modal')
@include('administrador.roles.partials.create-modal')
@push('scripts')
<script>
$(document).ready(function(){
    $('#users_table').DataTable({
            processing: true,
            serverSide: true,
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            },
            ajax: '{!! route('usuarios.index') !!}',
            columns: [
                {data: 'DT_RowIndex', name:'DT_RowIndex' ,className: 'text-center'},
                {data: 'nombre', name:'nombre' },
                {data: 'celular', name:'celular', orderable: false },
                {data: 'email', name:'email',orderable: false },
                {data: 'rol', name:'rol', orderable: false },
                {data: 'opciones', name:'opciones',className: 'text-center' ,searchable: false, orderable: false},
        ],
    });
});
</script>
<script>
    function mayus(e) {
        e.value = e.value.toUpperCase();
    }
</script>
<script>
    $('#form_users').parsley();
</script>
<script>
    $(document).ready(function(){
        $('#form_users').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{!! route('usuarios.store') !!}",
                data: $('#form_users').serialize(),
                success: function(response){
                  //  console.log(response);
                  //  alert('LIDER ACTUALIZADO');
                    swal("Hecho!", response.message, "success");
                    window.location.href = '{!! route('admin.index') !!}';
                    //$('#CreateModalUsers').modal('toggle');
                    //$('#users_table').DataTable().ajax.reload();

                },
                error: function(data){
                 console.log(data);
                var errors = data.responseJSON;
                    errorsHtml = '<ul>';
                  $.each(errors.errors,function (k,v) {
                         errorsHtml += '<li>'+ v + '</li>';
                  });
                  errorsHtml += '</ul>';
                    swal("Ooops!", errorsHtml, "error");
            }
            });
        })
    });
</script>
<script>
    function rolesDataTables() {
    if (!$.fn.dataTable.isDataTable('#roles_table')) {
        $('#roles_table').DataTable({
            processing: true,
            serverSide: true,
            language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                },
            ajax: "{!! route('roles.index') !!}",
            columns: [
                {data: 'DT_RowIndex', name:'DT_RowIndex' , width: '10px'},
                {data: 'name', name: 'name', width: '110px'},
                {data: 'permisos', name: 'permisos', className: 'text-center', width: '110px',searchable: false, orderable: false},
                {data: 'usuarios', name: 'usuarios', className: 'text-center', width: '110px',searchable: false, orderable: false},
                {data: 'opciones', name: 'opciones', className: 'text-center',width: '110px', searchable: false, orderable: false},
                ],
            });
        }
}
</script>
<script>
            $('#form').parsley();
        </script>
        <script>
            $('#createConfirmation').click(function (e){
                e.preventDefault();
                var request = $(form).serialize();
                var table = $('#table').DataTable();
                $.ajax({
                        type: "post",
                        url: "{!! route('usuarios.store') !!}",
                        data: request,
                        success: function(response){
                            console.log(response);
                            if(response.success === true){
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Registro correcto...',
                                    text: response.message,
                                    timer: 3000
                                }).then(function (e){
                                    window.location.href = '{!! route('usuarios.index') !!}';
                                });
                            }else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Opps...',
                                    text: response.message,
                                    timer: 3000
                                })
                            }
                        }
                    },
                    function (dismiss){
                        return false;
                    });
            });
        </script>
<script>
function permisosDataTables() {
    if (!$.fn.dataTable.isDataTable('#permisos_table')) {
        $('#permisos_table').DataTable({
            processing: true,
            serverSide: true,
            language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                },
            ajax: "{!! route('permisos.index') !!}",
            columns: [
                {data: 'DT_RowIndex', name:'DT_RowIndex' , width: '10px'},
                {data: 'nombre', name: 'nombre', width: '110px'},
                {data: 'rol', name: 'rol', className: 'text-center', width: '110px',searchable: false, orderable: false},
                {data: 'action', name: 'action', className: 'text-center',width: '110px', searchable: false, orderable: false},
                ],
            });
        }
}
</script>
@endpush
@endsection
