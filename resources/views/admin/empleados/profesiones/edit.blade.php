@extends('layouts.plantilla')

@section('contenido')

<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title" id="basic-layout-form">EDITAR PROFESIÓN</h4>
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
        
        {!! Form::model($profesion, ['route' => ['profesiones.update', $profesion->id], 'method' => 'PUT']) !!}

        @include('admin.empleados.profesiones.partials.form')

        {!! Form::close() !!} 

    </div>
  </div>

</div>
</div>
</div>
</div>

@endsection