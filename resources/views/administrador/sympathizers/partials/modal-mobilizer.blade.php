<!-- Full width modal content -->
<div id="modal-movilizadores" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-full-width">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="fullWidthModalLabel">NUEVO MOVILIZADOR</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form id="form-movilizador" method="POST" action="{{ route('admin.movilizadores_nuevo') }}">
                    @csrf
                    @method('post')
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="user_id">USUARIO</label>
                                <select class="modal_mov_user form-control" name="user_id" id="modal_mov_user">
                                    @foreach($usuarios as $usuario)
                                        <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="example-select">LIDER</label>
                                <select class="modal_mov_lider form-control"  name="leader_id" id="modal_mov_lider">
                                    @foreach($simpatizantes as $sim)
                                        <option value="{{ $sim->id }}">{{ $sim->id }} {{ $sim->nombre }} {{ $sim->paterno }} {{ $sim->materno }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="example-select">MOVILIZADOR</label>
                                <select class="modal_mov_mov form-control"  name="mobilizer_id" id="modal_mov_mov">
                                    @foreach($simpatizantes as $sim)
                                        <option value="{{ $sim->id }}">{{ $sim->id }} {{ $sim->nombre }} {{ $sim->paterno }} {{ $sim->materno }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">CANCELAR</button>
                        <button type="submit" class="btn btn-primary">REGISTRAR</button>
                    </div>

                </form>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

