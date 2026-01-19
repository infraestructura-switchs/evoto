<?php

namespace diser\Http\Controllers;

use Illuminate\Http\Request;
use diser\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

use diser\Candidato;
use diser\sufragante;
use diser\Eleccion;
use diser\Votacion;
use diser\HomeImage;
use DateTime;
use Alert;
use DB;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //selecciono las elecciones que estan en estado de Ejecucion
        $eleccion = DB::table('elecciones')
            ->where('estado', '=', 'Ejecucion')
            ->get();

        $eleccion_count = DB::table('elecciones')
            ->where('estado', '=', 'Ejecucion')
            ->count();

        // Cuenta la cantidad de sufragantes
        $sufragantes = DB::table('sufragantes as su')
            ->join('elecciones as el', 'su.id_eleccion', '=', 'el.id')
            ->select('su.id', 'el.nombre as eleccion', 'su.estado')
            ->where('el.estado', '=', 'Ejecucion')
            ->count();

        // Cuenta la cantidad de sufragantes que realizaron el voto
        $sufragantes_voto = DB::table('sufragantes as su')
            ->join('elecciones as el', 'su.id_eleccion', '=', 'el.id')
            ->select('su.id', 'el.nombre as eleccion', 'su.estado')
            ->where([['el.estado', '=', 'Ejecucion'], ['su.estado', '=', 'Desactivado']])
            ->count();


        $resta_votantes = $sufragantes - $sufragantes_voto;

        if ($sufragantes > 0) {
            # code...
            $porcentaje_votantes = ($sufragantes_voto / $sufragantes) * 100;
        } else {
            $porcentaje_votantes = 0;
        }


        $candidatos = DB::table('elecciones as el')
            ->join('candidatos as can', 'can.ideleccion', '=', 'el.id')
            ->select('can.id', 'can.nombre', 'can.apellido', 'can.numero_tarjeton', 'el.id as eleccionid', 'el.nombre as eleccion', 'el.estado', 'can.foto', 'can.estado')
            ->where([
                ['el.estado', '=', 'Ejecucion']])
            ->orderBy('can.id', 'ASC')
            ->count();

        // dd($eleccion_count);
        if ($eleccion_count > 0) {
            //valida si el usuario con rol usuario, tiene elecciones pendientes y esta activo
            $validar_voto_usuario = DB::table('sufragantes')
                ->where([['estado', '=', 'Activo'], ['id_user', '=', Auth::user()->id], ['id_eleccion', '=', $eleccion[0]->id]])
                ->orderBy('can.id', 'ASC')
                ->count();

            // dd($validar_voto_usuario);
            if ($validar_voto_usuario === 1) {
                return redirect('elecciones/votacion');
            }
        } else {
            $validar_voto_usuario = 0;
        }

        $imagenbackground = HomeImage::whereEstado('Activo')->first();



        // ########################## CERTIFICADOS ######################## //
        //si ya realizo el voto y l eleccion esta activa, puede descargar el certificado de la eleccion
        $votaciones = DB::table('sufragantes as sufragantes')
            ->join('elecciones as elecciones', 'sufragantes.id_eleccion', '=', 'elecciones.id')
            ->join('users as users', 'sufragantes.id_user', '=', 'users.id')
            ->select('users.*',
                'elecciones.nombre as nombre',
                'elecciones.id as id_eleccion'
            )

            ->where([['sufragantes.id_user',Auth::user()->id],['sufragantes.estado','=','Desactivado']])
            ->orderBy('id_eleccion','DESC')
            ->get();

        //en historico sufragante verifica si en elecciones cerradas realizo el voto
        $votacionesH = DB::table('historico_sufragantes as historico_sufragantes')
            ->join('elecciones as elecciones', 'historico_sufragantes.id_eleccion', '=', 'elecciones.id')
            ->join('users as users', 'historico_sufragantes.id_user', '=', 'users.id')
            ->select('users.*',
                'elecciones.nombre as nombre',
                'elecciones.id as id_eleccion'
            )

            ->where([['historico_sufragantes.id_user',Auth::user()->id],['historico_sufragantes.estado','=','Desactivado']])
            ->orderBy('id_eleccion','DESC')
            ->get();

          

        if(count($votaciones) > 0) {
           
        }else if(count($votacionesH) > 0){

                $votaciones = $votacionesH;
               
        }



        // ########################## CERTIFICADOS ######################## //



        return view('home', compact('candidatos', 'eleccion', 'sufragantes', 'resta_votantes', 'porcentaje_votantes', 'validar_voto_usuario', 'imagenbackground','votaciones'));
        // return view('home');
    }
}
