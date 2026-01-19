<?php

namespace diser;

use Illuminate\Database\Eloquent\Model;

class Aspirante extends Model
{
     protected $table='aspirantes'; 

    protected $fillable = [
			
            'nombre',
            'apellido',
            'tipo_documento',

            'documento',
            'lugar_expedicion',
            'email',
            'telefono',
            'programa',
            'semestre',
            'foto',
            'numero_tarjeton',
            'solicitud',
            'declaracion',
            'nota',
            'estado'
	];
}
