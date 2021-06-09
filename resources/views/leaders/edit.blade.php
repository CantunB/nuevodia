@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">LIDERES</li>
                        </ol>
                    </div>
                    <h4 class="page-title"> EDITAR LIDER</h4>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="{{ route('Leaders.update', $lider -> id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="example-select">DISTRITO</label>
                                        <select class="form-control" name="distrito" id="example-select" required>
                                        <option selected value="" disabled>Selecciona un distrito</option>
                                            @foreach($distritos as $distrito)
                                                <option value="{{ $distrito->distrito }}"
                                                        @if($distrito -> distrito == $lider -> distrito)
                                                        selected
                                                    @endif
                                                >{{ $distrito->distrito }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="example-select">SECCION</label>
                                        <input type="text" name="seccion" value="{{ $lider -> seccion }}" class="form-control" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                @if(Auth::user()->hasRole('Super Admin'))
                                <div class="form-group mb-3">
                                        <label for="example-select">CAPTURÓ</label>
                                        <input type="hidden" name="user_id" value="{{ $lider->getUser->id  }}" />
                                        <input style="background-color: #D5D5D5" type="text" class="form-control" autocomplete="off" required value="{{ $lider->getUser->nombre  }}" readonly/>
                                    </div>
                                @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">CLAVE ELECTOR</label>
                                        <input required type="text" name="clave_elector" value="{{ $lider -> clave_elector }}" class="form-control " autocomplete="off">
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
                                        <input required type="text" name="nombre" value="{{ $lider -> nombre }}" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">PATERNO</label>
                                        <input type="text" name="paterno" value="{{ $lider -> paterno }}" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">MATERNO</label>
                                        <input type="text" name="materno" value="{{ $lider -> materno }}" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">CALLE</label>
                                        <input type="text" name="calle" value="{{ $lider -> calle }}" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">CRUZAMIENTO</label>
                                        <input type="text" name="cruzamiento" value="{{ $lider -> cruzamiento }}" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">NO. EXT</label>
                                        <input type="text" name="no_ext" value="{{ $lider -> no_ext  ?? 'S/N' }}" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">NO. INT</label>
                                        <input type="text" name="no_int" value="{{ $lider -> no_int ?? 'S/N'}}" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">COLONIA</label>
                                        <input type="text" name="colonia" value="{{ $lider -> colonia }}" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">CODIGO POSTAL</label>
                                        <input type="text" name="cp" value="{{ $lider -> cp }}" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">FECHA DE NACIMIENTO</label>
                                        <input type="text" name="fe_nacimiento" value="{{ $lider -> fe_nacimiento }}" class="form-control" autocomplete="off" placeholder="año/mes/dia">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">CELULAR</label>
                                        <input type="text" name="celular" value="{{ $lider -> celular }}" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">CORREO ELECTRONICO</label>
                                        <input type="email" name="email" value="{{ $lider -> email }}" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">FACEBOOK</label>
                                        <input type="text" name="facebook" value="{{ $lider ->  facebook }}" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                
                               
                              <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">OBSERVACION</label>
                                        <textarea type="text" name="observacion" class="form-control" autocomplete="off">{{ $lider -> observacion }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="col-md-6 offset-md-6">
                                    <a href="javascript: history.go(-1)"class="btn btn-soft-secondary waves-effect waves-light">
                                        Regresar
                                        <span class="btn-label-right">
                                            <i class="mdi mdi-backspace"></i>
                                        </span>
                                    </a>
                                    <button type="submit" class="btn btn-blue waves-effect waves-ligth">
                                        Actualizar
                                        <span class="btn-label-right">
                                            <i class="mdi mdi-account-check"></i>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container -->
@endsection
