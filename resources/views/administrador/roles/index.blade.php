@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">ADMINISTRADOR</li>
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
                        <h4>ADMINISTRADOR DE LOS ROLES</h4>
                    </div>
                    <div class="col-lg-4 text-lg-right">
                        <button type="button"
                                class="btn btn-primary waves-effect waves-light"
                                data-toggle="modal"
                                data-target="#create-modal">
                            <i class="mdi mdi-plus"></i> Nuevo
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table" class="table table-sm table-condensed table-bordered dt-responsive nowrap w-100">
                                <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>NOMBRE</th>
                                    <th>RUTA </th>
                                    <th>OPCIONES</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $rol)
                                    <tr>
                                        <td style="text-align: center; width: 5%">{{ $loop->iteration }}</td>
                                        <th style="text-transform: uppercase;">{{ $rol->name }}</th>
                                        <td style="text-align: center">{{ $rol->guard_name}}</td>
                                        <td style="text-align: center; width: 10%">
                                            @can('update_roles')
                                                <a href="{{route('roles.edit',$rol->id)}}" class="action icon"><i class="mdi mdi-pencil"></i></a>
                                            @endcan
                                            @can('delete_roles')
                                                <a class="action-icon"
                                                   onclick="event.preventDefault();
                                                       document.getElementById('delete{{$rol->id}}').submit();">
                                                    <i data-feather="trash-2" class="icons-xs icon-dual-danger"></i>
                                                </a>
                                                <form id="delete{{$rol->id}}"
                                                      action="{{route('usuarios.destroy',$rol->id)}}"
                                                      method="POST" style="display: none">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            @endcan
                                        </td>

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

@include('alerts.alerts')
@include('administrador.roles.partials.create-modal')
@push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
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
            $('#createConfirmation').click(function (e){
                e.preventDefault();
                var request = $(form).serialize();
                var table = $('#table').DataTable();
                $.ajax({
                        type: "post",
                        url: "{!! route('usuarios.store') !!}",
                        data: request,
                        success: function(response){
                            console.log(response);
                            if(response.success === true){
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Registro correcto...',
                                    text: response.message,
                                    timer: 3000
                                }).then(function (e){
                                    window.location.href = '{!! route('usuarios.index') !!}';
                                });
                            }else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Opps...',
                                    text: response.message,
                                    timer: 3000
                                })
                            }
                        }
                    },
                    function (dismiss){
                        return false;
                    });
            });
        </script>
    @endpush
@endsection
