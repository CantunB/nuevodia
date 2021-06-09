@extends('layouts.app')
@section('content')
<style>
    .dataTables_filter {
       width: 70%;
       float: right;
       text-align: right;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">TOCADOS</li>
                    </ol>
                </div>
                <h4 class="page-title"></h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <a href="javascript: history.go(-1)" style="margin: 4px" type="button" class="btn btn-sm btn-outline-danger waves-effect waves-light float-right"  >
                        <i class="mdi mdi-page-first"></i> Regresar
                    </a>
<<<<<<< HEAD
                    <button style="margin: 4px" type="button" class="btn btn-sm btn-blue waves-effect waves-light float-right" data-toggle="modal" data-target="#modal_tocados">
                        <i class="mdi mdi-plus-circle"></i> Nuevo Tocado
                    </button>
=======
                    @can('create_tocados')
                        <button style="margin: 4px" type="button" class="btn btn-sm btn-blue waves-effect waves-light float-right" data-toggle="modal" data-target="#modal_tocados">
                            <i class="mdi mdi-plus-circle"></i> Nuevo Tocado
                        </button>
                    @endcan

>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                    <div class="container">
                        <h4>
                            <a href="{{route('Tocados.index')}}">LISTA DE TOCADOS</a>
                        </h4>
                        <hr>
                        <div class="table-responsive">
                            <table id="tocados_table" class="table table-bordered mdl-data-table" style="width:100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NOMBRE</th>
                                    <th>CAPTURADO</th>
                                    <th>&nbsp;</th>
                                </tr>
                                </thead>
                                <tfoot></tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card-box">
                <div class="media mb-4">
                    <div class="media-body">
                        <h4 id="getNombre" class="mt-0 mb-1"></h4>
                        <p id="getClave" class="text-muted"></p>
                        LIDER RESPONSABLE: <p id="getLider" class="text-muted"></p>

                        MOVILIZADOR RESPONSABLE: <p id="getMovilizador" class="text-muted"></p>

                        TELEFONO: <p id="getCelular" class="text-muted"></p>
               <!--         <p class="text-muted"><i class="mdi mdi-office-building"></i> Vine Corporation</p> -->
                        CAPTURISTA: <p id="capturista" class="text-muted"></p>
                    </div>
                </div>
                <h5 class="mb-3 mt-4 text-uppercase bg-light p-2"><i class="mdi mdi-account-circle mr-1"></i> Información Personal</h5>
                    <div>
                        <h4 class="font-13 text-muted text-uppercase mb-1">Fecha Nacimiento:</h4>
                        <p id="getfe_nacimiento" class="mb-0"></p>

                        <h4 class="font-13 text-muted text-uppercase mb-1">Direccion :</h4>
                        <p id="getDireccion" class="mb-0"></p>

                        <h4 class="font-13 text-muted text-uppercase mb-1">Distrito :</h4>
                        <p id="getDistrito" class="mb-0"></p>

                        <h4 class="font-13 text-muted text-uppercase mb-1">Seccion :</h4>
                        <p id="getSeccion" class="mb-0"></p>

                        <h4 class="font-13 text-muted text-uppercase mb-1">Gestion :</h4>
                        <p id="getGestion" class="mb-0"></p>

                        <h4 class="font-13 text-muted text-uppercase mb-1">Estatus de la gestion :</h4>
                        <p id="getEstatus" class="mb-0"></p>

                        <h4 class="font-13 text-muted text-uppercase mb-1">Observacion :</h4>
                        <p id="getObservacion" class="mb-0"></p>
                    </div>
            </div> <!-- end card-box-->
        </div>
    </div>
</div>


<div class="modal fade" id="EditModalTocado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Actualizar informacion del Tocado</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" id="EditModalTocadoForm">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group mb-3">
                                    <label for="Edit_Distrito">DISTRITO</label>
                                    <select class="form-control" name="distrito" id="Edit_Distrito" required>
                                    <option selected value="" disabled>Selecciona un distrito</option>
                                        @foreach($distritos as $distrito)
                                            <option value="{{ $distrito->distrito }}"
                                            >{{ $distrito->distrito }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group mb-3">
                                    <label for="Edit_Seccion">SECCION</label>
                                    <input type="text" name="seccion" id="Edit_Seccion" class="form-control" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                            @if(Auth::user()->hasRole('Super Admin'))
                                <div class="form-group mb-3">
                                    <label for="Edit_Capturista">CAPTURÓ</label>
                                    <select class="form-control" required name="user_id" id="Edit_CapturistaId">
                                        <option selected value="" disabled>Selecciona un usuario</option>
                                        @foreach($usuarios as $usuario)
                                           <option value="{{$usuario->id}}">{{$usuario->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @else
                            <div class="form-group mb-3">
                                <label for="example-select">CAPTURÓ</label>
                                <input type="hidden" id="Edit_CapturistaId"name="user_id" value="" />
                                <input style="background-color: #D5D5D5" id="Edit_CapturistaNombre" type="text" class="form-control" autocomplete="off" required readonly/>
                            </div>
                            @endif
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="Edit_Lider">MOVILIZADOR</label>
                                    <select class="form-control" required name="mobilizer_id" id="Edit_Movilizador">
                                        <option selected value="" disabled>Selecciona un movilizador</option>
                                        @foreach($movilizadores as $movilizador)
                                        {{ $movilizador }}
                                        <option value="{{$movilizador->getInfo->id}}">{{$movilizador->getInfo->nombre}} {{$movilizador->getInfo->paterno}} {{$movilizador->getInfo->materno}}</option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="Edit_Clave">CLAVE ELECTOR</label>
                                    <input onkeyup="mayus(this);" required type="text" name="clave_elector"  minlength="18" maxlength="18"  id="Edit_Clave" class="form-control  @error('clave_elector') is-invalid @enderror" autocomplete="off">
                                    @error('clave_elector')
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="Edit_Nombre">NOMBRE</label>
                                    <input  onkeyup="mayus(this);" minlength="2"  type="text" name="nombre" id="Edit_Nombre" class="form-control" autocomplete="off">
                                    <input required type="hidden" id="Edit_ID" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="Edit_Paterno">PATERNO</label>
                                    <input  onkeyup="mayus(this);"  type="text"  minlength="2" name="paterno" id="Edit_Paterno" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="Edit_Materno">MATERNO</label>
                                    <input  onkeyup="mayus(this);"  type="text" minlength="2" name="materno" id="Edit_Materno" class="form-control" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group mb-3">
                                    <label for="Edit_Calle">CALLE</label>
                                    <input onkeyup="mayus(this);"   type="text" name="calle" id="Edit_Calle" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group mb-3">
                                    <label for="Edit_Cruzamiento">CRUZAMIENTO</label>
                                    <input  onkeyup="mayus(this);"  type="text" name="cruzamiento" id="Edit_Cruzamiento" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group mb-3">
                                    <label for="Edit_NoExt">NO.EXT</label>
                                    <input onkeyup="mayus(this);"  type="text" name="no_ext" id="Edit_NoExt" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group mb-3">
                                    <label for="Edit_NoInt">NO.INT</label>
                                    <input  onkeyup="mayus(this);"  type="text" name="no_int" id="Edit_NoInt" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group mb-3">
                                    <label for="Edit_Colonia">COLONIA</label>
                                    <input  onkeyup="mayus(this);"  type="text" name="colonia" id="Edit_Colonia" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group mb-3">
                                    <label for="Edit_CP">C.P.</label>
                                    <input type="number" name="cp" id="Edit_CP" class="form-control" autocomplete="off" minlength="5" maxlength="5">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group mb-3">
                                    <label for="Edit_FeNa">FECHA DE NACIMIENTO</label>
                                    <input type="text" name="fe_nacimiento" id="Edit_FeNa" class="form-control" autocomplete="off" placeholder="año/mes/dia">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="Edit_Celular">CELULAR</label>
                                    <input type="tel" minlength="10" maxlength="10" name="celular" id="Edit_Celular" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="Edit_Gestion">GESTION</label>
                                    <input  onkeyup="mayus(this);"  type="text" name="gestion" id="Edit_Gestion" class="form-control" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="Edit_Estatus">ESTATUS DE LA GESTION</label>
                                    <select class="form-control" name="estatus_gestion" id="Edit_Estatus" required>
                                        <option selected value="" disabled>Selecciona una opcion</option>
                                        <option value="SIN GESTION">SIN GESTION</option>
                                        <option value="POR GESTIONAR">POR GESTIONAR</option>
                                        <option value="COMPLETA"> COMPLETA</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">


                          <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="Edit_Observacion">OBSERVACION</label>
                                    <textarea  onkeyup="mayus(this);" type="text" name="observacion" id="Edit_Observacion" class="form-control" autocomplete="off"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="col-md-6 offset-md-6">
                                <button  type="button" class="btn btn-soft-secondary waves-effect waves-light" data-dismiss="modal">
                                    CERRAR
                                    <span class="btn-label-right">
                                        <i class="mdi mdi-backspace"></i>
                                    </span>
                                </button>
                                <button type="submit" class="btn btn-blue waves-effect waves-ligth">
                                    Actualizar
                                    <span class="btn-label-right">
                                        <i class="mdi mdi-account-check"></i>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>



@include('alerts.alerts')
@include('tocados.create-modal')
@push('scripts')
<script>
    $(document).ready(function() {
        $('#create_movilizer').select2({
        });
    });
    $(document).ready(function() {
        $('.select2').select2({
        });
    });

</script>
<script>
    function mayus(e) {
        e.value = e.value.toUpperCase();
    }
</script>
<script>
    $('#form').parsley();
</script>
<script>
    $(document).ready(function(){
         $('#tocados_table').DataTable({
             'processing': true,
            'serverSide': true,
            //"searching": false,
             'language': {
                 "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
             },
             'ajax':
             {
                url:'{{ route('Tocados.index') }}',
             },
             dom: 'Bfrtip',
             buttons: [
                     {
                         'extend': 'excel',
                         'titleAttr': 'Exportar a excel',
                         'className':'btn btn-success',
                         'text':'<i class="fas fa-file-excel"></i>',
                         'title': 'LISTA DE TOCADOS',
                         exportOptions: {
                             columns: [0,7,1,6,5,4,2],
                         }
                     },
                     {
                         'extend': 'pdf',
                         'titleAttr': 'Generar PDF',
                         'className':'btn btn-danger',
                         'text':'<i class="fas fa-file-pdf"></i>',
                         'orientation': 'landscape',
                         'pageSize': 'LEGAL',
                         'title': 'LISTA DE TOCADOS',
                         exportOptions: {
                             columns: [0,7,1,6,5,4,2],
                         }
                     },
                     {
                         'extend': 'print',
                         'className':'btn btn-dark',
                         'titleAttr': 'Realizar Impresion',
                         'text':'<i class="fas fa-print"></i>',
                         'title': 'LISTA DE TOCADOS',
                         exportOptions: {
                             columns: [0,7,1,6,5,4,2],
                         }
                     },
                     {
                         'extend': 'print',
                         'className':'btn btn-info',
                         'titleAttr': 'Realizar Impresion',
                         'text':'<i class="far fa-address-book"></i>',
                         'title': 'LISTA DE TOCADOS',
                         exportOptions: {
                             columns: [0,1,6,5,8,9,2],
                         },
                         'customize': function(win)
                         {
                            var last = null;
                            var current = null;
                            var bod = [];

                            var css = '@page { size: landscape; }',
                                head = win.document.head || win.document.getElementsByTagName('head')[0],
                                style = win.document.createElement('style');

                            style.type = 'text/css';
                            style.media = 'print';

                            if (style.styleSheet)
                            {
                            style.styleSheet.cssText = css;
                            }
                            else
                            {
                            style.appendChild(win.document.createTextNode(css));
                            }

                            head.appendChild(style);
                            }
                     },
             ],
            'select': true,
             'columns': [
             /*0*/ {data: 'DT_RowIndex', name:'DT_RowIndex', class:'text-center', width:'5px', orderable:false, searchable:false},
             /*1*/ {data: 'nombre', name:'nombre', width:'30px', title:'TOCADO'},
             /*2*/ {data: 'capturado', name:'capturado', width:'20px', class:'text-center', orderable:false, searchable:false},
             /*3*/ {data: 'opciones', name:'opciones', width: '15px', orderable: false, searchable: false},
             /*4*/ {data: 'capturista', name:'capturista', visible:false, title: 'CAPTURO', searchable: false},
             /*5*/ {data: 'seccion', name:'seccion', class: 'text-center',  visible:false, title: 'SECCION'},
             /*6*/ {data: 'distrito', name:'distrito', class: 'text-center',   visible:false, title: 'DISTRITO'},
             /*7*/ {data: 'movilizador', name:'movilizador',   visible:false, title: 'MOVILIZADOR'},
            /*8*/  {data:'clave_elector', name:'clave_elector', visible:false, title:'ClAVE ELECTORAL'},
            /*9*/  {data:'direccion', name:'direccion', visible:false, title:'DIRECCION',searchable: false},
            ],

         });
     });
 </script>
 <script>
    $(document).on('click', ".getInfo", function (){
        var table = $('#tocados_table').DataTable();
        $tr = $(this).closest('tr');
           var row = table.row($tr).data();
        //console.log(row);
        $("#getNombre").html(row.nombre);
        $("#getMovilizador").html(row.movilizador);
        $("#getLider").html(row.lider);
        $("#getClave").html(row.clave_elector);
        $("#getCelular").html(row.get_info.celular);
        $("#getfe_nacimiento").html(row.fe_nacimiento);
        $("#getDireccion").html(row.direccion);
        $("#getDistrito").html(row.distrito);
        $("#getSeccion").html(row.seccion);
        $("#capturista").html(row.capturista);
        $("#getGestion").html(row.gestion ?? 'SIN GESTION');
        $("#getEstatus").html(row.estatus_gestion ?? 'SIN GESTION');
        $("#getObservacion").html(row.get_info.observacion ?? 'SIN OBSERVACION');
    });
</script>
<script>
    $(document).ready(function(){
        $(document).on('click', ".btnModalEdit", function (){
            $('#EditModalTocado').modal('show')
            var table_edit = $('#tocados_table').DataTable();
            $tr_edit = $(this).closest('tr');
            var row_edit = table_edit.row($tr_edit).data();
            console.log(row_edit);
            $("#Edit_ID").val(row_edit.get_info.id);
            $("#Edit_Seccion").val(row_edit.get_info.seccion);
            $("#Edit_Distrito").val(row_edit.get_info.distrito);
            $("#Edit_CapturistaId").val(row_edit.get_user.id);
            $("#Edit_CapturistaNombre").val(row_edit.get_user.nombre);


            $("#Edit_Movilizador").val(row_edit.mobilizer_id);
            //$('#editNombre').val(data[0])
            $("#Edit_Clave").val(row_edit.get_info.clave_elector);
            $("#Edit_Nombre").val(row_edit.get_info.nombre);
            $("#Edit_Paterno").val(row_edit.get_info.paterno);
            $("#Edit_Materno").val(row_edit.get_info.materno);
            $("#Edit_Calle").val(row_edit.get_info.calle);
            $("#Edit_Cruzamiento").val(row_edit.get_info.cruzamiento);
            $("#Edit_NoExt").val(row_edit.get_info.no_ext);
            $("#Edit_NoInt").val(row_edit.get_info.no_int);
            $("#Edit_Colonia").val(row_edit.get_info.colonia);
            $("#Edit_CP").val(row_edit.get_info.cp);
            $("#Edit_FeNa").val(row_edit.get_info.fe_nacimiento);
            $("#Edit_Celular").val(row_edit.get_info.celular)
            $("#Edit_Gestion").val(row_edit.get_info.gestion ?? 'SIN GESTION')
            $("#Edit_Estatus").val(row_edit.get_info.estatus_gestion ?? 'SIN GESTION')
            $("#Edit_Observacion").val(row_edit.get_info.observacion ?? 'SIN OBSERVACION' )
        });

        $('#EditModalTocadoForm').on('submit', function(e){
            e.preventDefault();
            var id = $("#Edit_ID").val();
            $.ajax({
                type: "PUT",
                url: "Tocados/"+id,
                data: $('#EditModalTocadoForm').serialize(),
                success: function(response){
                    //console.log(response);
                  //  alert('LIDER ACTUALIZADO');
                    swal("Hecho!", response.message, "success");
                    $('#tocados_table').DataTable().ajax.reload();
                    $('#EditModalTocado').modal('toggle');

                },
                error: function(data){
                 console.log(data);
                var errors = data.responseJSON;
               // console.log(errors);

                // or, what you are trying to achieve
                // render the response via js, pushing the error in your
                // blade page

                  //  var errors = response.responseJSON;
                   //errorsHtml = '<div class="alert alert-danger"><ul>';
                    errorsHtml = '<ul>';

                  $.each(errors.errors,function (k,v) {
                         errorsHtml += '<li>'+ v + '</li>';
                  });
                  //errorsHtml += '</ul></div>';
                  errorsHtml += '</ul>';


                //  $( '#error_message' ).html( errorsHtml );
                    swal("Ooops!", errorsHtml, "error");
            }
                //error: function(xhr, status, error) {
                    //console.log(xhr);
                  //  var err = eval("(" + xhr.responseText + ")");
                      //  alert(err.Message);
                    //  swal("Revisa los datos!", error, "error");
                      //  }
                  //  swal("Error!", error, "error");
            });
        })

    });

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
