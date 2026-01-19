@extends('layouts.plantilla')

@section('css')

<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/colors/palette-gradient.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/users.css')}}">

@endsection

@section('contenido')


<div class="row">
    {{-- filtro de busqueda --}}
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-form"><b>CERTIFICADO</b></h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="card-body">
                    <div class="card-text">
                    </div>
                    <div class="form">
                        <div class="form-body">
                           @include('user.elecciones.certificado.tabla')
                       </div>
                   </div>

               </div>
           </div>
       </div>
   </div>
</div>
</div>
</div>

@endsection
@section('js')
<style type="text/css">
    #capa1 {
        position: relative;
        z-index: 100;
        background-color: #f2f7e3;
    }
</style>
@endsection
