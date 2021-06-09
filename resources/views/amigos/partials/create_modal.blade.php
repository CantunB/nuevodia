<div class="modal fade" id="ModalCreateAmigos" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myCenterModalLabel">NUEVO REGISTRO</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-4">
                <hr>
                <form id="form_amigos" method="POST" action="{{route('Amigos.store')}}" enctype="multipart/form-data">
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
                        <div class="form-group col-md-4">
                            <label for="fe_nacimiento">Celular</label>
                            <input type="number" class="form-control" id="celular" name="celular" minlength="10" maxlength="10">
                            <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ Auth::user()->id}}">
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
