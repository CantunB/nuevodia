 <!-- Modal -->
 <div class="modal fade" id="ModalEditEmpleados" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myCenterModalLabel">Editar Empleado</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-4">
                <form id="form_empleados_edit" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="enterprise_id">Empresa</label>
                            <select id="edit_enterprise_id" name="enterprise_id" class="form-control" required>
                              <option disabled value="" selected>Elige una empresa...</option>
                              @foreach ($empresas as $empresa)
                                <option value="{{ $empresa->id }}">{{ $empresa->name }}</option>
                              @endforeach
                            </select>
                          </div>
                      <div class="form-group col-md-6">
                        <label for="nombre">Nombre</label>
                        <input onkeyup="mayus(this);" type="text" class="form-control" id="edit_nombre" name="nombre" required>
                        <input type="hidden" class="form-control" id="edit_id" required>

                    </div>
                      <div class="form-group col-md-6">
                        <label for="paterno">Ap.Paterno</label>
                        <input onkeyup="mayus(this);" type="text" class="form-control" id="edit_paterno" name="paterno" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="materno">Ap.Materno</label>
                        <input onkeyup="mayus(this);" type="text" class="form-control" id="edit_materno" name="materno" required>
                      </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="clave_elector">Clave Elector</label>
                          <input onkeyup="mayus(this);" type="text" minlength="18" maxlength="18" class="form-control" id="edit_clave_elector" name="clave_elector" required>
                        </div>
                        <div class="form-group col-md-2">
                          <label for="distrito">Distrito</label>
                          <select id="edit_distrito" name="distrito" class="form-control" required>
                            <option disabled value="" selected>Elige un distrito...</option>
                            @foreach ($distritos as $distrito)
                              <option value="{{ $distrito->distrito }}">{{ $distrito->distrito }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group col-md-2">
                          <label for="seccion">Seccion</label>
                          <input type="text" class="form-control" id="edit_seccion" minlength="3" maxlength="3" name="seccion" required>
                        </div>
                    </div>

                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="calle">Calle</label>
                          <input onkeyup="mayus(this);" type="text" class="form-control" id="edit_calle" name="calle" required>
                        </div>
                     <!--   <div class="form-group col-md-5">
                          <label for="cruzamiento">Cruzamiento</label>
                          <input onkeyup="mayus(this);" type="text" class="form-control" id="edit_cruzamiento" name="cruzamiento" required>
                        </div>-->
                        <div class="form-group col-md-2">
                          <label for="no_ext">No.Ext</label>
                          <input type="text" class="form-control" id="edit_no_ext" name="no_ext">
                        </div>
                      <!--  <div class="form-group col-md-2">
                            <label for="no_int">No.Int</label>
                            <input type="text" class="form-control" id="edit_no_int" name="no_int">
                        </div>-->
                        <div class="form-group col-md-4">
                            <label for="colonia">Colonia</label>
                            <input onkeyup="mayus(this);"  type="text" class="form-control" id="edit_colonia" name="colonia" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="edit_cp">C.P.</label>
                            <input type="number" class="form-control" id="edit_cp" name="cp" minlength="5" maxlength="5" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="edit_fe_nacimiento">Fecha Nacimiento</label>
                            <input type="text" class="form-control" id="edit_fe_nacimiento" name="fe_nacimiento">
                          </div>
                          <div class="form-group col-md-4">
                            <label for="edit_celular">Celular</label>
                            <input type="number" class="form-control" id="edit_celular" name="celular">
                          </div>
                      </div>
                    <div class="form-row">

                   <!--   <div class="form-group col-md-4">
                        <label for="edit_email">Correo</label>
                        <input type="email" class="form-control" id="edit_email" name="email">
                      </div>-->
                      <div class="form-group">
                        <label for="edit_image_ine">Documento del empleado</label>
                        <input  id="edit_image_ine" name="employee_ine" type="file" />
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
