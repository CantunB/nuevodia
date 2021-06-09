<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>NUEVO DIA</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

		<!-- App css -->
		<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
		<link href="{{ asset('css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

		<link href="{{ asset('css/bootstrap-dark.min.css') }}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
		<link href="{{ asset('css/app-dark.min.css') }}" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

		<!-- icons -->
		<link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    </head>

    <body class="loading auth-fluid-pages pb-0">

        <div class="auth-fluidl">
            <!--Auth fluid left content -->
            <div class="auth-fluid-form-box">
                <div class="align-items-center d-flex h-100">
                    <div class="card-body">

                        <!-- Logo -->
                        <div class="auth-brand text-center text-lg-left">
                            <div class="auth-logo">
                                <a href="index.html" class="logo logo-dark text-center">
                                    <span class="logo-lg">
                                        <!--<img src="{{ asset('images/logo_smapac.png') }}" alt="" height="80" width="160">-->
                                    </span>
                                </a>
            
                                <a href="index.html" class="logo logo-light text-center">
                                    <span class="logo-lg">
                                        <!--<img src="{{ asset('images/logo-light.png') }}" alt="" height="22">-->
                                    </span>
                                </a>
                            </div>
                        </div>

                        <!-- title-->
                        <h4 class="mt-0"></h4>
                       <!-- <p class="text-muted mb-4">Don't have an account? Create your account, it takes less than a minute</p>-->

                        <!-- form -->
                        <form method="POST" action="{{ route('register') }}">
                        @csrf
                            <div class="form-group">
                                <label for="fullname">CLAVE ELECTOR</label>
                                <input class="form-control" type="text" name="clave_elector" id="fullname" placeholder="Ingresa tu nombre" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="fullname">NOMBRE</label>
                                <input class="form-control" type="text" name="nombre" id="fullname" placeholder="Ingresa tu nombre" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="fullname">APELLIDO PATERNO</label>
                                <input class="form-control" type="text" name="paterno"  placeholder="Ingresa tu apellido paterno"  autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="fullname">APELLIDO MATERNO</label>
                                <input class="form-control" type="text" name="materno"  placeholder="Ingresa tu apellido materno"  autocomplete="off">
                            </div>                                                        
                            <div class="form-group">
                                <label for="fullname">CELULAR</label>
                                <input class="form-control" type="text" name="celular" id="fullname" placeholder="Ingresa tu no. de celular" required autocomplete="off">
                            </div>                                                                                  
                            <div class="form-group">
                                <label for="emailaddress">CORREO ELECTRÓNICO</label>
                                <input class="form-control" type="email" name="email" id="emailaddress" required placeholder="Ingresa tu correo electrónico" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="password">CONTRASEÑA</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Ingresa tu contraseña">
                                    <div class="input-group-append" data-password="false">
                                        <div class="input-group-text">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">CONFIRMAR CONTRASEÑA</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" name="password_confirmation" id="password" class="form-control" placeholder="Confirma tu contraseña">
                                    <div class="input-group-append" data-password="false">
                                        <div class="input-group-text">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                           <!-- <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="checkbox-signup">
                                    <label class="custom-control-label" for="checkbox-signup">I accept <a href="javascript: void(0);" class="text-dark">Terms and Conditions</a></label>
                                </div>
                            </div>-->
                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary waves-effect waves-light btn-block" type="submit"> REGISTRARSE</button>
                            </div>
                            <!-- social-->
                            <!--<div class="text-center mt-4">
                                <p class="text-muted font-16">Sign in with</p>
                                <ul class="social-list list-inline mt-3 mb-0">
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github"></i></a>
                                    </li>
                                </ul>
                            </div>-->
                        </form>
                        <!-- end form-->

                        <!-- Footer-->
                        <!--<footer class="footer footer-alt">
                            <p class="text-muted">Already have account? <a href="auth-login-2.html" class="text-muted ml-1"><b>Log In</b></a></p>
                        </footer>-->

                    </div> <!-- end .card-body -->
                </div> <!-- end .align-items-center.d-flex.h-100-->
            </div>
            <!-- end auth-fluid-form-box-->

            <!-- Auth fluid right content -->
            <div class="auth-fluid-right text-center">
               <!-- <div class="auth-user-testimonial">
                    <h2 class="mb-3 text-white">I love the color!</h2>
                    <p class="lead"><i class="mdi mdi-format-quote-open"></i> I've been using your theme from the previous developer for our web app, once I knew new version is out, I immediately bought with no hesitation. Great themes, good documentation with lots of customization available and sample app that really fit our need. <i class="mdi mdi-format-quote-close"></i>
                    </p>
                    <h5 class="text-white">
                        - Fadlisaad (Ubold Admin User)
                    </h5>
                </div> -->
                
                <!-- end auth-user-testimonial-->
            </div>
            <!-- end Auth fluid right content -->
        </div>
        <!-- end auth-fluid-->

        <!-- Vendor js -->
        <script src="{{ asset('js/vendor.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('js/app.min.js') }}"></script>
        
    </body>
</html>