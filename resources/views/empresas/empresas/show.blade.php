@extends('layouts.app')
@section('content')

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
                                <li class="breadcrumb-item active">EMPRESAS</li>
                            </ol>
                        </div>
                        <h4 class="page-title"></h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="javascript: history.go(-1)" style="margin: 4px" type="button" class="btn btn-sm btn-secondary waves-effect waves-light float-right"  >
                                <i class="mdi mdi-page-first"></i> Regresar
                            </a>
                            <div class="container">
                                <h4>
                                    <a href="{{route('Empresas.index')}}">LISTA DE EMPLEADOS </a>
                                </h4>
                                <hr>
                                <!--<div class="alert alert-primary" role="alert">
                                    Row data: <span id="row-data"></span>
                                </div>-->
                                <div class="table-responsive">
                                    <table id="empresas_table" class="table table-bordered mdl-data-table" style="width:100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>EMPRESA</th>
                                            <th>EMPLEADOS</th>
<<<<<<< HEAD
=======
                                            <th>DIRECCION</th>
                                            <th>DISTRITO</th>
                                            <th>SECCION</th>
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                                            <th>&nbsp;</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>
    <div class="modal fade" id="EditModalLider" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Actualizar informacion del lider</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

          </div>
        </div>
      </div>

@include('empresas.empresas.partials.create_modal')
@include('empresas.empleados.partials.edit_modal')
@include('empresas.empresas.partials.edit_modal')
@push('scripts')
<script>
    $(document).ready(function(){
         $('#empresas_table').DataTable({
             processing: true,
             serverSide: true,
             'language': {
                 "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
             },
             ajax: '{!! route('Empresas.show', $empresa_id) !!}',
<<<<<<< HEAD
=======
             lengthMenu: [
                    [ 10, 25, 50, -1 ],
                    [ '10', '25', '50', 'Todos' ]
                ],
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
             //'Empresas/{{ $empresa_id }}',
             dom: 'Bfrtip',
             buttons: [
                     {
                         'extend': 'excel',
                         'titleAttr': 'Exportar a excel',
                         'className':'btn btn-success',
                         'text':'<i class="fas fa-file-excel"></i>',
                         'title': 'LISTA DE EMPLEADOS',
                         exportOptions: {
<<<<<<< HEAD
                             columns: [0,1,2],
=======
                             columns: [0,1,2,3,4,5],
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                         }
                     },
                     {
                         'extend': 'pdf',
                         'titleAttr': 'Generar PDF',
                         'className':'btn btn-danger',
                         'text':'<i class="fas fa-file-pdf"></i>',
                         'title': 'LISTA DE EMPLEADOS',
                         exportOptions: {
<<<<<<< HEAD
                             columns: [0,1,2],
=======
                             columns: [0,1,2,3,4,5],
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                         }
                     },
                     {
                         'extend': 'print',
                         'className':'btn btn-dark',
                         'titleAttr': 'Realizar Impresion',
                         'text':'<i class="fas fa-print"></i>',
                         'title': 'LISTA DE EMPLEADOS',
                         exportOptions: {
<<<<<<< HEAD
                             columns: [0,1,2],
                         }
                     },
             ],
             'select': true,
             'columns': [
             /*0*/  {data: 'DT_RowIndex', name:'DT_RowIndex', class:'text-center', width:'5px', orderable:false, searchable:false},
             /*0*/  {data: 'empresa', name:'empresa', width:'30px', orderable:false, searchable:false},
             /*0*/  {data: 'empleado', name:'empleado', width:'30px', orderable:false, searchable:false},
                    {data: 'opciones', name:'opciones', width:'5px', orderable:false, searchable: false }

             ],
=======
                             columns: [0,1,2,3,4,5],
                         }
                     },
                     {
                        'extend': 'pageLength',
                        'className':'btn btn-blue',
                        'text': "Mostrar Registros" //Translate to whatever you need},
                     },
             ],
            'select': true,
            'columns': [
            /*0*/  {data: 'DT_RowIndex', name:'DT_RowIndex', class:'text-center', width:'5px', orderable:false, searchable:false},
            /*0*/  {data: 'empresa', name:'empresa', width:'30px', orderable:false, searchable:false},
            /*0*/  {data: 'empleado', name:'empleado', width:'30px', orderable:false, searchable:false},
                {data: 'direccion', name:' direccion', visible:false },
                {data: 'distrito', name: 'distrito', visible:false},
                {data: 'seccion', name: 'seccion', visible:false},
                {data: 'opciones', name:'opciones', width:'5px', orderable:false, searchable: false }
            ],
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
         });
     });
 </script>
  <script>

    $(document).on('click', ".getInfo", function (){
        var table = $('#empresas_table').DataTable();
        $tr = $(this).closest('tr');
           var row = table.row($tr).data();
        console.log(row);
        var path = '{!! Request::root() !!}';
        $("#getNombre").html(row.empleado);
       //$("#getImageINE").html(row.get_employee.employee_ine ?? '')
        $('#getImageINE').attr('src', path.concat('/', row.get_employee.employee_ine));

    });
</script>

@endpush
@endsection
