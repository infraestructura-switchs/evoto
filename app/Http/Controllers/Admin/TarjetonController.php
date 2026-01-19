<?php

namespace diser\Http\Controllers\Admin;

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
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Barryvdh\DomPDF\Facade as PDF;

class TarjetonController extends Controller
{
    /**
     * <!-- 434f4449474f2043524541444f20504f5220444156494420445552414e202d20564953494f4e205449432e -->
     *
     * @return void
     */
    public function __construct()
    {
        //con este metodo, no se da acceso al controlador si el
        //usuario no esta logueado
        $this->middleware('auth');
    }


    // funcion para mostrar la vista revia del tarjeton
    public function vista_previa_tarjeton(Request $request)
    {

        if ($request) {
            //LISTAR ELECCIONES QUE ESTEN EN ESTADO PENDIENTE
            $elecciones = Eleccion::where('estado', '=', 'Pendiente')
            ->orderBy('id', 'ASC')->pluck('nombre', 'id');

            $candidatos = DB::table('candidatos as can')
            ->join('elecciones as el', 'can.ideleccion', '=', 'el.id')
            ->select('can.id', 'can.nombre', 'can.apellido', 'can.numero_tarjeton', 'el.id as eleccionid', 'el.nombre as eleccion', 'el.estado', 'can.foto', 'can.estado')
            ->where([
                ['el.estado', '!=', 'Cerrada'],
                ['el.id', '=', $request->id_eleccion],
                ['can.estado', '!=', 'Eliminado']])
            ->orderBy('can.id', 'ASC')
            ->get();
            //esta variable modal se utiliza para que el modal del tarjeton solo muestre los sufragantes
            $modal = "show";

            return view('user.elecciones.tarjeton.tarjetonpreview', compact('candidatos', 'elecciones', 'modal'));
        }

    }


    // funcion para mostrar la vista  del tarjeton para realizar el voto
    public function tarjeton()
    {
        //cuento si hay elecciones en estado de ejecucion
        $counteleccion = Eleccion::where('estado', '=', 'Ejecucion')->count();


        if ($counteleccion === 1) {//if-1

            //obtengo la eleccion elecciones en estado de ejecucion
            $eleccion = Eleccion::where('estado', '=', 'Ejecucion')->get();

            //valido si el sufragante esta inscrito en esta eleccion
            $validar = DB::table('sufragantes')
            ->where([
                ['id_user', '=', Auth::id()],
                ['id_eleccion', '=', $eleccion[0]->id]])
            ->count();

            //valido si el sufragante a realizo el voto, si realizo el voto es 1, si no realizo el voto es 0
            $validar2 = DB::table('sufragantes')
            ->where([
                ['id_user', '=', Auth::id()],
                ['estado', '=', 'Desactivado'],
                ['id_eleccion', '=', $eleccion[0]->id]])
            ->count();

            //dd($validar,$validar2);
            if ($validar > 0) {

                if ($validar2 === 0) {

                    $candidatos = DB::table('candidatos as can')
                    ->join('elecciones as el', 'can.ideleccion', '=', 'el.id')
                    ->select('can.id', 'can.nombre', 'can.apellido', 'can.numero_tarjeton', 'el.id as eleccionid', 'el.nombre as eleccion', 'el.estado', 'can.foto', 'can.estado')
                    ->where([
                        ['el.estado', '=', 'Ejecucion'],
                        ['el.id', '=', $eleccion[0]->id],
                        ['can.estado', '!=', 'Eliminado']])
                    ->orderBy('can.id', 'ASC')
                    ->get();

                    // dd($candidatos);
                    //esta variable modal se utiliza para que el modal  del tarjeton  valide y registre el voto
                    $modal = "confirmarvot";

                    return view('user.elecciones.tarjeton.tarjeton', compact('candidatos', 'modal'));
                } else {
                    //si ya realizo el voto no puede votar de nuevo
                    $votaciones = DB::table('sufragantes as sufragantes')
                    ->join('elecciones as elecciones', 'sufragantes.id_eleccion', '=', 'elecciones.id')
                    ->join('users as users', 'sufragantes.id_user', '=', 'users.id')
                    ->select('users.*',
                        'elecciones.nombre as nombre',
                        'elecciones.id as id_eleccion'
                    )

                    ->where('sufragantes.id_user',Auth::user()->id)
                    ->orderBy('id_eleccion','DESC')
                    ->get();
                        // dd($votaciones);

                    return view('user.elecciones.certificado.certificado', compact('votaciones'));
                    /*
                    return
                        //redirect()->route('home')
                        redirect()->route('elecciones.certificado', compact('votaciones'))
                        ->with('alerta', 'Usted ya realizo el voto y no hay elecciones pendientes!!!');
                    */

                    }
                } else {
                //si ya realizo el voto no puede votar de nuevo
                    $votaciones = DB::table('sufragantes as sufragantes')
                    ->join('elecciones as elecciones', 'sufragantes.id_eleccion', '=', 'elecciones.id')
                    ->join('users as users', 'sufragantes.id_user', '=', 'users.id')
                    ->select('users.*',
                        'elecciones.nombre as nombre',
                        'elecciones.id as id_eleccion'
                    )

                    ->where('sufragantes.id_user',Auth::user()->id)
                    ->orderBy('id_eleccion','DESC')
                    ->get();
                // dd($votaciones);
                    if(count($votaciones) > 0){

                        return view('user.elecciones.certificado.certificado', compact('votaciones'));
                    }else{
                    //no tiene votaciones pendintes
                        return redirect()->route('home')
                        ->with('alerta', 'Usted no tiene votaciones pendintes!!!');

                    }
                }
        }//en if-1

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
            return view('user.elecciones.certificado.certificado', compact('votaciones'));
        }else if(count($votacionesH) > 0){

            $votaciones = $votacionesH;
            return view('user.elecciones.certificado.certificado', compact('votaciones'));
        }else{
            return redirect()->route('home')
            ->with('alerta', 'No hay elecciones activas en el momento!!!');
        }

    }


    //funcion para guardar el voto
    public function confirmar_voto(Request $request,$id)
    {

       request()->validate([
        'documento' => 'required|numeric',
        // 'telefono' => 'numeric',
        
        'g-recaptcha-response' => 'required|captcha',
    ]);

     // dd($request->request);
     // dd('d');

        //obtengo la eleccion a la que pertenece el candidato
       $candidato = Candidato::findOrFail($id);


        //valido si el sufragante a realizo el voto, si realizo el voto es 1, si no realizo el voto es 0
       $validar = DB::table('sufragantes')
       ->where([
        ['id_user', '=', Auth::id()],
        ['estado', '=', 'Desactivado'],
        ['id_eleccion', '=', $candidato->ideleccion]])
       ->count();



       if ($validar === 0) {
            # code...
        if (Auth::user()->documento === $request->documento) {


            # code...

            //desactiva el sufragante despues de votar
            DB::table('sufragantes')
            ->where([
                ['id_user', '=', Auth::id()],
                ['id_eleccion', '=', $candidato->ideleccion]])
            ->update(['estado' => 'Desactivado']);

            $voto = new Votacion;
            $voto->id_candidato = $id;
            $voto->fecha_hora = $now = new \DateTime();
            $voto->save();

            return redirect()
            ->route('home')
            ->with('info', 'Voto realizado con exito!!!');

        }else{

           return redirect()
           ->route('home')
           ->with('info', 'El número de identificación no coincide con nuestros registros, inténtelo de nuevo.');
       }

   } else {

    return redirect()
    ->route('home')
    ->with('alerta', 'imposible realizar el voto!!!');
}

}





    //funcion para guardar el voto
public function certificado($id)
{
        // dd('d');
    $votacion = DB::table('sufragantes as sufragantes')
    ->join('elecciones as elecciones', 'sufragantes.id_eleccion', '=', 'elecciones.id')
    ->join('users as users', 'sufragantes.id_user', '=', 'users.id')
    ->select('users.*',
        'elecciones.nombre as nombre'
    )

    ->where('sufragantes.id_user',Auth::user()->id)
    ->where('elecciones.id',$id)
    ->orderBy('id_eleccion','DESC')
    ->first();
    if(empty($votacion)){
            //si ya realizo el voto no puede votar de nuevo
        $votacionesH = DB::table('historico_sufragantes as historico_sufragantes')
        ->join('elecciones as elecciones', 'historico_sufragantes.id_eleccion', '=', 'elecciones.id')
        ->join('users as users', 'historico_sufragantes.id_user', '=', 'users.id')
        ->select('users.*',
            'elecciones.nombre as nombre',
            'elecciones.id as id_eleccion'
        )

        ->where('historico_sufragantes.id_user',Auth::user()->id)
        ->orderBy('id_eleccion','DESC')
        ->first();

        $votacion = $votacionesH;
    }


    $date = date('d-m-Y');
    $pdf = PDF::loadView('user.elecciones.certificado.pdf', compact('votacion','date'));
        return //$pdf->stream('certificado.pdf');
        $pdf->download('certificado.pdf');
    }

}
