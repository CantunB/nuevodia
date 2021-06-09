@extends('layouts.app')
@section('content')
<style>
    /*table {border-collapse:collapse; table-layout:fixed; width:310px;}
    #table td {border:solid 1px #fab; width:100px; word-wrap:break-word;}*/
    table.dataTable td {
        word-wrap: break-word;
        word-break: break-all;
        white-space: normal;
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
                    <a href="{{route('export_final')}}" class="btn btn-sm btn-soft-success waves-effect waves-light"><i class="fas  fas fa-file-excel"></i> Todos </a>
                    <a href="{{route('export_general')}}" class="btn btn-sm btn-soft-success waves-effect waves-light"><i class="fas  fas fa-file-excel"></i> Exportar </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
              <!--              <form class="form-inline">
                                <div class="form-group mb-2">
                                    <label for="inputPassword2" class="sr-only">Search</label>
                                    <input type="search" class="form-control" id="inputPassword2" placeholder="Search...">
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-right">
                                <button type="button" class="btn btn-success waves-effect waves-light mb-2 mr-1"><i class="mdi mdi-cog"></i></button>
                                <button type="button" class="btn btn-danger waves-effect waves-light mb-2" data-toggle="modal" data-target="#custom-modal">Add Contact</button>
                            </div>-->
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="table-sympathizers" cellspacing="0" class="table table-sm table-centered table-nowrap table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Clave</th>
                                    <th>Capturo</th>
                                    <th>Fecha de captura</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>

                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->

        <div class="col-lg-4">
            <div class="card-box">
                <div class="media mb-4">
                    <div class="media-body">
                        <h4 id="getNombre" class="mt-0 mb-1"></h4>
                        <p id="getClave" class="text-muted"></p>
                        Telefono: <p id="getCelular" class="text-muted"></p>
               <!--         <p class="text-muted"><i class="mdi mdi-office-building"></i> Vine Corporation</p> -->
                        <div class="container ">
                            <div class="float-left" id="isLider"></div>
                            <div class="float-left"  id="isMovilizador"></div>
                            <div class="float-left"  id="isTocado"></div>
                        </div>
                    </div>
                </div>

                <h5 class="mb-3 mt-4 text-uppercase bg-light p-2"><i class="mdi mdi-account-circle mr-1"></i> Información Personal</h5>
                    <div class="">
                        <h4 class="font-13 text-muted text-uppercase mb-1">Fecha Nacimiento:</h4>
                        <p id="getfe_nacimiento" class="mb-3"></p>

                        <h4 class="font-13 text-muted text-uppercase mb-1">Direccion :</h4>
                        <p id="getDireccion" class="mb-3"></p>

                        <h4 class="font-13 text-muted text-uppercase mb-1">Distrito :</h4>
                        <p id="getDistrito" class="mb-3"></p>

                        <h4 class="font-13 text-muted text-uppercase mb-1">Seccion :</h4>
                        <p id="getSeccion" class="mb-0"></p>

                    </div>
                    <div id="isLiderInfo"></div>
            </div> <!-- end card-box-->
        </div>
    </div>
    <div class="row">
        <table id="table_laminas" cellspacing="0" class="table table-sm table-hover table-bordered table-centered table-nowrap table-hover mb-0">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th style="text-align: center">NOMBRE</th>
                    <th style="text-align: center">MOVILIZADOR</th>
                    <th> TOCADOS </th>
                </tr>
            </thead>
            <tfoot>
                @foreach ($sympathizers as $i => $item)
                <tr>
                    <td>{{ $item->nombre }} {{ $item->paterno }} {{ $item->materno }}</td>
                    <td>
                         {{ $item->clave_elector }}
                    </td>

                </tr>
                @endforeach
            </tfoot>
        </table>
     </div>
</div>

<div class="modal fade" id="modalInfoLider" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">INFORMACION DEL LIDER</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Nombre:</label>
                <span id="lider_name"><span>
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Capturo:</label>
                <span id="lider_user"></span>
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Fecha de Captura:</label>
                <span id="lider_create"></span>
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Total de Movilizadores:</label>
                <span id="lider_movilizadores"></span>
              </div>
        </div>
        <div class="modal-footer">
            <div id="lider_btndelete"></div>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="modalInfoMovilizador" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">INFORMACION DEL MOVILIZADOR</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Nombre:</label>
                <span id="movilizador_nombre"><span>
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Lider:</label>
                <span id="movilizador_lider"></span>
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Capturo:</label>
                <span id="movilizador_user"></span>
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Fecha de Captura:</label>
                <span id="movilizador_create"></span>
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Total de Tocados:</label>
                <span id="movilizador_tocados"></span>
              </div>
        </div>
        <div class="modal-footer">
            <div id="movilizador_btndelete"></div>
            <button type="button" class="btn btn-primary" data-dismiss="modal">CERRAR</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalInfoTocado" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">INFORMACION DEL TOCADO</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Tocado:</label>
                <span id="tocado_nombre"><span>
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Lider:</label>
                <span id="tocado_lider"><span>
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Movilizador:</label>
                <span id="tocado_movilizador"><span>
            </div>
            <div class="form-group">
                <label for="message-text" class="col-form-label">Capturo:</label>
                <span id="tocado_user"></span>
            </div>
            <div class="form-group">
                <label for="message-text" class="col-form-label">Fecha de Captura:</label>
                <span id="tocado_create"></span>
            </div>
            <div class="form-group">
                <label for="message-text" class="col-form-label">Gestion:</label>
                <span id="tocado_gestion"></span>
            </div>
            <div class="form-group">
                <label for="message-text" class="col-form-label">Gestion:</label>
                <span id="tocado_gestion_estatus"></span>
            </div>
        </div>
        <div class="modal-footer">
            <div id="tocado_btndelete"></div>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>




@include('administrador.sympathizers.partials.modal-tocado')
@include('administrador.sympathizers.partials.modal-mobilizer')
@include('administrador.sympathizers.partials.modal-lider')
@push('scripts')
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
    $(document).ready(function() {
        $('#table-sympathizers').DataTable({
            processing: true,
            serverSide: true,
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            },
            ajax: '{!! route('admin.sympathizers') !!}',
          //  "columnDefs": [
          //      { "width": "20%", "targets": [0] }
           // ],
            columns: [
                {data: 'nombre', name:'nombre'},
                {data: 'clave_elector', name:'clave_elector'},
                {data: 'user_id', name: 'getUser.nombre'},
                {data: 'created_at', name: 'created_at'},
                {data: 'actions', name:'actions', orderable:false, searchable: false},

             //   {data: 'isLider', name: 'isLider', orderable:false, searchable: false },
              //  {data: 'isMovilizador', name: 'isMovilizador', orderable:false, searchable: false },
              //  {data: 'isTocado', name: 'isTocado', orderable:false, searchable: false },
              //  {data: 'isLiderAction', name: 'isLiderAction', orderable:false, searchable: false },
             //   {data: 'isMovilizadorAction', name: 'isMovilizadorAction', orderable:false, searchable: false },
              //  {data: 'isTocadoAction', name: 'isTocadoAction', orderable:false, searchable: false }

            ],
        });
    } );
</script>
<script>
    $(document).on('click', ".getInfo", function (){
        var table = $('#table-sympathizers').DataTable();
        $tr = $(this).closest('tr');
           var row = table.row($tr).data();
       // console.log(row);
        $("#getNombre").html(row.nombre);
        $("#getClave").html(row.clave_elector);
        $("#getCelular").html(row.celular);
        $("#getfe_nacimiento").html(row.fe_nacimiento);
        $("#getDireccion").html(row.direccion);
        $("#getDistrito").html(row.distrito);
        $("#getSeccion").html(row.seccion);
        $("#isLider").html(row.isLider);
        $("#isMovilizador").html(row.isMovilizador);
        $("#isTocado").html(row.isTocado);

       // var id = row.id;


    });
</script>
<script>
    function btonLider(id) {
        $.ajax({
            url:"{!! url('Administrador/sympathizers/getInfoLider') !!}",
            data: {
                'id': id,
                '_token': "{{ csrf_token() }}"
            },
            type: "POST",
            success: function (response){
                $("#lider_name").html(response.lider_nombre);
                $("#lider_user").html(response.lider_user);
                $("#lider_create").html(response.lider_create);
                $("#lider_movilizadores").html(response.lider_movilizadores);
                $("#lider_btndelete").html(response.lider_btndelete);
                //console.log(response);
               // $("#prueba").html(response.lider);
            }
        });
    }
</script>
<script>
    function btonMovilizador(id) {
        $.ajax({
            url:"{!! url('Administrador/sympathizers/getInfoMovilizador') !!}",
            data: {
                'id': id,
                '_token': "{{ csrf_token() }}"
            },
            type: "POST",
            success: function (response){
                $("#movilizador_nombre").html(response.movilizador_nombre);
                $("#movilizador_lider").html(response.movilizador_lider);
                $("#movilizador_user").html(response.movilizador_user);
                $("#movilizador_create").html(response.movilizador_create);
                $("#movilizador_tocados").html(response.movilizador_tocados);
                $("#movilizador_btndelete").html(response.movilizador_btndelete);
            }
        });
    }
</script>
<script>
    function btonTocado(id) {
        $.ajax({
            url:"{!! url('Administrador/sympathizers/getInfoTocado') !!}",
            data: {
                'id': id,
                '_token': "{{ csrf_token() }}"
            },
            type: "POST",
            success: function (response){
                $("#tocado_nombre").html(response.tocado_nombre);
                $("#tocado_lider").html(response.tocado_lider);
                $("#tocado_movilizador").html(response.tocado_movilizador);
                $("#tocado_user").html(response.tocado_user);
                $("#tocado_create").html(response.tocado_create);
                $("#tocado_gestion").html(response.tocado_gestion);
                $("#tocado_gestion_estatus").html(response.tocado_gestion_estatus);
                $("#tocado_btndelete").html(response.tocado_btndelete);
            }
        });
    }
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
                            $('#modalInfoTocado').modal('hide');
                            $('#table-sympathizers').DataTable().ajax.reload();

                            $("#getNombre").html("");
                            $("#getClave").html("");
                            $("#getCelular").html("");
                            $("#getfe_nacimiento").html("");
                            $("#getDireccion").html("");
                            $("#getDistrito").html("");
                            $("#getSeccion").html("");
                            $("#isLider").html("");
                            $("#isMovilizador").html("");
                            $("#isTocado").html("");

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
                            $('#modalInfoMovilizador').modal('hide');
                            $('#table-sympathizers').DataTable().ajax.reload();

                            $("#getNombre").html("");
                            $("#getClave").html("");
                            $("#getCelular").html("");
                            $("#getfe_nacimiento").html("");
                            $("#getDireccion").html("");
                            $("#getDistrito").html("");
                            $("#getSeccion").html("");
                            $("#isLider").html("");
                            $("#isMovilizador").html("");
                            $("#isTocado").html("");
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
                            $('#modalInfoLider').modal('hide');
                            $('#table-sympathizers').DataTable().ajax.reload();

                            $("#getNombre").html("");
                            $("#getClave").html("");
                            $("#getCelular").html("");
                            $("#getfe_nacimiento").html("");
                            $("#getDireccion").html("");
                            $("#getDistrito").html("");
                            $("#getSeccion").html("");
                            $("#isLider").html("");
                            $("#isMovilizador").html("");
                            $("#isTocado").html("");

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
                            $('#table-sympathizers').DataTable().ajax.reload();

                            $("#getNombre").html("");
                            $("#getClave").html("");
                            $("#getCelular").html("");
                            $("#getfe_nacimiento").html("");
                            $("#getDireccion").html("");
                            $("#getDistrito").html("");
                            $("#getSeccion").html("");
                            $("#isLider").html("");
                            $("#isMovilizador").html("");
                            $("#isTocado").html("");
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
