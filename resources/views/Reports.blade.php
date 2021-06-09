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
                        <li class="breadcrumb-item active">REPORTES</li>
                    </ol>
                </div>
                <h4 class="page-title">REPORTES</h4>
            </div>
        </div>
    </div>     
    <!-- end page title --> 
    <div class="card mb-2">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8">
                    <form class="form-inline">
                
                        <div class="form-group mx-sm-3">
                            <label for="inputPassword2" class="sr-only">FECHA:</label>
                            <input type="date" name="fecha" class="form-control" id="inputPassword2" placeholder="Search...">
                        </div>
                        <div class="form-group mx-sm-3">
                            <label for="status-select" class="mr-2">FILTRAR POR:</label>
                            <select name="mostrar" class="custom-select" id="status-select">
                                <option selected="TODOS">TODOS</option>
                                <option value="LIDERES">LIDERES</option>
                                <option value="MOVILIZADORES">MOVILIZADORES</option>
                                <option value="TOCADOS">TOCADOS</option>
                            </select>
                        </div>
                        <div class="form-group mx-sm-3">
                            <label for="status-select" class="mr-2">LIDER:</label>
                            <select name="lider" class="custom-select" id="status-select">
                                <option selected="TODOS">TODOS</option>
                                <option value="LIDERES">LIDERES</option>
                                <option value="MOVILIZADORES">MOVILIZADORES</option>
                                <option value="TOCADOS">TOCADOS</option>
                            </select>
                        </div>
                        <div class="form-group mx-sm-3">
                            <label for="status-select" class="mr-2">MOVILIZADOR:</label>
                            <select name="lider" class="custom-select" id="status-select">
                                <option selected="TODOS">TODOS</option>
                                <option value="LIDERES">LIDERES</option>
                                <option value="MOVILIZADORES">MOVILIZADORES</option>
                                <option value="TOCADOS">TOCADOS</option>
                            </select>
                        </div>
                        <div class="text-lg-right mt-3 mt-lg-0">
                        <button type="SUBMIT" class="btn btn-success waves-effect waves-light mr-1">BUSCAR</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">

                </div><!-- end col-->
            </div> <!-- end row -->
        </div> <!-- end card-body-->
    </div> <!-- end card-->

    <div class="row">
        <div class="col-md-12">
        <div class="card">
                <div class="card-body">
                   <!-- <h4 class="header-title">VEHICULOS</h4>-->             
                    <table id="scroll-horizontal-datatable" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>                                
                                <th>NOMBRE</th>
                                <th>CELULAR</th>
                                <th>CREDENCIAL</th>
                            </tr>
                        </thead>
                        @if(isset($lista))
                        <tbody>
                        @foreach($lista as $simpatizante)
                            <tr>                                 
                                <td>{{ $simpatizante->simpatizantes->nombre }} {{ $simpatizante->simpatizantes->paterno }} {{ $simpatizante->simpatizantes->materno }}</td>
                                <td>{{ $simpatizante->simpatizantes->celular }}</td> 
                                <td>{{ $simpatizante->simpatizantes->clave_elector}}</td>
                            </tr>
                        @endforeach                        
                        </tbody>
                        @endif
                    </table>

                </div> <!-- end card body-->
            </div> <!-- end card -->
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

