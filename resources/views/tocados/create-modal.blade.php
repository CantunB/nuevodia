<!-- Full width modal content -->
<div id="modal_tocados" class="modal fade" role="dialog" aria-labelledby="fullWidthModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-full-width">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="fullWidthModalLabel">REGISTRO DE TOCADOS</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form id="form" method="POST" action="{{ route('Sympathizers.store') }}">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id  }}" />
                    <div class="row">
                    <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="example-select">SECCION</label>
                                <select class="form-control select2" id="seccion" name="seccion" required>
                                    <option selected value="null" disabled>Selecciona una seccion </option>
                                    @foreach($secciones as $seccion)
                                        <option value="{{ $seccion->seccion_electoral }}">{{ $seccion->seccion_electoral }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="example-select">DISTRITO</label>
                                <select class="form-control" name="distrito" id="distrito">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="example-select">MOVILIZADORES</label>
                                <select name="movilizador" class="form-control select2"  id="create_movilizer" required value="{{old('movilizador')}}">
                                    <option selected disabled>Selecciona un Movilizador</option>
                                    @foreach($movilizadores as $movilizador)
                                        <option value="{{ $movilizador->getInfo->id }}">{{ $movilizador->getInfo->nombre }} {{ $movilizador->getInfo->paterno }} {{ $movilizador->getInfo->materno }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="simpleinput">CLAVE ELECTOR</label>
                                <input  onkeyup="mayus(this);"  type="text" name="clave_elector" class="form-control @error('clave_elector') is-invalid @enderror" minlength="18" maxlength="18"  autocomplete="off" required value="{{old('clave_elector')}}">
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
                                <input onkeyup="mayus(this);"  type="text" name="nombre" class="form-control" autocomplete="off" required value="{{old('nombre')}}" minlength="2">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="simpleinput">PATERNO</label>
                                <input onkeyup="mayus(this);"  type="text" name="paterno" class="form-control" autocomplete="off" value="{{old('paterno')}}" minlength="2">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="simpleinput">MATERNO</label>
                                <input onkeyup="mayus(this);"  type="text" name="materno" class="form-control" autocomplete="off" value="{{old('materno')}}" minlength="2">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="simpleinput">CALLE</label>
                                <input onkeyup="mayus(this);"  type="text" name="calle" class="form-control" autocomplete="off" value="{{old('calle')}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group mb-3">
                                <label for="simpleinput">CRUZAMIENTO</label>
                                <input onkeyup="mayus(this);"  type="text" name="cruzamiento" class="form-control" autocomplete="off" value="{{old('cruzamiento')}}">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group mb-3">
                                <label for="simpleinput">NO. EXT</label>
                                <input onkeyup="mayus(this);"  type="text" name="no_ext" class="form-control" autocomplete="off" value="S/N">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group mb-3">
                                <label for="simpleinput">NO. INT</label>
                                <input onkeyup="mayus(this);"  type="text" name="no_int" class="form-control" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="simpleinput">COLONIA</label>
                                <input onkeyup="mayus(this);"  type="text" name="colonia" class="form-control" autocomplete="off" value="{{old('colonia')}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group mb-3">
                                <label for="simpleinput">CODIGO POSTAL</label>
                                <input type="number" name="cp" class="form-control" autocomplete="off" value="{{old('cp')}}" minlength="5" maxlength="5">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group mb-3">
                                <label for="simpleinput">FECHA DE NACIMIENTO</label>
                                <input type="date" name="fe_nacimiento" class="form-control @error('fe_nacimiento') is-invalid @enderror" autocomplete="off" value="{{old('fe_nacimiento')}}">
                                @error('fe_nacimiento')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="simpleinput">CELULAR</label>
                                <input type="number" name="celular" class="form-control" autocomplete="off" value="{{old('celular')}}" minlength="10" maxlength="10">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="simpleinput">CORREO ELECTRONICO</label>
                                <input type="email" name="email" class="form-control" autocomplete="off" value="{{old('email')}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="simpleinput">FACEBOOK</label>
                                <input type="text" name="facebook" class="form-control" autocomplete="off" value="{{old('facebook')}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="simpleinput">GESTION SOLICITADA POR EL TOCADO</label>
                                <input rows="3" type="text" name="gestion" class="form-control" value=" SIN GESTION" required />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="simpleinput">OBSERVACION</label>
                                <input rows="3" type="text" name="observacion" class="form-control" autocomplete="off" value="{{old('observacion')}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">CERRAR</button>
                        <button type="submit" class="btn btn-primary">REGISTRAR</button>
                    </div>

                </form>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
