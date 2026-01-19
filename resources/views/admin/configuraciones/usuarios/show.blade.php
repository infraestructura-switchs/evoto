 <div class="modal animated bounceInRight text-left" id="modal-show-{{ $use->id }}" tabindex="-1"
    role="dialog" aria-labelledby="myModalLabel49" aria-hidden="true">
    <div class="modal-dialog" role="document" >
        <div class="modal-content">
            <div class="modal-header bg-info white">
                <h4 class="modal-title" id="myModalLabel49">Información del Usuario</h4>
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
                <p><strong>NOMBRE: </strong> {{ $use->name }}</p>       
            </div>
        </div>
        
     
    </div>
    <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="form-group">
            <p><strong>CORREO: </strong> {{ $use->email }}</p>       
        </div>
    </div>
       <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <p><strong>USUARIO: </strong> {{ $use->user }}</p>       
        </div>
    </div>
</div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="form-group">
        <p><strong>ROL: </strong> {{ $use->role }}</p>       
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