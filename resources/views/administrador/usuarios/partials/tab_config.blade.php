<div class="tab-pane" id="settings">
    <form method="POST" action="{{route('usuarios.update', $usuario->id) }}" >
        @method('PUT')
        @csrf
        <h5 class="mb-4 text-uppercase bg-light p-2"><i class="mdi mdi-account-circle mr-1"></i>Informacion Personal</h5>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="firstname">Nombre(s)</label>
                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="firstname" name="nombre" placeholder="Enter first name" value="{{$usuario->nombre}}">
                    @error('nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="lastname">Apellido Paterno</label>
                    <input type="text" class="form-control" id="lastname" name="paterno" placeholder="Enter last name" value="{{$usuario->paterno}}">
                </div>
            </div> <!-- end col -->
            <div class="col-md-4">
                <div class="form-group">
                    <label for="lastname">Apellido Materno</label>
                    <input type="text" class="form-control" id="lastname" name="materno" placeholder="Enter last name" value="{{$usuario->materno}}">
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="userbio">Clave Electoral</label>
                    <input class="form-control" id="userbio" name="clave_elector" placeholder="Write something..." value="{{$usuario->clave_elector}}"></input>
                </div>
            </div> <!-- end col -->
            <div class="col-6">
                <div class="form-group">
                    <label for="userbio">Celular</label>
                    <input class="form-control @error('celular') is-invalid @enderror" id="celular" name="celular" placeholder="Write something..." value="{{$usuario->celular}}"></input>
                    @error('celular')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="useremail">Correo Electronico</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter email" value="{{$usuario->email}}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="userpassword">Password</label>
                    <input type="password" class="form-control" disabled placeholder="Enter password" value="{{$usuario->password}}">
                    <span class="form-text text-muted"><small>Si deseas cambiar tu contraseña <a href="{{ route('password.request') }}">click</a> aqui.</small></span>
                </div>
            </div> <!-- end col -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="useremail">Rol asignado</label>
                        <select class="form-control" id="roles" name="roles"  @if(!Auth::user()->hasRole('Super Admin'))
                            disabled
                        @endif>
                            <option value="" disabled selected>Selecciona un rol</option>
                            @foreach ($roles as $key => $rol)
                                <option value="{{ $rol->name}}"
                                    @if($usuario->roles[0]->name == $rol->name)
                                        selected
                                    @endif
                                    >{{ $rol->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
        </div> <!-- end row -->

        <div class="text-right">
            <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Actualizar</button>
        </div>
    </form>
</div>
