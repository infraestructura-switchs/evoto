@extends('layouts.plantilla')

@section('contenido')

<!-- Zero configuration table -->
<section id="configuration">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> {{ $tipo_usuario }} | <a href="{{ route('usuarios.create') }}"><button type="button" class="btn btn-icon btn-info btn-sm" data-toggle="tooltip" data-original-title="Crear Nuevo"><i class="la la-plus"></i></button></a> </h4>
          
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
                  <th width="10px">ID</th>
                  <th> NUM.DOCUMENTO </th>
                  <th> NOMBRE</th>
                  <th> CORREO ELECTRONICO</th>                 
                  <th> Rol</th>                 
                  <th width="790px"><center> OPCIONES</center></th>
                </tr>
              </thead>
              <tbody>
                @foreach($users as $use)
                <tr>
                  <td >{{ $loop->iteration}}</td> 
                  <td >{{ $use->documento }}</td> 
                  <td >{{ $use->name }} {{ $use->apellido }}</td>                
                  <td >{{ $use->email }}</td>
                  <td >
                    @if($use->rol == 'Usuario')
                    Sufragante
                    @else
                    {{ $use->rol }}
                    @endif
                  </td>
                  
                  <td>
                   <a  data-target="#modal-reset-{{ $use->id }}" data-toggle="modal">
                    <button type="button" class="btn btn-icon btn-info btn-sm box-shadow-1"  data-toggle="tooltip" data-original-title="Restablecer Contraseña"><i class="la la-refresh"></i></button> 
                  </a> 
                  
                      @if($use->rol == 'Usuario')
                      <a href="{{ route('editar_sufragantes', $use->id) }}">
                        <button type="button" class="btn btn-icon btn-success btn-sm box-shadow-1" data-toggle="tooltip" data-original-title="Editar"><i class="la la-pencil"></i></button>
                      </a>

                      @else
                     <a href="{{ route('usuarios.edit', $use->id) }}">
                        <button type="button" class="btn btn-icon btn-success btn-sm box-shadow-1" data-toggle="tooltip" data-original-title="Editar"><i class="la la-pencil"></i></button>
                      </a>
                      @endif


                      <a  data-target="#modal-delete-{{ $use->id }}" data-toggle="modal">
                        <button type="button" class="btn btn-icon btn-danger btn-sm box-shadow-1"  data-toggle="tooltip" data-original-title="Eliminar"><i class="la la-trash"></i></button> 
                      </a>                          

                    </td>

                  </tr>
                  @include('admin.configuraciones.usuarios.modal')
                  @include('admin.configuraciones.usuarios.reset')
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
