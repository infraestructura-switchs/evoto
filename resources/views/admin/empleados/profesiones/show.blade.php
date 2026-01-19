 <div class="modal animated pulse text-left" id="modal-show-{{ $pro->id }}" tabindex="-1"
    role="dialog" aria-labelledby="myModalLabel49" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" >
        <div class="modal-content">
            <div class="modal-header bg-info white">
                <h4 class="modal-title" id="myModalLabel49">PROFESIÓN</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <div class="form-body">

                <P> </P>
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <p><strong>NOMBRE: </strong> {{ $pro->nombre }}</p>       
                    </div>
                </div>
            </div>
            <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <p><strong>DESCRIPCIÓN: </strong> {{ $pro->descripcion }}</p>       
                </div>
            </div>
            
        </div>
        
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <p><strong>ESTADO: </strong> 

                    @if( $pro->estado === "Activo")
                    <span class="badge badge-default badge-success">Activo</span>
                    @endif
                    @if( $pro->estado === "Inactivo")
                    <span class="badge badge-default badge-warning">Inactivo</span>
                    @endif
                    @if( $pro->estado === "Eliminado")
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