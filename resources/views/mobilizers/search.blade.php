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
                            <li class="breadcrumb-item active">MOVILIZADORES</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
@include('mobilizers.partials.searcher')
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-body">
                        <h4>
                            <a href="{{route('Mobilizers.index')}}">LISTA DE MOVILIZADORES</a>
                        </h4>
                        <hr>

                        @if(isset($fecha1) and isset($fecha2))
                            <div class="alert alert-primary" role="alert">
                                <span id="row-data">   <p style="text-align: left"><h4>FECHA DE BUSQUEDA  DEL: {{ $fecha1 }} AL {{ $fecha2 }}</h4></span>
                            </div>

                            <form action="{{ route('PrintMobilizers') }}" >
                                <input type="hidden"  name="fecha1" value="{{ $fecha1 }}" />
                                <input type="hidden"  name="fecha2" value="{{ $fecha2 }}" />
                                <input type="hidden"  name="lider" value="{{ $liderselect }}" />
                                <button  formtarget="_blank" style="margin: 4px" type="submit" class="btn btn-sm btn-danger waves-effect waves-light float-left" ><i class="mdi mdi-printer"></i>GENERAR PDF</button>
                            </form>
                        @endif
                        <a href="javascript: history.go(-1)" style="margin: 4px" type="button" class="btn btn-sm btn-outline-danger waves-effect waves-light float-right" >
                            <i class="mdi mdi-page-first"></i> Regresar
                        </a>
                    <!--     <a href="{{--route('mobilizers_lider.pdf',$lider->id)--}}" target="_blank" style="margin: 4px" type="button" class="btn btn-sm btn-soft-danger waves-effect waves-light float-left">
                        <i class="mdi mdi-file-pdf-outline"></i> Reporte
                    </a>
                    -->
                        <button style="margin: 4px" type="button" class="btn btn-sm btn-blue waves-effect waves-light float-right" data-toggle="modal" data-target="#modal-movilizadores">
                            <i class="mdi mdi-plus-circle"></i> Nuevo Movilizador
                        </button>


                        <div class="table-responsive">
                            <table id="table" class="table table-sm dt-responsive nowrap w-100">
                                <thead>
                                <tr>
                                    <th colspan="1" style="text-align: center; background-color: #B0C4DE; color: #f0f0f0">OPCIONES</th>
                                    <th colspan="1" style="text-align: center; background-color: #4682B4; color: #f0f0f0">LIDER</th>
                                    <th colspan="5" style="text-align: center; background-color: #6495ED; color: #f0f0f0">MOVILIZADOR</th>
                                </tr>
                                <tr>
                                    <th>OPCIONES</th>
                                    <th>NOMBRE</th>
                                    <th>NOMBRE</th>
                                    <th>DISTRITO</th>
                                    <th>SECCION</th>
                                    <th>CELULAR</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($movilizadores as $movilizador)
                                    <tr>
                                        <td>
                                            <a href="{{ route('Sympathizers.show',$movilizador->getInfo->id) }}" class="action-icon icon-dual-success"><i class="mdi mdi-account-group"></i></a>
                                            <a href="{{ route('Mobilizers.edit',$movilizador->getInfo->id) }}" class="action-icon icon-dual-warning"><i class="mdi mdi-account-cog"></i></a>
                                        </td>
                                        <td>{{ $movilizador->getInfoLider->nombre .' '. $movilizador->getInfoLider->paterno .' '. $movilizador->getInfoLider->materno}}</td>
                                        <td>{{ $movilizador->getInfo->nombre .' '.$movilizador->getInfo->paterno .' '. $movilizador->getInfo->materno}}</td>
                                        <td style="text-align: center">{{ $movilizador->getInfo->distrito }}</td>
                                        <td style="text-align: center">{{ $movilizador->getInfo->seccion }}</td>
                                        <td>{{ $movilizador->getInfo->celular }}</td>
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
@include('mobilizers.create-modal')
@include('alerts.alerts')
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                },
                dom: 'Bfrtip',
                buttons: [
                    //    {extend: 'print', className:'btn btn-soft-danger', text:'<i class="fas fa-print"></i>', title: 'Relacion de Lideres'},
                ]
            });
        } );
    </script>
    <script>
        $('#form').parsley();
    </script>
    <script>
        $(document).ready(function() {
            $('.lider').select2();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.searchlider').select2();
        });
    </script>
@endpush
@endsection
