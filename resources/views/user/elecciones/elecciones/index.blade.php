@extends('layouts.plantilla')

@section('contenido')

<!-- Zero configuration table -->
<section id="configuration">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">LISTADO DE ELECCIONES | <a href="{{ route('elecciones.create') }}"><button type="button" class="btn btn-icon btn-info btn-sm" data-toggle="tooltip" data-original-title="Crear Nuevo"><i class="la la-plus"></i></button></a> </h4>

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
                  <th  width="10px">ID</th>
                  <th >NOMBRE </th>
                  <th >FEcha elección</th>                  
                  <th width="17px"><center> ESTADO </center></th>
                  <th width="170px"><center>OPCIONES</center></th>

                </tr>
              </thead>
              <tbody>
                @foreach($elecciones as $ele)
                <tr>
                  <td >{{ $loop->iteration}}</td>
                  <td >{{ $ele->nombre }}</td>
                  <td >{{date('d/m/Y',strtotime($ele->fecha_inicio_eleccion))}}</td>                  
                  <td >

                    @if($ele->estado == 'Ejecucion')

                    <span class="badge badge-default badge-success round">{{ $ele->estado }}</span>
                    @endif

                    @if($ele->estado == 'Pendiente')

                    <span class="badge badge-default badge-warning round">{{ $ele->estado }}</span>
                    @endif
                    @if($ele->estado == 'Cerrada')

                    <span class="badge badge-default badge-danger round">{{ $ele->estado }}</span>
                    @endif

                  </td>
                  <td>
                    @if($ele->estado == 'Ejecucion')
                    <a href="" data-target="#modal-cerrar-{{$ele->id}}" data-toggle="modal">

                      <button type="button" class="btn btn-icon btn-warning btn-sm box-shadow-1"  data-toggle="tooltip" data-original-title="Cerrar Eleccion"><i class="la la-close"></i></button></a>
                      
                      @endif
                      @if($ele->estado == 'Pendiente')
                      <a href="" data-target="#modal-activar-{{$ele->id}}" data-toggle="modal">

                        <button type="button" class="btn btn-icon btn-info btn-sm box-shadow-1"  data-toggle="tooltip" data-original-title="Activar Eleccion"><i class="la la-check-square"></i></button></a>

                        @endif

                        <a href="" data-target="#modal-show-{{$ele->id}}" data-toggle="modal">

                          <button type="button" class="btn btn-icon btn-primary btn-sm box-shadow-1"  data-toggle="tooltip" data-original-title="Ver"><i class="la la-eye"></i></button></a>

                          @if($ele->estado == 'Pendiente')
                          <a href="{{ route('elecciones.edit', $ele->id) }}">
                            <button type="button" class="btn btn-icon btn-success btn-sm box-shadow-1" data-toggle="tooltip" data-original-title="Editar"><i class="la la-pencil"></i></button>
                          </a>
                          @endif
                          @if(Auth::user()->isAdmin())
                            @if($ele->estado == 'Pendiente')
                          <a  data-target="#modal-delete-{{ $ele->id }}" data-toggle="modal">
                            <button type="button" class="btn btn-icon btn-danger btn-sm box-shadow-1"  data-toggle="tooltip" data-original-title="Eliminar"><i class="la la-trash"></i></button> </a>                          
                             @endif
                          @endif

                          </td>

                        </tr>
                        @include('user.elecciones.elecciones.modal')
                        @include('user.elecciones.elecciones.cerrar')
                        @include('user.elecciones.elecciones.activar')
                        @include('user.elecciones.elecciones.show')
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
