@extends('layouts.app')
@section('content')
 <!-- start page title -->
 <div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">TOCADOS</li>
                </ol>
            </div>
            <h4 class="page-title">BUSCADOR</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <form class="search-bar form-inline">
                            <div class="position-relative">
                                <input type="text" name="search" id="search" class="form-control" placeholder="Buscar...">
                                <span class="mdi mdi-magnify"></span>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-right">
                            @can('create_lideres')
                            <button
                                class="btn btn-sm btn-blue waves-effect waves-light"
                                data-toggle="modal"
                                data-target="#modal-lideres">
                                <i class="fas fas fa-id-card-alt mr-1"></i>
                                Nuevo Lider
                            </button>
                            @endcan
                        @can('create_movilizadores')
                            <button
                                class="btn btn-sm btn-blue waves-effect waves-light"
                                data-toggle="modal"
                                data-target="#modal-movilizadores">
                                <i class="fas fas fa-id-card-alt"></i>
                                Nuevo Movilizador
                            </button>
                        @endcan
                        @can('create_tocados')
                            <button
                                class="btn btn-sm btn-blue waves-effect waves-light"
                                data-toggle="modal"
                                data-target="#modal_tocados" >
                                <i class="fas fas fa-id-card-alt"></i>
                                Nuevo Tocado
                            </button>
                        @endcan
                        </div>
                    </div><!-- end col-->
                </div>
                <div class="alert alert-info" role="alert">
                    <span id="row-data"><p style="text-align: left"><h5>Coincidencia de resultado: <p id="total"></p></h5></span>
                </div>
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap table-borderless table-hover mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th>Nombre(s)</th>
                                <th>A. Paterno</th>
                                <th>A. Materno</th>
                                <th>Clave Elector</th>
                                <th>Registro</th>
                                <th>Capturado</th>
                                <th>Fecha de Captura</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
<!-- end row -->
@include('alerts.alerts')
@include('leaders.create-modal')
@include('mobilizers.create-modal')
@include('tocados.create-modal')
@push('scripts')
<script>
    $(document).ready(function() {
        $('.create').select2();
    });
</script>
<script>
    $(document).ready(function() {
        $('.lider').select2();
    });
      $(document).ready(function() {
        $('.select2').select2({
        });
    });
</script>
<script>
    $(document).ready(function(){

        fetch_tocados_data();
        function fetch_tocados_data(query = ''){
            $.ajax({
                url: '{{ route('Sympathizers.searcher_data') }}',
                method: 'GET',
                data: { query:query},
                dataType: 'json',
                success: function(data) {
                    $('tbody').html(data.table_data);
                    $('#total').text(data.total_data);
                }
            });
        }

    $(document).on('keyup', '#search', function(params) {
        var query = $(this).val();
        fetch_tocados_data(query);
    })
    })
</script>
<script type="text/javascript">
$.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
$(document).ready(function () {
$('#seccion').on('change',function(e) {
    var seccion = e.target.value;
    $.ajax({
        url:"{{ route('Distritos.getDistritos') }}",
        type:"POST",
        data: {
            seccion: seccion,
            _token:'{{csrf_token()}}'
        },
    success:function (data) {
        $('#distrito').empty();
        $.each(data.distritos,function(index,distrito){
            $('#distrito').append('<option value="'+distrito.distrito_electoral+'">'+distrito.distrito_electoral+'</option>');
        })
        }
     })
    });
});
</script>
@endpush
@endsection
