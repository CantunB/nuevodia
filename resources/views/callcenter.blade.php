@extends('layouts.app')
@section('content')
        <!-- third party css -->
        <link href="{{ asset('libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('libs/datatables.net-select-bs4/css//select.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- third party css end -->
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <!--<li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>-->
                        <li class="breadcrumb-item active">CALL CENTER / TOCADOS</li>
                    </ol>
                </div>
                <h4 class="page-title">Call Center / TOCADOS</h4>
            </div>
        </div>
    </div>
    <!-- end row-->
     <!-- end page title -->
     <div class="card mb-2">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8">

                </div>
                <div class="col-lg-4 text-lg-right">
                    <button  type="button" class="btn btn-info" data-toggle="modal" data-target="#full-width-modal2">NUEVO PROPIETARIO</button>
                    <button  type="button" class="btn btn-info" data-toggle="modal" data-target="#full-width-modal">NUEVO TOCADO</button>
                </div><!-- end col-->
            </div> <!-- end row -->
        </div> <!-- end card-body-->
    </div> <!-- end card-->
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                   <!-- <h4 class="header-title">VEHICULOS</h4>-->
                    <div class="table-responsive">
                        <table id="table" class="table dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>NOMBRE</th>
                                <th>CELULAR</th>
                                <th>CREDENCIAL</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lista as $simpatizante)
                                <tr>
                                    <td>{{ $simpatizante->nombre }} {{ $simpatizante->paterno }} {{ $simpatizante->materno }}</td>
                                    <td>{{ $simpatizante->celular }}</td>
                                    <td>{{ $simpatizante->clave_elector}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->
</div> <!-- container -->
    <!-- Full width modal content -->

        <!-- Full width modal content -->

    </div><!-- /.modal -->

@include('alerts.alerts')
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                },
            });
        } );
    </script>
    <script>
        $('#form').parsley();
    </script>
    <script>
        $(document).ready(function() {
            $('.propietario').select2();
        });
    </script>
@endpush
@endsection
