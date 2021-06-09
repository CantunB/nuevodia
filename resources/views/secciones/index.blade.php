@extends('layouts.app')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">SECCIONES</li>
                    </ol>
                </div>
                <h4 class="page-title">SECCIONES</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                        <!--    <button type="button"
                                    class="btn btn-danger waves-effect waves-light"
                                    data-toggle="modal" data-target="#custom-modal">
                                <i class="mdi mdi-plus-circle mr-1"></i> Add Customers</button> -->
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-right">
                          <!--      <button type="button" class="btn btn-success mb-2 mr-1"><i class="mdi mdi-cog"></i></button>
                                <button type="button" class="btn btn-light mb-2 mr-1">Import</button>
                                <button type="button" class="btn btn-light mb-2">Export</button>  -->
                                <a href="javascript: history.go(-1)" style="margin: 4px" type="button" class="btn btn-sm btn-outline-danger waves-effect waves-light float-right" >
                                    <i class="mdi mdi-page-first"></i> Regresar
                                </a>
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div  class="table-responsive">
                        <table id="datatable" class="table table-centered table-nowrap table-striped" >
                            <thead>
                                <tr>
                                    <th>Seccion</th>
                                    <th>L.N</th>
                                    <th>Proyeccion</th>
                                    <th>No.Simpatizantes</th>
                                    <th>Grafica</th>
                                </tr>
                            </thead>
                         <!--   <tbody>
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                        <label class="custom-control-label" for="customCheck2">&nbsp;</label>
                                    </div>
                                </td>
                                <td class="table-user">
                                    <img src="../assets/images/users/user-4.jpg" alt="table-user" class="mr-2 rounded-circle">
                                    <a href="javascript:void(0);" class="text-body font-weight-semibold">Paul J. Friend</a>
                                </td>
                                <td>
                                    937-330-1634
                                </td>
                                <td>
                                    pauljfrnd@jourrapide.com
                                </td>
                                <td>
                                    New York
                                </td>
                                <td>
                                    07/07/2018
                                </td>
                                <td>
                                    <span class="badge bg-soft-success text-success">Active</span>
                                </td>

                                <td>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck3">
                                        <label class="custom-control-label" for="customCheck3">&nbsp;</label>
                                    </div>
                                </td>
                                <td class="table-user">
                                    <img src="../assets/images/users/user-3.jpg" alt="table-user" class="mr-2 rounded-circle">
                                    <a href="javascript:void(0);" class="text-body font-weight-semibold">Bryan J. Luellen</a>
                                </td>
                                <td>
                                    215-302-3376
                                </td>
                                <td>
                                    bryuellen@dayrep.com
                                </td>
                                <td>
                                    New York
                                </td>
                                <td>
                                    09/12/2018
                                </td>
                                <td>
                                    <span class="badge bg-soft-success text-success">Active</span>
                                </td>

                                <td>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck4">
                                        <label class="custom-control-label" for="customCheck4">&nbsp;</label>
                                    </div>
                                </td>
                                <td class="table-user">
                                    <img src="../assets/images/users/user-3.jpg" alt="table-user" class="mr-2 rounded-circle">
                                    <a href="javascript:void(0);" class="text-body font-weight-semibold">Kathryn S. Collier</a>
                                </td>
                                <td>
                                    828-216-2190
                                </td>
                                <td>
                                    collier@jourrapide.com
                                </td>
                                <td>
                                    Canada
                                </td>
                                <td>
                                    06/30/2018
                                </td>
                                <td>
                                    <span class="badge bg-soft-danger text-danger">Blocked</span>
                                </td>

                                <td>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck5">
                                        <label class="custom-control-label" for="customCheck5">&nbsp;</label>
                                    </div>
                                </td>
                                <td class="table-user">
                                    <img src="../assets/images/users/user-1.jpg" alt="table-user" class="mr-2 rounded-circle">
                                    <a href="javascript:void(0);" class="text-body font-weight-semibold">Timothy Kauper</a>
                                </td>
                                <td>
                                    (216) 75 612 706
                                </td>
                                <td>
                                    thykauper@rhyta.com
                                </td>
                                <td>
                                    Denmark
                                </td>
                                <td>
                                    09/08/2018
                                </td>
                                <td>
                                    <span class="badge bg-soft-danger text-danger">Blocked</span>
                                </td>

                                <td>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck6">
                                        <label class="custom-control-label" for="customCheck6">&nbsp;</label>
                                    </div>
                                </td>
                                <td class="table-user">
                                    <img src="../assets/images/users/user-5.jpg" alt="table-user" class="mr-2 rounded-circle">
                                    <a href="javascript:void(0);" class="text-body font-weight-semibold">Zara Raws</a>
                                </td>
                                <td>
                                    (02) 75 150 655
                                </td>
                                <td>
                                    austin@dayrep.com
                                </td>
                                <td>
                                    Germany
                                </td>
                                <td>
                                    07/15/2018
                                </td>
                                <td>
                                    <span class="badge bg-soft-success text-success">Active</span>
                                </td>

                                <td>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck7">
                                        <label class="custom-control-label" for="customCheck7">&nbsp;</label>
                                    </div>
                                </td>
                                <td class="table-user">
                                    <img src="../assets/images/users/user-6.jpg" alt="table-user" class="mr-2 rounded-circle">
                                    <a href="javascript:void(0);" class="text-body font-weight-semibold">Annette P. Kelsch</a>
                                </td>
                                <td>
                                    (+15) 73 483 758
                                </td>
                                <td>
                                    annette@email.net
                                </td>
                                <td>
                                    India
                                </td>
                                <td>
                                    09/05/2018
                                </td>
                                <td>
                                    <span class="badge bg-soft-success text-success">Active</span>
                                </td>

                                <td>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck8">
                                        <label class="custom-control-label" for="customCheck8">&nbsp;</label>
                                    </div>
                                </td>
                                <td class="table-user">
                                    <img src="../assets/images/users/user-7.jpg" alt="table-user" class="mr-2 rounded-circle">
                                    <a href="javascript:void(0);" class="text-body font-weight-semibold">Jenny C. Gero</a>
                                </td>
                                <td>
                                    078 7173 9261
                                </td>
                                <td>
                                    jennygero@teleworm.us
                                </td>
                                <td>
                                    Lesotho
                                </td>
                                <td>
                                    08/02/2018
                                </td>
                                <td>
                                    <span class="badge bg-soft-danger text-danger">Blocked</span>
                                </td>

                                <td>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck9">
                                        <label class="custom-control-label" for="customCheck9">&nbsp;</label>
                                    </div>
                                </td>
                                <td class="table-user">
                                    <img src="../assets/images/users/user-8.jpg" alt="table-user" class="mr-2 rounded-circle">
                                    <a href="javascript:void(0);" class="text-body font-weight-semibold">Edward Roseby</a>
                                </td>
                                <td>
                                    078 6013 3854
                                </td>
                                <td>
                                    edwardR@armyspy.com
                                </td>
                                <td>
                                    Monaco
                                </td>
                                <td>
                                    08/23/2018
                                </td>
                                <td>
                                    <span class="badge bg-soft-success text-success">Active</span>
                                </td>

                                <td>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck10">
                                        <label class="custom-control-label" for="customCheck10">&nbsp;</label>
                                    </div>
                                </td>
                                <td class="table-user">
                                    <img src="../assets/images/users/user-9.jpg" alt="table-user" class="mr-2 rounded-circle">
                                    <a href="javascript:void(0);" class="text-body font-weight-semibold">Anna Ciantar</a>
                                </td>
                                <td>
                                    (216) 76 298 896
                                </td>
                                <td>
                                    annac@hotmai.us
                                </td>
                                <td>
                                    Philippines
                                </td>
                                <td>
                                    05/06/2018
                                </td>
                                <td>
                                    <span class="badge bg-soft-success text-success">Active</span>
                                </td>

                                <td>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck11">
                                        <label class="custom-control-label" for="customCheck11">&nbsp;</label>
                                    </div>
                                </td>
                                <td class="table-user">
                                    <img src="../assets/images/users/user-10.jpg" alt="table-user" class="mr-2 rounded-circle">
                                    <a href="javascript:void(0);" class="text-body font-weight-semibold">Dean Smithies</a>
                                </td>
                                <td>
                                    077 6157 4248
                                </td>
                                <td>
                                    deanes@dayrep.com
                                </td>
                                <td>
                                    Singapore
                                </td>
                                <td>
                                    04/09/2018
                                </td>
                                <td>
                                    <span class="badge bg-soft-success text-success">Active</span>
                                </td>

                                <td>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck12">
                                        <label class="custom-control-label" for="customCheck12">&nbsp;</label>
                                    </div>
                                </td>
                                <td class="table-user">
                                    <img src="../assets/images/users/user-1.jpg" alt="table-user" class="mr-2 rounded-circle">
                                    <a href="javascript:void(0);" class="text-body font-weight-semibold">Labeeb Ghali</a>
                                </td>
                                <td>
                                    050 414 8778
                                </td>
                                <td>
                                    labebswad@teleworm.us
                                </td>
                                <td>
                                    United Kingdom
                                </td>
                                <td>
                                    06/19/2018
                                </td>
                                <td>
                                    <span class="badge bg-soft-success text-success">Active</span>
                                </td>

                                <td>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck13">
                                        <label class="custom-control-label" for="customCheck13">&nbsp;</label>
                                    </div>
                                </td>
                                <td class="table-user">
                                    <img src="../assets/images/users/user-2.jpg" alt="table-user" class="mr-2 rounded-circle">
                                    <a href="javascript:void(0);" class="text-body font-weight-semibold">Rory Seekamp</a>
                                </td>
                                <td>
                                    078 5054 8877
                                </td>
                                <td>
                                    roryamp@dayrep.com
                                </td>
                                <td>
                                    United States
                                </td>
                                <td>
                                    03/24/2018
                                </td>
                                <td>
                                    <span class="badge bg-soft-danger text-danger">Blocked</span>
                                </td>

                                <td>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                            </tbody> -->
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->

        <div class="col-lg-6">
            <div class="card-box">
                <h3 >Resultados:  <strong style="color: #00acc1">L.N/Proyeccion/Simpatizantes</strong></h3>
                <h3 class="header-title mb-3">Seccion Electoral &nbsp; <span id="prueba"></span></h3>
                <div id="chart" style="height: 300px;" data-colors=#dcdcdc","#4a81d4","#1abc9c" dir="ltr"></div>
            </div> <!-- end card-->
            <div class="card-box">
                <h4 class="header-title mb-3">Porcentaje de resultados</h4>

                <div id="pie-chart" style="height: 300px;" data-colors="#f4f8fb,#4a81d4,#1abc9c" dir="ltr"></div>
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row -->


@push('scripts')
    <script>
        $(document).ready( function (){
            $('#datatable').DataTable({
                retrieve: true,
                paginate: true,
                processing: true,
                serverSide: true,
                responsive: true,
                searchDelay: 700,
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                },
                ajax: '{!! route('Secciones.index') !!}',
                columns: [
                    {data:'seccion', seccion:'seccion', className: "text-center", },
                    {data:'ln', ln:'ln', className: "text-center",},
                    {data:'proyeccion', proyeccion:'proyeccion', className: "text-center",},
                    {data:'simpatizantes', simpatizantes:'simpatizantes', className: "text-center",},
                    {data:'action', action:'action', className: "text-center",},
                ]
            })
        })
    </script>
    <script>
        $("span.pie").peity("pie")
    </script>
    <script>
        $(document).on('click', ".btngrafica", function (){
            var table = $('#datatable').DataTable();
            $tr = $(this).closest('tr');
          // var row = table.row($(this)).data();
            var row = table.row($tr).data();
            console.log(row);
            console.log(row.seccion);
            var seccion = row.seccion;
            //var row = table.row($tr).data();

            $.ajax({
                url:"{!! url('Secciones/data') !!}",
                data: {
                    'seccion': seccion,
                    '_token': "{{ csrf_token() }}"
                },
                type: "POST",
                success: function (response){
                    $("#prueba").html(response.seccion);
                    var t=["#dcdcdc","#4a81d4","#1abc9c"];
                    var l=["#f4f8fb","#4a81d4","#1abc9c"];
                    var chart = c3.generate({bindto:"#chart",
                        data: {
                            columns: [
                                ["L.N",response.ln],
                                ["Proyeccion", response.proyeccion],
                                ["No.Simpatizantes", response.simpatizantes]
                            ],
                            keys:{
                                value: ['Seccion Electoral']
                            },
                            type: 'bar'
                        },
                        color:{
                            pattern:t},
                        bar: {
                            width: {
                                ratio: 0.5 // this makes bar width 50% of length between ticks
                            },
                            // or
                            //width: 100 // this makes bar width 100px
                        },
                    });

                    var chart = c3.generate({bindto:"#pie-chart",
                        data: {
                            // iris data from R
                            columns: [
                                ["L.N",response.ln],
                                ["Proyeccion", response.proyeccion],
                                ["No.Simpatizantes", response.simpatizantes]
                            ],
                            type : 'pie',
                            onclick: function (d, i) { console.log("onclick", d, i); },
                            onmouseover: function (d, i) { console.log("onmouseover", d, i); },
                            onmouseout: function (d, i) { console.log("onmouseout", d, i); }
                        },
                        color:{
                            pattern:l
                        },
                    });

                }
            });
        });

    </script>
@endpush
@endsection
