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
                                <li class="breadcrumb-item active">EMPLEADOS</li>
                            </ol>
                        </div>
                        <h4 class="page-title"></h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <a href="javascript: history.go(-1)" style="margin: 4px" type="button" class="btn btn-sm btn-secondary waves-effect waves-light float-right"  >
                                <i class="mdi mdi-page-first"></i> Regresar
                            </a>
                            @can('create_empleados')
                                <button style="margin: 4px" type="button" class="btn btn-sm btn-danger waves-effect waves-light float-right"  data-toggle="modal" data-target="#ModalCreateEmpleados">
                                    <i class="mdi mdi-plus"></i> Nuevo Empleados
                                </button>
                            @endcan


                            <div class="container">
                                <h4>
                                    <a href="{{route('Empresas.index')}}">LISTA DE EMPLEADOS</a>
                                </h4>
                                <hr>
                                <!--<div class="alert alert-primary" role="alert">
                                    Row data: <span id="row-data"></span>
                                </div>-->
                                <div class="table-responsive">
<<<<<<< HEAD
=======
                                    <form action="" class="smart-form" method="POST" id="FormVoto"  enctype="multipart/form-data">
                                    {{ csrf_field() }}
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                                    <table id="empleados_table" class="table table-bordered mdl-data-table" style="width:100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>EMPRESA</th>
                                            <th>EMPLEADOS</th>
<<<<<<< HEAD
                                            <th>&nbsp;</th>
                                        </tr>
                                        </thead>

                                    </table>
=======
                                            <th>DISTRITO</th>
                                            <th>SECCION</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                        </thead>
                                    </table>
                                    </form>
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card-box">
                        <div class="media mb-4">
                            <div class="media-body">
                                <h4 id="getNombre" class="mt-0 mb-1"></h4>
                                <p id="getClave" class="text-muted"></p>
                                Telefono: <p id="getCelular" class="text-muted"></p>
                       <!--         <p class="text-muted"><i class="mdi mdi-office-building"></i> Vine Corporation</p> -->
                            </div>
                        </div>
                        <h5 class="mb-3 mt-4 text-uppercase bg-light p-2"><i class="mdi mdi-account-circle mr-1"></i> Información del Empleado</h5>
                            <div>
                                <h4 class="font-13 text-muted text-uppercase mb-1">Fecha Captura:</h4>
                                <p id="getCaptura" class="mb-0"></p>
                                <h4 class="font-13 text-muted text-uppercase mb-1">Direccion :</h4>
                                <p id="getDireccion" class="mb-0"></p>
                                <h4 class="font-13 text-muted text-uppercase mb-1">Fecha de Nacimiento:</h4>
                                <p id="getFechaNacimiento" class="mb-0"></p>
                                <h4 class="font-13 text-muted text-uppercase mb-1">Correo :</h4>
                                <p id="getCorreo" class="mb-0"></p>
                            </div>
                    </div> <!-- end card-box-->
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

@include('empresas.empleados.partials.create_modal')
@include('empresas.empleados.partials.edit_modal')
<<<<<<< HEAD

@push('scripts')
<script>
=======
@include('empresas.empleados.partials.voto_modal')
@include('alerts.alerts')
@push('scripts')
<script>
  $(document).ready(function(){
        $(document).on('click', ".voto", function (){
            $('#ModalVotosEmpleados').modal('show')
            var table_edit = $('#empleados_table').DataTable();
            $tr_edit = $(this).closest('tr');
            var path = '{!! Request::root() !!}';
            var row_edit = table_edit.row($tr_edit).data();
            console.log(row_edit);
            $("#voto_id").val(row_edit.employee_id);
            $("#voto_nombre").val(row_edit.get_employee.nombre);
            $("#voto_clave").val(row_edit.get_employee.clave_elector);
            $('.dropify').dropify();
        });

        $('#ModalVotosEmpleados').on('submit', function(e){
            e.preventDefault();
            var id = $("#voto_id").val();
            var formData1 = new FormData($('#form_votos')[0]);
            $.ajax({
                type: "POST",
                url: "Empleados/"+id,
                cache:false,
                data: formData1,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function(response){
                    swal("Hecho!", response.message, "success");
                    $('#empleados_table').DataTable().ajax.reload();
                    $('#ModalVotosEmpleados').modal('toggle');
                },
                error: function(data){
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
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
    $(document).ready(function() {
        $('#enterprise_id').select2();
    });
</script>
<script>
    function mayus(e) {
        e.value = e.value.toUpperCase();
    }
</script>
<script>
        $('#form_empleados').parsley();
        $('#form_empleados_edit').parsley();
</script>
<script>
    $(document).ready(function(){
         $('#empleados_table').DataTable({
             processing: true,
<<<<<<< HEAD
             //serverSide: true,
=======
             serverSide: true,
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
             'language': {
                 "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
             },
             ajax: '{!! route('Empleados.index') !!}',
             dom: 'Bfrtip',
<<<<<<< HEAD
=======
             pageLength : 10,
                    lengthMenu: [
                    [ 10, 25, 50, -1 ],
                    [ '10', '25', '50', 'Todos']
                ],
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
             buttons: [
                     {
                         'extend': 'excel',
                         'titleAttr': 'Exportar a excel',
                         'className':'btn btn-success',
                         'text':'<i class="fas fa-file-excel"></i>',
                         'title': 'LISTA DE EMPLEADOS',
                         exportOptions: {
<<<<<<< HEAD
                             columns: [0,1,2],
=======
                             columns: [0,1,2,3,4],
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                         }
                     },
                     {
                         'extend': 'pdf',
                         'titleAttr': 'Generar PDF',
                         'className':'btn btn-danger',
                         'text':'<i class="fas fa-file-pdf"></i>',
                         'title': 'LISTA DE EMPLEADOS',
                         exportOptions: {
<<<<<<< HEAD
                             columns: [0,1,2],
=======
                             columns: [0,1,2,3,4],
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                         }
                     },
                     {
                         'extend': 'print',
                         'className':'btn btn-dark',
                         'titleAttr': 'Realizar Impresion',
                         'text':'<i class="fas fa-print"></i>',
                         'title': 'LISTA DE EMPLEADOS',
                         exportOptions: {
<<<<<<< HEAD
                             columns: [0,1,2],
                         }
                     },
=======
                             columns: [0,1,2,3,4],
                         }
                     },
                     {
                        'extend': 'pageLength',
                        'className':'btn btn-blue',
                        'text': "MostrarRegistros",
                        //_: "Afficher %d éléments",
                        //'-1': "Tout afficher" //Translate to whatever you need},
                     }
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
             ],
             'select': true,
             'columns': [
             /*0*/  {data: 'DT_RowIndex', name:'DT_RowIndex', class:'text-center', width:'5px', orderable:false, searchable:false},
             /*1*/  {data: 'empresa', name:'empresa', width:'5px'},
<<<<<<< HEAD
                     {data: 'empleado', name:'empleado', width:'10px' },
=======
                    {data: 'empleado', name:'empleado', width:'10px' },
                    {data: 'distrito', name:'distrito', visible:false,  title: 'DISTRITO', searchable:false, orderable:false },
                    {data: 'seccion', name:'seccion', visible:false,  title: 'SECCION',searchable:false, orderable:false },
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
             /*3*/  {data: 'opciones', name:'opciones', class:'text-center', width:'5px', orderable:false, searchable:false},
               ],
         });
     });
 </script>
 <script>
    $(document).on('click', ".getInfo", function (){
        var table = $('#empleados_table').DataTable();
        $tr = $(this).closest('tr');
        var row = table.row($tr).data();
<<<<<<< HEAD
        //console.log(row);
=======
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
        $("#getNombre").html(row.empleado);
        $("#getClave").html(row.get_employee.clave_elector);
        $("#getCelular").html(row.get_employee.celular);
        $("#getCaptura").html(row.get_employee.created_at);
        $("#getDireccion").html(row.address);
        $("#getFechaNacimiento").html(row.get_employee.fe_nacimiento);
        $("#getCorreo").html(row.get_employee.email);
    });
</script>
<script>
<<<<<<< HEAD
    $(document).ready(function(){
        $('#form_empleados').on('submit', function(e){
            e.preventDefault();
            var formData1 = new FormData($('#form_empleados')[0]);
            $.ajax({
                //headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: "POST",
               // var nombre = $('#display_name').val();
               // var token = '{{csrf_token()}}';// ó
             //   var data={nombre:nombre,_token:token};
                url: "{{ route('Empleados.store') }}",
                cache:false,
                data: formData1,
                dataType: "json",
                contentType: false,
                processData: false,            //  url: "{{route('Empleados.store')}}",
                //data: $('#form_empleados').serialize(),
                    //_token:'{{csrf_token()}}'

              //  dataType: 'JSON',
                success: function(response){
                 //   console.log(response);
                  //  alert('LIDER ACTUALIZADO');
                    swal("Hecho!", response.message, "success");
                    $('#empleados_table').DataTable().ajax.reload();
                    $('#ModalCreateEmpleados').modal('toggle');
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
=======
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
    $('.dropify').dropify();
</script>
<script>
    $(document).ready(function(){
        $(document).on('click', ".btnModalEdit", function (){
            $('#ModalEditEmpleados').modal('show')
            var table_edit = $('#empleados_table').DataTable();
            $tr_edit = $(this).closest('tr');
            var path = '{!! Request::root() !!}';
            var row_edit = table_edit.row($tr_edit).data();
            //console.log(row_edit);
            $("#edit_id").val(row_edit.employee_id);
            $("#edit_enterprise_id").val(row_edit.enterprise_id);
            $("#edit_nombre").val(row_edit.get_employee.nombre);
            $("#edit_paterno").val(row_edit.get_employee.paterno);
            $("#edit_materno").val(row_edit.get_employee.materno);
            $("#edit_clave_elector").val(row_edit.get_employee.clave_elector);
            $("#edit_distrito").val(row_edit.get_employee.distrito);
            $("#edit_seccion").val(row_edit.get_employee.seccion);
            $("#edit_calle").val(row_edit.get_employee.calle);
            $("#edit_cruzamiento").val(row_edit.get_employee.cruzamiento);
            $("#edit_no_ext").val(row_edit.get_employee.no_ext);
            $("#edit_no_int").val(row_edit.get_employee.no_int);
            $("#edit_colonia").val(row_edit.get_employee.colonia);
            $("#edit_colonia").val(row_edit.get_employee.colonia);
            $("#edit_cp").val(row_edit.get_employee.cp);
            $("#edit_fe_nacimiento").val(row_edit.get_employee.fe_nacimiento);
            $("#edit_celular").val(row_edit.get_employee.celular);
            $("#edit_email").val(row_edit.get_employee.email);
            $("#edit_image_ine").addClass('dropify');
             $("#edit_image_ine").attr("data-default-file", path.concat('/', row_edit.get_employee.employee_ine));
             $('.dropify').dropify();
        });

        $('#ModalEditEmpleados').on('submit', function(e){
            e.preventDefault();
            var id = $("#edit_id").val();
            var formData1 = new FormData($('#form_empleados_edit')[0]);
            $.ajax({
                type: "POST",
                url: "Empleados/"+id,
                //data: $('#form_empleados_edit').serialize(),
                cache:false,
                data: formData1,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function(response){
                    swal("Hecho!", response.message, "success");
                    $('#empleados_table').DataTable().ajax.reload();
                    $('#ModalEditEmpleados').modal('toggle');
                },
                error: function(data){
                 //console.log(data);
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
<<<<<<< HEAD
<script>
    function myFunction() {
      document.getElementById("form_empleados").reset();
    }
</script>
=======


>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
@endpush
@endsection
