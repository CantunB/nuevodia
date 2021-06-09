@extends('layouts.app')
@section('content')
    <label>Usuario {{$usuarios->nombre}}</label>
    <form method="POST" action="{{route('usuarios.update',$usuarios->id)}}">
        @csrf
        @method('PUT')
        <select name="roles" id="roles">
            @foreach($roles as $key => $rol)
                <option value="{{$rol->name}}">{{$rol->name}}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-submit">Enviar</button>
    </form>

@endsection
