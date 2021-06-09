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
                            <li class="breadcrumb-item active">PROPIETARIOS</li>
                        </ol>
                    </div>
                    <h4 class="page-title"> EDITAR PROPIETARIO</h4>
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
                        <form method="POST" action="{{ route('Owners.update', $propietario -> id) }}">
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

                                                        @if($distrito -> distrito == $propietario -> distrito)
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
                                        <input type="text" name="seccion" value="{{ $propietario -> seccion }}" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-4">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">CLAVE ELECTOR</label>
                                        <input type="text" name="clave_elector" value="{{ $propietario -> clave_elector }}" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">NOMBRE</label>
                                        <input type="text" name="nombre" value="{{ $propietario -> nombre }}" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">PATERNO</label>
                                        <input type="text" name="paterno" value="{{ $propietario -> paterno }}" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">MATERNO</label>
                                        <input type="text" name="materno" value="{{ $propietario -> materno }}" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">CALLE</label>
                                        <input type="text" name="calle" value="{{ $propietario -> calle }}" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">CRUZAMIENTO</label>
                                        <input type="text" name="cruzamiento" value="{{ $propietario -> cruzamiento }}" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">NO. EXT</label>
                                        <input type="text" name="no_ext" value="{{ $propietario -> no_ext }}" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">NO. INT</label>
                                        <input type="text" name="no_int" value="{{ $propietario -> no_int }}" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">COLONIA</label>
                                        <input type="text" name="colonia" value="{{ $propietario -> colonia }}" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">CODIGO POSTAL</label>
                                        <input type="text" name="cp" value="{{ $propietario -> cp }}" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">FECHA DE NACIMIENTO</label>
                                        <input type="text" name="fe_nacimiento" value="{{ $propietario -> fe_nacimiento }}" class="form-control" autocomplete="off" placeholder="año/mes/dia">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">CELULAR</label>
                                        <input type="text" name="celular" value="{{ $propietario -> celular }}" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">CORREO ELECTRONICO</label>
                                        <input type="email" name="email" value="{{ $propietario -> email }}" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">FACEBOOK</label>
                                        <input type="text" name="facebook" value="{{ $propietario ->  facebook }}" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">OBSERVACION</label>
                                        <input type="text" name="observacion" value="{{ $propietario -> observacion }}" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a onClick='history.go(-1);' class="btn btn-light" data-dismiss="modal">Regresar</a>
                                <button type="submit" class="btn btn-primary">Actualizar</button>
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

