@extends('layouts.plantilla')

@section('contenido')

<!-- Zero configuration table -->
<section id="configuration">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">LISTADO DE PROFESIONES | <a href="{{ route('profesiones.create') }}"><button type="button" class="btn btn-icon btn-info btn-sm" data-toggle="tooltip" data-original-title="Crear Nuevo"><i class="la la-plus"></i></button></a> </h4>
          
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
                  <th >NOMBRE </th>
                  <th >DESCRIPCIÓN </th>
                  <th width="17px"><center> ESTADO </center></th>
                  <th><center>OPCIONES</center></th>

                </tr>
              </thead>
              <tbody>
                @foreach($profesiones as $pro)
                <tr>
                  <td >{{ $pro->id }}</td>
                  <td >{{ $pro->nombre }}</td>
                  <td >{{ $pro->descripcion }}</td>
                  <td align="center">
                    @if( $pro->estado === "Activo")
                    <span class="badge badge-default badge-success">Activo</span>
                    @endif
                    @if( $pro->estado === "Inactivo")
                    <span class="badge badge-default badge-warning">Inactivo</span>
                    @endif
                    @if( $pro->estado === "Eliminado")
                    <span class="badge badge-default badge-danger">Eliminado</span>
                    @endif
                  </td>
                  <td>
                    <a href="" data-target="#modal-show-{{$pro->id}}" data-toggle="modal">

                      <button type="button" class="btn btn-icon btn-primary btn-sm box-shadow-1"  data-toggle="tooltip" data-original-title="Ver"><i class="la la-eye"></i></button></a>

                      <a href="{{ route('profesiones.edit', $pro->id) }}">
                        <button type="button" class="btn btn-icon btn-success btn-sm box-shadow-1" data-toggle="tooltip" data-original-title="Editar"><i class="la la-pencil"></i></button>
                      </a>

                      <a  data-target="#modal-delete-{{ $pro->id }}" data-toggle="modal">
                        <button type="button" class="btn btn-icon btn-danger btn-sm box-shadow-1"  data-toggle="tooltip" data-original-title="Eliminar"><i class="la la-trash"></i></button> </a>                          
                        
                      </td>

                    </tr>
                    @include('admin.empleados.profesiones.modal')
                    @include('admin.empleados.profesiones.show')
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
