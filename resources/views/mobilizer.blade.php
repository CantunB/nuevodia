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
                        <li class="breadcrumb-item active">MOVILIZADOR</li>
                    </ol>
                </div>
                <h4 class="page-title">MOVILIZADOR</h4>
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
        <form method="POST" action="{{ route('Mobilizers.update', $movilizador -> id) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id  }}" />
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="example-select">DISTRITO</label>
                                    <select class="form-control" name="distrito" id="example-select">
                                        <option value="{{ $movilizador->distrito }}">{{ $movilizador->distrito }}</option>
                                    @foreach($distritos as $distrito)
                                        <option value="{{ $distrito->distrito }}"

                                        @if($distrito -> distrito == $movilizador -> distrito)
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
                                    <input type="text" name="seccion" value="{{ $movilizador->seccion }}" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="example-select">LIDER</label>
                                    <select name="lider" class="lider form-control" id="lider" require>

                                        <option selected="">SELECCIONA UN LIDER</option>
                                        @foreach($lideres as $lider)
                                        <option value="{{ $lider -> simpatizantes -> clave_elector }}"
                                        @if($lider -> simpatizantes -> clave_elector == $liderselect->lider)
                                             selected
                                        @endif
                                            >{{ $lider->simpatizantes->nombre }} {{ $lider->simpatizantes->paterno }} {{ $lider->simpatizantes->materno }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="simpleinput">CLAVE ELECTOR</label>
                                    <input type="text" name="clave_elector" value="{{ $movilizador->clave_elector }}" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="simpleinput">NOMBRE</label>
                                    <input type="text" name="nombre" value="{{ $movilizador->nombre }}" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                <label for="simpleinput">PATERNO</label>
                                    <input type="text" name="paterno" value="{{ $movilizador->paterno }}" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                <label for="simpleinput">MATERNO</label>
                                    <input type="text" name="materno" value="{{ $movilizador->materno }}" class="form-control" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="simpleinput">CALLE</label>
                                    <input type="text" name="calle" value="{{ $movilizador->calle }}" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                <label for="simpleinput">CRUZAMIENTO</label>
                                    <input type="text" name="cruzamiento" value="{{ $movilizador->cruzamiento }}" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                <label for="simpleinput">NO. EXT</label>
                                    <input type="text" name="no_ext" value="{{ $movilizador->no_ext }}" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                <label for="simpleinput">NO. INT</label>
                                    <input type="text" name="no_int" value="{{ $movilizador->no_int }}" class="form-control" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="simpleinput">COLONIA</label>
                                    <input type="text" name="colonia" value="{{ $movilizador->colonia }}" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                <label for="simpleinput">CODIGO POSTAL</label>
                                    <input type="text" name="cp" value="{{ $movilizador->cp}}" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                <label for="simpleinput">FECHA DE NACIMIENTO</label>
                                    <input type="text" name="fe_nacimiento" value="{{ $movilizador->fe_nacimiento }}" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                <label for="simpleinput">CELULAR</label>
                                    <input type="text" name="celular" value="{{ $movilizador->celular }}" class="form-control" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="simpleinput">CORREO ELECTRONICO</label>
                                    <input type="email" name="email" value="{{ $movilizador->email }}" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                <label for="simpleinput">FACEBOOK</label>
                                    <input type="text" name="facebook" value="{{ $movilizador->facebook }}" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <input type="hidden" name="foto" class="form-control-file">
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                <label for="simpleinput">OBSERVACION</label>
                                    <input type="text" name="observacion" value="{{ $movilizador->observacion }}" class="form-control" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('Mobilizers.index') }}" class="btn btn-light" data-dismiss="modal">Close</a>
                            <button type="submit" class="btn btn-primary">REGISTRAR</button>
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
@push('scripts')
    <script>
        $('#form').parsley();
    </script>
    <script>
        $(document).ready(function() {
            $('.lider').select2();
        });
    </script>
@endpush

