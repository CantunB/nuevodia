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
                        <li class="breadcrumb-item active">TOCADOS</li>
                    </ol>
                </div>
                <h4 class="page-title">TOCADOS</h4>
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
        <form method="POST" action="{{ route('Sympathizers.update', $simpatizante -> id) }}">
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
                                        @if($simpatizante->distrito == $distrito->distrito)
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
                                    <input type="text" name="seccion" value="{{ $simpatizante -> seccion }}" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="example-select">MOVILIZADORES</label>
                                    <select name="movilizador" class="movilizador form-control" id="movilizador" require>
                                        <option selected="0">SELECCIONA UN MOVILIZADOR</option>
                                        @foreach($movilizadores as $movilizador)
                                            <option value="{{ $movilizador->getInfo->id }}"

                                            @if($movilizador -> getInfo -> id == $movilizadorselect -> mobilizer_id)
                                             selected
                                            @endif

                                            >{{ $movilizador->getInfo->nombre }} {{ $movilizador->getInfo->paterno }} {{ $movilizador->getInfo->materno }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="simpleinput">CLAVE ELECTOR</label>
                                    <input type="text" name="clave_elector" value="{{ $simpatizante -> clave_elector }}" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="simpleinput">NOMBRE</label>
                                    <input type="text" name="nombre" value="{{ $simpatizante -> nombre }}" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                <label for="simpleinput">PATERNO</label>
                                    <input type="text" name="paterno" value="{{ $simpatizante -> paterno }}" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                <label for="simpleinput">MATERNO</label>
                                    <input type="text" name="materno" value="{{ $simpatizante -> materno }}" class="form-control" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="simpleinput">CALLE</label>
                                    <input type="text" name="calle" value="{{ $simpatizante -> calle }}" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                <label for="simpleinput">CRUZAMIENTO</label>
                                    <input type="text" name="cruzamiento" value="{{ $simpatizante -> cruzamiento }}" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                <label for="simpleinput">NO. EXT</label>
                                    <input type="text" name="no_ext" value="{{ $simpatizante -> no_ext }}" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                <label for="simpleinput">NO. INT</label>
                                    <input type="text" name="no_int" value="{{ $simpatizante -> no_int }}" class="form-control" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="simpleinput">COLONIA</label>
                                    <input type="text" name="colonia" value="{{ $simpatizante -> colonia }}" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                <label for="simpleinput">CODIGO POSTAL</label>
                                    <input type="text" name="cp" value="{{ $simpatizante -> cp }}" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                <label for="simpleinput">FECHA DE NACIMIENTO</label>
                                    <input type="text" name="fe_nacimiento" value="{{ $simpatizante -> fe_nacimiento }}" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                <label for="simpleinput">CELULAR</label>
                                    <input type="text" name="celular" value="{{ $simpatizante -> celular }}" class="form-control" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="simpleinput">CORREO ELECTRONICO</label>
                                    <input type="email" name="email" value="{{ $simpatizante -> email }}" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                <label for="simpleinput">FACEBOOK</label>
                                    <input type="text" name="facebook" value="{{ $simpatizante -> facebook }}" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                <label for="simpleinput">Gestion</label>
                                    <input type="text" name="gestion" value="{{ $simpatizante -> gestion }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                <label for="simpleinput">Estatus Gestion</label>
                                    <select name="estatus_gestion" class="form-control">
                                        <option value="">Gestion en espera</option>
                                        <option value="COMPLETA"
                                        @if($simpatizante->estus_gestion === 'COMPLETA')
                                                selected
                                        @endif
                                        >COMPLETA</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="simpleinput">OBSERVACION</label>
                                    <input type="text" name="observacion" value="{{ $simpatizante -> observacion }}" class="form-control" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="javascript: history.go(-1)" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</a>
                            <button type="submit" class="btn btn-warning">Actualizar</button>
                        </div>

                    </form>
        </div>
    </div>
    </div>
</div>
</div> <!-- container -->
@endsection
@push('scripts')
    <script>
        $('#form').parsley();
    </script>
    <script>
        $(document).ready(function() {
            $('.movilizador').select2();
        });
    </script>
@endpush
