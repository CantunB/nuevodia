@extends('layouts.app')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">{{ config('app.name','SMAPAC') }}</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ROLES</a></li>
                        <li class="breadcrumb-item active">EDITAR</li>
                    </ol>
                </div>
                <h4 class="page-title">Editar rol {{ $roles->name }}</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <!---  <h4 class="header-title">Borderless table</h4>
                  <p class="sub-header">
                      For basic styling—light padding and only horizontal dividers—add the base class <code>.table</code> to any <code>&lt;table&gt;</code>.
                  </p>
                  -->

                <div class="table-responsive">
                    <form action="{{ action('RolesController@update', $roles->id) }}" method="POST" class="form-group">
                        @csrf
                        @method('PUT')
                        <input type="hidden" value="{{ $roles->name }}" name="rolname">
                        <div class="row icons-list-demo">
                            @foreach ($permisos as $value )
                                <div class="col-sm-6 col-md-4 col-lg-3 icon-dual-dark">
                                        <input type="checkbox" id="chk{{ $value->id }}" name="permission[]"
                                        value="{{ $value->id }}" {{ $roles->permissions->pluck('id')->contains($value->id) ? 'checked' : '' }}>
                                        <label for="chk{{$value->id }}">{{ $value->id }}-{{ $value->name }}</label>
                                </div>
                            @endforeach
                        </div>

                        <br>
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success waves-effect waves-light">
                                Actualizar<span class="btn-label-right"><i class="mdi mdi-check-all"></i></span>
                            </button>
                            <a  href="{{ url()->previous() }}" class="btn btn-danger waves-effect waves-light">
                                Cancelar<span class="btn-label-right"><i class="mdi mdi-close-outline"></i></span>
                            </a>
                        </div>
                    </form>
                </div> <!-- end table-responsive-->

            </div> <!-- end card-box -->
        </div> <!-- end col -->
    </div>
    <!--- end r

@push('scripts')
        <script>
            var $table = $('#table')
        </script>
      <script>
    /*---------------------CHECKBOX USUARIOS-------------------------------*/
    $("#selectallusers").on("click", function() {
      $(".chkusers").prop("checked", this.checked);
    });
    // if all checkbox are selected, check the selectall checkbox and viceversa
    $(".chkuser").on("click", function() {
      if ($(".chkusers").length == $(".chkusers:checked").length) {
        $("#selectall").prop("checked", true);
      } else {
        $("#selectall").prop("checked", false);
      }
    });

    /*---------------------CHECKBOX ROLES-------------------------------*/

    $("#selectallroles").on("click", function() {
      $(".chkroles").prop("checked", this.checked);
    });
    // if all checkbox are selected, check the selectall checkbox and viceversa
    $(".chkroles").on("click", function() {
      if ($(".chkroles").length == $(".chkroles:checked").length) {
        $("#selectall").prop("checked", true);
      } else {
        $("#selectall").prop("checked", false);
      }
    });

    /*---------------------CHECKBOX PERMISOS-------------------------------*/

    $("#selectallpermisos").on("click", function() {
      $(".chkpermisos").prop("checked", this.checked);
    });
    // if all checkbox are selected, check the selectall checkbox and viceversa
    $(".chkpermisos").on("click", function() {
      if ($(".chkpermisos").length == $(".chkpermisos:checked").length) {
        $("#selectall").prop("checked", true);
      } else {
        $("#selectall").prop("checked", false);
      }
    });



    /*---------------------CHECKBOX ELECTORES-------------------------------*/

    $("#selectallelectores").on("click", function() {
      $(".chkelectores").prop("checked", this.checked);
    });
    // if all checkbox are selected, check the selectall checkbox and viceversa
    $(".chkelectores").on("click", function() {
      if ($(".chkelectores").length == $(".chkelectores:checked").length) {
        $("#selectall").prop("checked", true);
      } else {
        $("#selectall").prop("checked", false);
      }
    });


    /*---------------------CHECKBOX ANFITRIONES-------------------------------*/

    $("#selectallanf").on("click", function() {
      $(".chkanf").prop("checked", this.checked);
    });
    // if all checkbox are selected, check the selectall checkbox and viceversa
    $(".chkanf").on("click", function() {
      if ($(".chkanf").length == $(".chkanf:checked").length) {
        $("#selectall").prop("checked", true);
      } else {
        $("#selectall").prop("checked", false);
      }
    });

    /*---------------------CHECKBOX SIMPATIZANTES-------------------------------*/

    $("#selectallsim").on("click", function() {
      $(".chksim").prop("checked", this.checked);
    });
    // if all checkbox are selected, check the selectall checkbox and viceversa
    $(".chksim").on("click", function() {
      if ($(".chksim").length == $(".chksim:checked").length) {
        $("#selectall").prop("checked", true);
      } else {
        $("#selectall").prop("checked", false);
      }
    });

    /*---------------------CHECKBOX RESP. SECCION-------------------------------*/

    $("#selectallrs").on("click", function() {
      $(".chkrs").prop("checked", this.checked);
    });
    // if all checkbox are selected, check the selectall checkbox and viceversa
    $(".chkrs").on("click", function() {
      if ($(".chkrs").length == $(".chkrs:checked").length) {
        $("#selectall").prop("checked", true);
      } else {
        $("#selectall").prop("checked", false);
      }
    });

    /*---------------------CHECKBOX RESP. MANZANA-------------------------------*/

    $("#selectallrm").on("click", function() {
      $(".chkrm").prop("checked", this.checked);
    });
    // if all checkbox are selected, check the selectall checkbox and viceversa
    $(".chkrm").on("click", function() {
      if ($(".chkrm").length == $(".chkrm:checked").length) {
        $("#selectall").prop("checked", true);
      } else {
        $("#selectall").prop("checked", false);
      }
    });

    /*---------------------CHECKBOX SECCIONEs-------------------------------*/

    $("#selectallrm").on("click", function() {
      $(".chkseccion").prop("checked", this.checked);
    });
    // if all checkbox are selected, check the selectall checkbox and viceversa
    $(".chkseccion").on("click", function() {
      if ($(".chkseccion").length == $(".chkseccion:checked").length) {
        $("#selectall").prop("checked", true);
      } else {
        $("#selectall").prop("checked", false);
      }
    });

    /*---------------------CHECKBOX MANZANA-------------------------------*/

    $("#selectallrm").on("click", function() {
      $(".chkmanzana").prop("checked", this.checked);
    });
    // if all checkbox are selected, check the selectall checkbox and viceversa
    $(".chkmanzana").on("click", function() {
      if ($(".chkmanzana").length == $(".chkmanzana:checked").length) {
        $("#selectall").prop("checked", true);
      } else {
        $("#selectall").prop("checked", false);
      }
    });


    /*---------------------CHECKBOX TODOS LOS PERMISOS-------------------------------*/

    $("#selectall").on("click", function() {
      $(".case").prop("checked", this.checked);
    });
    // if all checkbox are selected, check the selectall checkbox and viceversa
    $(".case").on("click", function() {
      if ($(".case").length == $(".case:checked").length) {
        $("#selectall").prop("checked", true);
      } else {
        $("#selectall").prop("checked", false);
      }
    });
    </script>
@endpush
@endsection
