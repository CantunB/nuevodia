<!-- Modal -->
<div class="modal fade" id="create-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myCenterModalLabel">Añadir Nuevo Distrito</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-4">
                <form id="form" method="POST" action="{{ route('Distritos.store') }}">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="example-select">Distrito</label>
                        <input required type="number" name="distrito" class="form-control @error('distrito') is-invalid @enderror" value="{{old('distrito')}}" autocomplete="off">
                        @error('distrito')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
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

