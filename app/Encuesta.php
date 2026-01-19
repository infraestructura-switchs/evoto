<?php

namespace diser;

use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
   	protected $table='encuestas'; 

    protected $fillable = [
	'id_entidad','users_id','nombre', 'descripcion', 'fecha_inicio','fecha_cierre', 'estado'
	];
}
