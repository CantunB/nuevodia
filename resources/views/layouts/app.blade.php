<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title> NUEVO DIA </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
         <!-- App favicon -->
         <link rel="shortcut icon" href="{{ asset('images/favicon/') }}">

         <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
         <link href="{{ asset('/libs/mohithg-switchery/switchery.min.css') }}" rel="stylesheet" type="text/css" />
         <link href="{{ asset('/libs/multiselect/css/multi-select.css') }}" rel="stylesheet" type="text/css" />
         <link href="{{ asset('/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
         <link href="{{ asset('/libs/selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet" type="text/css" />
         <link href="{{ asset('/libs/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css" />
         <link href="{{ asset('/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css" />
         <link href="{{ asset('/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/libs/dropify/css/dropify.min.css') }}" rel="stylesheet" type="text/css" />
         <link href="{{asset('/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
         <link href="{{asset('/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
         <link href="{{asset('/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
         <link href="{{asset('/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
         <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
         <!-- App css -->
         <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
         <link href="{{asset('/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />
         <link href="{{asset('/css/bootstrap-dark.min.css')}}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
         <link href="{{asset('/css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />
         <!-- icons -->
         <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
         <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<<<<<<< HEAD
=======

>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
    </head>

    <body class="loading">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start-->
            @include('layouts.partials.topbar')
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="h-100" data-simplebar>

                    <!-- User box -->
                    <div class="user-box text-center">
                        <img src="{{asset('images/users/default.png')}}" alt="user-img" title="Mat Helme"
                            class="rounded-circle avatar-md">
                        <div class="dropdown">
                            <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                                data-toggle="dropdown"></a>
                            <div class="dropdown-menu user-pro-dropdown">

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-user mr-1"></i>
                                    <span>My Account</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-settings mr-1"></i>
                                    <span>Settings</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-lock mr-1"></i>
                                    <span>Lock Screen</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-log-out mr-1"></i>
                                    <span>Logout</span>
                                </a>

                            </div>
                        </div>
                        <p class="text-muted">{{Auth::user()->nombre}} {{Auth::user()->paterno}}  {{Auth::user()->materno}}</p>
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul id="side-menu">
<<<<<<< HEAD
                            @can('read_home')
=======
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                                <li>
                                    <a href="{{ route('home') }}">
                                        <i data-feather="home" class="icon-dual-white"></i>
                                        <span> INICIO </span>
                                    </a>
                                </li>
<<<<<<< HEAD
                            @endcan
=======
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                            @can('read_gestiones')
                                <li>
                                    <a href="{{ route('Gestiones.index') }}">
                                        <i data-feather="package" class="icon-dual-success"></i>
                                        <span> GESTIONES </span>
                                    </a>
                                </li>
                            @endcan
                            @can('read_registros')
                                <li>
                                    <a href="#sidebarREGISTROS" data-toggle="collapse">
                                        <i data-feather="users" class="icon-dual-blue"></i>
                                        <span> REGISTROS </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <div class="collapse" id="sidebarREGISTROS">
                                        <ul class="nav-second-level">
                                            @can('read_tocados')
                                                <li>
                                                    <a href="{{ route('Sympathizers.searcher') }}">CONSULTAR</a>
                                                </li>
                                            @endcan
                                            @can('read_lideres')
                                                <li>
                                                    <a href="{{route('Leaders.index')}}">LIDER/DISTRIBUIDORES</a>
                                                </li>
                                            @endcan
                                            @can('read_movilizadores')
                                                <li>
                                                    <a href="{{route('Mobilizers.index')}}">MOVILIZADORES/ASOCIADOS</a>
                                                </li>
                                            @endcan
                                            @can('read_tocados')
                                                <li>
                                                    <a href="{{route('Tocados.index')}}">TOCADOS/INVITADOS</a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </li>
                            @endcan

                            @can('read_callcenter')
                                <li>
                                    <a href="#sidebarCALLCENTER" data-toggle="collapse">
                                        <i data-feather="phone-call" class="icon-dual-warning"></i>
                                        <span> CALLCENTER </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <div class="collapse" id="sidebarCALLCENTER">
                                        <ul class="nav-second-level">
<<<<<<< HEAD
                                            @can('read_callcenter')
=======
                                            @can('read_administrador')
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                                            <li>
                                                <a href="{{route('CallCenter.index')}}">INICIO</a>
                                            </li>
                                            @endcan
                                            @can('read_encuestas')
                                            <li>
                                                <a href="{{ route('Encuestas.index') }}">ENCUESTAS</a>
                                            </li>
                                            @endcan
<<<<<<< HEAD
=======
                                            @can('read_invitacion')
                                            <li>
                                                <a href="{{ route('Invitacion.index') }}">INVITACION</a>
                                            </li>
                                            @endcan
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                                            <li>
                                                <a href="#sidebarMultilevel3" data-toggle="collapse">
                                                    REGISTROS <span class="menu-arrow"></span>
                                                </a>
                                                <div class="collapse" id="sidebarMultilevel3">
                                                    <ul class="nav-second-level">
                                                        @can('read_simpatizantes_sc')
                                                            <li>
                                                                <a href="{{route('Simpatizantes.index')}}">TOCADOS SIN CLAVE</a>
                                                            </li>
                                                        @endcan
                                                        @can('read_sorteos')
                                                        <li>
                                                            <a href="{{route('Sorteos.index')}}">SORTEOS</a>
                                                        </li>
                                                        @endcan
                                                        @can('read_propietarios')
                                                        <li>
                                                            <a href="{{ route('Owners.index') }}">PROPIETARIOS</a>
                                                        </li>
                                                        @endcan
                                                     <!--   <li>
                                                            <a href="#sidebarMultilevel4" data-toggle="collapse">
                                                               REGISTRAR <span class="menu-arrow"></span>
                                                            </a>
                                                            <div class="collapse" id="sidebarMultilevel4">
                                                                <ul class="nav-second-level">

                                                                </ul>
                                                            </div>
                                                        </li> -->
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @endcan
                            @can('read_distritos')
                            <li>
                                <a href="{{route('Distritos.index')}}">
                                    <i data-feather="map" class="icon-dual-dark"></i>
                                    <span> DISTRITOS </span>
                                </a>
                            <li>
                            @endcan
<<<<<<< HEAD

=======
                            @can('read_amigos')
                            <li>
                                <a href="{{route('Amigos.index')}}">
                                    <i data-feather="thumbs-up" class="icon-dual-danger"></i>
                                    <span> AMIGOS </span>
                                </a>
                            <li>
                            @endcan
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                            @can('read_secciones')
                                <li>
                                    <a href="{{route('Secciones.index')}}">
                                        <i data-feather="tag" class="icon-dual-primary"></i>
                                        <span> SECCIONES </span>
                                    </a>
                                </li>
                            @endcan
                            @can('read_sympathizers')
<<<<<<< HEAD
                                <li>
                                    <a href="{{ route('admin.sympathizers') }}">
                                        <i data-feather="book-open" class="icon-dual-info"></i>
                                        LISTA DE SIMPATIZANTES</a>
                                </li>
                            @endcan
                            @can('read_usuarios')
                                <li>
                                    <a href="{{ route('usuarios.index') }}">
                                    <i data-feather="settings" class="icon-dual-success"></i>
                                    USUARIOS</a>
                                </li>
                            @endcan
                            @can('read_roles')
                                <li>
                                    <a href="{{ route('roles.index') }}">
                                        <i data-feather="shield" class="icon-dual-warning"></i>
                                        ROLES</a>
                                </li>
                            @endcan
                            @can('read_permisos')
                                <li>
                                    <a href="{{ route('permisos.index') }}">
                                    <i data-feather="unlock" class="icon-dual-danger"></i>
                                    PERMISOS</a>
                                </li>
                            @endcan
                            @can('read_empresas')
                                <li>
                                    <a href="{{ route('Empresas.index') }}">
                                    <i data-feather="slack" class="icon-dual-info"></i>
                                    EMPRESAS</a>
                                </li>
                            @endcan
                            @can('read_empleados')
                                <li>
                                    <a href="{{ route('Empleados.index') }}">
                                    <i data-feather="inbox" class="icon-dual-blue"></i>
                                    EMPLEADOS</a>
                                </li>
                            @endcan
                            @can('read_mypymes')
                                <li>
                                    <a href="{{ route('Mypymes.index') }}">
                                    <i data-feather="book-open" class="icon-dual-dark"></i>
                                    MYPYMES</a>
                                </li>
=======
                            <li>
                                <a href="#sidebarSimpatizante" data-toggle="collapse">
                                    <i data-feather="book-open" class="icon-dual-blue"></i>
                                    <span> SIMPATIZANTES </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarSimpatizante">
                                    <ul class="nav-second-level">
                                        @can('read_sympathizers')
                                            <li>
                                                <a href="{{ route('admin.sympathizers') }}">LISTA</a>
                                            </li>
                                        @endcan
                                        @can('read_confirmacion')
                                            <li>
                                                <a href="{{route('Confirmacion.index')}}">CONFIRMACION DE RESULTADOS</a>
                                            </li>
                                        @endcan
                                    </ul>
                                </div>
                            </li>
                        @endcan
                            @can('read_empresas')
                                <li>
                                    <a href="{{ route('Empresas.index') }}">
                                    <i data-feather="trending-up" class="icon-dual-info"></i>
                                    EMPRESAS</a>
                                </li>
                            @endcan
                            @can('read_empleados')
                                <li>
                                    <a href="{{ route('Empleados.index') }}">
                                    <i data-feather="inbox" class="icon-dual-blue"></i>
                                    EMPLEADOS</a>
                                </li>
                            @endcan
                            @can('read_mypymes')
                                <li>
                                    <a href="{{ route('Mypymes.index') }}">
                                    <i data-feather="book-open" class="icon-dual-dark"></i>
                                    MYPYMES</a>
                                </li>
                            @endcan
                            @can('read_despensas')
                                <li>
                                    <a href="{{ route('Despensas.index') }}">
                                    <i data-feather="gift" class="icon-dual-success"></i>
                                    DESPENSAS</a>
                                </li>
                            @endcan
                            @can('read_administrador')
                                <li>
                                    <a href="{{ route('admin.index') }}">
                                    <i data-feather="lock" class="icon-dual-black"></i>
                                    ADMINISTRADOR</a>
                                </li>
                            @endcan
                            @can('read_elecciones')
                            <li>
                                <a href="#sidebarElecciones" data-toggle="collapse">
                                    <i data-feather="book-open" class="icon-dual-blue"></i>
                                    <span> ELECCIONES </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarElecciones">
                                    <ul class="nav-second-level">
                                        @can('read_coordinadores')
                                            <li>
                                                <a href="{{ route('Coordinadores.index') }}">COORDINADORES</a>
                                            </li>
                                        @endcan
                                        @can('read_invitados')
                                            <li>
                                                <a href="{{route('Invitados.index')}}">INVITADOS</a>
                                            </li>
                                        @endcan
                                    </ul>
                                </div>
                            </li>
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                            @endcan
                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                @yield('content')

                </div> <!-- content -->

                <!-- Footer Start -->
                @include('layouts.partials.footer')
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
            @include('layouts.partials.rightsidebar')
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>


        <script src="{{asset('/js/vendor.min.js')}}"></script>

        <script src="{{asset('/libs/flatpickr/flatpickr.min.js')}}"></script>
        <script src="{{asset('/libs/apexcharts/apexcharts.min.js')}}"></script>
        <script src="{{asset('/libs/selectize/js/standalone/selectize.min.js')}}"></script>
        <script src="{{asset('/libs/sweetalert2/sweetalert2.min.js')}}"></script>
        <script src="{{asset('/libs/dropzone/min/dropzone.min.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="{{asset('/libs/dropify/js/dropify.min.js')}}"></script>
        <script src="{{asset('/libs/parsleyjs/parsley.min.js')}}"></script>
        <script src="{{asset('/libs/parsleyjs/i18n/es.js')}}"></script>
        <script src="{{asset('/libs/multiselect/js/jquery.multi-select.js') }}"></script>
        <script src="{{asset('/libs/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
        <script src="{{asset('/libs/bootstrap-table/bootstrap-table.min.js')}}"></script>
        <!-- Chart JS -->
        <script src="https://apexcharts.com/samples/assets/irregular-data-series.js"></script>
        <script src="https://apexcharts.com/samples/assets/ohlc.js"></script>

        <!-- init js -->
        <script src="{{asset('/libs/apexcharts/apexcharts.min.js')}}"></script>
        <script src="{{asset('/libs/chart.js/Chart.bundle.min.js')}}"></script>
        <script src="{{asset('/libs/peity/jquery.peity.min.js')}}"></script>
        <script src="{{asset('/libs/moment/min/moment.min.js')}}"></script>
        <!--C3 Chart-->
        <script src="{{asset('/libs/d3/d3.min.js')}}"></script>
        <script src="{{asset('/libs/c3/c3.min.js')}}"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
        <script src="{{ asset('/libs/raphael/raphael.min.js') }}"></script>
        <script src="{{asset('/libs/jquery.scrollto/jquery.scrollTo.min.js')}}"></script>
        <script src="{{ asset('/libs/selectize/js/standalone/selectize.min.js') }}"></script>
        <script src="{{ asset('/libs/mohithg-switchery/switchery.min.js') }}"></script>
        <script src="{{ asset('/libs/multiselect/js/jquery.multi-select.js') }}"></script>
        <script src="{{ asset('/libs/select2/js/select2.min.js') }}"></script>
        <script src="{{ asset('/libs/jquery-mockjax/jquery.mockjax.min.js') }}"></script>
        <script src="{{ asset('/libs/devbridge-autocomplete/jquery.autocomplete.min.js') }}"></script>
        <script src="{{ asset('/libs/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
        <script src="{{ asset('/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
        <script src="{{ asset('/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>

        <!-- third party js -->
        <script src="{{asset('/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
        <script src="{{asset('/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{asset('/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
        <script src="{{asset('/libs/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
        <script src="{{asset('/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
        <script src="{{asset('/libs/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
        <script src="{{asset('/libs/datatables.net-select/js/dataTables.select.min.js')}}"></script>
        <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
        <script src="{{asset('/libs/pdfmake/build/pdfmake.min.js')}}"></script>
        <script src="{{asset('/libs/pdfmake/build/vfs_fonts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
        <!-- third party js ends -->
        <!-- Datatables init -->
        <script src="{{asset('/js/pages/datatables.init.js')}}"></script>
        <!-- App js -->

        <script src="{{asset('/js/app.min.js')}}"></script>
        @stack('scripts')

    </body>
</html>
