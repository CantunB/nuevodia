<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Register & Signup | UBold - Responsive Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico">

    <!-- App css -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="{{asset('css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="{{asset('css/bootstrap-dark.min.css')}}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
    <link href="{{asset('css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

    <!-- icons -->
    <link href="{{asset('css/icons.min.css')}}" rel="stylesheet" type="text/css" />

</head>

<body class="loading authentication-bg authentication-bg-pattern">

<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-pattern">

                    <div class="card-body p-4">

                        <div class="text-center w-75 m-auto">
                            <div class="auth-logo">
                                <a href="index.html" class="logo logo-dark text-center">
                                            <span class="logo-lg">
                                                <img src="../assets/images/logo-dark.png" alt="" height="22">
                                            </span>
                                </a>

                                <a href="index.html" class="logo logo-light text-center">
                                            <span class="logo-lg">
                                                <img src="../assets/images/logo-light.png" alt="" height="22">
                                            </span>
                                </a>
                            </div>
                            <p class="text-muted mb-4 mt-3">¿No tienes una cuenta? Crea tu cuenta, toma menos de un minuto</p>
                        </div>

                        <form id="form" method="POST" action="{{ route('register') }}">
                            @method('POST')
                            @csrf
                            <div class="form-group">
                                <label for="clave_elector">Clave de elector</label>
                                <input  style="text-transform:uppercase;"  class="form-control  @error('clave_elector') is-invalid @enderror" type="text" id="clave_elector" name="clave_elector" minlength="18" maxlength="18" placeholder="Necesitamos tu clave electoral" value="{{old('clave_elector')}}" required>
                                @error('clave_elector')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre(s)</label>
                                <input  style="text-transform:uppercase;"  class="form-control  @error('nombre') is-invalid @enderror" type="text" id="nombre" name="nombre"  placeholder="Ingresa tu(s) nombre(s)" required value="{{old('nombre')}}">
                                @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="paterno">Apellido Paterno</label>
                                <input  style="text-transform:uppercase;"  class="form-control  @error('paterno') is-invalid @enderror" type="text" id="paterno" name="paterno"  placeholder="Ingresa tu apellido" required value="{{old('paterno')}}">
                                @error('paterno')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="materno">Apellido Materno</label>
                                <input  style="text-transform:uppercase;"  class="form-control  @error('materno') is-invalid @enderror" type="text" id="materno" name="materno"  placeholder="Ingresa tu apellido" required value="{{old('materno')}}">
                                @error('materno')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="celular">Celular</label>
                                <input class="form-control  @error('celular') is-invalid @enderror" type="number" id="celular" name="celular"  placeholder="9838129232" required value="{{old('celular')}}">
                                @error('celular')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Correo electronico</label>
                                <input class="form-control  @error('email') is-invalid @enderror" type="email" id="email" name="email" required placeholder="example@example.com" value="{{old('email')}}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" required name="password" id="password" class="form-control  @error('password') is-invalid @enderror" placeholder="*********">
                                    <div class="input-group-append" data-password="false">
                                        <div class="input-group-text">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">CONFIRMAR CONTRASEÑA</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" name="password_confirmation" id="password" class="form-control" placeholder="*********">
                                    <div class="input-group-append" data-password="false">
                                        <div class="input-group-text">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-success btn-block" type="submit"> CREAR CUENTA </button>
                            </div>

                        </form>
                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p class="text-white-50">Tienes una cuenta?  <a href="{{route('login')}}" class="text-white ml-1"><b>Iniciar sesion</b></a></p>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- Vendor js -->
<script src="{{asset('js/vendor.min.js')}}"></script>
<script src="{{asset('/libs/parsleyjs/parsley.min.js')}}"></script>
<script src="{{asset('/libs/parsleyjs/i18n/es.js')}}"></script>
<!-- App js -->
<script src="{{asset('js/app.min.js')}}"></script>
<script>
    $('#form').parsley();
</script>
</body>
</html>
