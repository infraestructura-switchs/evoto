<?php

namespace diser;

use Illuminate\Database\Eloquent\Model;

class Votacion extends Model
{
     protected $table='votaciones'; 

    protected $fillable = [
	'id_candidato',
	'id_eleccion',
	'fecha_hoa'
	];
}
