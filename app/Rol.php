<?php

namespace diser;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table='roles'; 

    protected $fillable = [
    	'nombre', 'descripcion', 'estado'
	];
}
