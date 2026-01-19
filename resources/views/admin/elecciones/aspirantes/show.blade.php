 <div class="modal animated bounceInRight text-left" id="modal-show-{{ $can->id }}" tabindex="-1"
    role="dialog" aria-labelledby="myModalLabel49" aria-hidden="true">
    <div class="modal-dialog" role="document" >
        <div class="modal-content">
            <div class="modal-header bg-info white">
                <h4 class="modal-title" id="myModalLabel49">Información del Candidato</h4>
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
                        <p><strong>Elección: </strong> {{ $can->eleccion }}</p>       
                    </div>
                </div>
               
            </div>
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <p><strong>Nombre: </strong> {{ $can->nombre }}</p>       
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <p><strong>Apellido: </strong> {{ $can->apellido }}</p>       
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <p><strong>Número en el Tarjetón: </strong> {{ $can->numero_tarjeton }}</p>       
                </div>
            </div>
           
        </div>

        <div class="row">
         
        <div class="form-group col-md-6 col-sm-6 col-xs-12">
            <p><strong>foto: </strong></p>  
            @if($can->foto)
            <img src="{{asset('storage/candidatos/'.$can->foto)}}" class="img-responsive" width="200">
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