 <div class="modal animated pulse text-left" id="modal-show-{{ $emp->id }}" tabindex="-1"
    role="dialog" aria-labelledby="myModalLabel49" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" >
        <div class="modal-content">
            <div class="modal-header bg-info white">
                <h4 class="modal-title" id="myModalLabel49">Información del Empleado</h4>
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
                    <p><strong>NOMBRES: </strong> {{ $emp->nombre }}</p>       
                </div>
            </div>
           
        </div>
        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <p><strong>TIPO DOCUMENTO: </strong> {{ $emp->tipo_documento }}</p>       
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <p><strong>NUM. DOCUMENTO: </strong> {{ $emp->documento }}</p>       
            </div>
        </div> 
    </div>
    <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <p><strong>TELEFONO 1: </strong> {{ $emp->telefono1 }}</p>       
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <p><strong>TELEFONO 2: </strong> {{ $emp->telefono2 }}</p>       
        </div>
    </div> 
</div>
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <p><strong>DIRECCION: </strong> {{ $emp->direccion }}</p>       
        </div>
    </div>
          
</div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="form-group">
        <p><strong>DESCRIPCION: </strong> {{ $emp->descripcion }}</p>       
    </div>
</div>
</div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="form-group">
        <p><strong>ESTADO: </strong>

            @if( $emp->estado === "Activo")
            <span class="badge badge-default badge-success">Activo</span>
            @endif
            @if( $emp->estado === "Inactivo")
            <span class="badge badge-default badge-warning">Inactivo</span>
            @endif
            @if( $emp->estado === "Eliminado")
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
