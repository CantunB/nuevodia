<!-- Modal -->
<div class="modal fade" id="create-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myCenterModalLabel">Añadir Nuevo Rol</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-4">
                <form id="form" method="POST" action="{{ route('roles.store') }}">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="example-select">Nombre</label>
                        <input required type="text"  name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" autocomplete="off">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="example-select">Guard</label>
                        <input required type="text" readonly name="guard_name" class="form-control" value="web" autocomplete="off">
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-success waves-effect waves-light">GUARDAR</button>
                        <button type="button" class="btn btn-danger waves-effect waves-light" data-dismiss="modal">CANCELAR</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

