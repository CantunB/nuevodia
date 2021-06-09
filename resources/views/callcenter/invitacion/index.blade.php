@extends('layouts.app')
@section('content')
<style>
    .call_success{
        display: none;
    }
    .question3{
        display: none;
    }
</style>
<div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">CALL CENTER </li>
                        </ol>
                    </div>
                    <h4 class="page-title">CALL CENTER</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href="javascript: history.go(-1)" style="margin: 4px" type="button" class="btn btn-sm btn-outline-danger waves-effect waves-light float-right" >
                            <i class="mdi mdi-page-first"></i> Regresar
                        </a>
                        <div class="table-responsive">
                            <table id="invitation_table" class="table dt-responsive table-bordered  nowrap w-100">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NOMBRE</th>
                                    <th>CELULAR</th>
                                    <th></th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>



    </div> <!-- container -->

@include('alerts.alerts')
@include('callcenter.invitacion.partials.invitacion_modal')
@push('scripts')
<script>
            $(document).ready(function() {
                $('#invitation_table').DataTable({
                    language: {
                        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                    },
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('Invitacion.index') !!}',
                    dom: 'Bfrtip',
                    buttons: [
                    ],
                    columns: [
                     /*0*/ {data: 'DT_RowIndex', name:'DT_RowIndex', class:'text-center', width:'5px', orderable:false, searchable:false},
                     /*0*/ {data: 'nombre', name:'nombre', width:'5px', orderable:false, searchable:false},
                     /*0*/ {data: 'celular', name:'celular', width:'5px', orderable:false, searchable:false},
                     /*0*/ {data: 'opciones', name:'opciones', width:'5px', orderable:false, searchable:false},
                     ],

            });
            } );
</script>
<script>
    $(document).ready(function(){
        $(document).on('click', ".invitacion", function (){
            $('#InvitacionModal').modal('show')
            var table_edit = $('#invitation_table').DataTable();
            $tr_edit = $(this).closest('tr');
            var row_edit = table_edit.row($tr_edit).data();
            //console.log(row_edit);
            $("#clave_elector").val(row_edit.clave_elector);
        });



    });

</script>
@endpush
@endsection
