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
                                <li class="breadcrumb-item active">MYPYMES</li>
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
                            @can('create_mypymes')
                                <button style="margin: 4px" type="button" class="btn btn-sm btn-danger waves-effect waves-light float-right"  data-toggle="modal" data-target="#CreateModalMypymes">
                                    <i class="mdi mdi-plus"></i> Nuevo Registro
                                </button>
                            @endcan


                            <div class="container">
                                <h4>
                                    <a href="{{route('Empresas.index')}}">LISTA DE MYPYMES</a>
                                </h4>
                                <hr>
                                <!--<div class="alert alert-primary" role="alert">
                                    Row data: <span id="row-data"></span>
                                </div>-->
                                <div class="table-responsive">
                                    <table id="mypymes_table" class="table table-bordered mdl-data-table" style="width:100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>COMERCIO</th>
                                            <th>PROPIETARIO</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                        </thead>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        @include('mypymes.partials.info')
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
@include('alerts.alerts')
@include('mypymes.partials.create_modal')
@include('mypymes.partials.edit_modal')
@push('scripts')
<script>
<<<<<<< HEAD
    $(document).ready(function() {
        $('#enterprise_id').select2();
    });
</script>
<script>
=======
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
    function mayus(e) {
        e.value = e.value.toUpperCase();
    }
</script>
<script>
<<<<<<< HEAD
        $('#form_mypymes').parsley();
=======
    $(document).ready(function() {
            $('#enterprise_id').select2();
        });
    $(document).ready(function() {
        $('.select2').select2({
        });
    });
        $('#form_mypymes').parsley();
        $('#form_mypymes_edit').parsley();
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
</script>
<script>
    $(document).ready(function(){
         $('#mypymes_table').DataTable({
             processing: true,
             serverSide: true,
             'language': {
                 "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
             },
             ajax: '{!! route('Mypymes.index') !!}',
             lengthMenu: [
                    [ 10, 25, 50, -1 ],
                    [ '10', '25', '50', 'Todos' ]
                ],
             dom: 'Bfrtip',
           buttons: [
                     {
                         'extend': 'excel',
                         'titleAttr': 'Exportar a excel',
                         'className':'btn btn-success',
                         'text':'<i class="fas fa-file-excel"> Exportar </i>',
                         'title': 'LISTA DE MYPYMES',
                         exportOptions: {
                             columns: [4,5,6,7,1,8,2,9,10,11,12,13,14,16,15],
                         }
                     },
<<<<<<< HEAD
                     /*{
                         'extend': 'print',
                         'className':'btn btn-dark',
                         'titleAttr': 'Realizar Impresion',
                         'text':'<i class="fas fa-print"></i>',
                         'title': 'LISTA DE EMPLEADOS',
                         exportOptions: {
                             columns: [0,1,2],
                         }
                     },*/
=======
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                     {
                        'extend': 'pageLength',
                        'className':'btn btn-blue',
                        'text': "Mostrar Registros" //Translate to whatever you need},
                     },
             ],
             'select': true,
             'columns': [
            /*0*/   {data: 'DT_RowIndex', name:'DT_RowIndex', class:'text-center', width:'5px', title:'#', orderable:false, searchable:false},
            /*1*/   {data: 'name_commerce', name:'name_commerce', width:'5px', title:'NOMBRE COMERCIO'},
            /*2*/   {data: 'name_owner', name:'name_owner', width:'10px', title: 'PROPIETARIO'},
            /*3*/   {data: 'opciones', name:'opciones', class:'text-center', width:'5px', orderable:false, searchable:false},
            /*4*/   {data: 'date', name: ' data', class:'text-center', orderable:false, searchable: false, title: 'FECHA', visible: false},
            /*5*/   {data: 'name_promoter', name: 'name_promoter', class:'text-center', orderable:false, searchable: false, title: 'PROMOTOR', visible: false},
            /*6*/   {data: 'distrito', name: 'distrito', class:'text-center', orderable:false, searchable: false, title: 'DISTRITO', visible: false},
            /*7*/   {data: 'seccion', name: 'seccion', class:'text-center', orderable:false, searchable: false, title: 'SECCION', visible: false},
            /*8*/   {data: 'turn', name: 'turn', class:'text-center', orderable:false, searchable: false, title: 'GIRO', visible: false},
            /*9*/   {data: 'votantes', name: 'votantes', class:'text-center', orderable:false, searchable: false, title: '+18', visible: false},
            /*10*/   {data: 'direccion', name: 'direccion', class:'text-center', orderable:false, searchable: false, title: 'DIRECCION', visible: false},
            /*11*/   {data: 'celular', name: 'celular', class:'text-center', orderable:false, searchable: false, title: 'CELULAR', visible: false},
            /*12*/   {data: 'email', name: 'email', class:'text-center', orderable:false, searchable: false, title: 'CORREO', visible: false},
            /*13*/   {data: 'social_network', name: 'social_network', class:'text-center', orderable:false, searchable: false, title: 'RED SOCIAL', visible: false},
            /*14*/   {data: 'gestion', name: 'gestion', class:'text-center', orderable:false, searchable: false, title: 'GESTION', visible: false},
            /*15*/   {data: 'observation', name: 'observation', class:'text-center', orderable:false, searchable: false, title: 'OBSERVACION', visible: false},
            /*16*/   {data: 'areas', name: 'areas', class:'text-center', orderable:false, searchable: false, title: 'AREAS', visible: false},
               ],
         });
     });
 </script>
 <script>
    $(document).on('click', ".getInfo", function (){
        var table = $('#mypymes_table').DataTable();
        $tr = $(this).closest('tr');
        var row = table.row($tr).data();
        //console.log(row);
        $("#getCommerce").html(row.name_commerce);
        $("#getOwner").html(row.name_owner);
        $("#getPromotor").html(row.name_promoter);
        $("#getGiro").html(row.turn);
        $("#getCelular").html(row.celular);
        $("#getCaptura").html(row.date);
        $("#getDireccion").html(row.direccion);
        $("#getDistrito").html(row.distrito);
        $("#getSeccion").html(row.seccion);
        $("#getCorreo").html(row.email);
        $("#getSocial").html(row.social_network);
        $("#getAreas").html(row.areas);
        $("#getGestion").html(row.gestion);
        $("#getObservacion").html(row.observation);
    });
</script>
<<<<<<< HEAD

<script>
    $('.dropify').dropify();
=======
 <script>
    $(document).on('click', ".close", function (){
       $("#EditModalMypymes").empty();
    });
    $('#EditModalMypymes').on('hidden', function() {
    $(this).removeData('modal');
});
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
</script>
<script>
    $(document).ready(function(){
        $(document).on('click', ".btnModalEdit", function (){
            $('#EditModalMypymes').modal('show')
<<<<<<< HEAD
=======
            $('#EditModalMypymes').modal({
            backdrop: 'static'
            })
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
            var table_edit = $('#mypymes_table').DataTable();
            $tr_edit = $(this).closest('tr');
           // var path = '{!! Request::root() !!}';
            var row_edit = table_edit.row($tr_edit).data();
<<<<<<< HEAD
            console.log(row_edit);
            //$("#edit_id").val(row_edit.id);
=======
            var areas = row_edit.areas;
            //console.log(areas.split(','));
            $("#id_edit").val(row_edit.id);
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
            $("#name_commerce_edit").val(row_edit.name_commerce);
            $("#name_owner_edit").val(row_edit.name_owner);
            $("#name_promoter_edit").val(row_edit.name_promoter);
            $("#turn_edit").val(row_edit.turn);
            $("#celular_edit").val(row_edit.celular);
            $("#date_edit").val(row_edit.date);
            $("#direccion_edit").val(row_edit.direccion);
<<<<<<< HEAD
            $("#distrito_edit").val(row_edit.distrito);
            $("#seccion_edit").val(row_edit.seccion);
            $("#email_edit").val(row_edit.email);
            $("#social_network_edit").val(row_edit.social_network);
            $("#areas_edit").val(row_edit.areas);
=======
            $("#seccion_edit").val(row_edit.seccion).trigger('change');
            $("#distrito_edit").val(row_edit.distrito);
            $("#email_edit").val(row_edit.email);
            $("#social_network_edit").val(row_edit.social_network);
           if(areas.split(',')){
                $('#areas_edit').val(areas.split(','));
                $('#areas_edit').trigger('change'); 
            }else{
                $('#areas_edit').val(row_edit.areas);
                $('#areas_edit').trigger('change'); 
            }
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
            $("#gestion_edit").val(row_edit.gestion);
            $("#observation_edit").val(row_edit.observation);
            $("#votantes_edit").val(row_edit.votantes);
            $("#calle_edit").val(row_edit.calle);
            $("#cruzamiento_edit").val(row_edit.cruzamiento);
            $("#no_ext_edit").val(row_edit.no_ext);
            $("#no_int_edit").val(row_edit.no_int);
            $("#colonia_edit").val(row_edit.colonia);
            $("#cp_edit").val(row_edit.cp);
<<<<<<< HEAD

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
=======
            $("#trade_status_edit").val(row_edit.trade_status);
            $("#sympathizer_edit").val(row_edit.sympathizer);
            $("#stay_edit").val(row_edit.stay);
        });
        

         $('#form_mypymes_edit').on('submit', function(e){
            e.preventDefault();
            var id = $("#id_edit").val();
            $.ajax({
                type: "PUT",
                url: "Mypymes/"+id,
                data: $('#form_mypymes_edit').serialize(),
                success: function(response){
                    swal("Hecho!", response.message, "success");
                    $('#mypymes_table').DataTable().ajax.reload();
                    $('#EditModalMypymes').modal('toggle');

                },
                error: function(data){
                 console.log(data);
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
    });
<<<<<<< HEAD
=======
    
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
</script>
<script>
$(document).ready(function() {
    $('.js-example-basic-multiple').select2({
<<<<<<< HEAD
        placeholder: 'Selecciona un area',
=======
        placeholder: 'SELECCIONA UN AREA',
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
        allowClear: true
    });
})

$(document).ready(function() {
    $('#areas_edit').select2({
    });
})
</script>
<<<<<<< HEAD
=======
<script type="text/javascript">
$.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
$(document).ready(function () {
$('#seccion').on('change',function(e) {
    var seccion = e.target.value;
    $.ajax({
        url:"{{ route('Distritos.getDistritos') }}",
        type:"POST",
        data: {
            seccion: seccion,
            _token:'{{csrf_token()}}'
        },
    success:function (data) {
        $('#distrito').empty();
        $.each(data.distritos,function(index,distrito){
            $('#distrito').append('<option value="'+distrito.distrito_electoral+'">'+distrito.distrito_electoral+'</option>');
        })
        }
     })
    });
});
</script>
<script type="text/javascript">
$.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
$(document).ready(function () {
$('#seccion_edit').on('change',function(e) {
    var seccion = e.target.value;
    $.ajax({
        url:"{{ route('Distritos.getDistritos') }}",
        type:"POST",
        data: {
            seccion: seccion,
            _token:'{{csrf_token()}}'
        },
    success:function (data) {
        $('#distrito_edit').empty();
        $.each(data.distritos,function(index,distrito){
            $('#distrito_edit').append('<option value="'+distrito.distrito_electoral+'">'+distrito.distrito_electoral+'</option>');
        })
        }
     })
    });
});
</script>
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
@endpush
@endsection
