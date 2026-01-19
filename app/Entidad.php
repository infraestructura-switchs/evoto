<?php

namespace diser;

use Illuminate\Database\Eloquent\Model;

class Entidad extends Model
{
   	protected $table='entidades'; 

    protected $fillable = [
	'nit','nombre', 'direccion', 'telefono','email', 'sitio_web',
	 'descripcion', 'logo'
	];
}
