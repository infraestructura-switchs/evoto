@extends('layouts.plantilla')

@section('contenido')

<!-- Zero configuration table -->
<section id="configuration">
  <div class="row">
    <div class="col-12">
      <div class="card">
                <div class="card-header">
          <h4 class="card-title">LISTADO DE CANDIDATOS | <a href="{{ route('candidatos.create') }}"><button type="button" class="btn btn-icon btn-info btn-sm" data-toggle="tooltip" data-original-title="Crear Nuevo"><i class="la la-plus"></i></button></a> </h4>
          
          <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
          <div class="heading-elements">
            <ul class="list-inline mb-0">
              <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
              <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
              
            </ul>
          </div>
        </div>
        <div class="card-contcan collapse show">
          <div class="card-body card-dashboard table-responsive">

            <table class="table table-striped table-bordered zero-configuration" id="tabla">
              <thead>
                <tr>
                  <th  width="10px">ID</th>
                  <th><ccaner> ELECCION </ccaner></th>
                  <th> NOMBRE </th>
                  <th width="40px">IMAGEN</th>
                  <th >&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                @foreach($candidatos as $can)
                <tr>
                  <td >{{ $loop->iteration }}</td>
                  <td >
                    {{ $can->eleccion }} | 
                    @if($can->estadoele == 'Ejecucion')

                    <span class="badge badge-default badge-success round">{{ $can->estadoele }}</span>
                    @endif

                    @if($can->estadoele == 'Pendiente')

                    <span class="badge badge-default badge-warning round">{{ $can->estadoele }}</span>
                    @endif
                    @if($can->estadoele == 'Cerrada')

                    <span class="badge badge-default badge-danger round">{{ $can->estadoele }}</span>
                    @endif</td>
                  <td >{{ $can->nombre.' '.$can->apellido }}</td>
                  
                  <td align="ccaner">
                    @if($can->foto) 
                    <img src="{{asset('storage/candidatos/'.$can->foto)}}" class="gallery-thumbnail card-img-top responsive" width="40px" >
                    @endif
                  </td>
                   <td>

                    <a href="" data-target="#modal-show-{{$can->id}}" data-toggle="modal">

                      <button type="button" class="btn btn-icon btn-primary btn-sm box-shadow-1"  data-toggle="tooltip" data-original-title="Ver"><i class="la la-eye"></i></button></a>

                      <a href="{{ route('candidatos.edit', $can->id) }}">
                        <button type="button" class="btn btn-icon btn-success btn-sm box-shadow-1" data-toggle="tooltip" data-original-title="Editar"><i class="la la-pencil"></i></button>
                      </a>

                      @if($can->estadoele == 'Pendiente')
                      <a  data-target="#modal-delete-{{ $can->id }}" data-toggle="modal">
                        <button type="button" class="btn btn-icon btn-danger btn-sm box-shadow-1"  data-toggle="tooltip" data-original-title="Eliminar"><i class="la la-trash"></i></button> </a>  
                        @endif                        
                        
                      </td>

                    </tr>
                    @include('user.elecciones.candidatos.modal')
                    @include('user.elecciones.candidatos.show')
                    @endforeach

                  </tbody>

                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--/ Zero configuration table -->
    @endsection
