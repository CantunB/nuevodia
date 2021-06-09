<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myCenterModalLabel">Editar Gestion</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
            </div>
            <div class="modal-body p-4">
                <form method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="gestion">Estado de la gestion</label>
                        <input required class="form-control" type="hidden" name="id" id="id_tocado">
                        <input autocomplete="off" required class="form-control" type="text"  name="estatus_gestion" id="estatus_gestion" value="COMPLETA">
                    </div>
                    <div class="text-right">
                        <button type="submit" id="btn-edit" class="btn btn-success waves-effect waves-light">Guardar</button>
                        <button type="button" class="btn btn-secondary waves-effect waves-light" data-dismiss="modal"> Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
