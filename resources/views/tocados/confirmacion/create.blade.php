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
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">CONFIRMACION DE RESULTADOS</li>
                </ol>
            </div>
            <h4 class="page-title">NUEVA CONFIRMACION DE RESULTADOS</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-8">
                        <div class="text-sm-right">
                      <!--      <button type="button" class="btn btn-success mb-2 mr-1"><i class="mdi mdi-cog"></i></button>
                            <button type="button" class="btn btn-light mb-2 mr-1">Import</button>
                            <button type="button" class="btn btn-light mb-2">Export</button>  -->
                            <a href="javascript: history.go(-1)" style="margin: 4px" type="button" class="btn btn-sm btn-outline-danger waves-effect waves-light float-right" >
                                <i class="mdi mdi-page-first"></i> Regresar
                            </a>
                        </div>
                    </div><!-- end col-->
                </div>
                <div class="row">
                    <select id="lider" class="form-control">
                        <option selected disabled value="">SELECCIONA UN LIDER</option>
                        @foreach ($lideres as $lider)
                            <option value="{{ $lider->leader_id }}">{{ $lider->getInfo->nombre }} {{ $lider->getInfo->paterno }} {{ $lider->getInfo->materno }}</option>
                        @endforeach
                    </select>
                </div>
                <hr>
                <div  class="table-responsive">
                    <table id="confirmation_table" class="table table-centered table-nowrap table-striped" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>MOVILIZADOR</th>
                                <th>TOCADOS</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->

    <div class="col-lg-6">
        <div class="card-box">
            <div id="prueba">
                <form id="form" method="POST" action="{{ route('Confirmacion.store') }}">
                    @csrf
                        <table id="tocados_table"class="table table-sm table-bordered mdl-data-table" style="width:100%" cellspacing="0" >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>TOCADOS</th>
                                    <th>ENCUESTA</th>
                                </tr>
                            </thead>
                        </table>
                    <button type="submit" class="btn btn-primary">REGISTRAR</button>
                </form>
            </div>
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
@include('alerts.alerts')
@push('scripts')
<script>

    $(document).ready( function (){
        fill_datatable();
        function fill_datatable(lider = '') {
        var tables =  $('#confirmation_table').DataTable({
                        retrieve: true,
                        paginate: true,
                        processing: true,
                        serverSide: true,
                        responsive: true,
                        searchDelay: 700,
                        language: {
                            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                        },
                        ajax: {
                            url:  '{!! route('Confirmacion.create') !!}',
                            data: { lider: lider}
                        },
                        columns: [
                            {data:'DT_RowIndex', name:'DT_RowIndex', className: "text-center", orderable: false, searchable: false},
                            {data:'nombre', name:'nombre'},
                            {data:'tocados', name:'tocados', className: "text-center"}

                    ]
            })
        }

        $('#lider').click(function() {
            var lider = $('#lider').val();
           // var lider = $('#lider').select2('val');
           alert(lider);
            if (lider != '' ) {
                $('#confirmation_table').DataTable().destroy();
                fill_datatable(lider);
            }else{
                alert('SELECCIONA UN LIDER');
            }
        });

        $('#reset').click(function() {
            //$('#lider').select2('val');
            var lider = $('#lider').val();
            alert(lider);
            $('#confirmation_table').DataTable().destroy();
            fill_datatable();
        });
    })
</script>
<script>
    $(document).on('click', ".getInfo", function (){
        var table = $('#confirmation_table').DataTable();
        $tr = $(this).closest('tr');
        var row = table.row($tr).data();
        console.log(row);
        $.ajax({
                url:"{!! route('Confirmacion.getTocados') !!}",
                data: {
                    'mobilizer_id': row.mobilizer_id,
                    '_token': "{{ csrf_token() }}"
                },
                type: "POST",
                success: function (response){
                    $("#prueba").html(response.data.mobilizador);
                    $("#id").val(response.data.mobilizer_id);
                var datos = response.data;
                $('#tocados_table').DataTable({
                    language: {
                        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                    },
                    pageLength : 100,
                    lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
                    searching:false,
                    info:false,
                    destroy: true,
                    data : response.data,
                    columns: [
                        {data: "DT_RowIndex", name: "DT_RowIndex", className: "text-center",width:'10px'},
                        {data: "tocados", name: "tocados", width:'100px'},
                        {data: "encuesta", name: "encuesta", className: "text-center"},
                    ]
                });
                }
            });
    });
</script>
<script>
    $(document).ready(function() {
        $('#lider').select2();
    });
</script>
@endpush
@endsection
