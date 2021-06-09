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
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ config('app.name', 'SMAPAC') }}</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">PERMISOS</a></li>
                            <li class="breadcrumb-item active">LISTA</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Lista de permisos</h4>
                    @can('create_permisos')
                    <a href="{{ route('permisos.create') }}"
                        class="btn btn-sm btn-success  waves-effect waves-light mb-2 float-right">Crear permisos</a>
                    @endcan
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <div class="text-sm-left">
                                    <h4>Usuarios\Permisos</h4>
                                </div>
                            </div><!-- end col-->
                        </div>
                        <div class="table-responsive">
                            <table id="permisos-table" cellspacing="0" class="table table-sm table-centered table-nowrap table-hover mb-0">
                                <thead>
                                <tr>
                                    <th style="text-align: center">Nombre</th>
                                    <th>Role(s) Asignado</th>
                                    <th style="text-align: center">&nbsp;</th>
                                </tr>
                                </thead>
                            </table>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <h4 class="header-title mb-4">PERMISOS</h4>

                        <div class="row icons-list-demo">
                            @foreach ($permisos as $value )
                            <div class="col-sm-6 col-md-4 col-lg-3 icon-dual-blue">
                                <i class="mdi mdi-18px mdi-shield"></i>
                                <i class="mdi mdi-18px mdi-trash-can icon-dual-danger"></i>
                                {{ $value->name }}
                            </div>

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
@push('scripts')
<script>
    $(document).ready( function () {
        $('#permisos-table').DataTable( {
            processing: true,
            serverSide : true,
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            },
            ajax: '{!! route('permisos.index') !!}',
            columns:[
                {data: 'nombre', name: 'nombre'},
                {data: 'rol', name: 'rol'},
                {data: 'action', name: 'action', orderable: false, searchable: false , width : "5%"}
            ]
        } );
    } );
</script>

@endpush
@endsection
