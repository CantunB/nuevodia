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
                        <form method="POST" action="{{ route('Tocados.update', $simpatizante->getInfo->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="user_id">Usuario</label>
                                        <select class="form-control" name="user_id" id="user_id">
                                            @foreach($usuarios as $usuario)
                                                <option value="{{ $usuario->id }}"
                                                    @if($usuario -> id == $simpatizante -> user_id)
                                                        selected
                                                    @endif
                                                >{{ $usuario->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="example-select">MOVILIZADORES</label>
                                        <select name="movilizador"  class="js-example-basic-single form-control" data-toggle="select2" id="movilizador" require>
                                            <option selected="0">SELECCIONA UN MOVILIZADOR</option>
                                            @foreach($movilizadores as $movilizador)
                                                <option value="{{ $movilizador->getInfo->id }}"

                                                        @if($movilizador -> getInfo -> id == $simpatizante -> mobilizer_id)
                                                        selected
                                                    @endif

                                                >{{ $movilizador->getInfo->nombre }} {{ $movilizador->getInfo->paterno }} {{ $movilizador->getInfo->materno }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>{{$simpatizante->getInfo->nombre }} {{$simpatizante->getInfo->paterno }} {{$simpatizante->getInfo->materno }}</label>
                                <input name="tocado_id" class="form-control" value="{{$simpatizante->getInfo->id}}">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="javascript: history.go(-1)" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</a>
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
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endpush
@endsection
@section('jquery')
    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>
    <!-- Vendor js -->
    <script src="{{ asset('js/vendor.min.js') }}"></script>

    <!-- third party js -->
    <script src="{{ asset('libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('libs/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="{{ asset('js/pages/datatables.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('js/app.min.js') }}"></script>
@endsection


