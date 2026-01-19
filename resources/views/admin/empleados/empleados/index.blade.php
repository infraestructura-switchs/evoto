@extends('layouts.plantilla')

@section('contenido')

<!-- Zero configuration table -->
<section id="configuration">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">LISTADO DE EMPLEADOS | <a href="{{ route('empleados.create') }}"><button type="button" class="btn btn-icon btn-info btn-sm" data-toggle="tooltip" data-original-title="Crear Nuevo"><i class="la la-plus"></i></button></a> </h4>
          
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
            <table class="table table-striped table-bordered zero-configuration">
              <thead>
                <tr>
                  <th  width="10px">ID</th>
                  <th >NUM. DOCUMENTO </th>
                  <th >NOMBRE </th>
                  <th >TELEFONO 1 </th>
                  <th >ESTADO </th>
                  <th><center>OPCIONES</center></th>

                </tr>
              </thead>
              <tbody>
                @foreach($empleados as $emp)
                <tr>
                  <td >{{ $emp->id }}</td>
                  <td >{{ $emp->documento }}</td>                
                  <td >{{ $emp->nombre }}</td>
                  <td >{{ $emp->telefono1 }}</td>
                  <td align="center">
                    @if( $emp->estado === "Activo")
                    <span class="badge badge-default badge-success">Activo</span>
                    @endif
                    @if( $emp->estado === "Inactivo")
                    <span class="badge badge-default badge-warning">Inactivo</span>
                    @endif
                    @if( $emp->estado === "Eliminado")
                    <span class="badge badge-default badge-danger">Eliminado</span>
                    @endif
                  </td>
                  
                  <td>
                    <a href="" data-target="#modal-show-{{$emp->id}}" data-toggle="modal">

                      <button type="button" class="btn btn-icon btn-primary btn-sm box-shadow-1"  data-toggle="tooltip" data-original-title="Ver"><i class="la la-eye"></i></button></a>

                      <a href="{{ route('empleados.edit', $emp->id) }}">
                        <button type="button" class="btn btn-icon btn-success btn-sm box-shadow-1" data-toggle="tooltip" data-original-title="Editar"><i class="la la-pencil"></i></button>
                      </a>

                      <a  data-target="#modal-delete-{{ $emp->id }}" data-toggle="modal">
                        <button type="button" class="btn btn-icon btn-danger btn-sm box-shadow-1"  data-toggle="tooltip" data-original-title="Eliminar"><i class="la la-trash"></i></button> </a>                          
                        
                      </td>

                    </tr>
                    @include('admin.empleados.empleados.modal')
                    @include('admin.empleados.empleados.show')
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
