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
                    <h4 class="page-title">DETALLES</h4>
                </div>
            </div>
        </div>
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <a href="javascript: history.go(-1)" style="margin: 4px" type="button" class="btn btn-sm btn-outline-danger waves-effect waves-light float-right" >
                        <i class="mdi mdi-page-first"></i> Regresar
                    </a>
                    <div>
                        <h4>RESULTADOS DE ENCUESTAS SUEMY ROSAS
                            TOTAL REGISTROS: {{ $cc_s }}
                        </h4>
                        <hr>
                        <div class="col-md-12">
                            <div class="form-group mb-2">
                                <label for="example-select">ENCUESTA</label>
                                    <ul>
                                        @foreach ($re_cc_s as $i => $estatus)
                                            @foreach ($estatus as $j =>  $estado)
                                                <li>{{$j}} : {{$estado}}</li>
                                            @endforeach
                                        @endforeach
                                    </ul>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-2">
                                <label for="example-select">¿Usted recuerda la fecha en la que se llevarán a cabo las próximas elecciones en el Estado de Campeche?
                                    ¿Cuál es la fecha?</label>
                                    <ul>
                                        @foreach ($rq1_s as $i => $resultados)
                                        @foreach ($resultados as $j =>  $q1)
                                            <li>{{$j}} : {{$q1}}</li>
                                        @endforeach
                                    @endforeach
                                    </ul>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="example-select">¿Usted piensa ir a votar en las próximas elecciones?</label>
                                <ul>
                                    @foreach ($rq2_s as $i => $resultados)
                                        @foreach ($resultados as $j =>  $q2)
                                            <li>{{$j}} : {{$q2}}</li>
                                        @endforeach
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="example-select">¿Cuál es la principal razón por la que no piensa votar?</label>
                                <ul>
                                    @foreach ($rq3_s as $i => $resultados)
                                            @foreach ($resultados as $j =>  $q3)
                                                <li>{{$j}} : {{$q3}}</li>
                                            @endforeach
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="example-select">¿Usted ya ha decidido la persona o partido por el que votará en las próximas elecciones a presidente
                                    municipal en Carmen?</label>
                                    <ul>
                                        @foreach ($rq4_s as $i => $resultados)
                                        @foreach ($resultados as $j =>  $q4)
                                            <li>{{$j}} : {{$q4}}</li>
                                        @endforeach
                                    @endforeach
                                    </ul>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="example-select">¿Cuál de los candidatos considera que tiene las mejores propuestas? </label>
                                <ul>
                                    @foreach ($rq5_s as $i => $resultados)
                                        @foreach ($resultados as $j =>  $q5)
                                            <li>{{$j}} : {{$q5}}</li>
                                        @endforeach
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="example-select">¿Cuál de los candidatos considera que está más interesado en resolver los problemas del Municipio? </label>
                                <ul>
                                    @foreach ($rq6_s as $i => $resultados)
                                        @foreach ($resultados as $j =>  $q6)
                                            <li>{{$j}} : {{$q6}}</li>
                                        @endforeach
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="example-select">¿Cuál de los candidatos tiene mayor experiencia para gobernar el Municipio?</label>
                                <ul>
                                    @foreach ($rq7_s as $i => $resultados)
                                        @foreach ($resultados as $j =>  $q7)
                                            <li>{{$j}} : {{$q7}}</li>
                                        @endforeach
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="example-select">¿Cuál de los candidatos le conviene que gane en las próximas elecciones en el municipio de Carmen? </label>
                                <ul>
                                    @foreach ($rq8_s as $i => $resultados)
                                        @foreach ($resultados as $j =>  $q8)
                                            <li>{{$j}} : {{$q8}}</li>
                                        @endforeach
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="example-select">¿Cuál candidato le gustaría que ganara las próximas elecciones en el Municipio de Carmen? </label>
                                <ul>
                                    @foreach ($rq9_s as $i => $resultados)
                                        @foreach ($resultados as $j =>  $q9)
                                            <li>{{$j}} : {{$q9}}</li>
                                        @endforeach
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="example-select">Si el partido o candidato que acaba de escoger no tuviera oportunidad de ganar, ¿usted cuál candidato o
                                    partido escogería como segunda opción? </label>
                                    <ul>
                                        @foreach ($rq10_s as $i => $resultados)
                                            @foreach ($resultados as $j =>  $q10)
                                                <li>{{$j}} : {{$q10}}</li>
                                            @endforeach
                                        @endforeach
                                    </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <a href="javascript: history.go(-1)" style="margin: 4px" type="button" class="btn btn-sm btn-outline-danger waves-effect waves-light float-right" >
                        <i class="mdi mdi-page-first"></i> Regresar
                    </a>
                    <div>
                        <h4>RESULTADOS DE ENCUESTAS EDUARDO VELA
                            TOTAL REGISTROS: {{ $cc_e }}
                        </h4>
                        <hr>
                        <div class="col-md-12">
                            <div class="form-group mb-2">
                                <label for="example-select">ENCUESTA</label>
                                    <ul>
                                        @foreach ($re_cc_e as $i => $estatus)
                                            @foreach ($estatus as $j =>  $estado)
                                                <li>{{$j}} : {{$estado}}</li>
                                            @endforeach
                                        @endforeach
                                    </ul>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-2">
                                <label for="example-select">¿Usted recuerda la fecha en la que se llevarán a cabo las próximas elecciones en el Estado de Campeche?
                                    ¿Cuál es la fecha?</label>
                                    <ul>
                                        @foreach ($rq1_e as $i => $resultados)
                                        @foreach ($resultados as $j =>  $q1)
                                            <li>{{$j}} : {{$q1}}</li>
                                        @endforeach
                                    @endforeach
                                    </ul>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="example-select">¿Usted piensa ir a votar en las próximas elecciones?</label>
                                <ul>
                                    @foreach ($rq2_e as $i => $resultados)
                                        @foreach ($resultados as $j =>  $q2)
                                            <li>{{$j}} : {{$q2}}</li>
                                        @endforeach
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="example-select">¿Cuál es la principal razón por la que no piensa votar?</label>
                                <ul>
                                    @foreach ($rq3_e as $i => $resultados)
                                            @foreach ($resultados as $j =>  $q3)
                                                <li>{{$j}} : {{$q3}}</li>
                                            @endforeach
                                    @endforeach
                                </ul>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="example-select">¿Usted ya ha decidido la persona o partido por el que votará en las próximas elecciones a presidente
                                    municipal en Carmen?</label>
                                    <ul>
                                        @foreach ($rq4_e as $i => $resultados)
                                        @foreach ($resultados as $j =>  $q4)
                                            <li>{{$j}} : {{$q4}}</li>
                                        @endforeach
                                    @endforeach
                                    </ul>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="example-select">¿Cuál de los candidatos considera que tiene las mejores propuestas? </label>
                                <ul>
                                    @foreach ($rq5_e as $i => $resultados)
                                        @foreach ($resultados as $j =>  $q5)
                                            <li>{{$j}} : {{$q5}}</li>
                                        @endforeach
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="example-select">¿Cuál de los candidatos considera que está más interesado en resolver los problemas del Municipio? </label>
                                <ul>
                                    @foreach ($rq6_e as $i => $resultados)
                                        @foreach ($resultados as $j =>  $q6)
                                            <li>{{$j}} : {{$q6}}</li>
                                        @endforeach
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="example-select">¿Cuál de los candidatos tiene mayor experiencia para gobernar el Municipio?</label>
                                <ul>
                                    @foreach ($rq7_e as $i => $resultados)
                                        @foreach ($resultados as $j =>  $q7)
                                            <li>{{$j}} : {{$q7}}</li>
                                        @endforeach
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="example-select">¿Cuál de los candidatos le conviene que gane en las próximas elecciones en el municipio de Carmen? </label>
                                <ul>
                                    @foreach ($rq8_e as $i => $resultados)
                                        @foreach ($resultados as $j =>  $q8)
                                            <li>{{$j}} : {{$q8}}</li>
                                        @endforeach
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="example-select">¿Cuál candidato le gustaría que ganara las próximas elecciones en el Municipio de Carmen? </label>
                                <ul>
                                    @foreach ($rq9_e as $i => $resultados)
                                        @foreach ($resultados as $j =>  $q9)
                                            <li>{{$j}} : {{$q9}}</li>
                                        @endforeach
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="example-select">Si el partido o candidato que acaba de escoger no tuviera oportunidad de ganar, ¿usted cuál candidato o
                                    partido escogería como segunda opción? </label>
                                    <ul>
                                        @foreach ($rq10_e as $i => $resultados)
                                            @foreach ($resultados as $j =>  $q10)
                                                <li>{{$j}} : {{$q10}}</li>
                                            @endforeach
                                        @endforeach
                                    </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <a href="javascript: history.go(-1)" style="margin: 4px" type="button" class="btn btn-sm btn-outline-danger waves-effect waves-light float-right" >
                        <i class="mdi mdi-page-first"></i> Regresar
                    </a>
                    <div>
                        <h4>RESULTADOS DE ENCUESTAS DESPENSAS
                            TOTAL REGISTROS: {{ $cc_d }}
                        </h4>
                        <hr>
                        <div class="col-md-12">
                            <div class="form-group mb-2">
                                <label for="example-select">ENCUESTA</label>
                                    <ul>
                                        @foreach ($re_cc_d as $i => $estatus)
                                            @foreach ($estatus as $j =>  $estado)
                                                <li>{{$j}} : {{$estado}}</li>
                                            @endforeach
                                        @endforeach
                                    </ul>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-2">
                                <label for="example-select">¿Usted recuerda la fecha en la que se llevarán a cabo las próximas elecciones en el Estado de Campeche?
                                    ¿Cuál es la fecha?</label>
                                    <ul>
                                        @foreach ($rq1_d as $i => $resultados)
                                        @foreach ($resultados as $j =>  $q1)
                                            <li>{{$j}} : {{$q1}}</li>
                                        @endforeach
                                    @endforeach
                                    </ul>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="example-select">¿Usted piensa ir a votar en las próximas elecciones?</label>
                                <ul>
                                    @foreach ($rq2_d as $i => $resultados)
                                        @foreach ($resultados as $j =>  $q2)
                                            <li>{{$j}} : {{$q2}}</li>
                                        @endforeach
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="example-select">¿Cuál es la principal razón por la que no piensa votar?</label>
                                <ul>
                                    @foreach ($rq3_d as $i => $resultados)
                                            @foreach ($resultados as $j =>  $q3)
                                                <li>{{$j}} : {{$q3}}</li>
                                            @endforeach
                                    @endforeach
                                </ul>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="example-select">¿Usted ya ha decidido la persona o partido por el que votará en las próximas elecciones a presidente
                                    municipal en Carmen?</label>
                                    <ul>
                                        @foreach ($rq4_d as $i => $resultados)
                                        @foreach ($resultados as $j =>  $q4)
                                            <li>{{$j}} : {{$q4}}</li>
                                        @endforeach
                                    @endforeach
                                    </ul>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="example-select">¿Cuál de los candidatos considera que tiene las mejores propuestas? </label>
                                <ul>
                                    @foreach ($rq5_d as $i => $resultados)
                                        @foreach ($resultados as $j =>  $q5)
                                            <li>{{$j}} : {{$q5}}</li>
                                        @endforeach
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="example-select">¿Cuál de los candidatos considera que está más interesado en resolver los problemas del Municipio? </label>
                                <ul>
                                    @foreach ($rq6_d as $i => $resultados)
                                        @foreach ($resultados as $j =>  $q6)
                                            <li>{{$j}} : {{$q6}}</li>
                                        @endforeach
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="example-select">¿Cuál de los candidatos tiene mayor experiencia para gobernar el Municipio?</label>
                                <ul>
                                    @foreach ($rq7_d as $i => $resultados)
                                        @foreach ($resultados as $j =>  $q7)
                                            <li>{{$j}} : {{$q7}}</li>
                                        @endforeach
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="example-select">¿Cuál de los candidatos le conviene que gane en las próximas elecciones en el municipio de Carmen? </label>
                                <ul>
                                    @foreach ($rq8_d as $i => $resultados)
                                        @foreach ($resultados as $j =>  $q8)
                                            <li>{{$j}} : {{$q8}}</li>
                                        @endforeach
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="example-select">¿Cuál candidato le gustaría que ganara las próximas elecciones en el Municipio de Carmen? </label>
                                <ul>
                                    @foreach ($rq9_d as $i => $resultados)
                                        @foreach ($resultados as $j =>  $q9)
                                            <li>{{$j}} : {{$q9}}</li>
                                        @endforeach
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="example-select">Si el partido o candidato que acaba de escoger no tuviera oportunidad de ganar, ¿usted cuál candidato o
                                    partido escogería como segunda opción? </label>
                                    <ul>
                                        @foreach ($rq10_d as $i => $resultados)
                                            @foreach ($resultados as $j =>  $q10)
                                                <li>{{$j}} : {{$q10}}</li>
                                            @endforeach
                                        @endforeach
                                    </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
@endsection
