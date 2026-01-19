 <div class="modal animated bounceInRight text-left" id="modal-show-{{ $ciu->id }}" tabindex="-1"
    role="dialog" aria-labelledby="myModalLabel49" aria-hidden="true">
    <div class="modal-dialog" role="document" >
        <div class="modal-content">
            <div class="modal-header bg-info white">
                <h4 class="modal-title" id="myModalLabel49">Información de la Ciudad</h4>
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
                        <p><strong>Nombre: </strong> {{ $ciu->nombre }}</p>       
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