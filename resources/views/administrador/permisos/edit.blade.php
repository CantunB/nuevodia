@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">PERMISOS</a></li>
                        <li class="breadcrumb-item active">ASIGNAR</li>
                    </ol>
                </div>
                <h4 class="page-title"></h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h2 style="text-transform:uppercase;" class="header-title"><strong>Asignar permisos para {{$user->nombre}} {{$user->paterno}} {{$user->materno}}</strong></h2>
                <p class="sub-header">

                <div class="container">
                    <form action="{{route('permisos.update', $user->id)}}" method="POST" class="form-group">
                        @csrf
                        @method('PUT')
                        <div class="row icons-list-demo">
                            @foreach ($permisos as $value )
                                <div class="col-sm-6 col-md-4 col-lg-3 icon-dual-dark">
                                        <input type="checkbox" id="chk{{ $value->id }}" name="permission[]"
                                        value="{{ $value->name }}" {{ $user->permissions->pluck('id')->contains($value->id) ? 'checked' : '' }}>
                                        <label for="chk{{$value->id }}">{{ $value->id }}-{{ $value->name }}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success waves-effect waves-light">
                                Actualizar<span class="btn-label-right"><i class="mdi mdi-check-all"></i></span>
                            </button>
                            <a  href="{{ url()->previous() }}" class="btn btn-danger waves-effect waves-light">
                                Cancelar<span class="btn-label-right"><i class="mdi mdi-close-outline"></i></span>
                            </a>
                        </div>
                    </form>
                </div>
            </div> <!-- end card-box -->
        </div> <!-- end col-->
    </div>
@endsection
