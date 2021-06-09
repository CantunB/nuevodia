@extends('layouts.app')
@section('content')
<style>
    .call_success{
        display: none;
    }
    .question3{
        display: none;
    }
</style>
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
<<<<<<< HEAD
=======
                        <a href="{{route('CallCenter.confirmados')}}" target="__blank" style="margin: 4px" type="button" class="btn btn-sm btn-success waves-effect waves-light float-right" >
                            <i class="mdi mdi-file-excel"></i> Confirmados
                        </a>
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                        @can('read_encuestas')
                            <a href="{{route('Encuestas.results')}}" style="margin: 4px" type="button" class="btn btn-sm btn-blue waves-effect waves-light float-right" >
                                <i class="mdi mdi-chart-bar"></i> Resultados
                            </a>
                        @endcan
<<<<<<< HEAD
=======
                        @can('read_encuestas')
                        <a href="{{route('Encuestas.details')}}" style="margin: 4px" type="button" class="btn btn-sm btn-info waves-effect waves-light float-right" >
                            <i class="mdi mdi-chart-bar"></i> Detallados
                        </a>
                        @endcan
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                        <a href="javascript: history.go(-1)" style="margin: 4px" type="button" class="btn btn-sm btn-outline-danger waves-effect waves-light float-right" >
                            <i class="mdi mdi-page-first"></i> Regresar
                        </a>
                        <div class="table-responsive">
                            <table id="table" class="table dt-responsive table-bordered  nowrap w-100">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>CELULAR</th>
                                    <th></th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-widgets">
                                    <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                    <a data-toggle="collapse" href="#cardCollpase18" role="button" aria-expanded="false" aria-controls="cardCollpase18"><i class="mdi mdi-minus"></i></a>
                                    <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                                </div>
                                <h4 class="header-title mb-0">CONTADOR DE LLAMADAS</h4>

                                <div id="cardCollpase18" class="collapse pt-3 show" dir="ltr">
                                    <div id="apex-pie-1" class="apex-charts" data-colors="#6658dd,#4fc6e1,#4a81d4,#00b19d,#f1556c"></div>
                                </div> <!-- collapsed end -->
                            </div> <!-- end card-body -->
                        </div> <!-- end card-->
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>

<<<<<<< HEAD
        
          
=======


>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
    </div> <!-- container -->

@include('alerts.alerts')
@include('callcenter.encuestas.partials.encuesta_modal')
@push('scripts')
<script>
            $(document).ready(function() {
                $('#table').DataTable({
                    language: {
                        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                    },
                    searching:false,
                    paging: false,
                    info:false,
                    ajax: '{!! route('Encuestas.index') !!}',
                    dom: 'Bfrtip',
                    buttons: [
                    ],
                    columns: [
                     /*0*/ {data: 'DT_RowIndex', name:'DT_RowIndex', class:'text-center', width:'5px', orderable:false, searchable:false},
                     /*0*/ {data: 'celular', name:'celular', width:'5px', orderable:false, searchable:false},
                     /*0*/ {data: 'opciones', name:'opciones', width:'5px', orderable:false, searchable:false},
                     ],

            });
            } );
</script>
<script>
    $(document).ready(function(){
        $(document).on('click', ".encuesta", function (){
            $('#EncuestaModal').modal('show')
            var table = $('#table').DataTable();
            $tr = $(this).closest('tr');
            var row = table.row($tr).data();
            console.log(row);
            $("#getCelular").val(row.celular);
            $("#getClave").val(row.clave_elector);

        });
    });
</script>
<script>
   $('input:radio[name="status_number"]').change(
    function(){
    let call_success = document.getElementById('call_success');
        if ($(this).is(':checked') && $(this).val() == '1') {
            call_success.style.display = 'block';
        }else{
            call_success.style.display = 'none';
        }
    });
</script>
<script>
    $('input:radio[name="q2"]').change(
     function(){
        let question3 = document.getElementById('question3');
        let question4 = document.getElementById('question4');
         if ($(this).is(':checked') && $(this).val() == 'opcion1') {
            question3.style.display = 'none';
         }else{
            question3.style.display = 'block';
            question4.style.display = 'block';
         }
     });
 </script>
 <script>
    $('input:radio[name="q3"]').change(
     function(){
        let question4 = document.getElementById('question4');
         if ($(this).is(':checked')) {
            question4.style.display = 'none';
         }
     });
 </script>
 <script>
(Apex.grid = { padding: { right: 0, left: 0 } }), (Apex.dataLabels = { enabled: !1 });
colors = ["#6658dd", "#4fc6e1", "#4a81d4", "#00b19d", "#f1556c"];
(dataColors = $("#apex-pie-1").data("colors")) && (colors = dataColors.split(","));
options = {
<<<<<<< HEAD
    chart: { height: 200, type: "pie" },
    series: @json($con_ind),
    labels: @json($encuestadores),
    colors: colors,
    legend: { show: !0, position: "bottom", horizontalAlign: "center", verticalAlign: "middle", floating: !1, fontSize: "14px", offsetX: 0, offsetY: 7 },
=======
    chart: { height: 250, type: "pie" },
    series: @json($con_ind),
    labels: @json($encuestadores),
    colors: colors,
    //legend: { show: !0, position: "bottom", horizontalAlign: "center", verticalAlign: "middle", floating: !1, fontSize: "14px", offsetX: 0, offsetY: 7 },
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
    responsive: [{ breakpoint: 600, options: { chart: { height: 240 }, legend: { show: !1 } } }],
};
(chart = new ApexCharts(document.querySelector("#apex-pie-1"), options)).render();
</script>

@endpush
@endsection
