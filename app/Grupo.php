<?php

namespace diser;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
     protected $table='grupos'; 

    protected $fillable = [
	'nombre', 'descripcion', 'estado'
	];
}
