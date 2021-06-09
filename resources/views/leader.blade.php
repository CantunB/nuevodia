@extends('layouts.app')
@section('content')

<!-- Start Content-->
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <!--<li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>-->
                        <li class="breadcrumb-item active">LIDERES</li>
                    </ol>
                </div>
                <h4 class="page-title"> EDITAR LIDERES</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    @if(session('status_success'))
        <script>
        Swal.fire({
        icon: 'success',
        title: '{{ session('status_success') }}',
        timer: 3000
        })
        </script>
    @endif

<div class="card">
    <div class="card-body">
    <div class="row">
        <div class="col-md-12">
        <form method="POST" action="{{ route('Leaders.update', $lider -> id) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id  }}" />
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="example-select">DISTRITO</label>
                                    <select class="form-control" name="distrito" id="example-select">
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
                                    <input type="text" name="seccion" value="{{ $lider -> seccion }}" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-4">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="simpleinput">CLAVE ELECTOR</label>
                                    <input type="text" name="clave_elector" value="{{ $lider -> clave_elector }}" class="form-control " autocomplete="off">
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
                                    <input type="text" name="nombre" value="{{ $lider -> nombre }}" class="form-control" autocomplete="off">
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
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                <label for="simpleinput">CRUZAMIENTO</label>
                                    <input type="text" name="cruzamiento" value="{{ $lider -> cruzamiento }}" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                <label for="simpleinput">NO. EXT</label>
                                    <input type="text" name="no_ext" value="{{ $lider -> no_ext }}" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                <label for="simpleinput">NO. INT</label>
                                    <input type="text" name="no_int" value="{{ $lider -> no_int }}" class="form-control" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="simpleinput">COLONIA</label>
                                    <input type="text" name="colonia" value="{{ $lider -> colonia }}" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                <label for="simpleinput">CODIGO POSTAL</label>
                                    <input type="text" name="cp" value="{{ $lider -> cp }}" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-3">
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
                        </div>
                        <div class="row">
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
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                <label for="simpleinput">GESTIION</label>
                                    <input type="text" name="gestion" value="{{ $lider -> gestion }}" class="form-control" autocomplete="off">
                                </div>
                            </div><div class="col-md-3">
                                <div class="form-group mb-3">
                                <label for="simpleinput">ESTADO DE LA GESTION</label>
                                    <select class="form-control" name="estatus_gestion">
                                        <option value="">Gestion en espera</option>
                                        <option value="COMPLETA"
                                        @if($lider->estatus_gestion == 'COMPLETA') selected @endif>COMPLETA</option>
                                    </select>
                                </div>
                            </div><div class="col-md-12">
                                <div class="form-group mb-3">
                                <label for="simpleinput">OBSERVACION</label>
                                    <input type="text" name="observacion" value="{{ $lider -> observacion }}" class="form-control" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="javascript: history.go(-1)"  class="btn btn-outline-danger" data-dismiss="modal">Cancelar</a>
                            <button type="submit" class="btn btn-warning">Actualizar</button>
                        </div>

                    </form>
        <!--<img src="{{ asset('images/logo_sin_fondo.png') }}"  style="width:100%; height:60%" />-->
        </div>
    </div>
    </div>
</div>
    <!-- end row -->

    </br>


</div> <!-- container -->

@endsection
@section('jquery')

        <!-- Vendor js -->
        <script src="{{ asset('js/vendor.min.js') }}"></script>


        <!-- App js-->
        <script src="{{ asset('js/app.min.js') }}"></script>

@endsection

