@extends('layouts.plantilla')


@section('css')

<link rel="stylesheet" type="text/css" href="{{asset('css/visiontic/personalizado.css')}}">

@endsection

@section('contenido')

@if( Auth::user()->isAdmin() || Auth::user()->isJurado())

@if(count($eleccion)>0)
@include('reloj')

<!-- grouped card stats section start -->
<section id="grouped-stats">
  <div class="row">
    <div class="col-12 ">
      <h4 class="text-uppercase"><b>Eleccion Activa :</b> {{ $eleccion[0]->nombre }}</h4>
      <p></p>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-content">
          <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12 border-right-blue-grey border-right-lighten-5">
              <div class="card-body text-center">
                <div class="card-header mb-2">
                  <span class="success">Usuarios Habilitados</span>
                  <h3 class="display-4 blue-grey darken-1">{{ $sufragantes }}</h3>
                </div>
                <div class="card-content">
                  <input type="text" value="{{ number_format($porcentaje_votantes) }}" class="knob hide-value responsive angle-offset" data-angleOffset="40"
                  data-thickness=".15" data-linecap="round" data-width="150"
                  data-height="150" data-inputColor="#e1e1e1" data-readOnly="true"
                  data-fgColor="#28D094" data-knob-icon="icon-note">
                  <ul class="list-inline clearfix mt-2">
                    <li class="border-right-blue-grey border-right-lighten-2 pr-2">
                      <h1 class="blue-grey darken-1 text-bold-400">{{ number_format($porcentaje_votantes) }}%</h1>
                      <span class="success"><i class="la la-caret-up"></i> VOTOS</span>
                    </li>
                    <li class="pl-2">
                      <h1 class="blue-grey darken-1 text-bold-400">{{ number_format(100-$porcentaje_votantes) }}%</h1>
                      <span class="danger darken-2"><i class="la la-caret-down"></i> NO VOTARON</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 border-right-blue-grey border-right-lighten-5">
              <div class="card-body text-center">
                <div class="card-header mb-2">
                  <span class="warning darken-2">Pendientes por Votar</span>
                  <h3 class="display-4 blue-grey darken-1">{{ $resta_votantes }}</h3>
                </div>
                <div class="card-content">
                  <input type="text" value="{{ number_format(100-$porcentaje_votantes) }}" class="knob hide-value responsive angle-offset"  data-angleOffset="0"
                  data-thickness=".15" data-linecap="round" data-width="150"
                  data-height="150" data-inputColor="#e1e1e1" data-readOnly="true"
                  data-fgColor="#FF9149" data-knob-icon="icon-user">
                  <ul class="list-inline clearfix mt-2">
                    <li>
                      <h1 class="blue-grey darken-1 text-bold-400">{{ $sufragantes }}</h1>
                      <span class="warning darken-2"><i class="la la-user"></i> Total de Sufragantes Habilitados</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 border-right-blue-grey border-right-lighten-5">
              <div class="card-body text-center">
                <div class="card-header mb-2">
                  <span class="danger">Candidatos</span>
                  <h3 class="display-4 blue-grey darken-1">{{ $candidatos }}</h3>
                </div>
                <div class="card-content">
                  <input type="text" value="100" class="knob hide-value responsive angle-offset" data-angleOffset="20"
                  data-thickness=".15" data-linecap="round" data-width="150"
                  data-height="150" data-inputColor="#e1e1e1" data-readOnly="true"
                  data-fgColor="#FF4961" data-knob-icon="icon-users">
                     {{--      <ul class="list-inline clearfix mt-2">
                            <li class="border-right-blue-grey border-right-lighten-2 pr-2">
                              <h1 class="blue-grey darken-1 text-bold-400">24%</h1>
                              <span class="success"><i class="icon-male"></i> Male</span>
                            </li>
                            <li class="pl-2">
                              <h1 class="blue-grey darken-1 text-bold-400">76%</h1>
                              <span class="danger darken-2"><i class="icon-female"></i> Female</span>
                            </li>
                          </ul> --}}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>  
        </section>
        <!-- // grouped card stats section end -->
        @else
        {{-- HORA: {{ now() }} --}}
        @include('reloj')

        <div class="col-12 "> 

          <img src="{{asset('storage/background/'.$imagenbackground->imagen)}}" class="img-border box-shadow-4" width="100%" height="100%"
          alt="Card image"> 
        </div>
        @endif

        @endif

        @if(Auth::user()->isUser())
        @if(count($votaciones) > 0)

        <div class="col-12 ">
          <div class="card collapse-icon accordion-icon-rotate">              
            <div id="collapse31" role="tabpanel" aria-labelledby="headingCollapse31" class="card-collapse collapse show"
            aria-expanded="true">                  
          </div>             
          <div id="headingCollapse33" class="card-header bg-info">
            <a data-toggle="collapse" href="#collapse33" aria-expanded="false" aria-controls="collapse33"
            class="card-title lead white collapsed">Descargar Certificados de Votación</a>
          </div>
          <div id="collapse33" role="tabpanel" aria-labelledby="headingCollapse33" class="card-collapse collapse"
          aria-expanded="false">
          <div class="card-content">
            <div class="card-body">
              @include('user.elecciones.certificado.tabla')
            </div>
          </div>
        </div>
      </div>          
    </div>
    @endif

    <div class="col-12 ">
      <img src="{{asset('storage/background/'.$imagenbackground->imagen)}}" class="img-border box-shadow-4 height-120"
      alt="Card image">
    </div>
    @endif
    @endsection
    
    
