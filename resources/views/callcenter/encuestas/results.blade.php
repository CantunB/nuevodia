@extends('layouts.app')
@section('content')
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
        <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href="javascript: history.go(-1)" style="margin: 4px" type="button" class="btn btn-sm btn-outline-danger waves-effect waves-light float-right" >
                            <i class="mdi mdi-page-first"></i> Regresar
                        </a>
                        <div>
<<<<<<< HEAD
                            <h4>Resultados llamadas</h4>
                            <ul>
                            @foreach ($resultados_estatus as $i => $estatus)
                                @foreach ($estatus as $j =>  $estado)
                                    <li>{{$j}} : {{$estado}}</li>     
                                @endforeach
                            @endforeach
                            </ul>
                                <div style="float: right;width:80%; background: #f0e68c; top: -140px; padding: 80px;" id="bar_status_call"></div>

=======
                            <h4>Resultados llamadas {{$contador->count()}}</h4>
                            <ul>
                            @foreach ($resultados_estatus as $i => $estatus)
                                @foreach ($estatus as $j =>  $estado)
                                    <li>{{$j}} : {{$estado}}</li>
                                @endforeach
                            @endforeach
                            </ul>
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                        </div>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>

    <div class="row">
        <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <h4>¿Usted recuerda la fecha en la que se llevarán a cabo las próximas elecciones en el Estado de Campeche?
                                ¿Cuál es la fecha?</h4>
                                <ul>
                                    @foreach ($resultados_q1 as $i => $resultados)
                                        @foreach ($resultados as $j =>  $q1)
<<<<<<< HEAD
                                            <li>{{$j}} : {{$q1}}</li>     
=======
                                            <li>{{$j}} : {{$q1}}</li>
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                                        @endforeach
                                    @endforeach
                                </ul>
                        </div>
<<<<<<< HEAD
                   
=======

>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                    </div> <!-- end card body-->
                </div> <!-- end card -->
        </div><!-- end col-->
    </div>

    <div class="row">
        <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <h4>¿Usted piensa ir a votar en las próximas elecciones?</h4>
                             <ul>
                                @foreach ($resultados_q2 as $i => $resultados)
                                    @foreach ($resultados as $j =>  $q2)
<<<<<<< HEAD
                                        <li>{{$j}} : {{$q2}}</li>     
=======
                                        <li>{{$j}} : {{$q2}}</li>
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                                    @endforeach
                                @endforeach
                            </ul>
                        </div>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
        </div><!-- end col-->
    </div>
<<<<<<< HEAD
   
=======

>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
    <div class="row">
        <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <h4>¿Cuál es la principal razón por la que no piensa votar?</h4>
                                @foreach ($resultados_q3 as $i => $resultados)
                                    @foreach ($resultados as $j =>  $q3)
<<<<<<< HEAD
                                        <li>{{$j}} : {{$q3}}</li>     
                                    @endforeach
                                @endforeach
                        </div>
                   
=======
                                        <li>{{$j}} : {{$q3}}</li>
                                    @endforeach
                                @endforeach
                        </div>

>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                    </div> <!-- end card body-->
                </div> <!-- end card -->
        </div><!-- end col-->
    </div>
<<<<<<< HEAD
   
=======

>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
    <div class="row">
        <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <h4>¿Usted ya ha decidido la persona o partido por el que votará en las próximas elecciones a presidente
                    municipal en Carmen?</h4>
                                @foreach ($resultados_q4 as $i => $resultados)
                                    @foreach ($resultados as $j =>  $q4)
<<<<<<< HEAD
                                        <li>{{$j}} : {{$q4}}</li>     
                                    @endforeach
                                @endforeach
                        </div>
                   
=======
                                        <li>{{$j}} : {{$q4}}</li>
                                    @endforeach
                                @endforeach
                        </div>

>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                    </div> <!-- end card body-->
                </div> <!-- end card -->
        </div><!-- end col-->
    </div>
<<<<<<< HEAD
    
=======

>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
    <div class="row">
        <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <h4>¿Usted ya ha decidido la persona o partido por el que votará en las próximas elecciones a presidente
                    municipal en Carmen?</h4>
                        @foreach ($resultados_q5 as $i => $resultados)
                                @foreach ($resultados as $j =>  $q5)
<<<<<<< HEAD
                                    <li>{{$j}} : {{$q5}}</li>     
                                @endforeach
                        @endforeach
                        </div>
                   
=======
                                    <li>{{$j}} : {{$q5}}</li>
                                @endforeach
                        @endforeach
                        </div>

>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                    </div> <!-- end card body-->
                </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <div class="row">
        <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <h4>¿Cuál de los candidatos considera que tiene las mejores propuestas? </h4>
                                @foreach ($resultados_q6 as $i => $resultados)
                                    @foreach ($resultados as $j =>  $q6)
<<<<<<< HEAD
                                        <li>{{$j}} : {{$q6}}</li>     
                                    @endforeach
                                @endforeach
                        </div>
                   
=======
                                        <li>{{$j}} : {{$q6}}</li>
                                    @endforeach
                                @endforeach
                        </div>

>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                    </div> <!-- end card body-->
                </div> <!-- end card -->
        </div><!-- end col-->
    </div>

     <div class="row">
        <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <h4>¿Cuál de los candidatos considera que está más interesado en resolver los problemas del Municipio? </h4>
                                @foreach ($resultados_q7 as $i => $resultados)
                                    @foreach ($resultados as $j =>  $q7)
<<<<<<< HEAD
                                        <li>{{$j}} : {{$q7}}</li>     
                                    @endforeach
                                @endforeach
                        </div>
                   
=======
                                        <li>{{$j}} : {{$q7}}</li>
                                    @endforeach
                                @endforeach
                        </div>

>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                    </div> <!-- end card body-->
                </div> <!-- end card -->
        </div><!-- end col-->
    </div>

     <div class="row">
        <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <h4>¿Cuál de los candidatos tiene mayor experiencia para gobernar el Municipio?</h4>
                                @foreach ($resultados_q8 as $i => $resultados)
                                    @foreach ($resultados as $j =>  $q8)
<<<<<<< HEAD
                                        <li>{{$j}} : {{$q8}}</li>     
                                    @endforeach
                                @endforeach
                        </div>
                   
=======
                                        <li>{{$j}} : {{$q8}}</li>
                                    @endforeach
                                @endforeach
                        </div>

>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                    </div> <!-- end card body-->
                </div> <!-- end card -->
        </div><!-- end col-->
    </div>

    <div class="row">
        <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <h4>¿Cuál de los candidatos le conviene que gane en las próximas elecciones en el municipio de Carmen? </h4>
                                @foreach ($resultados_q8 as $i => $resultados)
                                    @foreach ($resultados as $j =>  $q8)
<<<<<<< HEAD
                                        <li>{{$j}} : {{$q8}}</li>     
                                    @endforeach
                                @endforeach
                        </div>
                   
=======
                                        <li>{{$j}} : {{$q8}}</li>
                                    @endforeach
                                @endforeach
                        </div>

>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                    </div> <!-- end card body-->
                </div> <!-- end card -->
        </div><!-- end col-->
    </div>

    <div class="row">
        <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <h4>¿Cuál candidato le gustaría que ganara las próximas elecciones en el Municipio de Carmen?</h4>
                                @foreach ($resultados_q9 as $i => $resultados)
                                    @foreach ($resultados as $j =>  $q9)
<<<<<<< HEAD
                                        <li>{{$j}} : {{$q9}}</li>     
                                    @endforeach
                                @endforeach
                        </div>
                   
=======
                                        <li>{{$j}} : {{$q9}}</li>
                                    @endforeach
                                @endforeach
                        </div>

>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                    </div> <!-- end card body-->
                </div> <!-- end card -->
        </div><!-- end col-->
    </div>

    <div class="row">
        <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <h4>Si el partido o candidato que acaba de escoger no tuviera oportunidad de ganar, ¿usted cuál candidato o
                                partido escogería como segunda opción? </h4>
                                 @foreach ($resultados_q10 as $i => $resultados)
                                    @foreach ($resultados as $j =>  $q10)
<<<<<<< HEAD
                                        <li>{{$j}} : {{$q10}}</li>     
                                    @endforeach
                                @endforeach
                        </div>
                   
=======
                                        <li>{{$j}} : {{$q10}}</li>
                                    @endforeach
                                @endforeach
                        </div>

>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                    </div> <!-- end card body-->
                </div> <!-- end card -->
        </div><!-- end col-->
    </div>


</div>
@push('scripts')
<script>
    new Morris.Bar({
        barGap:4,
    // ID of the element in which to draw the chart.
    element: 'bar_status_call',
    // Chart data records -- each entry in this array corresponds to a point on
    // the chart.
    data: [
        { questions: 'Encuestas', contesto: 10, no_contesto: 11, ocupado: 3 },
        //{ questions: 'Fechas', value: 10, algo: 11, aalgo: 312 },
        //{ questions: '2010', value: 5, algo: 30, aalgo: 142},
        //{ questions: '2011', value: 5, algo: 303, aalgo: 162 },
        //{ questions: '2012', value: 20, algo: 123, aalgo: 122 }
    ],
    // The name of the data record attribute that contains x-values.
    xkey: 'questions',
    // A list of names of data record attributes that contain y-values.
    ykeys: ['contesto','no_contesto','ocupado'],
    // Labels for the ykeys -- will be displayed when you hover over the
    // chart.
    labels: ['Contesto','No contesto','ocupado'],
    });
</script>
@endpush
<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
