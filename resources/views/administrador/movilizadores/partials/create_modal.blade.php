<!-- Full width modal content -->
<div id="full-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-full-width">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="fullWidthModalLabel">Actualizas registro</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form id="form" method="POST" action="{{ route('admin.movilizadores_nuevo') }}">
                    @csrf
                    @method('post')
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="user_id">Usuario</label>
                                <select class="form-control" name="user_id" id="user_id">
                                    @foreach($usuarios as $usuario)
                                        <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="example-select">Lider</label>
                                <select class="lider form-control"  name="leader_id" id="lider">
                                    @foreach($simpatizantes as $sim)
                                        <option value="{{ $sim->id }}">{{ $sim->id }} {{ $sim->nombre }} {{ $sim->paterno }} {{ $sim->materno }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="example-select">Movilizador</label>
                                <select class="movilizador form-control"  name="mobilizer_id" id="movilizador">
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
