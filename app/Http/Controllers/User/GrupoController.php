<?php

namespace diser\Http\Controllers\User;

use Illuminate\Http\Request;
use diser\Http\Controllers\Controller;
use diser\Http\Requests\GrupoStoreRequest;
use diser\Http\Requests\GrupoUpdateRequest;
use Illuminate\Support\Facades\Storage;
use diser\Grupo;
use diser\Eleccion;
use diser\Sufragante;
use Alert;

use diser\User;
use diser\Rol;
use diser\Entidad;
use diser\Notificaciones;

use Illuminate\Support\Facades\Redirect;
use diser\Http\Requests\UsuarioStoreRequest;
use DB;
use Mail;
use diser\Mail\SendMailNewUser;

class GrupoController extends Controller
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
     * grupos = contiene la lista de grupos
     */
    public function index(Request $request) 
    {
    	if ($request)
    	{            
    		$grupos = Grupo::orderBy('id', 'DESC')
    		->get();
    		
    		return view('admin.elecciones.grupos.index', compact('grupos'));
    	}
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {	
    	//estado_S envio true para que este activo el estado en la vista
    	$estado_S = "true";

    	return view('admin.elecciones.grupos.create', compact('estado_S'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GrupoStoreRequest $request)
    {
    	$grupo              = new Grupo;
        $grupo->nombre      = $request->get('nombre');
        $grupo->descripcion      = $request->get('descripcion');

        //estado_S se utiliza para el checkbox, si es activo, envio true.
        if ($request->estado === "Activo") {

            $grupo->estado = 'Activo';
        } else {

            $grupo->estado = 'Inactivo';
        }

        $grupo->save();

        return redirect()
        ->route('grupos.create')
        ->with('info', 'Grupo creado con éxito');


    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$grupo = Grupo::find($id);

    	return view('admin.elecciones.grupos.show', compact('grupo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$grupo = Grupo::find($id);
    	//estado_S se utiliza para el checkbox, si es activo, envio true.
    	if ($grupo->estado === "Activo") {

            $estado_S = "true";
        } else {

            $estado_S = "false";
        }

        return view('admin.elecciones.grupos.edit', compact('grupo','estado_S'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GrupoUpdateRequest $request, $id)
    {   

    	$grupo              =  Grupo::find($id);

     $grupo->nombre      =  $request->get('nombre');
     $grupo->descripcion         =  $request->get('descripcion');

        //estado_S se utiliza para el checkbox, si es activo, envio true.
     if ($request->estado === "Activo") {

        $grupo->estado = 'Activo';
    } else {

        $grupo->estado = 'Inactivo';
    }
    $grupo->save();

    return redirect()
    ->route('grupos.index')
    ->with('info', 'Grupo actualizada con éxito');
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	return back()->with('alerta', 'Problema al ser eliminado, reporte al administrador!!!');

    	$grupo = Grupo::find($id)->delete();
    }

//////
    public function asignar_grupo(Request $request){

        // dd($request);
        $grupos = Grupo::where('estado','=','Activo')
        ->orderBy('id', 'desc')->pluck('nombre', 'id');

        $elecciones = Eleccion::where('estado','=','Pendiente')
        ->orderBy('id', 'desc')->pluck('nombre', 'id');


        $usuario2 = User::where([['estado','=','Activo'],['id_grupo','=',$request->idgrupo]])
        ->orderBy('id', 'ASC')->pluck('email', 'id');
        // dd(count($usuario2));
        $gruposelected = $request->idgrupo;

        return view('admin.elecciones.grupos.asignar_grupo',compact('elecciones','usuario2','grupos','gruposelected'));
    }

    public function asignar_grupo_guardar(Request $request){

        // dd($request->request);

        try{


            // DB::beginTransaction();
        // elimino duplicados del array 
            $users = array_unique($request->id_users);

            $eleccion = Eleccion::find($request->get('ideleccion'));
            // dd($eleccion->nombre);

            foreach ($users as $users) {

                //valida que el usuario no este habilidado en la eleccion seleccionada
             $validar = Sufragante::where([['id_eleccion','=',$request->get('ideleccion')],['id_user','=',$users]])
             ->get();

             if (count($validar) > 0) {

           // dd(count($validar));
               # code...


                 if ($validar[0]->id_eleccion =! $request->get('ideleccion')) {
               # code...
                    $Sufragante                   = new Sufragante;
                    $Sufragante->id_eleccion      = $request->get('ideleccion');
                    $Sufragante->id_user          = $users;
                    $Sufragante->estado           = "Activo";
                    $Sufragante->save();
                    // dd('if validado');
                }
            }else{

                $Sufragante                   = new Sufragante;
                $Sufragante->id_eleccion      = $request->get('ideleccion');
                $Sufragante->id_user          = $users;
                $Sufragante->estado           = "Activo";
                $Sufragante->save();


                /////-----------ESPACIO PARA ENVIO DEL EMAIL----------/////////////

                $sufragante_nombre = User::find($users); 
                //genero una contrasena aleatoria de 8 caracteres
                // $random_password   = str_random(8);
                $random_password   = "123456";

                $usuario           = User::find($users);
                $usuario->password =  bcrypt($random_password);
                // $usuario->password =  bcrypt($random_password);
                $usuario->save();

                // dd($sufragante_nombre->name);

                if (Notificaciones::isEmailInicioEleccion()) {
                     ///-------------enviar email con datos de inicio de session USUARIOS NUEVOS -------------////
                    $subject = $eleccion->nombre;
                    $email   = $sufragante_nombre->email;
                    $pass    = $random_password;
                    $nombre  = $sufragante_nombre->name;
                    try{
                        Mail::to($sufragante_nombre->email)
                        ->send( new SendMailNewUser( $subject, $email, $pass, $nombre ) ); 
                    }catch(\Exception $e){      }
                }

            }

        }

        return redirect()
        ->route('asignargrupo')
        ->with('info', 'Usuarios Asignados correctamente!');




            // DB::commit();

    }catch(\Exception $e)
    {

      return redirect()
      ->route('asignargrupo')
      ->with('alerta', 'Ocurrio un problema, intentelo de nuevo, o reporte al administrados!');

  }


}
}
