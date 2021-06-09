<<<<<<< HEAD
<div class="modal fade" id="EditModalEmpresas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
=======
<div class="modal fade" id="EditModalEmpresas" data-backdrop="static"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Actualizar informacion de empresa</h5>
<<<<<<< HEAD
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
=======
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" id="EditModalLiderForm">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="edit_name">NOMBRE</label>
                                    <input type="text" name="name" id="edit_name" class="form-control" autocomplete="off" required>
                                    <input type="hidden" id="edit_id" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="Edit_Nombre">TELEFONO</label>
                                    <input type="text" name="telephone" id="edit_telephone" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label for="edit_direccion">DIRECCION</label>
                                    <input  onkeyup="mayus(this);"  type="text" name="address" id="edit_direccion" class="form-control" autocomplete="off">
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
                                    <input  onkeyup="mayus(this);"  type="text" name="name_responsable" id="edit_responsable" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="edit_address_responsable">DIRECCION RESPONSABLE</label>
                                    <input onkeyup="mayus(this);"  type="text" name="address_responsable" id="edit_address_responsable" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="edit_telephone_responsable">TELEFONO RESPONSABLE</label>
                                    <input onkeyup="mayus(this);"  type="text" name="telephone_responsable" id="edit_telephone_responsable" class="form-control" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="col-md-6 offset-md-6">
<<<<<<< HEAD
                                <button  type="button" class="btn btn-soft-secondary waves-effect waves-light" data-dismiss="modal">
=======
                                <button  type="button" class="btn btn-soft-secondary waves-effect waves-light" class="close" data-dismiss="modal">
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                                    CERRAR
                                    <span class="btn-label-right">
                                        <i class="mdi mdi-backspace"></i>
                                    </span>
                                </button>
                                <button type="submit" class="btn btn-blue waves-effect waves-ligth">
<<<<<<< HEAD
                                    Actualizar
=======
                                    ACTUALIZAR
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
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
