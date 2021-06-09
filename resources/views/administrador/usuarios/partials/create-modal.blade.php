<div id="CreateModalUsers" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="CreateModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form_users" class="form-group" method="POST">
                @csrf
                @method('POST')
                <div class="modal-header">
                    <h4 class="modal-title">Registrar Nuevo Usuario <i class="mdi mdi-account-check"></i></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <div class="modal-body p-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="clave_elector" class="control-label">Clave de elector</label>
                                    <input  onkeyup="mayus(this);" required type="text"
                                            minlength="18" maxlength="18"
                                            class="form-control @error('nombre') is-invalid @enderror"
                                            id="clave_elector"
                                            name="clave_elector"
                                            placeholder="Necesitamos tu clave de elector"
                                            value="{{old('clave_elector')}}"
                                            autocomplete="off"/>
                                    @error('clave_elector')<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>@enderror
                                </div>
                            </div><div class="col-md-12">
                                <div class="form-group">
                                    <label for="nombre" class="control-label">Nombre(s)</label>
                                    <input onkeyup="mayus(this);" required type="text"
                                           class="form-control @error('nombre') is-invalid @enderror"
                                           id="nombre"
                                           name="nombre"
                                           placeholder="Ingresa un nombre"
                                           value="{{old('nombre')}}"
                                            autocomplete="off"/>
                                    @error('nombre')<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="paterno" class="control-label">Apellido Paterno</label>
                                    <input onkeyup="mayus(this);" required type="text"
                                           class="form-control @error('paterno') is-invalid @enderror"
                                           id="paterno"
                                           name="paterno"
                                           placeholder="1er Apellido"
                                           value="{{old('paterno')}}"
                                            autocomplete="off"/>
                                    @error('paterno')<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="materno" class="control-label">Apellido Materno</label>
                                    <input onkeyup="mayus(this);" required type="text"
                                           class="form-control @error('materno') is-invalid @enderror"
                                           id="materno"
                                           name="materno"
                                           placeholder="2do Apellido"
                                           value="{{old('materno')}}"
                                            autocomplete="off"/>
                                    @error('materno')<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="celular" class="control-label">Celular</label>
                                    <input required type="tel"
                                            minlength="10" maxlength="10"
                                           class="form-control @error('celular') is-invalid @enderror"
                                           id="celular"
                                           name="celular"
                                           placeholder="12345678"
                                           value="{{old('paterno')}}"
                                           pattern="[0-9]{10}"
                                            autocomplete="off"/>
                                    @error('celular')<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="email" class="control-label">Correo Electronico</label>
                                    <input required type="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           id="email"
                                           name="email"
                                           placeholder="example@example.com"
                                           value="{{old('email')}}"
                                            autocomplete="off"/>
                                    @error('email')<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="password" class="control-label">Contraseña</label>
                                    <input required type="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           id="password"
                                           name="password"
                                           placeholder="*********"
                                            autocomplete="off"/>
                                    @error('password')<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="nombre" class="control-label">Confirmar Contraseña</label>
                                    <input required type="password"
                                           class="form-control"
                                           id="password-confirm"
                                           name="password_confirmation"
                                           placeholder="*********"
                                            autocomplete="off"/>
                                    <input required type="hidden"
                                           class="form-control"
                                           id="estatus"
                                           name="estatus" value="1"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="roles" class="control-label">Roles</label>
                                    <select required class="form-control" id="roles" name="roles" >
                                        <option value="" disabled selected> Selecciona un rol</option>
                                        @foreach($roles as $key => $rol)
                                            <option value="{{$rol->id}}">{{$rol->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="roles" class="control-label">Grupo de trabajo</label>
                                    <select required class="form-control" id="estatus" name="estatus" >
                                        <option value="" disabled selected> Selecciona un equipo</option>
                                            <option value="1">NUEVO DIA</option>
                                            <option value="2">EMPRESAS</option>
                                              <option value="3">MYPYMES</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success waves-effect waves-light">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
