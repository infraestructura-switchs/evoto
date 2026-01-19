 <div class="modal animated pulse text-left" id="modal-show-{{ $cli->id }}" tabindex="-1"
    role="dialog" aria-labelledby="myModalLabel49" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" >
        <div class="modal-content">
            <div class="modal-header bg-info white">
                <h4 class="modal-title" id="myModalLabel49">Información del cliente</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <div class="form-body">

                <P> </P>
                
            </div>
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <p><strong>NOMBRES: </strong> {{ $cli->nombres }}</p>       
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <p><strong>APELLIDOS: </strong> {{ $cli->apellidos }}</p>       
                </div>
            </div> 
        </div>
        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <p><strong>TIPO DOCUMENTO: </strong> {{ $cli->tipo_documento }}</p>       
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <p><strong>NUM DOCUMENTO: </strong> {{ $cli->num_documento }}</p>       
            </div>
        </div> 
    </div>
    <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <p><strong>FECHA NACIMIENTO: </strong> {{date('d-m-Y', strtotime($cli->fecha_nacimiento))}}</p>       
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <p><strong>TELEFONO: </strong> {{ $cli->telefono }}</p>       
        </div>
    </div> 
</div>
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <p><strong>DIRECCION: </strong> {{ $cli->direccion }}</p>       
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <p><strong>CORREO: </strong> {{ $cli->email }}</p>       
        </div>
    </div>       
</div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="form-group">
        <p><strong>DESCRIPCION: </strong> {{ $cli->descripcion }}</p>       
    </div>
</div>
</div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="form-group">
        <p><strong>ESTADO: </strong>

            @if( $cli->estado === "Activo")
            <span class="badge badge-default badge-success">Activo</span>
            @endif
            @if( $cli->estado === "Inactivo")
            <span class="badge badge-default badge-warning">Inactivo</span>
            @endif
            @if( $cli->estado === "Eliminado")
            <span class="badge badge-default badge-danger">Eliminado</span>
            @endif    
        </p>       
    </div>
</div>
</div>
</div>
</div>
<div class="modal-footer">

    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Cerrar</button>


</div>
</div>
</div>
</div>