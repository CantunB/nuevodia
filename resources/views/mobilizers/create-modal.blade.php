<!-- Full width modal content -->
<div id="modal-movilizadores" class="modal fade" role="dialog" aria-labelledby="fullWidthModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-full-width">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="fullWidthModalLabel">REGISTRO DE MOVILIZADORES</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form id="form" method="POST" action="{{ route('Mobilizers.store') }}">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id  }}" />
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="example-select">DISTRITO</label>
                                <select class="form-control" name="distrito" id="example-select" required>
                                    <option selected value="" disabled>Selecciona un distrito </option>
                                    @foreach($distritos as $distrito)
                                        <option value="{{ $distrito->distrito }}">{{ $distrito->distrito }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="example-select">SECCION</label>
                                <input required type="number" minlength="3" maxlength="3"  name="seccion" class="form-control" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="example-select">LIDER</label>
                                <select name="lider" class="lider form-control" id="lider" required>
                                    <option disabled value="" selected>Selecciona un lider</option>
                                    @foreach($lideres as $lider)
                                        <option value="{{ $lider->getInfo->id }}">
                                            {{$lider->getInfo->nombre .' '. $lider->getInfo->paterno .' '. $lider->getInfo->materno}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="simpleinput">CLAVE ELECTOR</label>
                                <input required onkeyup="mayus(this);" type="text" name="clave_elector" class="form-control @error('clave_elector') is-invalid @enderror" minlength="18" maxlength="18"  autocomplete="off">
                                @error('clave_elector')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="simpleinput">NOMBRE</label>
                                <input onkeyup="mayus(this);" required type="text" name="nombre" class="form-control" minlength="2" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="simpleinput">PATERNO</label>
                                <input onkeyup="mayus(this);" type="text" name="paterno" class="form-control" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="simpleinput">MATERNO</label>
                                <input onkeyup="mayus(this);" type="text" name="materno" class="form-control" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="simpleinput">CALLE</label>
                                <input onkeyup="mayus(this);" type="text" name="calle" class="form-control" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group mb-3">
                                <label for="simpleinput">CRUZAMIENTO</label>
                                <input onkeyup="mayus(this);" type="text" name="cruzamiento" class="form-control" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group mb-3">
                                <label for="simpleinput">NO. EXT</label>
                                <input  onkeyup="mayus(this);" type="text" name="no_ext" class="form-control" autocomplete="off" value="S/N">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group mb-3">
                                <label for="simpleinput">NO. INT</label>
                                <input type="text" name="no_int" class="form-control" autocomplete="off" value="S/N">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="simpleinput">COLONIA</label>
                                <input onkeyup="mayus(this);" type="text" name="colonia" class="form-control" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group mb-3">
                                <label for="simpleinput">CODIGO POSTAL</label>
                                <input type="number" name="cp" class="form-control" autocomplete="off" minlength="5" maxlength="5">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group mb-3">
                                <label for="simpleinput">FECHA DE NACIMIENTO</label>
                                <input type="date" name="fe_nacimiento" class="form-control" autocomplete="off" value="{{old('fe_nacimiento')}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group mb-3">
                                <label for="simpleinput">CELULAR</label>
                                <input type="tel" data-parsley-type="digits" data-parsley-type="number" name="celular" class="form-control" autocomplete="off"  minlength="10" maxlength="10">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="simpleinput">CORREO ELECTRONICO</label>
                                <input type="email" name="email" class="form-control" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="simpleinput">FACEBOOK</label>
                                <input type="text" name="facebook" class="form-control" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="simpleinput">GESTION</label>
                                <input type="text" name="gestion" class="form-control" autocomplete="off" value="SIN GESTION" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="simpleinput">ESTADO DE LA GESTION</label>
                                <select class="form-control" name="estatus_gestion" name="gestion" required>
                                    <option value="" disabled selected>Selecciona una opcion </option>
                                    <option value="SIN GESTION">SIN GESTION</option>
                                    <option value="POR GESTIONAR">POR GESTIONAR</option>
                                    <option value="COMPLETA"> COMPLETA</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="simpleinput">OBSERVACION</label>
                                <textarea type="text" name="observacion" class="form-control" autocomplete="off"></textarea>
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
