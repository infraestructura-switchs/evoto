<?php

namespace diser\Http\Controllers\user;

use Illuminate\Http\Request;
use diser\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

use diser\Candidato;
use diser\sufragante;
use diser\Eleccion;
use diser\Votacion;
use DateTime;
use Alert;
use DB;
use Auth;
use Barryvdh\DomPDF\Facade as PDF;

class EstadisticaController extends Controller
{

	    /**
     * Create a new controller instance.
     *
     * @return void
     */
      public function __construct()
      {	
    	//con este metodo, no se da acceso al controlador si el 
    	//usuario no esta logueado
       $this->middleware('auth');
     }

    /**
     * Display a listing of the resource.
     *
     * candidatos = contiene la lista de candidatos
     */
    public function index(Request $request) 
    {


    	if ($request)
    	{   
         //LISTAR ELECCIONES QUE ESTEN EN ESTADO CERRADAS	
       $elecciones = Eleccion::where('estado','=','Cerrada')
       ->orderBy('id', 'ASC')->pluck('nombre', 'id'); 


       $eleccion_selecionada = DB::table('elecciones')
       ->where('id','=',$request->id_eleccion)
       ->get();
       

       $candidatos_i=DB::table('candidatos as can')
         // ->join('votaciones as vo','can.id','=','vo.id_candidato')
       ->join('elecciones as el','can.ideleccion','=','el.id')
       ->select('can.id','can.nombre','can.apellido','can.numero_tarjeton','el.id as eleccionid','el.nombre as eleccion','el.estado','can.foto','can.estado')
       ->where([
        ['el.estado','=','Cerrada'],
        ['can.ideleccion','=',$request->id_eleccion]])
       ->groupBy('can.id')
       ->orderBy('can.numero_tarjeton','DESC')
       ->get();

       $candidatos=$candidatos_i;
        //**************************************************************************
     	// *********** AGREGA VOTOS A LA COLLECCION *********************//

       for ($i=0; $i <count($candidatos_i) ; $i++) {

        $voto_candidato = DB::table('votaciones as vo')
        ->where('vo.id_candidato','=',$candidatos_i[$i]->id)
        ->count();


        if ($i <= 0) {

                #SE CREA LA COLLECTION Y AGREGO LOS VOTOS DE CADA CANDIDATO
          $candidatos = collect(array((object)[
            'id'                => $candidatos_i[$i]->id,
            'nombre'            => $candidatos_i[$i]->nombre,
            'apellido'          => $candidatos_i[$i]->apellido,
            'numero_tarjeton'   => $candidatos_i[$i]->numero_tarjeton,
            'eleccionid'        => $candidatos_i[$i]->eleccionid,
            'eleccion'          => $candidatos_i[$i]->eleccion,
            'estado'            => $candidatos_i[$i]->estado,
            'foto'              => $candidatos_i[$i]->foto,
            'votos'             => $voto_candidato
          ]));


        }else{

                  #SE AGREGA ARRAY A LA COLLECTION Y AGREGO LOS VOTOS DE CADA CANDIDATO


         $candidatos->prepend((object)[
           'id'                => $candidatos_i[$i]->id,
           'nombre'            => $candidatos_i[$i]->nombre,
           'apellido'          => $candidatos_i[$i]->apellido,
           'numero_tarjeton'   => $candidatos_i[$i]->numero_tarjeton,
           'eleccionid'        => $candidatos_i[$i]->eleccionid,
           'eleccion'          => $candidatos_i[$i]->eleccion,
           'estado'            => $candidatos_i[$i]->estado,
           'foto'              => $candidatos_i[$i]->foto,
           'votos'             => $voto_candidato            
         ]); 

       }


// dd('3');
     }
        //**************************************************************************            



          // Cuenta la cantidad de sufragantes que estaban habilitados para la eleccion
     $sufragantes=DB::table('historico_sufragantes as su')     
     ->join('elecciones as el','su.id_eleccion','=','el.id')
     ->select('su.id','el.nombre as eleccion','su.estado')
     ->where('su.id_eleccion','=',$request->id_eleccion)
     ->count();

         // Cuenta la cantidad de sufragantes que realizaron el voto
     $sufragantes_voto=DB::table('historico_sufragantes as su')     
     ->join('elecciones as el','su.id_eleccion','=','el.id')
     ->select('su.id','el.nombre as eleccion','su.estado')
     ->where([['su.id_eleccion','=',$request->id_eleccion],['su.estado','=','Desactivado']])
     ->count();


     $resta_votantes = $sufragantes - $sufragantes_voto;

     if ($sufragantes > 0) {
          # code...
      $porcentaje_votantes = ($sufragantes_voto/$sufragantes)*100;
    }else{
     $porcentaje_votantes = 0;
   }

   $candidatos_count = DB::table('elecciones as el')
   ->join('candidatos as can','can.ideleccion','=','el.id')
   ->where([       
    ['can.ideleccion','=',$request->id_eleccion]])
   ->count();

   return view('admin.estadisticas.index', compact('elecciones','eleccion_selecionada','candidatos','sufragantes','sufragantes_voto','resta_votantes','porcentaje_votantes','candidatos_count'));
 }
}

public function reporte_eleccion($id){

  $eleccion=DB::table('elecciones')
  ->where('id','=',$id)
  ->get();
      //nombre de la eleccion
  $nombreEleccion = array_pluck($eleccion, 'nombre');



      /////////////
      ///// Utilizado para conta la cantidad de sufragantes
  $sufragantes=DB::table('historico_sufragantes as su')    
  ->join('elecciones as el','su.id_eleccion','=','el.id')
  ->select('su.id','el.nombre as eleccion','su.estado')
  ->where('su.id_eleccion','=',$id)
  ->count();

     // Utilizado para conta la cantidad sufragantes que que ya realizaron el voto
  $voto_realizados=DB::table('historico_sufragantes as su')   
  ->join('elecciones as el','su.id_eleccion','=','el.id')
  ->select('su.id','el.nombre as eleccion','su.estado','el.estado')
  ->where([['su.estado','=','Desactivado'],['su.id_eleccion','=',$id]])
  ->count();

         // Utilizado para conta la cantidad sufrgantes que que quearon activos pero no realizaron el voto
    // $voto_no_marcado=DB::table('historico_sufragantes as su')    
    // ->join('elecciones as el','su.id_eleccion','=','el.id')
    // ->select('su.id','el.nombre as eleccion','su.estado','el.estado')
    // ->where([['su.estado','=','Votacion'],['su.ideleccion','=',$id]])
    // ->count();
         //fecha de generado 
  $now = new \DateTime();
  $date = $now->format('d-m-Y H:i:s');
  $codigo = $now->format('dmyHi');

  


        //cuento los votos de los candidatos
    // $candidatos=DB::table('votaciones as vo')
    // ->join('candidatos as can','vo.id_candidato','=','can.id')

    // ->select(DB::raw('count(vo.id_candidato) as voto, vo.id_candidato as candidato'), 'can.nombre as nombre','can.apellido as apellido', 'can.foto', 'can.numero_tarjeton')
    // ->where('can.ideleccion','=' ,$id)
    // ->groupBy('candidato')
    // ->get();

  $candidatos_i=DB::table('candidatos as can')
         // ->join('votaciones as vo','can.id','=','vo.id_candidato')
  ->join('elecciones as el','can.ideleccion','=','el.id')
  ->select('can.id','can.nombre','can.apellido','can.numero_tarjeton','el.id as eleccionid','el.nombre as eleccion','el.estado','can.foto','can.estado')
  ->where([
    ['el.estado','=','Cerrada'],
    ['can.ideleccion','=',$id]])
  ->groupBy('can.id')
  ->orderBy('can.numero_tarjeton','DESC')
  ->get();


        //**************************************************************************
        // *********** AGREGA VOTOS A LA COLLECCION *********************//

  for ($i=0; $i <count($candidatos_i) ; $i++) {

    $voto_candidato = DB::table('votaciones as vo')
    ->where('vo.id_candidato','=',$candidatos_i[$i]->id)
    ->count();


    if ($i <= 0) {

                #SE CREA LA COLLECTION Y AGREGO LOS VOTOS DE CADA CANDIDATO
      $candidatos = collect(array((object)[
        'id'                => $candidatos_i[$i]->id,
        'nombre'            => $candidatos_i[$i]->nombre,
        'apellido'          => $candidatos_i[$i]->apellido,
        'numero_tarjeton'   => $candidatos_i[$i]->numero_tarjeton,
        'eleccionid'        => $candidatos_i[$i]->eleccionid,
        'eleccion'          => $candidatos_i[$i]->eleccion,
        'estado'            => $candidatos_i[$i]->estado,
        'foto'              => $candidatos_i[$i]->foto,
        'votos'             => $voto_candidato
      ]));


    }else{

                  #SE AGREGA ARRAY A LA COLLECTION Y AGREGO LOS VOTOS DE CADA CANDIDATO
      

     $candidatos->prepend((object)[
       'id'                => $candidatos_i[$i]->id,
       'nombre'            => $candidatos_i[$i]->nombre,
       'apellido'          => $candidatos_i[$i]->apellido,
       'numero_tarjeton'   => $candidatos_i[$i]->numero_tarjeton,
       'eleccionid'        => $candidatos_i[$i]->eleccionid,
       'eleccion'          => $candidatos_i[$i]->eleccion,
       'estado'            => $candidatos_i[$i]->estado,
       'foto'              => $candidatos_i[$i]->foto,
       'votos'             => $voto_candidato            
     ]); 
     
   }


 }
        //**************************************************************************


 $pdf = PDF::loadView('admin.estadisticas.pdf', compact('eleccion', 'nombreEleccion', 'sufragantes', 'voto_realizados', 'voto_no_marcado', 'date','codigo','candidatos'));



 return $pdf->stream('Acta escrutinio.pdf');
}

} 
