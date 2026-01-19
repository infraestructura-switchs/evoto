<?php

namespace diser\Http\Controllers\User;

use Illuminate\Http\Request;
use diser\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use diser\Http\Requests\EleccionsStoreRequest;
use diser\Http\Requests\EleccionUpdateRequest;
//use diser\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use diser\Candidato;
use diser\Eleccion;
use diser\Sufragante;
use diser\User;
use diser\Notificaciones;
use Alert;
use DB;
use Auth;
use diser\Http\Controllers\Api\RestApiMSG;

use diser\Exports\SufragantesExport;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;

class EleccionController extends Controller
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
     * Elecciones = contiene la lista de Elecciones
     */
    public function index(Request $request)
    {
      if ($request) {
        $elecciones = Eleccion::orderBy('id', 'DESC')
        ->get();


        return view('user.elecciones.elecciones.index', compact('elecciones'));
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
      return view('user.elecciones.elecciones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //guarda todos los campos traidos del request
        // $Eleccion = Eleccion::create($request->all());

      $eleccion                                   = new Eleccion;
      $eleccion->nombre                           = $request->get('nombre');      
      $eleccion->descripcion                      = $request->get('descripcion');
      $eleccion->cargo_recibir                    = $request->get('cargo_recibir');
      $eleccion->departamento                     = $request->get('departamento');
      $eleccion->ciudad                           = $request->get('ciudad');
      $eleccion->lugar                            = $request->get('lugar');
      $eleccion->pagina_publicacion_convocatoria  = $request->get('pagina_publicacion_convocatoria');
      $eleccion->fecha_inicio_eleccion            = $request->get('fecha_inicio_eleccion');
      $eleccion->fecha_fin_eleccion               = $request->get('fecha_fin_eleccion');
      $eleccion->hora_apertura_eleccion           = $request->get('hora_apertura_eleccion');
      $eleccion->hora_cierre_eleccion             = $request->get('hora_cierre_eleccion');
      $eleccion->fecha_apertura_inscripcion       = $request->get('fecha_apertura_inscripcion');
      $eleccion->fecha_cierre_inscripcion         = $request->get('fecha_cierre_inscripcion');
      $eleccion->hora_apertura_inscripcion         = $request->get('hora_apertura_inscripcion');
      $eleccion->periodo_eleccion_desde           = $request->get('periodo_eleccion_desde');
      $eleccion->periodo_eleccion_hasta           = $request->get('periodo_eleccion_hasta');
      $eleccion->id_entidad                       = "3";
      $eleccion->save();
        // // $eleccion->users_id      = Auth::id();  

        // //si hay un archivo de imagen lo guardo, de lo contrario no realizo ninguna accion
        // if ($request->file('logo')) {
        //     $path = Storage::disk('Eleccion')->put('logo', $request->file('logo'));
        //     $Eleccion->fill(['logo' => asset($path)])->save();
        // }

      return redirect()
      ->route('elecciones.index')
      ->with('info', 'Eleccion creada con éxito'); 


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $eleccion = Eleccion::find($id);
      return view('user.elecciones.elecciones.show', compact('eleccion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $eleccion = Eleccion::find($id);
      return view('user.elecciones.elecciones.edit', compact('eleccion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EleccionUpdateRequest $request, $id)
    {
        //busco la Eleccion
      $eleccion = Eleccion::find($id);
        //guardo todos los campos traidos del request
      $eleccion->fill($request->all())->save();


      return redirect()
      ->route('elecciones.index')
      ->with('info', 'Eleccion actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      if(Auth::user()->isAdmin()){

        $eleccion = Eleccion::find($id);
        if($eleccion->estado == 'Pendiente')
        {
         try {
          $candidatos = Candidato::whereIdeleccion($eleccion->id)->count();

          if ($candidatos >0) {

            return back()->with('alerta', 'No puede ser eliminada!');

          }else{

            $eleccion->delete();

            return back()->with('info', 'Eliminada correctamente');
          }

        } catch (Throwable $e) {

         return back()->with('alerta', 'No puede ser eliminada!');
       }



     }else{
       return back()->with('alerta', 'No puede ser eliminada!');
     }

   }else{
     return back()->with('alerta', 'No tiene permiso suficientes!');

   }
 }

    //funcion para activar eleccion
 public function activar_eleccion(Request $request)
 {
    // $credentials = $request->only('email', 'password');



    // if (Auth::attempt($credentials)) {


  $votoblanco = $request->votoblanco;
  $id = $request->id;
            //cuento la cantidad de candidatos pertenecientes a una eleccion
  $candidatos = DB::table('candidatos')
  ->where('ideleccion', '=', $id)
  ->count();
            // dd($candidatos);

            // cuento la cantidad de elecciones activas
  $elecciones = DB::table('elecciones')
  ->where('estado', '=', 'Ejecucion')
  ->count();

            //cuento la cantidad de sufragantes pertenecientes a una eleccion
  $sufragantes = DB::table('sufragantes')
  ->where('id_eleccion', '=', $id)
  ->count();

            //valido que solo este activa una eleccion
  if ($elecciones === 0) {
                //se valida que almenos haya 1 candidato en la eleccion
    if ($candidatos >= 1) {

      if ($sufragantes >= 1) {
                        // dd($request->votoblanco);

        if ($votoblanco === "Activo") {
                            //agrego voto en blanco al tarjeton si es true
          $voto_blanco = new Candidato;
          $voto_blanco->ideleccion = $id;
          $voto_blanco->nombre = 'Voto en Blanco';
          $voto_blanco->apellido = '';
          $voto_blanco->numero_tarjeton = '10';
          $voto_blanco->estado = 'Activo';
          $voto_blanco->foto = 'blanco.jpg';
          $voto_blanco->save();
                            # code...
        }

                        //realizo activacion de la eleccion, estado Ejecucion.
        $eleccion = Eleccion::findOrFail($id);
        $eleccion->estado = 'Ejecucion';
        $eleccion->update();

        if (Notificaciones::isSmsInicioEleccion()) {


                            // $message = 'El proceso de elección "'.$eleccion->nombre.'" ha sido activado.  Puede Ingresar en el siguiente link %lm0.eu/u3tzLqZ%  ';

          $message = 'El proceso de elección "'.$eleccion->nombre.'" ha sido activado.  revisa el correo para realizar el voto';


          $recipients  = ['573172143113'];

          RestApiMSG::enviarMessage( $message ,$recipients );
                            // dd($message);
        }

        return Redirect::to('urna/elecciones')->with('info', $message);
      } else {

        return Redirect::to('urna/elecciones')->with('alerta', 'Para inicar la eleccion debe tener como minimo, uno (1) sufragante asignado a esta elección');
      }

    } else {
      return Redirect::to('urna/elecciones')->with('alerta', 'Para inicar la eleccion debe tener como minimo, uno (1) candidato');

    }

  } else {

    return Redirect::to('urna/elecciones')->with('alerta', 'Solo se Puede iniciar una elección a la vez!');
  }
        // }//if validacion
        // else {
        //     return Redirect::to('urna/elecciones')->with('alerta', 'Usuario y/o Contraseña incorrectos!');

        // }

}

    //funcion para cerrar eleccion
public function cerrar_eleccion($id)
{
        //realizo el cierre de la eleccion, cambiandolo a estado Cerrado.
  $eleccion = Eleccion::findOrFail($id);
  $eleccion->estado = 'Cerrada';
  $eleccion->update();

        //traigo todos los suragantes que pertenecen a esa eleccion
        // $suragantes=DB::table('sufragantes')
        // ->where('id_eleccion','=',$id);

        // almaceno los sufragantes en el historico de la eleccion que cierro.
  DB::insert('INSERT INTO historico_sufragantes (id_eleccion, id_user, estado, created_at, updated_at) SELECT id_eleccion, id_user, estado, created_at, updated_at FROM sufragantes WHERE id_eleccion=?', [$id]);

        //elimino de los datos de la tabla sufragante
  DB::delete('DELETE FROM sufragantes WHERE id_eleccion=?', [$id]);

  return Redirect::to('urna/elecciones')->with('info', 'la eleccion se cerro con exito!!!');
}

    //########  USUARIOS ASIGNADOS ELECCION  ########//

public function asignados(Request $request)
{
  if ($request) {

    $ideleccion = $request->ideleccion; 

            // $asignados = Sufragante::orderBy('id', 'DESC')
            // ->get();
    $elecciones = Eleccion::orderBy('id', 'ASC')->pluck('nombre', 'id');
    $seleccionada = Eleccion::find($ideleccion);


    $asignados=DB::table('sufragantes as su')
    ->join('users as us','su.id_user','=','us.id')
    ->join('grupos as gru','us.id_grupo','=','gru.id')
    ->select('su.id','us.documento','su.estado','us.name','us.apellido','us.email','gru.nombre as grupo')

    ->where([['su.id_eleccion','=',$ideleccion]])
          // ->orderBy('can.id','ASC')
    ->get();


// dd($asignados);
    return view('admin.elecciones.asignados.asignar', compact('asignados','elecciones','seleccionada'));
  }
}

public function excel_sufragantes($id){

  $sufragantes_eleccion = DB::table('sufragantes as su')
  ->join('users as us', 'su.id_user', '=', 'us.id')            
  ->join('elecciones as el', 'su.id_eleccion', '=', 'el.id')            
  ->join('grupos as gru', 'us.id_grupo', '=', 'gru.id')            
  ->select(
    'gru.nombre as grupo',
    'us.documento',
    'us.name as nombre',
    'us.apellido as apellido',
    'us.telefono',
    'us.email'
    // 'su.estado'
  )           
  ->where([['el.id','=',$id]])  
  ->orderBy('us.documento','ASC')
  ->get();


  $sufragantes_eleccion->prepend((object)[
    'grupo'              => "GRUPO" ,
    // 'gestor' => "GESTOR",
    'documento'          => "DOCUMENTO",
    'nombre'             => "NOMBRE",
    'apellido'           => "APELLIDO",
    'telefono'           => "TELEFONO",
    'email'              => "EMAIL"
    // 'estado'             => "ESTADO"
  ]);


  $export = new SufragantesExport($sufragantes_eleccion);


  return Excel::download($export, 'Listado_sufragantes.xlsx');

}

public function pdf_sufragantes($id){

  $eleccion = Eleccion::find($id);

  $sufragantes_eleccion = DB::table('sufragantes as su')
  ->join('users as us', 'su.id_user', '=', 'us.id')            
  ->join('elecciones as el', 'su.id_eleccion', '=', 'el.id')            
  ->join('grupos as gru', 'us.id_grupo', '=', 'gru.id')            
  ->select(
    'gru.nombre as grupo',
    'us.documento',
    'us.name as nombre',
    'us.apellido as apellido',
    'us.telefono',
    'us.email',
    'su.estado')           
  ->where([['el.id','=',$id]])  
  ->orderBy('us.documento','ASC')
  ->get();

  $now = new \DateTime();
  $date = $now->format('d-m-Y H:i:s');
  $codigo = $now->format('dmyHi');


  $pdf = PDF::loadView('formatos.exportar_sufragantes',compact('eleccion','sufragantes_eleccion','codigo'));



  return $pdf->stream('Listado_sufragantes.pdf');



  

  

}


}
