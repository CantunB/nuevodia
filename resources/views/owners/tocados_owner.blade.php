
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
                            <li class="breadcrumb-item active">MOVILIZADORES</li>
                        </ol>
                    </div>
                    <h4 class="page-title">MOVILIZADORES</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="card mb-2">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form  action="{{ route('Mobilizers.index') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="date" name="fecha1" id="fecha1" class="form-control" id="inputPassword2" required>
                                </div>
                                <div class="col-md-3">
                                    <input type="date" name="fecha2" id="fecha2" class="form-control" id="inputPassword2" required>
                                </div>
                                <div class="col-md-3">
                                    <select name="lider" class="form-control" data-toggle="select2" id="lider1" required>
                                        <option selected disabled> Selecciona un lider</option>
                                        @foreach($lideres as $lider)
                                            <option value="{{ $lider->getInfo->id }}">{{$lider->getInfo->nombre.' '. $lider->getInfo->paterno .' '. $lider->getInfo->materno}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <button type="SUBMIT" class="btn btn-success waves-effect waves-light mb-2">BUSCAR</button>
                                    <button  type="button" class="btn btn-primary waves-effect waves-light mb-2" data-toggle="modal" data-target="#full-width-modal">NUEVO</button>
                                </div>
                            </div>
                        </form>
                    </div>
                <!--<div class="row">
                    <div class="col-lg-4">
                        <div class="text-lg-right">

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="text-lg-left">
                            <form action="{{ route('PrintMobilizers') }}" >
                                <input type="hidden" id="bfecha" name="fecha" required />
                                <input type="hidden" id="blider" name="lider" required />
                                <button type="submit" target="_blank" class="btn btn-warning waves-effect waves-light">GENERAR PDF</button>
                            </form>
                        </div>
                    </div>
                </div>-->

                </div>
                <!-- end row -->
            </div> <!-- end card-body-->
        </div> <!-- end card-->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if(isset($fecha1) and isset($fecha2))
                            <p>FECHA: {{ $fecha1 }} - {{ $fecha2 }}
                            <form action="{{ route('PrintMobilizers') }}" >
                                <input type="hidden"  name="fecha1" value="{{ $fecha1 }}" />
                                <input type="hidden"  name="fecha2" value="{{ $fecha2 }}" />
                                <input type="hidden"  name="lider" value="{{ $liderselect }}" />
                                <button type="submit" target="_blank" class="btn btn-warning waves-effect waves-light"><i class="mdi mdi-printer"></i>GENERAR PDF</button>
                            </form>
                            <form action="{{ route('mobilizers.export') }}" >
                                <input type="hidden"  name="fecha1" value="{{ $fecha1 }}" />
                                <input type="hidden"  name="fecha2" value="{{ $fecha2 }}" />
                                <input type="hidden"  name="lider" value="{{ $liderselect }}" />
                            </form>
                            <a href="{{ route('mobilizers.export') }}" target="_blank" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-xml"></i>EXCEL</a>
                            </p>
                        @endif
                        <div class="table-responsive">
                            <table id="table" class="table dt-responsive nowrap w-100">
                                <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>LIDER</th>
                                    <th>MOVILIZADOR</th>
                                    <th>CELULAR</th>
                                    <th>CREDENCIAL</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $no = 0; ?>
                                @foreach($movilizadores as $movilizador)
                                    <?php $no = $no + 1; ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td>{{ $movilizador->getInfoLider->nombre .' '. $movilizador->getInfoLider->paterno .' '. $movilizador->getInfoLider->materno}}</td>
                                        <td>{{ $movilizador->getInfo->nombre .' '.$movilizador->getInfo->paterno .' '. $movilizador->getInfo->materno}}</td>
                                        <td>{{ $movilizador->getInfo->celular }}</td>
                                        <td>{{ $movilizador->getInfo->clave_elector}}</td>
                                        <td>
                                            <a href="{{ route('Sympathizers.show',$movilizador->getInfo->id) }}" class="btn btn-success waves-effect waves-light"><i class="fe-eye"></i></button></a>
                                            <a href="{{ route('Mobilizers.edit',$movilizador->getInfo->id) }}" class="btn btn-warning waves-effect waves-light"><i class="fe-edit"></i></button></a>
                                            <a href="{{ route('Mobilizers.destroy', $movilizador->getInfo->id) }}" class="btn btn-danger waves-effect waves-light"
                                               onclick="event.preventDefault(); document.getElementById('delete{{$movilizador->getInfo->id}}').submit();"><i class="fe-trash-2"></i>
                                            </a>
                                            <form id="delete{{$movilizador->getInfo->id}}" action="{{ route('Mobilizers.destroy',$movilizador->getInfo->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- <h4 class="header-title">VEHICULOS</h4>-->

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div>
        </div>
    </div> <!-- container -->
    @include('mobilizers.create-modal')
    @include('alerts.alerts')
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#table').DataTable({
                    language: {
                        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                    },
                });
            } );
        </script>
        <script>
            $('#form').parsley();
        </script>
        <script>
            $(document).ready(function()
            {
                $('select#lider').on('change',function(){
                    var v_lider = $(this).val();
                    var v_fecha = $('#fecha').val();
                    $('#blider').val(v_lider);
                    $('#bfecha').val(v_fecha);
                });
                $('#fecha').on('change',function()
                {
                    var v_fecha = $(this).val();
                    $('#bfecha').val(v_fecha);
                    var v_lider = $('#lider option:selected').val();
                    $('#blider').val(v_lider);
                });
            });
        </script>
        <script>
            $('#form').parsley();
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



