@extends('layouts.plantilla')

@section('contenido')

<!-- Zero configuration table -->
<section id="configuration">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">INFORMACIÓN DE NOTIFICACIONES</h4>
          
          <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
          <div class="heading-elements">
            <ul class="list-inline mb-0">
              <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
              <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
              
            </ul>
          </div>
        </div>
        <div class="card-content collapse show">
          <div class="card-body card-dashboard table-responsive">
            {{-- INICIO DE TABLA --}}
            <table class="table table-striped table-bordered zero-configuration" id="tabla">
              <thead>
                <tr>

                  <th >EMAIL INICIO ELECCIÓN </th>
                  <th >EMAIL CONFIRMAR VOTO </th> 
                  <th >SMS INICIO ELECCIÓN </th>
                  <th >SMS CONFIRMAR VOTO </th>                
                  <th >EDITAR </th>
                </tr>
              </thead>
              <tbody>
                @foreach($notificaciones as $rol)
                <tr>
                  <td >
                    @if($rol->em_inicio_elecc == 'S')
                    <center>SI</center>
                    @else
                    <center>NO</center>
                    @endif
                  </td>
                  <td >
                       @if($rol->em_conf_voto == 'S')
                    <center>SI</center>
                    @else
                    <center>NO</center>
                    @endif
                  </td>
                  <td >
                       @if($rol->sms_inicio_elecc == 'S')
                    <center>SI</center>
                    @else
                    <center>NO</center>
                    @endif

                   </td>
                  <td >
                         @if($rol->sms_conf_voto == 'S')
                    <center>SI</center>
                    @else
                    <center>NO</center>
                    @endif
                  </td>
                  <td>
                    <a href="{{ route('notificaciones.edit', $rol->id) }}">
                      <button type="button" class="btn btn-icon btn-success btn-sm box-shadow-1" data-toggle="tooltip" data-original-title="Editar"><i class="la la-pencil"></i></button>
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            {{-- FIN TABLA --}}
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ Zero configuration table -->
@endsection
