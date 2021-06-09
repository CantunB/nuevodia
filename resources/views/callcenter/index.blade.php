@extends('layouts.app')
@section('content')
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
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <a href="javascript: history.go(-1)" style="margin: 4px" type="button" class="btn btn-sm btn-outline-danger waves-effect waves-light float-right" >
                            <i class="mdi mdi-page-first"></i> Regresar
                        </a>
                        <div class="table-responsive">
                            <table id="table" class="table dt-responsive table-bordered  nowrap w-100">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NOMBRE</th>
                                    <th>CELULAR</th>
                                    <th>CLAVE ELECTOR</th>
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
@push('scripts')
        <script>
            $(document).ready(function() {
                $('#table').DataTable({
                    language: {
                        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                    },
                    ajax: '{!! route('CallCenter.index') !!}',
                    dom: 'Bfrtip',
                    buttons: [
                        //  { extend: 'copy', className: 'btn btn-primary glyphicon glyphicon-duplicate'},
                        // { extend: 'csv', className: 'btn btn-primary glyphicon glyphicon-save-file' },
                      //  { extend: 'excel', className: 'btn btn-sm btn-success float-right', text:'<i class="mdi mdi-file-excel-outline"></i>', title: 'Call Center'},
                        // { extend: 'pdf', className: 'btn btn-primary glyphicon glyphicon-file' },
                      //  { extend: 'print', className: 'btn btn-sm btn-danger float-right', text:'<i class="mdi mdi-file-pdf"></i>', title: 'Call Center' }
                    ],
                    columns: [
                     /*0*/ {data: 'DT_RowIndex', name:'DT_RowIndex', class:'text-center', width:'5px', orderable:false, searchable:false},
                     /*0*/ {data: 'fullname', name:'fullname', width:'5px', orderable:true, searchable:true},
                     /*0*/ {data: 'celular', name:'celular', width:'5px', orderable:false, searchable:false},
                     /*0*/ {data: 'clave_elector', name:'clave_elector', width:'5px', orderable:false, searchable:false},
                     ],

            });
            } );
        </script>
        <script>
            $('#form-owner').parsley();
        </script>
        <script>
            $('#form-tocado').parsley();
        </script>
        <script>
            $(document).ready(function() {
                $('.propietario').select2();
            });
        </script>
@endpush
@endsection
