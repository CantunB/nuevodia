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
                        <h4>ADMINISTRADOR DE LOS USUARIOS</h4>
                    </div>
                    <div class="col-lg-4 text-lg-right">
                        <button type="button"
                                class="btn btn-primary waves-effect waves-light"
                                data-toggle="modal"
                                data-target="#CreateModalUsers">
                            <i class="mdi mdi-plus" ></i> Nuevo
                        </button>
                        <a href="{{route('export_users')}}" class="btn btn-soft-success waves-effect waves-light"><i class="mdi mdi-file-excel"></i> Exportar</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="users_table" class="table table-sm table-bordered dt-responsive nowrap w-100">
                                <thead class="thead-dark">
                                <tr>
                                    <th></th>
                                    <th>NOMBRE</th>
                                    <th>CELULAR</th>
                                    <th>CORREO</th>
                                    <th>ROL</th>
                                    <th>OPCIONES</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($usuarios as $key => $usuario)
                                    <tr>
                                        <td style="text-align: center">
                                            {{ $loop->iteration }}
                                         </td>
                                        <td>
                                            {{ $usuario->nombre }} {{ $usuario->paterno }} {{ $usuario->materno }}</td>
                                        <td>{{ $usuario->celular }}</td>
                                        <td>{{ $usuario->email}}</td>
                                        <td>
                                            <ul>
                                            @foreach ($usuario->getRoleNames() as $item)
                                              <span style="text-transform: uppercase" class="badge badge-info"><li>{{ $item }}</li> </span>
                                            @endforeach
                                            </ul>
                                        </td>
                                        <td style="text-align: center">
                                            <a href="{{route('usuarios.edit',$usuario->id)}}" class="action icon"><i class="mdi mdi-pencil"></i></a>
                                            <a class="action-icon"
                                               onclick="event.preventDefault();
                                                   document.getElementById('delete{{$usuario->id}}').submit();">
                                                <i data-feather="trash-2" class="icons-xs icon-dual-danger"></i>
                                            </a>
                                            <form id="delete{{$usuario->id}}"
                                                  action="{{route('usuarios.destroy',$usuario->id)}}"
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
            </div><!-- end col-->
        </div>
        <!-- end row-->
    </div> <!-- container -->

@include('alerts.alerts')
@include('administrador.usuarios.partials.create-modal')
@push('scripts')
<script>
    $(document).ready(function() {
        $('#users_table').DataTable({
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            },

        });
    } );
</script>
<script>
    function mayus(e) {
        e.value = e.value.toUpperCase();
    }
</script>
<script>
    $('#form_users').parsley();
</script>
<script>
    $(document).ready(function(){
        $('#form_users').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{!! route('usuarios.store') !!}",
                data: $('#form_users').serialize(),
                success: function(response){
                  //  console.log(response);
                  //  alert('LIDER ACTUALIZADO');
                    swal("Hecho!", response.message, "success");
<<<<<<< HEAD
                    $('#users_table').DataTable().ajax.reload();
                    $('#CreateModalUsers').modal('toggle');
=======
                    $('#CreateModalUsers').modal('toggle');
                    $('#users_table').DataTable().ajax.reload();

>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                },
                error: function(data){
                 console.log(data);
                var errors = data.responseJSON;
                    errorsHtml = '<ul>';
                  $.each(errors.errors,function (k,v) {
                         errorsHtml += '<li>'+ v + '</li>';
                  });
                  errorsHtml += '</ul>';
                    swal("Ooops!", errorsHtml, "error");
            }
            });
        })
    });
</script>
    @endpush
@endsection
