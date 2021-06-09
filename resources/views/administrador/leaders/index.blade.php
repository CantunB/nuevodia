@extends('layouts.app')
@section('content')

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
                            <li class="breadcrumb-item active">Administrador</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Lideres</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-body">
                        @can('create_permisos')
                            <a href="{{route('export_leaders')}}" class="btn btn-sm btn-soft-success waves-effect waves-light"><i class="fas  fas fa-file-csv"></i> Exportar</a>
                        @endcan
                        <a href="javascript: history.go(-1)" style="margin: 4px" type="button" class="btn btn-sm btn-outline-danger waves-effect waves-light float-right" >
                            <i class="mdi mdi-page-first"></i> Regresar
                        </a>
                        <button style="margin: 4px" type="button" class="btn btn-sm btn-blue waves-effect waves-light float-right" data-toggle="modal" data-target="#full-width-modal">
                            <i class="mdi mdi-plus-circle"></i> Nuevo Lider
                        </button>

                        <div class="table-responsive">
                            <table id="table" class="table dt-responsive nowrap w-100">
                                <thead>
                                <tr>
                                    <th>LIDER</th>
                                    <th>FECHA DE REGISTRO</th>
                                    <th>CAPTURO</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($lideres as $lider)
                                    <tr>
                                        <td>{{ $lider->getInfo->nombre .' '. $lider->getInfo->paterno .' '. $lider->getInfo->materno}}</td>
                                        <td>{{$lider->getInfo->created_at}}</td>
                                        <td>{{ $lider->getUser->nombre .' '. $lider->getUser->paterno .' '. $lider->getUser->materno}}</td>
                                        <td>
                                            <a class="action-icon"
                                                onclick="event.preventDefault();
                                                document.getElementById('delete{{$lider->id}}').submit();">
                                                <i class="mdi mdi-trash-can"></i></a>
                                            <form id="delete{{$lider->id}}"
                                                  action="{{route('Leaders.destroy',$lider->id)}}"
                                                  method="POST" style="display: none">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div>
        </div>
    </div> <!-- container -->
@include('administrador.leaders.partials.new')
@include('alerts.alerts')
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                },
                colReorder: true,

            });
        } );
    </script>
    <script>
        $('#form').parsley();
    </script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endpush
@endsection



