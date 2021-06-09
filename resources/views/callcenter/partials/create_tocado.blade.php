<div id="full-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-full-width">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="fullWidthModalLabel">REGISTRO DE TOCADOS</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form id="form-tocado" method="POST" action="{{ route('Sympathizers.store') }}">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id  }}" />
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="example-select">DISTRITO</label>
                                <select class="form-control" name="distrito" id="example-select">
                                    @foreach($distritos as $distrito)
                                        <option value="{{ $distrito->distrito }}">{{ $distrito->distrito }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="example-select">SECCION</label>
                                <input type="text" name="seccion" class="form-control" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="example-select">PROPIETARIO</label>
                                <select name="propietario" class="propietario form-control"  id="lider" required>
                                    <option selected disabled value="">SELECCIONA UN PROPIETARIO</option>
                                    @foreach($owners as $owner)
                                        <option value="{{ $owner -> id }}">{{ $owner->nombre }} {{ $owner->paterno }} {{ $owner->materno }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="simpleinput">CLAVE ELECTOR</label>
                                <input style="text-transform:uppercase;" required type="text" name="clave_elector" class="form-control @error('clave_elector') is-invalid @enderror"  minlength="18" maxlength="18" autocomplete="off" value="{{old('clave_elector')}}">
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
                                <input style="text-transform:uppercase;" type="text" name="nombre" class="form-control" autocomplete="off" required minlength="2" value="{{old('nombre')}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="simpleinput">PATERNO</label>
                                <input style="text-transform:uppercase;" type="text" name="paterno" class="form-control" autocomplete="off" minlength="2" value="{{old('paterno')}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="simpleinput">MATERNO</label>
                                <input style="text-transform:uppercase;" type="text" name="materno" class="form-control" autocomplete="off" minlength="2" value="{{old('materno')}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="simpleinput">CALLE</label>
                                <input type="text" name="calle" class="form-control" autocomplete="off" value="{{old('calle')}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="simpleinput">CRUZAMIENTO</label>
                                <input type="text" name="cruzamiento" class="form-control" autocomplete="off" value="{{old('cruzamiento')}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="simpleinput">NO. EXT</label>
                                <input type="text" name="no_ext" class="form-control" autocomplete="off" placeholder="S/N" value="{{old('no_ext')}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="simpleinput">NO. INT</label>
                                <input type="text" name="no_int" class="form-control" autocomplete="off" placeholder="S/N" value="{{old('no_int')}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="simpleinput">COLONIA</label>
                                <input type="text" name="colonia" class="form-control" autocomplete="off" value="{{old('colonia')}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="simpleinput">CODIGO POSTAL</label>
                                <input type="number" minlength="5" name="cp" class="form-control" autocomplete="off" value="{{old('cp')}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="simpleinput">FECHA DE NACIMIENTO</label>
                                <input type="text" name="fe_nacimiento" class="form-control" autocomplete="off" placeholder="año/mes/dia" value="{{old('fe_nacimiento')}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="simpleinput">CELULAR</label>
                                <input type="number" name="celular" class="form-control" autocomplete="off" minlength="10" maxlength="10" value="{{old('celular')}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
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
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="simpleinput">OBSERVACION</label>
                                <input type="text" name="observacion" class="form-control" autocomplete="off">
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
