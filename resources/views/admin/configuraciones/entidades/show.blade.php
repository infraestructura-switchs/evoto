 <div class="modal animated bounceInRight text-left" id="modal-show-{{ $emp->id }}" tabindex="-1"
    role="dialog" aria-labelledby="myModalLabel49" aria-hidden="true">
    <div class="modal-dialog" role="document" >
        <div class="modal-content">
            <div class="modal-header bg-info white">
                <h4 class="modal-title" id="myModalLabel49">Información de la Entidad</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 <div class="form-body">
       
        <P> </P>
        <div class="row">
  <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <p><strong>Nit: </strong> {{ $emp->nit }}</p>       
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <p><strong>Nombre: </strong> {{ $emp->nombre }}</p>       
                </div>
            </div>
          
        </div>
        <div class="row">
         <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <p><strong>Direccion: </strong> {{ $emp->direccion }}</p>       
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <p><strong>Telefono: </strong> {{ $emp->telefono }}</p>       
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <p><strong>Sitio Web: </strong> {{ $emp->sitio_web }}</p>       
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <p><strong>Email: </strong> {{ $emp->email }}</p>       
            </div>
        </div>
    </div>
    
<div class="row">
      
    <div class="form-group col-md-12 col-sm-12 col-xs-12">
        <p><strong>logo: </strong></p>  
        @if($emp->logo)
        <img src="{{ $emp->logo }}" class="img-responsive" width="200">
        @endif     
    </div>
    <!-- Botones -->
</div>
</div>
            </div>
            <div class="modal-footer">
                                
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                
            
            </div>
        </div>
    </div>
 </div>