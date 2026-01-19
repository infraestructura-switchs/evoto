<?php

namespace diser;

use Illuminate\Database\Eloquent\Model;

class AyudaTemporales extends Model
{
    //
    protected $table='temporales_de_ayuda'; 

    protected $fillable = [
			'import_grupo'
            
	];
}
