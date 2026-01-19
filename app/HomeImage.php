<?php

namespace diser;

use Illuminate\Database\Eloquent\Model;

class HomeImage extends Model
{
     protected $table='home_images'; 

    protected $fillable = [
	'imagen', 'estado'
	];
}
