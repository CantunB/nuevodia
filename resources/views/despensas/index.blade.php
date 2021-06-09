@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">DESPENSAS</li>
                    </ol>
                </div>
                <h4 class="page-title"></h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <a href="javascript: history.go(-1)" style="margin: 4px" type="button" class="btn btn-sm btn-secondary waves-effect waves-light float-right"  >
                        <i class="mdi mdi-page-first"></i> Regresar
                    </a>
                    @can('create_despensas')
                        <button style="margin: 4px" type="button" class="btn btn-sm btn-blue waves-effect waves-light float-right"  data-toggle="modal" data-target="#ModalCreateDespensas">
                            <i class="mdi mdi-plus"></i> Nuevo Registro
                        </button>
                    @endcan
                    <div class="container">
                        <h4>
                            <a href="{{route('Despensas.index')}}">LISTA DE DESPENSAS</a>
                        </h4>
                        <hr>
                        <div class="table-responsive">
                            <table id="despensas_table" class="table table-sm table-bordered mdl-data-table" style="width:100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>NOMBRE</th>
                                    <th>DESPENSAS</th>
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
@include('despensas.partials.create_modal')
@include('despensas.partials.edit_modal')
@include('alerts.alerts')
@push('scripts')
<script>
    $(document).ready(function() {
        $('.select2').select2({
        });
    });
</script>
<script>
    function mayus(e) {
        e.value = e.value.toUpperCase();
    }
</script>
<script>
    $('#form_despensas').parsley();
</script>
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
<script>
 $(document).ready(function(){
    $('#despensas_table').DataTable({
        processing: true,
        serverSide: true,
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        ajax: '{!! route('Despensas.index') !!}',
        columns: [
            {data: 'nombre', name:'nombre' },
            {data: 'pantry', name:'pantry', className: 'text-center', width:'10%'},
            {data: 'opciones', name:'opciones',className: 'text-center', orderable: false, searchable:false },
        ],

    });
});
</script>
<script>
    $(document).ready(function(){
        $(document).on('click', ".editar", function (){
            $('#ModalEditDespensas').modal('show')
            $('#ModalEditDespensas').modal({
            backdrop: 'static'
            })
            var table_edit = $('#despensas_table').DataTable();
            $tr_edit = $(this).closest('tr');
            var row_edit = table_edit.row($tr_edit).data();
            var areas = row_edit.areas;
            $("#id_edit").val(row_edit.id);
            $("#nombre_edit").val(row_edit.nombre);
            $("#paterno_edit").val(row_edit.paterno);
            $("#materno_edit").val(row_edit.materno);
            $("#celular_edit").val(row_edit.celular);
            $("#clave_elector_edit").val(row_edit.clave_elector);
            $("#seccion_edit").val(row_edit.seccion).trigger('change');
            $("#distrito_edit").val(row_edit.distrito);
            $("#calle_edit").val(row_edit.calle);
            $("#calle_edit").val(row_edit.calle);
            $("#cruzamiento_edit").val(row_edit.cruzamiento);
            $("#fe_nacimiento_edit").val(row_edit.cruzamiento);
            $("#no_ext_edit").val(row_edit.no_ext);
            $("#no_int_edit").val(row_edit.no_int);
            $("#colonia_edit").val(row_edit.colonia);
            $("#cp_edit").val(row_edit.cp);
            $("#pantry_edit").val(row_edit.pantry);
        });


         $('#form_despensas_edit').on('submit', function(e){
            e.preventDefault();
            var id = $("#id_edit").val();
            $.ajax({
                type: "PUT",
                url: "Despensas/"+id,
                data: $('#form_despensas_edit').serialize(),
                success: function(response){
                    swal("Hecho!", response.message, "success");
                    $('#despensas_table').DataTable().ajax.reload();
                    $('#ModalEditDespensas').modal('toggle');

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
@endpush
@endsection
