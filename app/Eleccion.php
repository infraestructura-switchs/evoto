<?php

namespace diser;

use Illuminate\Database\Eloquent\Model;

class Eleccion extends Model
{
	protected $table='elecciones'; 

	protected $fillable = [
		'nombre',
		'descripcion',
		'cargo_recibir',
		'estado',
		'id_entidad',
		'id_user',
		'departamento',
		'ciudad',
		'lugar',
		'pagina_publicacion_convocatoria',
		'fecha_inicio_eleccion',
		'fecha_fin_eleccion',
		'hora_apertura_eleccion',		
		'hora_cierre_eleccion',
		'fecha_apertura_inscripcion',
		'fecha_cierre_inscripcion',
		'periodo_eleccion_desde',
		'periodo_eleccion_hasta'
	];
}
