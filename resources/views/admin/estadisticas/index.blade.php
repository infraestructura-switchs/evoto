@extends('layouts.plantilla')

@section('css')

<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/colors/palette-gradient.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/users.css')}}">

@endsection

@section('contenido')

@include('admin.estadisticas.search')

@if(count($eleccion_selecionada)>0)

@if(count($candidatos) >0)
<div class="col-md-12">
  <h4 class="text-uppercase"> 
   <b>{{ $candidatos[0]->eleccion }}</b> | <a href="{{URL::action('User\EstadisticaController@reporte_eleccion',$eleccion_selecionada[0]->id)}}" target="_blank"><button type="button" class="btn btn-icon btn-info btn-sm" data-toggle="tooltip" data-original-title="Crear Nuevo"><i class="la la-file-pdf-o"></i>Generar PDF</button></a>
 </h4>
 
</div> 

@endif

<!-- grouped card stats section start -->
<section id="grouped-stats">
{{--   <div class="row">
    <div class="col-12 ">
      <h4 class="text-uppercase">Eleccion Activa : {{ $eleccion[0]->nombre }}</h4>
      <p></p>
    </div>
  </div> --}}
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
                  <input type="text" value="{{ number_format($porcentaje_votantes) }}" class=" knob hide-value responsive angle-offset" data-angleOffset="40" data-thickness=".15" data-linecap="round" data-width="150"
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
                  <span class="warning darken-2">No realizaron el voto</span>
                  <h3 class="display-4 blue-grey darken-1">{{ $resta_votantes }}</h3>
                </div>
                <div class="card-content">
                  <input type="text" value="{{ number_format(100-$porcentaje_votantes) }}" class="knob hide-value responsive angle-offset" data-angleOffset="0"
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
                  <h3 class="display-4 blue-grey darken-1">{{ $candidatos_count }}</h3>
                </div>
                <div class="card-content">
                  <input type="text" value="100" class="knob hide-value responsive angle-offset" data-angleOffset="20"
                  data-thickness=".15" data-linecap="round" data-width="150"
                  data-height="150" data-inputColor="#e1e1e1" data-readOnly="true"
                  data-fgColor="#FF4961" data-knob-icon="icon-users">                    
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
@endif
{{-- LISTA LOS CANDIDATOS CON LOS VOTOS --}}
<div class="row">
 @forelse ($candidatos as $can) 
 <div class="col-xl-4 col-md-6 col-12">
  <div class="card profile-card-with-cover box-shadow-2">
   <div class="card-img-top img-fluid bg-cover height-200" style="background: url('{{asset('storage/background/d2.jpg')}}');">        
   </div>      
   <div class="card-profile-image">
    <img src="{{asset('storage/candidatos/'.$can->foto)}}"  class="rounded-circle  height-150" alt="Card image">
  </div>
  <div class="profile-card-with-cover-content text-center">
    <div class="card-body" id="valor_id">
    </div>
    <div class="text-center">        
     <font style="text-transform: uppercase;"><h4 class="card-title">{{ $can->nombre }} {{ $can->apellido }}</h4></font>	
     <h4>VOTOS: {{ $can->votos }}</h4>			
   </div>
 </div>
</div>
</div>

@empty
<div class="col-md-12">
  <div class="bs-callout-primary callout-border-left p-1">
    <strong>Por favor seleccione una elección!!!</strong>
    <p>Podrá visualizar información de las elecciones cerradas y descargar un informe en PDF</p>
  </div>
</div>
@endforelse
</div>
@endsection
@section('js')
@endsection