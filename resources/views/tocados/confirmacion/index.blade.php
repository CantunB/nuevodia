@extends('layouts.app')
@section('content')
     <!-- start page title -->
     <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">CONFIRMACION DE RESULTADOS</li>
                    </ol>
                </div>
                <h4 class="page-title">SIMPATIZANTES</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <a href="{{ route('Confirmacion.create') }}"
                                    class="btn btn-sm btn-blue waves-effect waves-light">
                                <i class="mdi mdi-plus-circle mr-1"></i>Confirmacion</a>
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
                    <div  class="table-responsive">
                        <table id="movilizadores" class="table table-centered table-nowrap table-striped" >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>MOVILIZADOR</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->

        <div class="col-lg-6">
            <div class="card-box">
                <h3 >RESULTADOS:  <strong style="color: #00acc1">SI/NO/SIN CONFIRMAR</strong></h3>
                <div class="row">
                    <div class="col-md-6">
                            <div class="form-group mb-3">
                                <div id="chart-bar" dir="ltr"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div id="chart-pie"  dir="ltr"></div>
                        </div>
                    </div>


            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row -->
@include('alerts.alerts')
@push('scripts')
<script>
    $(document).ready( function (){
        $('#movilizadores').DataTable({
            retrieve: true,
            paginate: true,
            processing: true,
            serverSide: true,
            responsive: true,
            searchDelay: 700,
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            },
            ajax: '{!! route('Confirmacion.index') !!}',
            columns: [
                {data:'DT_RowIndex', name:'DT_RowIndex', className: "text-center"},
                {data:'movilizador', name:'movilizador' },
                {data:'buttons', name:'buttons'}
            ]
        })
    })
</script>
<script>
    $(document).on('click', ".grafica", function (){
        var table = $('#movilizadores').DataTable();
        $tr = $(this).closest('tr');
        var row = table.row($tr).data();
        //console.log(row);
        var id = row.mobilizer_id;
            $.ajax({
                url:"{!! route('Confirmacion.getConfirmacion') !!}",
                data: {
                    'id': id,
                    '_token': "{{ csrf_token() }}"
                },
                type: "POST",
                success: function (response){
                    var t=["#00BFFF	","#DC143C","#D3D3D3"];
                    var l=["#00BFFF	","#DC143C","#D3D3D3"];
                    var chart = c3.generate({bindto:"#chart-bar",

                    size: {
                        height: 200,
                        width: 240
                    },
                    bar: {
                        width: {
                       //    ratio: 0.2
                        }
                    },
                        data: {
                            // iris data from R
                            columns: [
                                ["SI",response.si],
                                ["NO", response.no],
                                ["SIN CONFIRMAR", response.no_s]
                            ],
                            type : 'bar',
                            labels: false,
                            onclick: function (d, i) { console.log("onclick", d, i); },
                            onmouseover: function (d, i) { console.log("onmouseover", d, i); },
                            onmouseout: function (d, i) { console.log("onmouseout", d, i); }
                        },
                        color:{
                            pattern:l
                        },
                    });
                    var chart = c3.generate({bindto:"#chart-pie",
                    size: {
                        height: 200,
                        width: 240
                    },
                        data: {
                            // iris data from R
                            columns: [
                                ["SI",response.si],
                                ["NO", response.no],
                                ["SIN CONFIRMAR", response.no_s]
                            ],
                            type : 'pie',
                            onclick: function (d, i) { console.log("onclick", d, i); },
                            onmouseover: function (d, i) { console.log("onmouseover", d, i); },
                            onmouseout: function (d, i) { console.log("onmouseout", d, i); }
                        },
                        color:{
                            pattern:l
                        },
                    });

                }
        });
    });
</script>
<script>

</script>

@endpush
@endsection
