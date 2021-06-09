<!-- Modal -->
<div class="modal fade" id="EncuestaModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">ENCUESTA</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="form" method="POST" action="{{ route('Encuestas.store') }}">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id  }}" />
                <div class="row">
                <h5>BUENOS DIAS HABLAMOS DE LA EMPRESA MARKETING GROUP PARA REALIZAR UNA ENCUESTA SOCIAL REFERENTE A SU MUNICIPIO</h5>
                <input type="hidden" class="form-control" name="celular" id="getCelular">
                <input type="hidden"  class="form-control" name="clave_elector" id="getClave">

                </div>
            <div class="encuesta">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-check">
                            <input class="form-check-input success" type="radio" name="status_number" id="status_opcion1" value="1">
                            <label class="form-check-label" for="status_number">
                              CONTESTO
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status_number" id="status_opcion2" value="2">
                            <label class="form-check-label" for="status_number">
                              LLAME MAS TARDE
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status_number" id="status_opcion3" value="3">
                            <label class="form-check-label" for="status_number">
                              NO CONTESTO
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status_number" id="status_opcion13" value="4">
                            <label class="form-check-label" for="status_number">
                              OCUPADO
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status_number" id="status_opcion5" value="5">
                            <label class="form-check-label" for="status_number">
                              COLGARON
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status_number" id="status_opcion6" value="6">
                            <label class="form-check-label" for="status_number">
                              NO EXISTE EL NUMERO
                            </label>
                        </div>
                    </div>
                </div>
            <div class="call_success" id="call_success">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="example-select">1.- ¿Usted recuerda la fecha en la que se llevarán a cabo las próximas elecciones en el Estado de Campeche? ¿Cual es la fecha?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q1" id="q1_opt1" value="opcion1">
                                <label class="form-check-label" for="q1_opt1">
                                  Recuerda la fecha exacta (6 de Junio)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q1" id="q1_opt2" value="opcion2">
                                <label class="form-check-label" for="q1_opt2">
                                  Sabe que son en Junio
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q1" id="q1_opt3" value="opcion3">
                                <label class="form-check-label" for="q1_opt3">
                                  No piensa votar
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q1" id="q1_opt4" value="opcion4">
                                <label class="form-check-label" for="q1_opt4">
                                  No contesto
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="example-select">2.- ¿Usted piensa ir a votar en las próximas elecciones?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q2" id="q2_opt1" value="opcion1">
                                <label class="form-check-label" for="q2_opt1">
                                    Si piensa ir a votar
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q2" id="q2_opt2" value="opcion2">
                                <label class="form-check-label" for="q2_opt2">
                                    Aun no es seguro
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q2" id="q2_opt3" value="opcion3">
                                <label class="form-check-label" for="q2_opt3">
                                    No piensa votar
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q2" id="q2_opt4" value="opcion4">
                                <label class="form-check-label" for="q2_opt4">
                                    No contesto
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="question3">
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="example-select">3.- ¿Cuál es la principal razón por la que no piensa votar?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q3" id="q3_opt1" value="opcion1">
                                <label class="form-check-label" for="q3_opt1">
                                    No le convence ningún candidato/partido
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q3" id="q3_opt2" value="opcion2">
                                <label class="form-check-label" for="q3_opt2">
                                    No cree que las elecciones sean limpias y sin trampas
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q3" id="q3_opt3" value="opcion3">
                                <label class="form-check-label" for="q3_opt3">
                                    No estara en la ciudad o trabajará
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q3" id="q3_opt4" value="opcion4">
                                <label class="form-check-label" for="q3_opt4">
                                    No contesto
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="question4">
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="example-select">4.- ¿Usted ya ha decidido la persona o partido por el que votará en las próximas elecciones a presidente municipal en Carmen?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q4" id="q4_opt1" value="opcion1">
                                <label class="form-check-label" for="q4_opt1">
                                    Sí lo ha decidido
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q4" id="q4_opt2" value="opcion2">
                                <label class="form-check-label" for="q4_opt2">
                                    Aún no lo ha decidido
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q4" id="q4_opt3" value="opcion3">
                                <label class="form-check-label" for="q4_opt3">
                                    No contesto
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" id="question5">
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="example-select">5.- ¿Cuál de los candidatos considera que tiene las mejores propuestas?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q5" id="q5_opt1" value="opcion1">
                                <label class="form-check-label" for="q5_opt1">
                                    Óscar Rosa Gonzales (PRI, PAN, PRD)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q5" id="q5_opt2" value="opcion2">
                                <label class="form-check-label" for="q5_opt2">
                                    Pablo Gutierrez Lazarus (MORENA)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q5" id="q5_opt3" value="opcion3">
                                <label class="form-check-label" for="q5_opt3">
                                    Alejandro Coba (MOVIMIENTO CIUDADANO)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q5" id="q5_opt4" value="opcion4">
                                <label class="form-check-label" for="q5_opt4">
                                    Arturo Laureano (FUERZA POR MEXICO)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q5" id="q5_opt5" value="opcion5">
                                <label class="form-check-label" for="q5_opt6">
                                    Isabel Espinoza (Partido Verde Ecologista de México)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q5" id="q5_opt6" value="opcion6">
                                <label class="form-check-label" for="q5_opt6">
                                    Miguel Gutiérrez (PT)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q5" id="q5_opt7" value="opcion7">
                                <label class="form-check-label" for="q5_opt7">
                                    Ninguno
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q5" id="q5_opt8" value="opcion8">
                                <label class="form-check-label" for="q5_opt8">
                                    Es secreto
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="example-select">6.- ¿Cuál de los candidatos considera que está más interesado en resolver los problemas del Municipio?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q6" id="q6_opt1" value="opcion1">
                                <label class="form-check-label" for="q6_opt1">
                                    Óscar Rosa Gonzales (PRI, PAN, PRD)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q6" id="q6_opt2" value="opcion2">
                                <label class="form-check-label" for="q6_opt2">
                                    Pablo Gutierrez Lazarus (MORENA)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q6" id="q6_opt3" value="opcion3">
                                <label class="form-check-label" for="q6_opt3">
                                    Alejandro Coba (MOVIMIENTO CIUDADANO)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q6" id="q6_opt4" value="opcion4">
                                <label class="form-check-label" for="q6_opt4">
                                    Arturo Laureano (FUERZA POR MEXICO)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q6" id="q6_opt5" value="opcion5">
                                <label class="form-check-label" for="q6_opt5">
                                    Isabel Espinoza (Partido Verde Ecologista de México)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q6" id="q6_opt6" value="opcion6">
                                <label class="form-check-label" for="q6_opt6">
                                    Miguel Gutiérrez (PT)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q6" id="q6_opt7" value="opcion7">
                                <label class="form-check-label" for="q6_opt7">
                                    Ninguno
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q6" id="q6_opt8" value="opcion8">
                                <label class="form-check-label" for="q6_opt8">
                                    Es secreto
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="example-select">7.- ¿Cuál de los candidatos tiene mayor experiencia para gobernar el Municipio?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q7" id="q7_opt1" value="opcion1">
                                <label class="form-check-label" for="q7_opt7">
                                    Óscar Rosa Gonzales (PRI, PAN, PRD)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q7" id="q7_opt2" value="opcion2">
                                <label class="form-check-label" for="q7_opt2">
                                    Pablo Gutierrez Lazarus (MORENA)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q7" id="q7_opt3" value="opcion3">
                                <label class="form-check-label" for="q7_opt3">
                                    Alejandro Coba (MOVIMIENTO CIUDADANO)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q7" id="q7_opt4" value="opcion4">
                                <label class="form-check-label" for="q7_opt4">
                                    Arturo Laureano (FUERZA POR MEXICO)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q7" id="q7_opt5" value="opcion5">
                                <label class="form-check-label" for="q7_opt5">
                                    Isabel Espinoza (Partido Verde Ecologista de México)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q7" id="q7_opt6" value="opcion6">
                                <label class="form-check-label" for="q7_opt6">
                                    Miguel Gutiérrez (PT)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q7" id="q7_opt7" value="opcion7">
                                <label class="form-check-label" for="q7_opt7">
                                    Ninguno
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q7" id="q7_opt8" value="opcion8">
                                <label class="form-check-label" for="q7_opt8">
                                    Es secreto
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="example-select">8.- ¿Cuál de los candidatos le conviene que gane en las próximas elecciones del Municipio de Carmen?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q8" id="q8_opt1" value="opcion1">
                                <label class="form-check-label" for="q8_opt1">
                                    Óscar Rosa Gonzales (PRI, PAN, PRD)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q8" id="q8_opt2" value="opcion2">
                                <label class="form-check-label" for="q8_opt2">
                                    Pablo Gutierrez Lazarus (MORENA)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q8" id="q8_opt3" value="opcion3">
                                <label class="form-check-label" for="q8_opt3">
                                    Alejandro Coba (MOVIMIENTO CIUDADANO)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q8" id="q8_opt4" value="opcion4">
                                <label class="form-check-label" for="q8_opt4">
                                    Arturo Laureano (FUERZA POR MEXICO)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q8" id="q8_opt5" value="opcion5">
                                <label class="form-check-label" for="q8_opt5">
                                    Isabel Espinoza (Partido Verde Ecologista de México)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q8" id="q8_opt6" value="opcion6">
                                <label class="form-check-label" for="q8_opt6">
                                    Miguel Gutiérrez (PT)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q8" id="q8_opt7" value="opcion7">
                                <label class="form-check-label" for="q8_opt7">
                                    Ninguno
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q8" id="q8_opt8" value="opcion8">
                                <label class="form-check-label" for="q8_opt8">
                                    Es secreto
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="example-select">9.- ¿Cuál candidato le gustaria que ganara en las próximas elecciones del Municipio de Carmen?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q9" id="q9_opt1" value="opcion1">
                                <label class="form-check-label" for="q9_opt1">
                                    Óscar Rosa Gonzales (PRI, PAN, PRD)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q9" id="q9_opt2" value="opcion2">
                                <label class="form-check-label" for="q9_opt2">
                                    Pablo Gutierrez Lazarus (MORENA)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q9" id="q9_opt3" value="opcion3">
                                <label class="form-check-label" for="q9_opt3">
                                    Alejandro Coba (MOVIMIENTO CIUDADANO)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q9" id="q9_opt4" value="opcion4">
                                <label class="form-check-label" for="q9_opt4">
                                    Arturo Laureano (FUERZA POR MEXICO)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q9" id="q9_opt5" value="opcion5">
                                <label class="form-check-label" for="q9_opt5">
                                    Isabel Espinoza (Partido Verde Ecologista de México)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q9" id="q9_opt6" value="opcion6">
                                <label class="form-check-label" for="q9_opt6">
                                    Miguel Gutiérrez (PT)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q9" id="q9_opt7" value="opcion7">
                                <label class="form-check-label" for="q9_opt7">
                                    Ninguno
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q9" id="q9_opt8" value="opcion8">
                                <label class="form-check-label" for="q9_opt8">
                                    Es secreto
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="example-select">10.- Si el partido o candidato que acaba de escoger no tuviera oportunidad de ganar, ¿Usted cuál candidato o partido escogería como segunda opción?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q10" id="q10_opt1" value="opcion1">
                                <label class="form-check-label" for="q10_opt1">
                                    Óscar Rosa Gonzales (PRI, PAN, PRD)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q10" id="q10_opt2" value="opcion2">
                                <label class="form-check-label" for="q10_opt2">
                                    Pablo Gutierrez Lazarus (MORENA)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q10" id="q10_opt3" value="opcion3">
                                <label class="form-check-label" for="q10_opt3">
                                    Alejandro Coba (MOVIMIENTO CIUDADANO)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q10" id="q10_opt4" value="opcion4">
                                <label class="form-check-label" for="q10_opt4">
                                    Arturo Laureano (FUERZA POR MEXICO)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q10" id="q10_opt5" value="opcion5">
                                <label class="form-check-label" for="q10_opt5">
                                    Isabel Espinoza (Partido Verde Ecologista de México)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q10" id="q10_opt6" value="opcion6">
                                <label class="form-check-label" for="q10_opt6">
                                    Miguel Gutiérrez (PT)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q10" id="q10_opt7" value="opcion7">
                                <label class="form-check-label" for="q10_opt7">
                                    Ninguno
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q10" id="q10_opt8" value="opcion8">
                                <label class="form-check-label" for="q10_opt8">
                                    Es secreto
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                    <button type="submit" class="btn btn-primary">GUARDAR</button>
                  </div>
            </form>
        </div>

      </div>
    </div>
<<<<<<< HEAD
  </div>
=======
</div>
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
