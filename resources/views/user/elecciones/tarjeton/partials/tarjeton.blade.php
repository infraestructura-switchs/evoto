	<div class="col-xl-4 col-md-6 col-12">
		<div class="card profile-card-with-cover box-shadow-2">
			<div class="card-img-top img-fluid bg-cover height-200" style="background: url('{{asset('storage/background/d2.jpg')}}');">        
			</div>      
			<div class="card-profile-image">
				<a href="#" data-target="#modal-{{ $modal }}-{{$can->id}}" data-toggle="modal" ><img src="{{asset('storage/candidatos/'.$can->foto)}}" class="rounded-circle img-border box-shadow-4 height-150"
					alt="Card image"></a>
				</div>
				<div class="profile-card-with-cover-content text-center">
					<div class="card-body"  id="valor_id">
						<h4 class="card-title" id="capa1">{{ $can->nombre }} {{ $can->apellido }}</h4>				
					</div>
					<div class="card-body" >
						<h4>{{ $can->numero_tarjeton }}</h4>				
					</div>
					<div class="text-center">       
						{{-- boton modal  --}}
						<a href="#" data-target="#modal-{{ $modal }}-{{$can->id}}" data-toggle="modal"><button type="button" class="btn btn-info btn-min-width mr-1 mb-1"><i class="la la-user"></i> Selecccionar</button>
						</a>
						{{-- fin boton modal --}}
					</div>
				</div>
			</div>
		</div>
