@extends('layouts.app')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Usuarios</a></li>
                    <li class="breadcrumb-item active">Perfil</li>
                </ol>
            </div>
            <h4 class="page-title">Profile</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-lg-4 col-xl-4">
        <div class="card-box text-center">
            <img src="{{asset('images/users/default.png')}}" class="rounded-circle avatar-lg img-thumbnail"
                 alt="profile-image">

            <h4 class="mb-0">{{$usuario->nombre}} {{$usuario->paterno}} {{$usuario->materno}}</h4>
            <p style="text-transform: uppercase" class="text-muted">{{$usuario->getRoleNames()->first()}}</p>

            <a href="javascript: history.go(-1)" type="button" class="btn btn-xs  btn-danger waves-effect mb-2 waves-light" >
                <i class="mdi mdi-page-first"></i> Regresar
            </a>
            <div class="text-left mt-3">
                <h4 class="font-13 text-uppercase">INFORMACION:</h4>
                <p class="text-muted mb-2 font-13"><strong>Nombre Completo :</strong> <span class="ml-2">{{$usuario->nombre}} {{$usuario->paterno}} {{$usuario->materno}}</span></p>

                <p class="text-muted mb-2 font-13"><strong>Celular :</strong><span class="ml-2">{{$usuario->celular}}</span></p>

                <p class="text-muted mb-2 font-13"><strong>Correo :</strong> <span class="ml-2 ">{{$usuario->email}}</span></p>

            </div>
        </div> <!-- end card-box -->

    </div> <!-- end col-->

    <div class="col-lg-8 col-xl-8">
        <div class="card-box">
            <ul class="nav nav-pills navtab-bg nav-justified">
                <li class="nav-item">
                    <a href="#aboutme" data-toggle="tab" aria-expanded="false" class="nav-link active">
                        CAPTURA
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#timeline" data-toggle="tab" aria-expanded="true" class="nav-link">
                        GESTIONES
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link">
                        CONFIGURACION
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                @include('administrador.usuarios.partials.tab_capturas')

                @include('administrador.usuarios.partials.tab_gestiones')
                <!-- end timeline content-->
                @include('administrador.usuarios.partials.tab_config')
                <!-- end settings content-->

            </div> <!-- end tab-content -->
        </div> <!-- end card-box-->

    </div> <!-- end col -->
</div>
<!-- end row-->
@include('alerts.alerts')
@endsection
