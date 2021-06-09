@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">SORTEOS</li>
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
                    <h4>REGISTROS CAPTURADOS EN SORTEOS</h4>
                </div>
            </div> <!-- end row -->
        </div> <!-- end card-body-->
    </div> <!-- end card-->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <!-- <h4 class="header-title">VEHICULOS</h4>-->
                    <div class="table-responsive">
                        <table id="table_sorteos" class="table table-sm dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NOMBRE</th>
                                    <th>DIRECCION</th>
                                    <th>CELULAR</th>
                                    <th>CORREO</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- container -->
@push('scripts')
<script>
    $(document).ready(function(){
        $('#table_sorteos').DataTable({
            processing: true,
            //serverSide: true,
            'language': {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            },
            ajax: '{!! route('Sorteos.index') !!}',
            'columns': [
                {data: 'id', name:'id'},
                {data: 'nombre', name:'nombre'},
                {data: 'direccion', name:'direccion'},
                {data: 'celular', name:'celular'},
                {data: 'email', name:'email'},
            ],
        });
    });
</script>
@endpush
@endsection
