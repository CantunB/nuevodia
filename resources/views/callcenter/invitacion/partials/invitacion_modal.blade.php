<div class="modal fade" id="InvitacionModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">INVITACION</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="InvitacionForm" method="POST" action="{{ route('Invitacion.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="container">
                            <p>HOLA BUENOS DIAS TE SALUDAMOS DE PARTE DE TUS AMIGOS OSCAR ROSAS,
                                CRISTIAN CASTRO BELLO Y TODOS LOS CANDIDATOS DE LA ALIANZA
                                PAN, PRI Y PRD LOS CUALES TE INVITAN ESTE DOMINGO 6 DE JUNIO
                                A DEPOSITAR TU CONFIANZA VOTANDO POR ELLOS <strong style="color: black">¡JUNTOS DEFENDEMOS CARMEN Y CAMPECHE!</strong>
                            </p>
                        </div>
                        <div class="form-check">
                            <div class="radio radio-success radio-single">
                                <input type="hidden" id="clave_elector" name="clave_elector">
                            </div>
                            <div class="radio radio-success radio-single">
                                <input type="radio" id="invitation1" value="1" name="invitation" checked aria-label="Single radio One">
                                <label for="invitation1"></label><strong>SI</strong> Confirmó</label>
                            </div>
                            <div class="radio radio-single">
                                <input type="radio" id="invitation2" value="2" name="invitation"  aria-label="Single radio Two">
                                <label for="invitation2"></label><strong>NO </strong> Confirmó</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-soft-secondary" data-dismiss="modal">CERRAR</button>
                    <button type="submit" class="btn btn-success">GUARDAR</button>
                </div>
            </form>
        </div>

      </div>
    </div>
</div>
