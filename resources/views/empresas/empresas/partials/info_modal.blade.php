<div class="modal fade" id="InfoModalEmpresas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Informacion de empresa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <h4 id="getNombre" class="mt-0 mb-1"></h4>
            <hr>
            <div class="row">
                <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label for="edit_direccion">DIRECCION</label>
                                    <p id="getDireccion" class="mb-0"></p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="Edit_Nombre">TELEFONO</label>
                                    <p id="getCelular" class="mb-0"></p>
                                </div>
                            </div>
                           <!-- <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="edit_email">CORREO</label>
                                    <input required type="text" name="email"  id="edit_email" class="form-control  @error('email') is-invalid @enderror" autocomplete="off">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>-->

                        </div>
                        <div class="row">
                          <!--  <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label for="edit_website">WEBSITE</label>
                                    <input  type="text" name="website" id="edit_website" class="form-control" autocomplete="off">
                                </div>
                            </div>-->

                           <!-- <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label for="edit_rfc">RFC</label>
                                    <input required onkeyup="mayus(this);"   type="text" name="rfc" id="edit_rfc" class="form-control" autocomplete="off">
                                </div>
                            </div>-->
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="edit_responsable">RESPONSABLE</label>
                                    <p id="getResponsable" class="mb-0"></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="edit_address_responsable">DIRECCION RESPONSABLE</label>
                                    <p id="getDireccionRes" class="mb-0"></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="edit_telephone_responsable">TELEFONO RESPONSABLE</label>
                                    <p id="getCelularRes" class="mb-0"></p>
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
                            </div>
                        </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
