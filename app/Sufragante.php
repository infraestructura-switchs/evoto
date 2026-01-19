<?php

namespace diser;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;

class Sufragante extends Model
{
	protected $table='sufragantes'; 

	protected $fillable = [
		'id_eleccion',
		'id_user',
		'estado'
	];

// 	//retorna si esta realizo el voto para generar certificado
// 	public static  function  certificado(){

// 		 //si ya realizo el voto y l eleccion esta activa, puede descargar el certificado de la eleccion
// 		$votaciones = DB::table('sufragantes as sufragantes')
// 		->join('elecciones as elecciones', 'sufragantes.id_eleccion', '=', 'elecciones.id')
// 		->join('users as users', 'sufragantes.id_user', '=', 'users.id')
// 		->select('users.*',
// 			'elecciones.nombre as nombre',
// 			'elecciones.id as id_eleccion'
// 		)

// 		->where([['sufragantes.id_user',Auth::user()->id],['sufragantes.estado','=','Desactivado']])
// 		->orderBy('id_eleccion','DESC')
// 		->get();
// // dd($votaciones);
//         //en historico sufragante verifica si en elecciones cerradas realizo el voto
// 		$votacionesH = DB::table('historico_sufragantes as historico_sufragantes')
// 		->join('elecciones as elecciones', 'historico_sufragantes.id_eleccion', '=', 'elecciones.id')
// 		->join('users as users', 'historico_sufragantes.id_user', '=', 'users.id')
// 		->select('users.*',
// 			'elecciones.nombre as nombre',
// 			'elecciones.id as id_eleccion'
// 		)

// 		->where([['historico_sufragantes.id_user',Auth::user()->id],['historico_sufragantes.estado','=','Desactivado']])
// 		->orderBy('id_eleccion','DESC')
// 		->get();
// return [$votaciones,$votacionesH];

//            // dd($votacionesH);
// // 		if(count($votaciones) > 0) {
// // 			return view('user.elecciones.certificado.certificado', compact('votaciones'));
// // 		}else if(count($votacionesH) > 0){
// // 			$votaciones = $votacionesH;
// // // dd("dd");
// // 			return view('user.elecciones.certificado.certificado', compact('votaciones'));
// // 		}else{
// // 			return redirect()->route('home')
// // 			->with('alerta', 'No hay elecciones activas en el momento!!!');
// // 		}


// 	}
}

