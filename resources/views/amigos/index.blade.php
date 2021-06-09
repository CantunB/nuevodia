@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">AMIGOS</li>
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
                        @can('create_amigos')
                            <button style="margin: 4px" type="button" class="btn btn-sm btn-blue waves-effect waves-light float-right"  data-toggle="modal" data-target="#ModalCreateAmigos">
                                <i class="mdi mdi-plus"></i> Nuevo Registro
                            </button>
                        @endcan

                    <div class="container">
                        <h4>
                            <a href="{{route('Amigos.index')}}">LISTA DE AMIGOS REGISTRADOS</a>
                        </h4>
                        <hr>
                        <div class="table-responsive">
                            <table id="amigos_table" class="table table-sm table-bordered mdl-data-table" style="width:100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NOMBRE</th>
                                    <th>CELULAR</th>
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
@include('amigos.partials.create_modal')
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
$('#amigos_table').DataTable({
        processing: true,
        serverSide: true,
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        ajax: '{!! route('Amigos.index') !!}',
        columns: [
            {data: 'DT_RowIndex', name:'DT_RowIndex', class:'text-center', width:'5px', orderable:false, searchable:false},
            {data: 'nombre', name:'nombre', width:'50%'},
            {data: 'celular', name:'celular', className: 'text-center', width:'30%'},
            {data: 'buttons', name:'buttons', className: 'text-center', orderable: false, searchable:false },
        ],
    });
});
</script>
@endpush
@endsection
