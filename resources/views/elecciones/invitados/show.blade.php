@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Invitados</li>
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
                    <div class="container">
                        <h4>
                            <a href="{{route('Invitados.index')}}">LISTA DE INVITADOS</a>
                        </h4>
                        <hr>
                        <div class="table-responsive">
                            <table id="invitados_table" class="table table-sm table-bordered mdl-data-table" style="width:100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>COORDINADOR</th>
                                    <th>INVITADO</th>
                                    <th>CELULAR</th>
                                    <th>SECCION</th>
                                    <th>VOTO;</th>
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
@include('alerts.alerts')
@push('scripts')
<script>
    function mayus(e) {
        e.value = e.value.toUpperCase();
    }
</script>
<script>
    $('#form_amigos').parsley();
</script>
<script>
$(document).ready(function(){
$('#invitados_table').DataTable({
        processing: true,
        serverSide: true,
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        ajax: '{!! route('Invitados.show', $id) !!}',
        columns: [
            {data: 'DT_RowIndex', name:'DT_RowIndex', class:'text-center', width:'5%', orderable:false, searchable:false},
            {data: 'coordinador', name:'coordinador', width:'30%', searchable:false, orderable: false},
            {data: 'nombre', name:'nombre', width:'50%'},
            {data: 'celular', name: 'celular'},
            {data: 'seccion', name: 'seccion'},
            {data: 'buttons', name:'buttons', className: 'text-center', width:' 50%',orderable: false, searchable:false },
        ],
    });
});
</script>
@endpush
@endsection
