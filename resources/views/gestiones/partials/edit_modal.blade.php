<div class="modal fade" id="EditGestionesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">EDITAR GESTION</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" id="EditGestionesForm">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="edit_name">NOMBRE</label>
                                    <input type="text" id="edit_name" class="form-control" autocomplete="off" required>
                                    <input type="hidden" id="edit_id" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="edit_name">GESTION</label>
                                    <input type="text" name="gestion" id="edit_gestion" class="form-control" autocomplete="off" required>
                                    <input type="hidden" id="edit_id" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-">
                                  <label for="Edit_Estatus">ESTATUS DE LA GESTION</label>
                                    <select class="form-control" name="estatus_gestion" id="edit_estatus" required>
                                        <option selected value="" disabled>Selecciona una opcion</option>
                                        <option value="SIN GESTION">SIN GESTION</option>
                                        <option value="POR GESTIONAR">POR GESTIONAR</option>
                                        <option value="COMPLETA"> COMPLETA</option>
                                    </select>
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
                                    EDITAR
                                    <span class="btn-label-right">
                                        <i class="mdi mdi-account-check"></i>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
