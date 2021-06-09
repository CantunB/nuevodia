@extends('layouts.app')
@section('content')
<style>
.dataTables_filter {
    width: 70%;
    float: right;
    text-align: right;
}
<<<<<<< HEAD
=======
.image-upload > input
{
    display: none;
}

.image-upload img
{
    width: 80px;
    cursor: pointer;
}
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
</style>
    <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">EMPRESAS</li>
                            </ol>
                        </div>
                        <h4 class="page-title"></h4>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($usuarios as $usuario)
                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card-box">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="avatar-lg">
                                    <img src="{{ asset('images/users/default.png') }}" class="img-fluid rounded-circle" alt="user-img" />
                                </div>
                            </div>
                            <div class="col">
                                <h5 class="mb-1 mt-2">{{ $usuario->nombre }} {{ $usuario->paterno }}</h5>
                                <p class="mb-2 text-muted">Empresas: {{ $usuario->getUserEmpresas()->count() }}</p>
                                <p class="mb-2 text-muted">Empleados: {{ $usuario->getUserEmployee()->count() }}</p>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->
                @endforeach

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="javascript: history.go(-1)" style="margin: 4px" type="button" class="btn btn-sm btn-secondary waves-effect waves-light float-right"  >
                                <i class="mdi mdi-page-first"></i> Regresar
                            </a>
                            @can('create_empresas')
                                <button style="margin: 4px" type="button" class="btn btn-sm btn-danger waves-effect waves-light float-right"  data-toggle="modal" data-target="#CreateModalEmpresa">
                                    <i class="mdi mdi-plus"></i> Nuevo Empresa
                                </button>
                            @endcan


                            <div class="container">
                                <h4>
                                    <a href="{{route('Empresas.index')}}">LISTA DE EMPRESAS</a>
                                </h4>
                                <hr>
                                <!--<div class="alert alert-primary" role="alert">
                                    Row data: <span id="row-data"></span>
                                </div>-->
                                <div class="table-responsive">
                                    <table id="empresas_table" class="table table-bordered mdl-data-table" style="width:100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NOMBRE</th>
                                            <th>DIRECCION</th>
                                            <th>RESPONSABLE</th>
                                            <th>No.EMP</th>
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

    <div class="modal fade" id="EditModalLider" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Actualizar informacion del lider</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

          </div>
        </div>
      </div>

@include('empresas.empresas.partials.info_modal')
@include('empresas.empresas.partials.create_modal')
@include('empresas.empresas.partials.edit_modal')
<<<<<<< HEAD
=======
@include('alerts.alerts')
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
@push('scripts')
<script>
    function mayus(e) {
        e.value = e.value.toUpperCase();
    }
</script>
<script>
        $('#form_empresa').parsley();
        $('#EditModalLiderForm').parsley();
</script>
<script>
    $(document).ready(function(){
         $('#empresas_table').DataTable({
             processing: true,
             serverSide: true,
             'language': {
                 "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
             },
             ajax: '{!! route('Empresas.index') !!}',
             dom: 'Bfrtip',
             buttons: [
                     {
                         'extend': 'excel',
                         'titleAttr': 'Exportar a excel',
                         'className':'btn btn-success',
                         'text':'<i class="fas fa-file-excel"></i>',
                         'title': 'LISTA DE EMPRESAS',
                         exportOptions: {
                             columns: [0,1,2],
                         }
                     },
                     {
                         'extend': 'pdf',
                         'titleAttr': 'Generar PDF',
                         'className':'btn btn-danger',
                         'text':'<i class="fas fa-file-pdf"></i>',
                         'title': 'LISTA DE EMPRESAS',
                         exportOptions: {
                             columns: [0,1,2],
                         }
                     },
                     {
                         'extend': 'print',
                         'className':'btn btn-dark',
                         'titleAttr': 'Realizar Impresion',
                         'text':'<i class="fas fa-print"></i>',
                         'title': 'LISTA DE EMPRESAS',
                         exportOptions: {
                             columns: [0,1,2],
                         }
                     },
             ],
             'select': true,
             'columns': [
             /*0*/  {data: 'DT_RowIndex', name:'DT_RowIndex', class:'text-center', width:'5px', orderable:false, searchable:false},
             /*1*/  {data: 'name', name:'name', width:'20px'},
                    {data: 'address', name:'address', width:'20px'},
                    {data: 'name_responsable', name:'name_responsable', width:'20px'},
                    {data: 'no_employee', name: 'no_employee', class: 'text-center', width: '5px'},
<<<<<<< HEAD
         //    /*1*/  {data: 'responsable', name:'responsable', width:'5px', orderable:false, searchable:false},
=======
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
             /*3*/  {data: 'opciones', name:'opciones', class:'text-center', width:'5px', orderable:false, searchable:false},

             ],
         });
     });
 </script>
 <script>
    $(document).on('click', ".getInfo", function (){
        $('#InfoModalEmpresas').modal('show')
        var table = $('#empresas_table').DataTable();
        $tr = $(this).closest('tr');
           var row = table.row($tr).data();
        $("#getNombre").html(row.name);
        $("#getCelular").html(row.telephone);
        $("#getCaptura").html(row.created_at);
        $("#getDireccion").html(row.address);
        $("#getResponsable").html(row.name_responsable);
        $("#getCelularRes").html(row.telephone_responsable);
        $("#getDireccionRes").html(row.address_responsable);
<<<<<<< HEAD

    });
</script>
<script>
    $(document).ready(function(){
=======
    });
</script>
<script>
   /* $(document).ready(function(){
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
        $('#form_empresa').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                type: "POST",
                //url: "Empresas/",
                url: '{{ route('Empresas.store') }}',
                data: $('#form_empresa').serialize(),
                success: function(response){
<<<<<<< HEAD
                  //  console.log(response);
                  //  alert('LIDER ACTUALIZADO');
                    swal("Hecho!", response.message, "success");
                    $('#empresas_table').DataTable().ajax.reload();
                    $('#CreateModalEmpresa').modal('toggle');

                    //$("#isMovilizador").html("");
                   // $("#isTocado").html("");
                },
                error: function(data){
                // console.log(data);
=======
                    swal("Hecho!", response.message, "success");
                    $('#empresas_table').DataTable().ajax.reload();
                    $('#CreateModalEmpresa').modal('toggle');
                },
                error: function(data){
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
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
<<<<<<< HEAD
=======
    });*/
</script>
 <script>
    $(document).on('click', ".close", function (){
       $("#EditModalEmpresas").empty();
    });
    $('#EditModalEmpresas').on('hidden', function() {
       $(this).removeData('modal');
    });
    $(document).on('click', ".close", function (){
       $("#CreateModalEmpresa").empty();
    });
    $('#CreateModalEmpresa').on('hidden', function() {
       $(this).removeData('modal');
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
    });
</script>
<script>
    $(document).ready(function(){
        $(document).on('click', ".btnModalEdit", function (){
            $('#EditModalEmpresas').modal('show')
            var table_edit = $('#empresas_table').DataTable();
            $tr_edit = $(this).closest('tr');
            var row_edit = table_edit.row($tr_edit).data();
            console.log(row_edit);
            $("#edit_id").val(row_edit.id);
            $("#edit_name").val(row_edit.name);
            $("#edit_telephone").val(row_edit.telephone);
           // $("#edit_website").val(row_edit.website);
           // $("#edit_email").val(row_edit.email);
            $("#edit_direccion").val(row_edit.address);
           // $("#edit_rfc").val(row_edit.rfc);
            $("#edit_responsable").val(row_edit.name_responsable);
            $("#edit_address_responsable").val(row_edit.address_responsable);
            $("#edit_telephone_responsable").val(row_edit.telephone_responsable);

        });

        $('#EditModalLiderForm').on('submit', function(e){
            e.preventDefault();
            var id = $("#edit_id").val();
            $.ajax({
                type: "PUT",
                url: "Empresas/"+id,
                data: $('#EditModalLiderForm').serialize(),
                success: function(response){
                    swal("Hecho!", response.message, "success");
                    $('#empresas_table').DataTable().ajax.reload();
                    //document.getElementById("EditModalLiderForm").reset();
                    //$('#EditModalLiderForm').parsley('reset');
                    $('#EditModalEmpresas').modal('toggle');
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
    /** DESTROY MOVILIZADOR*/
    function deleteConfirmationEnterprise(id) {
        swal({
            title: "Desea eliminar la Empresa?",
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
                    url: "{{url('/Empresas')}}/" + id,
                    data: {
                        id: id,
                        _token: '{!! csrf_token() !!}'
                    },
                    dataType: 'JSON',
                    success: function (results) {
                        if (results.success === true) {
                            swal("Hecho!", results.message, "success");
                            //$('#modalInfoMovilizador').modal('hide');
                            $('#empresas_table').DataTable().ajax.reload();
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
    function myFunction() {
      document.getElementById("form_empresa").reset();
    }
</script>
@endpush
@endsection
