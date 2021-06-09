 <!-- Modal -->
 <div class="modal fade" id="ModalCreateEmpleados" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myCenterModalLabel">Nueva Empleado</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-4">
<<<<<<< HEAD
                <input type="button" class="btn btn-primary waves-effect waves-ligth" onclick="myFunction()" value="Limpiar Formulario">
                <hr>
                <form id="form_empleados" method="POST" enctype="multipart/form-data">
=======
                <form id="form_empleados" method="POST" enctype="multipart/form-data" action="{{route('Empleados.store')}}">
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                    @csrf
                    @method('POST')
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="enterprise_id">Empresa</label>
                            <select id="enterprise_id" name="enterprise_id" class="form-control" required>
                              <option disabled value="" selected>Elige una empresa...</option>
                              @foreach ($empresas as $empresa)
                                <option value="{{ $empresa->id }}">{{ $empresa->name }}</option>
                              @endforeach
                            </select>
                          </div>
                      <div class="form-group col-md-6">
                        <label for="nombre">Nombre</label>
                        <input onkeyup="mayus(this);" type="text" class="form-control" id="nombre" name="nombre" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="paterno">Ap.Paterno</label>
                        <input onkeyup="mayus(this);" type="text" class="form-control" id="paterno" name="paterno" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="materno">Ap.Materno</label>
                        <input onkeyup="mayus(this);" type="text" class="form-control" id="materno" name="materno" required>
                      </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="clave_elector">Clave Elector</label>
                          <input onkeyup="mayus(this);" minlength="18" maxlength="18" type="text" class="form-control" id="clave_elector" name="clave_elector" required>
                        </div>
                        <div class="form-group col-md-2">
                          <label for="distrito">Distrito</label>
                          <select id="distrito" name="distrito" class="form-control" required>
                            <option disabled value="" selected>Elige un distrito...</option>
                            @foreach ($distritos as $distrito)
                              <option value="{{ $distrito->distrito }}">{{ $distrito->distrito }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group col-md-2">
                          <label for="seccion">Seccion</label>
                          <input type="text" class="form-control" minlength="3" maxlength="3" id="seccion" name="seccion" required>
                        </div>
                    </div>

                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="calle">Calle</label>
                          <input onkeyup="mayus(this);" type="text" class="form-control" id="calle" name="calle" required>
                        </div>
                        <div class="form-group col-md-2">
                          <label for="no_ext">No.Ext</label>
                          <input onkeyup="mayus(this);"type="text" class="form-control" id="no_ext" name="no_ext">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="colonia">Colonia</label>
                            <input type="text" class="form-control" id="colonia" name="colonia" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="cp">C.P.</label>
                            <input type="number" class="form-control" id="cp" name="cp" minlength="5" maxlength="5" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="fe_nacimiento">Fecha Nacimiento</label>
                            <input type="date" class="form-control" id="fe_nacimiento" name="fe_nacimiento">
                          </div>
                          <div class="form-group col-md-4">
                            <label for="fe_nacimiento">Celular</label>
                            <input type="number" class="form-control" id="celular" name="celular" minlength="10" maxlength="10">
                          </div>
                      </div>
                    <div class="form-row">

                      <div class="form-group col-md-6">
                        <label for="user_id">Capturista</label>
                        <input type="text" readonly class="form-control" value="{{ Auth::user()->nombre }} {{ Auth::user()->paterno }} {{ Auth::user()->materno }}">
                        <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ Auth::user()->id}}">
                    </div>
                      <div class="form-group">
                        <label for="employee_ine">Documento del empleado</label>
                        <input class="dropify" type="file" data-plugins="dropify" id="employee_ine" name="employee_ine" data-default-file="{{ asset('images/empleados/default_ine.jpg') }}"  />
                        <!--<p class="text-muted text-center mt-2 mb-0">Default File</p>-->
                      </div>
                      <div class="col-lg-4">
                        <div class="mt-3">

                        </div>
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
