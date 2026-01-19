@extends('layouts.plantilla')

@section('contenido')

<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title" id="basic-layout-form">CREAR CLIENTE</h4>
       <hr color="blue" size=8>
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
        <div class="form-body">
          {!! Form::open(['route' => 'clientes.store']) !!}

          @include('admin.clientes.partials.form')

          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
