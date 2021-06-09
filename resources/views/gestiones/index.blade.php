@extends('layouts.app')
@section('content')
<style>
 table.dataTable td {
        word-wrap: break-word;
        word-break: break-all;
        white-space: normal;
        }
table.dataTable  {
    font-size: 12px;
}
</style>
<style>
    .dataTables_filter {
       width: 70%;
       float: right;
       text-align: right;
    }
</style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">GESTIONES</li>
                        </ol>
                    </div>
                    <h4 class="page-title"></h4>
                </div>
            </div>
        </div>
<<<<<<< HEAD
       
=======

>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
        <div class="row">
          <div class="col-xl-12">
                                <div class="card-box">
                                    <h4 class="header-title mb-4"></h4>
<<<<<<< HEAD
        
=======

>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                                    <ul class="nav nav-pills nav-bordered">
                                        <li class="nav-item">
                                            <a href="#gestiones" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                                <i class="mdi mdi-handshake"></i> GESTIONES
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#simpatizantes" data-toggle="tab" aria-expanded="true" class="nav-link " onclick="postsDataTables()">
<<<<<<< HEAD
                                                 <i class="mdi mdi-account-multiple"></i> SIMPATIZANTES
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#messages1" data-toggle="tab" aria-expanded="false" class="nav-link">
                                                Messages
=======
                                                <i class="mdi mdi-account-multiple"></i> SIMPATIZANTES
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#reportes" data-toggle="tab" aria-expanded="false" class="nav-link" onclick="reportsDataTables()">
                                               <i class="mdi mdi-file-document"></i> REPORTES
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="gestiones">
<<<<<<< HEAD
                                         <div class="row">
=======
                                            <div class="row">
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                                                <div class="col-md-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <!-- <h4 class="header-title">VEHICULOS</h4>-->
                                                            <div class="table-responsive">
                                                                <table id="table-gestion" cellspacing="0" class="table table-sm table-hover table-bordered table-centered table-nowrap table-hover mb-0">
                                                                    <thead class="thead-light">
                                                                        <tr>
                                                                            <th style="text-align: center">Gestion</th>
                                                                            <th style="text-align: center">Cantidad</th>
                                                                            <th style="text-align: center">Capturo</th>
                                                                        </tr>
                                                                    </thead>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <table id="table-gestion-user" class="table table-sm table-bordered dt-responsive table-condensed nowrap">
                                                                    <thead style="background-color: #1D7CA2; color:white ">
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>NOMBRE</th>
                                                                        <th style="text-align: center">GESTION</th>
                                                                        <th style="text-align: center">ESTATUS</th>
                                                                    </tr>
                                                                    </thead>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
<<<<<<< HEAD
                                           
=======
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <!-- <h4 class="header-title">VEHICULOS</h4>-->
                                                            <div class="table-responsive">
                                                                <table id="table_laminas" cellspacing="0" class="table table-sm table-hover table-bordered table-centered table-nowrap table-hover mb-0">
                                                                    <thead class="thead-light">
                                                                        <tr>
                                                                            <th>#</th>
                                                                            <th style="text-align: center">NOMBRE</th>
                                                                            <th style="text-align: center">DISTRITO</th>
                                                                            <th style="text-align: center">SECCION</th>
                                                                            <th style="text-align: center">GESTION</th>
                                                                            <th style="text-align: center">¿Cuál de los candidatos considera que tiene las mejores propuestas?</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tfoot>
                                                                        @foreach ($laminas as $i => $item)
                                                                        <tr>
                                                                            <td>{{ $item->celular }}</td>
                                                                            <td>{{ $item->nombre  }} {{ $item->paterno  }} {{ $item->materno  }}</td>
                                                                            <td>{{ $item->distrito }}</td>
                                                                            <td>{{ $item->seccion }}</td>
                                                                            <td>{{ $item->gestion }}</td>
                                                                            <td>
                                                                                @if($item->q5 == 'opcion2')
                                                                                {{ 'Pablo Gutierrez Lazarus (MORENA)' }}
                                                                                @elseif($item->q5 == 'opcion3')
                                                                                {{ 'Alejandro Coba (MOVIMIENTO CIUDADANO)' }}
                                                                                @elseif($item->q5 == 'opcion4')
                                                                                {{ 'Arturo Laureano (FUERZA POR MEXICO)' }}
                                                                                @elseif($item->q5 == 'opcion7')
                                                                                {{ 'Ninguno' }}
                                                                                @elseif($item->q5 == 'opcion8')
                                                                                {{ 'Es secreto' }}

                                                                                @else
                                                                                {{ $item->q5 }}
                                                                                @endif

                                                                            </td>
                                                                        </tr>
                                                                        @endforeach
                                                                    </tfoot>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                                        </div>
                                        <div class="tab-pane" id="simpatizantes">
                                            <div class="table-responsive">
                                                <table id="sympathizers" class="table table-sm table-bordered mdl-data-table" style="width:100%" cellspacing="0">
                                                    <thead style="background-color: #7FB3D5; color:white ">
                                                    <tr>
                                                        <th>NOMBRE</th>
<<<<<<< HEAD
=======
                                                        <th>CLAVE</th>
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                                                        <th style="text-align: center">GESTION</th>
                                                        <th style="text-align: center">ESTATUS</th>
                                                        <th style="text-align: center"></th>
                                                    </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
<<<<<<< HEAD
                                        <div class="tab-pane" id="messages1">
                                            <p>Vakal text here dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                                            <p class="mb-0">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
=======
                                        <div class="tab-pane" id="reportes">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="card">
                                                            <table id="reporte" class="table table-sm table-borderless mb-0">
                                                                <thead class="thead-light">
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Fecha</th>
                                                                    <th>Total</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($actualizado as $key => $date)
                                                                <tr>
                                                                    <td style="text-align: center; width: 5px">{{$loop->iteration}}</td>
                                                                    <td style="width: 20px">{{$date->updated_at->toDateString()}}</td>
                                                                    <td style="width: 10px">{{$gestiones[$key]}}</td>
                                                                </tr>
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                    </div>
                                                </div>
                                            </div>
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                                        </div>
                                    </div>
                                </div> <!-- end card-box-->
                            </div> <!-- end col -->
        </div>
    </div> <!-- container -->
@include('gestiones.partials.edit_modal')
@push('scripts')
<script>
        $(document).ready(function(){
            $('#table-gestion').DataTable({
                processing: true,
                serverSide: true,
<<<<<<< HEAD
=======
                info:false,
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                },
                ajax: '{!! route('Gestiones.index') !!}',
                columns: [
                    {data: 'gestion', name:'gestion',    },
                    {data: 'contador', name:'contador', orderable: false, searchable:false, 'className': 'text-center', width:'10%'},
                    {data: 'capturo', name:'capturo', orderable: false, searchable:false },
                ],

            });
<<<<<<< HEAD
        });

    $(document).ready(function(){
        $('#table-gestion').DataTable();
        $('#table-gestion td').css('white-space','initial');
    });
</script>
        <script>
            $('#form').parsley();
        </script>
=======
        });

    $(document).ready(function(){
        $('#table-gestion').DataTable();
        $('#table-gestion td').css('white-space','initial');
    });
</script>
<script>
    $('#form').parsley();
</script>
<script>
    $(document).ready(function(){
        $('#table_laminas').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel', 'pdf'
                ],
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                },
                ajax: '{!! route('Gestiones.index') !!}',
                columns: [
                    {data: 'gestion', name:'gestion',    },
                    {data: 'contador', name:'contador', orderable: false, searchable:false, 'className': 'text-center', width:'10%'},
                    {data: 'capturo', name:'capturo', orderable: false, searchable:false },
                ],
            });
        });
</script>
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
<script>
    $(document).on('click', ".btninfo", function (){
      //  alert('presionaste el boton');
        var table = $('#table-gestion').DataTable();
        $tr = $(this).closest('tr');
        // var row = table.row($(this)).data();
        var row = table.row($tr).data();
        //console.log(row);
        //console.log(row.infogestion);
        var infogestion = row.infogestion;
        //var row = table.row($tr).data();
        $.ajax({
            url:"{!! url('Gestiones/data') !!}",
            data: {
                'infogestion': infogestion,
                '_token': "{{ csrf_token() }}"
            },
            type: "POST",
            success: function (response){
            //$("#tabel-gestion-user").dataTable().fnDestroy();
                $("#prueba").html(response.data.fullname);
                var datos = response.data;
                $('#table-gestion-user').DataTable({
                    language: {
                        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                    },
                    destroy: true,
                    data :datos,
                    columns: [
                        {data: "rownum", className: "text-center",},
                        {data: "fullname"},
                        {data: "gestion" ,className: "text-center",},
                        {data: "estatus_gestion",className: "text-center", },
                    ]
                });

            }

        });
    });

</script>
<script>
 function postsDataTables() {
    if (!$.fn.dataTable.isDataTable('#sympathizers')) {
        $('#sympathizers').DataTable({
            processing: true,
            serverSide: true,
            info:false,
            language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                },
            ajax: "{!! url('Gestiones/gestiones') !!}",
            columns: [
                {data: 'nombre', name: 'nombre', width: '110px'},
<<<<<<< HEAD
=======
                {data: 'clave_elector', name: 'clave_elector', class: 'text-center', width: '120px'},
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                {data: 'gestion', name: 'gestion',  class: 'text-center', width: '120px'},
                {data: 'estatus', name: 'estatus',  class: 'text-center', width: '120px'},
                {data: 'opciones', name: 'opciones',  class: 'text-center', width: '10px'},

            ],
        });
    }
}
</script>
<script>
<<<<<<< HEAD
=======
 function reportsDataTables() {
    if (!$.fn.dataTable.isDataTable('#reporte')) {
        $('#reporte').DataTable({
            info:false
        });
    }
}
</script>
<script>
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
    $(document).on('click', ".actualizar", function (){
        var table = $('#sympathizers').DataTable();
        $tr = $(this).closest('tr');
        var row = table.row($tr).data();
        var id = row.id;
        $.ajax({
            url: "{{url('/Gestiones')}}/" + id,
            type:"PUT",
            data: {
                estatus_gestion: "COMPLETA",
                _token:'{{csrf_token()}}'
            },
            success: function (results) {
                if (results.success === true) {
                    swal("Hecho!", results.message, "success");
                    //$('#modalInfoMovilizador').modal('hide');
                    $('#sympathizers').DataTable().ajax.reload();
                } else {
                    swal("Error!", results.message, "error");
                }
            }
<<<<<<< HEAD
            })        
=======
            })
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)

    });
</script>
<script>
    $(document).ready(function(){
        $(document).on('click', ".editar", function (){
            $('#EditGestionesModal').modal('show')
            var table_edit = $('#sympathizers').DataTable();
            $tr_edit = $(this).closest('tr');
            var row_edit = table_edit.row($tr_edit).data();
            console.log(row_edit);
            $("#edit_id").val(row_edit.id);
            $("#edit_name").val(row_edit.nombre);
            $("#edit_gestion").val(row_edit.gestion ?? 'SIN GESTION');
            $("#edit_estatus").val(row_edit.estatus_gestion);

        });

        $('#EditGestionesForm').on('submit', function(e){
            e.preventDefault();
            var id = $("#edit_id").val();
            $.ajax({
                type: "PUT",
                    url: "{{url('/Gestiones')}}/" + id,
                data: $('#EditGestionesForm').serialize(),
                success: function(results){
                   if (results.success === true) {
                    swal("Hecho!", results.message, "success");
                    //$('#modalInfoMovilizador').modal('hide');
                     $('#EditGestionesModal').modal('toggle');
                    $('#sympathizers').DataTable().ajax.reload();
                } else {
                    swal("Error!", results.message, "error");
                }
            }
            });
        })
    });
</script>
@endpush
@endsection
