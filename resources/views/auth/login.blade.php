<!DOCTYPE html>
<html class="loading" lang="es" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  
  
  <meta name="author" content="EVOTO">
  <title>Login | EVOTO
  </title>
  <link rel="apple-touch-icon" href="{{asset('logos/logo_evoto.png')}}">
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('logos/logo_evoto.png')}}">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/vendors.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/icheck/icheck.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/icheck/custom.css')}}">
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/app.css')}}">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu-modern.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/colors/palette-gradient.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/login-register.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/animate/animate.css')}}">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
  <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-menu-modern 1-column   menu-expanded blank-page blank-page"
data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <section class="flexbox-container">
        <div class="col-12 d-flex align-items-center justify-content-center">
          <div class="col-md-4 col-10 box-shadow-2 p-0">
            <div class="card border-grey border-lighten-3 m-0">
              <div class="card-header border-0">
                <div class="card-title text-center">
                  <div class="p-1"> 
                    <img src="{{asset('logos/logo_evoto.png')}}" alt="branding logo" width="100%">
                  </div>
                </div>
                <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                  <span>LOGIN EVOTO</span>
                </h6>
              </div>
              <div class="card-content">
                <div class="card-body">
                  @if (session('info'))
                    <div class="alert alert-icon-left alert-success alert-dismissible mb-2" role="alert">
                      <span class="alert-icon"><i class="la la-check"></i></span>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      {{ session('info') }}
                    </div>
                  @endif
                  @if (session('alerta'))
                    <div class="alert alert-icon-left alert-warning alert-dismissible mb-2" role="alert">
                      <span class="alert-icon"><i class="la la-exclamation-triangle"></i></span>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      {{ session('alerta') }}
                    </div>
                  @endif

                  <div>
            
              <div class="card collapse-icon accordion-icon-rotate">

                <div id="headingCollapse31" class="card-header bg-success">
                  <a data-toggle="collapse" href="#collapse31" aria-expanded="true" aria-controls="collapse31"
                  class="card-title lead white">
                    <a class="card-title lead white" href="{{ url('auth/google') }}">
                    Iniciar sesión correo Institucional
                    </a>
                    </a>
                </div>
                <div id="collapse31" role="tabpanel" aria-labelledby="headingCollapse31" class="card-collapse collapse show"
                aria-expanded="true">
                  <div class="card-content">

                  </div>
                </div>
             
                <div id="headingCollapse33" class="card-header bg-info">
                  <a data-toggle="collapse" href="#collapse33" aria-expanded="false" aria-controls="collapse33"
                  class="card-title lead white collapsed">Ingreso Manual</a>
                </div>
                <div id="collapse33" role="tabpanel" aria-labelledby="headingCollapse33" class="card-collapse collapse"
                aria-expanded="false">
                  <div class="card-content">
                    <div class="card-body">
                      <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf
                        {{-- ################################### --}}
                        <!-- <form class="form-horizontal form-simple" action="index.html" novalidate> -->
                          <fieldset class="form-group position-relative has-icon-left mb-0">
                            <input type="text" class="form-control form-control-lg input-lg" id="email" name="email" value="{{ old('email') }}" placeholder="Correo Electronico"
                            required>
                            <div class="form-control-position">
                              <i class="ft-user"></i>
                            </div>
                          </fieldset>
                          <p></p>
                          <fieldset class="form-group position-relative has-icon-left">
                            <input type="password" class="form-control form-control-lg input-lg" id="password"
                            placeholder="Contraseña" name="password" required>
                            <div class="form-control-position">
                              <i class="la la-key"></i>
                            </div>
                          </fieldset>
                          <div class="form-group row">
                            <div class="col-md-6 col-12 text-center text-md-left">


                            </div>
                            {{--   <div class="col-md-6 col-12 text-center text-md-right"><a href="recover-password.html" class="card-link">Recuperar Contraseña</a></div> --}}
                          </div>
                          <button type="submit" class="btn btn-info btn-lg btn-block"><i class="ft-unlock"></i> Enviar</button>
                        </form>
                    </div>
                  </div>
                </div>
             
               
              </div>
            </div>
            




            </div>
          </div>
         {{--  <div class="card-footer">

          </div> --}}
        </div>
      </div>
    </div>
  </section>
</div>
</div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<!-- BEGIN VENDOR JS-->
<script src="{{asset('app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{asset('app-assets/vendors/js/forms/icheck/icheck.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"
type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="{{asset('app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/js/core/app.js')}}" type="text/javascript"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{asset('app-assets/js/scripts/forms/form-login-register.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
<script src="{{asset('app-assets/js/scripts/customizer.js')}}" type="text/javascript"></script>
</body>
</html> 