 <!-- Modal -->
 <div class="modal fade" id="ModalVotosEmpleados" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myCenterModalLabel"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-4">
                <form id="form_votos" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="form-group col-md-6">
                        <input onkeyup="mayus(this);" type="hidden" minlength="18" maxlength="18" class="form-control" id="voto_clave" name="clave_elector" required>
                      </div>
                        <div class="form-group col-md-6">
                        <input onkeyup="mayus(this);" type="hidden" class="form-control" id="voto_nombre" name="nombre" required>
                        <input type="hidden" class="form-control" id="edit_id" required>

                    </div>
                    <div class="form-row">
                      <div class="form-group">
                        <label for="employee_ine">Documento del empleado</label>
                        <input class="dropify" type="file" data-plugins="dropify" id="employee_boleta" name="employee_boleta" data-default-file="{{ asset('images/empleados/default_ine.jpg') }}"  />
                        <input type="hidden" class="form-control" id="voto_id" required>
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
