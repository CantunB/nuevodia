 <!-- Modal -->
 <div class="modal fade" id="ModalCreateDespensas" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myCenterModalLabel">NUEVO REGISTRO</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-4">
                <hr>
                <form id="form_despensas" method="POST" action="{{route('Despensas.store')}}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="nombre">Nombre</label>
                        <input onkeyup="mayus(this);" type="text" class="form-control" id="nombre" name="nombre" required>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="paterno">Ap.Paterno</label>
                        <input onkeyup="mayus(this);" type="text" class="form-control" id="paterno" name="paterno">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="materno">Ap.Materno</label>
                        <input onkeyup="mayus(this);" type="text" class="form-control" id="materno" name="materno">
                      </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="clave_elector">Clave Elector</label>
                          <input onkeyup="mayus(this);" minlength="18" maxlength="18" type="text" class="form-control" id="clave_elector" name="clave_elector">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="example-select">SECCION</label>
                                <select class="form-control select2" id="seccion" name="seccion" required>
                                    <option selected value="null" disabled>SECCION</option>
                                    @foreach($secciones as $seccion)
                                        <option value="{{ $seccion->seccion_electoral }}">{{ $seccion->seccion_electoral }}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="form-group col-md-3">
                                <label for="example-select">DISTRITO</label>
                                <select class="form-control" name="distrito" id="distrito">
                                </select>
                        </div>
                    </div>

                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="calle">Calle</label>
                          <input onkeyup="mayus(this);" type="text" class="form-control" id="calle" name="calle">
                        </div>
                        <div class="form-group col-md-1">
                          <label for="no_ext">No.Ext</label>
                          <input onkeyup="mayus(this);"type="text" class="form-control" id="no_ext" name="no_ext">
                        </div>
                        <div class="form-group col-md-1">
                            <label for="no_ext">No.Int</label>
                            <input onkeyup="mayus(this);"type="text" class="form-control" id="no_int" name="no_int">
                          </div>
                        <div class="form-group col-md-4">
                            <label for="colonia">Colonia</label>
                            <input onkeyup="mayus(this); type="text" class="form-control" id="colonia" name="colonia">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="cp">C.P.</label>
                            <input type="number" class="form-control" id="cp" name="cp" minlength="5" maxlength="5">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="fe_nacimiento">Fecha Nacimiento</label>
                            <input type="date" class="form-control" id="fe_nacimiento" name="fe_nacimiento">
                        </div>
                          <div class="form-group col-md-4">
                            <label for="fe_nacimiento">Celular</label>
                            <input type="number" class="form-control" id="celular" name="celular" minlength="10" maxlength="10">
                          </div>
                          <div class="form-group col-md-12">
                            <label for="pantry">DESPENSA</label>
                            <input onkeyup="mayus(this); type="text" class="form-control" id="pantry" name="pantry">
                          </div>
                      </div>
                    <div class="form-row">

                      <div class="form-group col-md-6">
                        <label for="user_id">Capturista</label>
                        <input type="text" style="background-color : #d1d1d1; " readonly class="form-control" value="{{ Auth::user()->nombre }} {{ Auth::user()->paterno }} {{ Auth::user()->materno }}">
                        <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ Auth::user()->id}}">
                    </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-md-6 offset-md-6">
                            <button  type="button" class="btn btn-soft-secondary waves-effect waves-light" data-dismiss="modal">
                                CERRAR
                                <span class="btn-label-right">
                                    <i class="mdi mdi-backspace"></i>
                                </span>
                            </button>
                            <button type="submit" class="btn btn-blue waves-effect waves-ligth">
                                REGISTRAR
                                <span class="btn-label-right">
                                    <i class="mdi mdi-account-check"></i>
                                </span>
                            </button>
                        </div>
                    </div>
                  </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
