@extends('layouts.app')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">DISTRITOS</li>
                    </ol>
                </div>
                <h4 class="page-title">LISTA DE DISTRITOS</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-lg-8">
                     <!--   <form class="form-inline">
                            <div class="form-group">
                                <label for="inputPassword2" class="sr-only">Search</label>
                                <input type="search" class="form-control" id="inputPassword2" placeholder="Search...">
                            </div>
                            <div class="form-group mx-sm-3">
                                <label for="status-select" class="mr-2">Sort By</label>
                                <select class="custom-select" id="status-select">
                                    <option selected="">All</option>
                                    <option value="1">Name</option>
                                    <option value="2">Post</option>
                                    <option value="3">Followers</option>
                                    <option value="4">Followings</option>
                                </select>
                            </div>
                        </form> -->
                    </div>
                    <div class="col-lg-4">
                        <div class="text-lg-right mt-3 mt-lg-0">
                            <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#create-modal"><i class="mdi mdi-plus-circle mr-1"></i>Nuevo</button>
                        </div>
                    </div><!-- end col-->
                </div> <!-- end row -->
            </div> <!-- end card-box -->
        </div><!-- end col-->
    </div>
    <!-- end row -->
    <div class="row">
        @foreach($distritos as $key => $distrito)
            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card-box">
                    <div class="card-widgets">
                        <a href="javascript: void(0);" class="active-icon"><i class="mdi mdi-map-check"></i></a>
                        <a href="" class="active-icon icon-dual-success"><i class="mdi mdi-download"></i></a>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle " style="background-color:{{$colores[$key]}}">
                                <i class="font-22 avatar-title text-white">{{$distrito->distrito}}</i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-right">
                                <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$distrito->contador($distrito->distrito)}}</span></h3>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->

        @endforeach


            </div>
        <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <!--  <button style="margin: 4px" type="button" class="btn btn-sm btn-info waves-effect waves-light float-right"  data-toggle="modal" data-target="#full-width-modal">
                                  <i class="mdi mdi-plus"></i>Actualizar Lideres
                              </button>
                              <button style="margin: 4px" type="button" class="btn btn-sm btn-info waves-effect waves-light float-right"  data-toggle="modal" data-target="#full-width-modal">
                                  <i class="mdi mdi-plus"></i>Actualizar Movilizadores
                              </button> -->
                            <div class="table-responsive">
                                <table id="table" class="table table-sm dt-responsive nowrap w-100 data-table">
                                    <thead>
                                        <tr>
                                            <th>DISTRITO</th>
                                            <th>NO.SECCIONES</th>
                                            <th>SECCIONES ELECTORALES</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
@include('distritos.create-modal')
@include('alerts.alerts')
@push('scripts')
<script>
    $(document).ready(function() {
        $('#table').DataTable({
            processing: true,
            serverSide: true,
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            },
            ajax: '{!! route('Distritos.index') !!}',
            columns: [
                {data: 'distrito', name:'distrito', class: 'text-center'},
                {data: 'contador', name:'contador', class: 'text-center'},
                {data: 'secciones', name:'secciones'},
            ],
        });
    } );
</script>
<script>
    $('#form').parsley();
</script>
<script>
    function btonSeccion(id) {
        alert(id);
       /* $.ajax({
            url:"{!! url('Administrador/sympathizers/getInfoLider') !!}",
            data: {
                'id': id,
                '_token': "{{ csrf_token() }}"
            },
            type: "POST",
            success: function (response){
                $("#lider_name").html(response.lider_nombre);
                $("#lider_user").html(response.lider_user);
                $("#lider_create").html(response.lider_create);
                $("#lider_movilizadores").html(response.lider_movilizadores);
                $("#lider_btndelete").html(response.lider_btndelete);
            }
        });*/
    }
</script>
@endpush
@endsection

