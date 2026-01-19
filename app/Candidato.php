<?php

namespace diser;

use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    protected $table='candidatos'; 

    protected $fillable = [
			'ideleccion',
            'nombre',
            'apellido',
            'foto',
            'num_tarjeton',
            'estado'
	];
}
