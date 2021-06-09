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
                <h4 class="page-title"></h4>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-12">

            <div class="card">
                <div class="col-lg text-lg-right">
                    <a  href="javascript: history.go(-1)" style="margin: 4px;" type="button" class="btn btn-sm btn-outline-danger waves-effect waves-light float-right"  >
                        <i class="mdi mdi-page-first"></i> Regresar
                    </a>
                </div><!-- end col-->
                <div class="card-body">
                    <div class="container">
                        <div class="card">
                            <div class="card-body" style="background-color: #F5F5F5	">
                                <h5 class="card-title">
                                    <h3>LIDER <span class="badge badge-blue">INFORMACION</span></h3>
                                </h5>
                                <table class="table">
                                    <tr>
                                        <th colspan="2">NOMBRE:</th>
                                        <td>{{$leader->getInfo->nombre}}</td><td>{{$leader->getInfo->paterno}} </td><td>{{$leader->getInfo->materno}}</td>
                                        <th colspan="2">CLAVE ELECTORAL:</th>
                                        <td>{{$leader->getInfo->clave_elector}}</td>
                                    </tr>
                                    <tr><th colspan="4"><h5 style="color: #1E90FF">INFORMACION DE UBICACION DEL CONTACTO</h5></th></tr>
                                    <tr>
                                        <th colspan="1">CALLE:</th>
                                        <td>{{$leader->getInfo->calle }}</td>
                                        <th colspan="1">CRUZAMIENTO:</th>
                                        <td>{{$leader->getInfo->cruzamiento }}</td>
                                        <th colspan="1">COLONIA:</th>
                                        <td>{{$leader->getInfo->colonia }}</td>
                                    </tr>
                                    <tr>
                                        <th >No. EXT:</th>
                                        <td>{{$leader->getInfo->no_ext }}</td>
                                        <th>No. INT:</th>
                                        <td>{{$leader->getInfo->no_int }}</td>
                                    </tr>
                                    <tr>
                                        <th>DISTRITO:</th>
                                        <td>{{$leader->getInfo->distrito }}</td>
                                        <th>SECCION:</th>
                                        <td>{{$leader->getInfo->seccion }}</td>
                                        <th>CP:</th>
                                        <td>{{$leader->getInfo->cp }}</td>
                                    </tr>
                                    <tr><th colspan="4"><h5 style="color: #1E90FF">INFORMACION DE CONTACTO</h5></th></tr>
                                    <tr>
                                        <th>CELULAR:</th>
                                        <td>{{$leader->getInfo->celular }}</td>
                                        <th>CORREO:</th>
                                        <td>{{$leader->getInfo->email }}</td>
                                        <th>FACEBOOK:</th>
                                        <td>{{$leader->getInfo->facebook }}</td>
                                        <th>FECHA NACIMIENTO:</th>
                                        <td>{{$leader->getInfo->fe_nacimiento }}</td>
                                    </tr>
                                    <tr><th colspan="4"><h5 style="color: #1E90FF">INFORMACION DE CAPTURA</h5></th></tr>
                                    <tr>
                                        <th colspan="2">FECHA DE CAPTURA:</th>
                                        <td>{{$leader->getInfo->created_at->toFormattedDateString()}}</td>
                                        <th colspan="1">CAPTURO:</th>
                                        <td>{{$leader->getUser->nombre }}</td>
                                        <th>OBSERVACION:</th>
                                        <td>{{$leader->getInfo->observacion }}</td>
                                    </tr>
                                </table>
                                <div class="col-md-6 offset-md-4">
                                  <!-- <button type="submit" class="btn btn-success waves-effect waves-light">
                                        Movilizadores<span class="btn-label-right"><i class="mdi mdi-check-all"></i></span>
                                    </button> -->
                                    <a href="{{ route('single_lider_info.pdf', $leader->id) }}" target="_blank" 
                                    class="btn btn-danger waves-effect waves-light">
                                     Imprimir<span class="btn-label-right"><i class="mdi mdi-file-pdf"></i></span></a>
                                     
                                    <a href="{{route('Mobilizers.show', $leader->leader_id)}}" class="btn btn-success waves-effect waves-light">
                                        Movilizadores<span class="btn-label-right"><i class="mdi mdi-human-male-male"></i></span>
                                    </a>
                                    <a href="javascript: history.go(-1)"class="btn btn-secondary waves-effect waves-light">
                                        Regresar<span class="btn-label-right"><i class="mdi mdi-close-outline"></i></span>
                                    </a>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
