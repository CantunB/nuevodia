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
                    <a href="{{ route('PrintOwners') }}" target="_blank" class="btn btn-soft-danger waves-effect waves-light"><i class="mdi mdi-printer"></i> GENERAR PDF</a>
                </div><!-- end col-->
            </div> <!-- end row -->
        </div> <!-- end card-body-->
    </div> <!-- end card-->

    <div class="row">
        <div class="col-md-12">
        <div class="card">
                <div class="card-body">
                    @can('create_propietarios')

                        <button style="margin: 4px" type="button" class="btn btn-sm btn-blue waves-effect waves-light float-right " data-toggle="modal" data-target="#full-width-modal">
                            <i class="mdi mdi-plus-circle"></i> Nuevo Propietario
                        </button>
                    @endcan
                   <!-- <h4 class="header-title">VEHICULOS</h4>-->
                    <div class="table-responsive">
                        <table id="table" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NOMBRE</th>
                                    <th>CELULAR</th>
                                    <th>CREDENCIAL</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            @if(isset($lista))
                                <tbody>
                                @foreach($lista as $simpatizante)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{ $simpatizante->nombre }} {{ $simpatizante->paterno }} {{ $simpatizante->materno }}</td>
                                        <td>{{ $simpatizante->celular }}</td>
                                        <td>{{ $simpatizante->clave_elector}}</td>
                                        <td>
                                            <a href="  {{ route('Owners.edit',$simpatizante->id)}}" class="action-icon">
                                                <i data-feather="edit" class="icons-xs icon-dual-warning"></i>
                                            </a>
                                            <a href="  {{ route('Owners.show',$simpatizante->id)}}" class="action-icon">
                                                <i data-feather="users" class="icons-xs icon-dual-success"></i>
                                            </a>
                                            <a class="action-icon"
                                               onclick="event.preventDefault();
                                                   document.getElementById('delete{{$simpatizante->id}}').submit();">
                                                <i data-feather="trash" class="icons-xs icon-dual-danger"></i>
                                            <form id="delete{{$simpatizante->id}}"
                                                  action="{{route('Owners.destroy',$simpatizante->id)}}"
                                                  method="POST" style="display: none">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            @endif
                        </table>
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div>
    </div>
</div> <!-- container -->
@include('alerts.alerts')
@include('owners.partials.create-modal')
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                },
                dom: 'Bfrtip',
                buttons: [
                    //  { extend: 'copy', className: 'btn btn-primary glyphicon glyphicon-duplicate'},
                    // { extend: 'csv', className: 'btn btn-primary glyphicon glyphicon-save-file' },
                    { extend: 'excel', className: 'btn btn-sm btn-soft-success float-right', text:'<i class="mdi mdi-file-excel-outline"></i> EXCEL', title: 'Propietarios'},
                    // { extend: 'pdf', className: 'btn btn-primary glyphicon glyphicon-file' },
                    { extend: 'print', className: 'btn btn-sm btn-soft-danger float-right', text:'<i class="mdi mdi-file-pdf"></i> PDF', title: 'Propietarios' }
                ]

            });
        } );
    </script>
    <script>
        $('#form-owner').parsley();
    </script>
    <script>
        $(document).ready(function() {
            $('.propietario').select2();
        });
    </script>
@endpush
@endsection

