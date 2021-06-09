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
                        <!--<li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>-->
                        <li class="breadcrumb-item active">Inicio</li>
                    </ol>
                </div>
                <h4 class="page-title">Inicio</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="card-box">
                <i class="fa fa-info-circle text-muted float-right" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Total de Lideres Registrados"></i>
                <h4 class="mt-0 font-16">Total Lideres</h4>
                <h2 class="text-primary my-3 text-center"><!-- $--> <span data-plugin="counterup">{{$total_lideres}}</span></h2>
                <p class="text-muted mb-0">Registros diarios:  <span class="float-right"><i class="fa fa-caret-up text-success mr-1"></i>{{$lid_day}}</span></p>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card-box">
                <i class="fa fa-info-circle text-muted float-right" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Total de Movilizadores Registrados"></i>
                <h4 class="mt-0 font-16">Total Movilizadores</h4>
                <h2 class="text-primary my-3 text-center"><span data-plugin="counterup">{{$total_movilizadores}}</span></h2>
                <p class="text-muted mb-0">Registros diarios:  <span class="float-right"><i class="fa fa-caret-up text-success mr-1"></i>{{$mov_day}}</span></p>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card-box">
                <i class="fa fa-info-circle text-muted float-right" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Total de Tocados Registrados"></i>
                <h4 class="mt-0 font-16">Total Tocados</h4>
                <h2 class="text-primary my-3 text-center"><span data-plugin="counterup">{{$total_tocados}}</span> </h2>
                <p class="text-muted mb-0">Registros diarios:  <span class="float-right"><i class="fa fa-caret-up text-success mr-1"></i>{{$toc_day}}</span></p>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card-box">
                <i class="fa fa-info-circle text-muted float-right" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Simpatizantes Registrados"></i>
                <h4 class="mt-0 font-16">Total Simpatizantes</h4>
                <h2 class="text-primary my-3 text-center"><span data-plugin="counterup">{{$total_simpatizantes}}</span></h2>
                <p class="text-muted mb-0">Registros diarios: <span class="float-right"><i class="fa fa-caret-up text-success mr-1"></i>{{$sim_day}}</span></p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-widgets">
                        <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                        <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                    </div>
                    <div class="float-right d-none d-md-inline-block">
                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-xs btn-light">Semanal</button>
                        </div>
                    </div>
                    <h4 class="header-title">SIMPATIZANTES</h4>
                    <div class="row mt-4 text-center">

                    </div>
                    <div class="mt-3 chartjs-chart">
                        <canvas id="revenue-chart" data-colors="#1fa083,#f1556c" height="300"></canvas>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-widgets">
                        <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                        <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                    </div>
                    <h4 class="header-title">TOTAL DE GESTIONES</h4>

                    <div class=" mt-4 chartjs-chart">
                        <canvas id="donut-chart-example" height="350" data-colors="#6c757d,#1abc9c,#ebeff2" style="display: block; height: 350px; width: 530px;"></canvas>
                    </div>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-right">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                        </div>
                    </div>
                    <h4 class="header-title mb-3">USUARIOS</h4>

                    <div class="table-responsive">
                        <table id="tbl-buys" class="table table-striped table-sm table-nowrap table-centered mb-0">
                            <thead>
                            <tr>
                                <th>Capturistas</th>
                                <th>Lideres</th>
                                <th>Movilizadores</th>
                                <th>Tocados</th>
                                <th>Tocados S/C</th>
                                <th>Propietarios</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($usuarios as $usuario)
                                <tr>
                                    <td>
                                        <h5 class="font-15 my-1 font-weight-normal">{{$usuario->nombre}} {{$usuario->paterno}} {{$usuario->materno}}</h5>
                                        <span style="text-transform: uppercase" class="text-muted mb-1 d-block font-13 ">{{$usuario->getRoleNames()->first()}}</span>
                                    </td>
                                    <td>{{$usuario->count_liders($usuario->id)}}</td>
                                    <td>{{$usuario->count_mobilizers($usuario->id)}}</td>
                                    <td>{{$usuario->count_tocados($usuario->id)}}</td>
                                    <td>{{$usuario->count_tocados_sc($usuario->id)}}</td>
                                    <td>{{$usuario->count_propietarios($usuario->id)}}</td>
                                    <td class="table-action">
                                        <a href="{{route('usuarios.show',$usuario->id)}}" class="action-icon icon-dual-blue"> <i class="mdi mdi-eye"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div> <!-- end table-responsive-->

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
    </div>
@push('scripts')
        <script>
            function hexToRGB(a,e){
                var r=parseInt(a.slice(1,3),16),t=parseInt(a.slice(3,5),16),o=parseInt(a.slice(5,7),16);
                return e?"rgba("+r+", "+t+", "+o+", "+e+")":"rgb("+r+", "+t+", "+o+")"}!
                function(i){"use strict";
                    function a(){
                        this.$body=i("body"),
                            this.charts=[]}a.prototype.respChart=function(e,r,t,o){
                        var s=e.get(0).getContext("2d");Chart.defaults.global.defaultFontColor="#8391a2",
                            Chart.defaults.scale.gridLines.color="#8391a2";
                        var n=i(e).parent();return function(){var a;
                            switch(e.attr("width",i(n).width()),r){case"Line":a=new Chart(s,{type:"line",data:t,options:o});
                                break;case"Doughnut":a=new Chart(s,{type:"doughnut",data:t,options:o});
                                break;case"Pie":a=new Chart(s,{type:"pie",data:t,options:o});
                                break;case"Bar":a=new Chart(s,{type:"bar",data:t,options:o});
                                break;case"Radar":a=new Chart(s,{type:"radar",data:t,options:o});
                                break;case"PolarArea":a=new Chart(s,{data:t,type:"polarArea",options:o})}
                            return a}()},a.prototype.initCharts=function(){
                        var a=[],e=["#1abc9c","#f1556c","#4a81d4","#e3eaef"];
                        if(0<i("#revenue-chart").length){
                            var r={labels: <?php echo json_encode($dias);?>,
                                datasets:[{label:"Semana Actual",
                                    backgroundColor:hexToRGB((o=(t=i("#revenue-chart").data("colors"))?t.split(","):e.concat())[0],.3),
                                    borderColor:o[0],data:
                                    []
                                    },
                                    {
                                        label:"Semana Pasada",fill:!0,
                                        //backgroundColor:"transparent",
                                        backgroundColor:hexToRGB((o=(t=i("#revenue-chart").data("colors"))?t.split(","):e.concat())[1],.5),
                                        borderColor:o[1],borderDash:[5,5],
                                        data:
                                            <?php echo json_encode($cont_last);?>
                                          }
                                        ]};a.push(
                                this.respChart(i("#revenue-chart"),
                                    "Line",
                                    r,
                                    {maintainAspectRatio:!1,
                                        legend:{display:!1},
                                        tooltips:{intersect:!1},
                                        hover:{intersect:!0},
                                        plugins:
                                            {filler:{propagate:!1}},
                                        scales:{xAxes:[{
                                                reverse:!0,
                                                gridLines:{
                                                    color:"rgba(0,0,0,0.05)"}}],
                                            yAxes:[{
                                                ticks:{stepSize:20},
                                                display:!0,
                                                borderDash:[5,5],
                                                gridLines:{
                                                    color:"rgba(0,0,0,0.06)",
                                                    fontColor:"#fff"}}]}}))}
                        if(0<i("#projections-actuals-chart").length)
                        {var t,o,s={
                            labels:["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Di   c"],
                            datasets:[{label:"Sales Analytics",
                                backgroundColor:(o=(t=i("#projections-actuals-chart").data("colors"))?t.split(","):e.concat())[0],
                                borderColor:o[0],
                                hoverBackgroundColor:o[0],
                                hoverBorderColor:o[0],data:[65,59,80,81,56,89,40,32,65,59,80,81],
                                barPercentage:.7,
                                categoryPercentage:.5},
                                {label:"Dollar Rate",
                                    backgroundColor:o[1],
                                    borderColor:o[1],
                                    hoverBackgroundColor:o[1],
                                    hoverBorderColor:o[1],
                                    data:[89,40,32,65,59,80,81,56,89,40,65,59],
                                    barPercentage:.7,categoryPercentage:.5}]};
                            a.push(this.respChart(i("#projections-actuals-chart"),"Bar",s,{
                                maintainAspectRatio:!1,
                                legend:{display:!1},
                                scales:{yAxes:[{gridLines:{display:!1},stacked:!1,ticks:{stepSize:20}}],
                                    xAxes:[{stacked:!1,gridLines:{
                                            color:"rgba(0,0,0,0.01)"}}]}}))}return a},
                        a.prototype.init=function(){
                            var e=this;Chart.defaults.global.defaultFontFamily="Nunito,sans-serif",
                                e.charts=this.initCharts(),i(window).on("resize",function(a){
                                i.each(e.charts,function(a,e){try{e.destroy()}catch(a){}}),
                                    e.charts=e.initCharts()})},i.ChartJs=new a,
                        i.ChartJs.Constructor=a}
                (window.jQuery),function(){"use strict";window.jQuery.ChartJs.init()}();
        </script>
        <script>
            var ctx = document.getElementById('donut-chart-example');
            var a=[],r=["#1abc9c","#f1556c","#4a81d4","#e3eaef"];

            var myDoughnutChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    datasets: [{
                        data:<?php echo json_encode($gestiones);?>,
                        backgroundColor:["#6c757d","#1abc9c"]
                    }],
                    // These labels appear in the legend and in the tooltips when hovering different arcs
                    labels: [
                        'POR AUTORIZAR',
                        'COMPLETAS',
                    ]
                },
               // options: options
            });
</script>
@endpush
@endsection

