@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">PROPIETARIOS</li>
                        </ol>
                    </div>
                    <!-- TITLE  -->
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="card mb-2">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8">
                        <h4>PROPIETARIOS</h4>
                    </div>
                    <div class="col-lg-4 text-lg-right">
                        <button  type="button" class="btn btn-info" data-toggle="modal" data-target="#full-width-modal"><i class="mdi mdi-plus"></i> NUEVO</button>
                        <a href="{{ route('PrintOwners') }}" target="_blank" class="btn btn-soft-danger waves-effect waves-light"><i class="mdi mdi-printer"></i> GENERAR PDF</a>
                    </div><!-- end col-->
                </div> <!-- end row -->
            </div> <!-- end card-body-->
        </div> <!-- end card-->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <!-- <h4 class="header-title">VEHICULOS</h4>-->
                        <div class="table-responsive">
                            <table id="table" class="table dt-responsive nowrap w-100">
                                <thead class="thead-light">
                                <tr>
                                    <th colspan="2" class="align-middle">PROPIETARIO</th>
                                    <th colspan="4">TOCADO</th>
                                </tr>
                                <tr>
                                    <th>#</th>
                                    <th>NOMBRE</th>
                                    <th>NOMBRE</th>
                                    <th>CELULAR</th>
                                    <th>CREDENCIAL</th>
                                    <th>&nbsp;</th>
                                </tr>
                                </thead>
                                    <tbody>
                                    @foreach($propietarios as $simpatizante)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$simpatizante->getOwner->nombre}} {{$simpatizante->getOwner->paterno}} {{$simpatizante->getOwner->materno}}</td>
                                            <td>{{ $simpatizante->getTocado->nombre }} {{ $simpatizante->getTocado->paterno }} {{ $simpatizante->getTocado->materno }}</td>
                                            <td>{{ $simpatizante->getTocado->celular }}</td>
                                            <td>{{ $simpatizante->getTocado->creadencial}}</td>
                                            <td>
                                                <a href="  {{ route('Owners.edit',$simpatizante->getTocado->id)}}" class="action-icon">
                                                    <i data-feather="edit" class="icons-xs icon-dual-warning"></i>
                                                </a>

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
    @include('alerts.alerts')
    @push('scripts')
        <script>
            $(document).ready(function(){
                $('#table').DataTable({
                    language: {
                        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                    },
                    dom: 'Bfrtip',
                    buttons:[
                       // {extend:"copy",className:"btn-light"},
                        {extend:"print",className:"btn-soft-danger", text:"Imprimir", title:"Realacion de tocados por propietario"},
                       // {extend:"pdf",className:"btn-light"}
                        ],
                });
            });
        </script>
    @endpush
@endsection

