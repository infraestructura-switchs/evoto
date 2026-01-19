<?php

namespace diser\Http\Controllers\User;

use Illuminate\Http\Request;

use diser\Http\Controllers\Controller;
use diser\Http\Requests\EncuestaStoreRequest;
use diser\Http\Requests\EncuestaUpdateRequest;
//use diser\Image\ImageManager;
use Illuminate\Support\Facades\Storage;

use diser\Encuesta;
use Alert;

use Illuminate\Support\Facades\Auth;
class EncuestaController extends Controller
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
     * encuestas = contiene la lista de encuestas
     */
    public function index(Request $request) 
    {

        return back()->with('alerta', 'Modulo en Construcción');

    	if ($request)
    	{            
    		$encuestas = Encuesta::orderBy('id', 'DESC')
    		->get();
    		
    		return view('admin.encuestas.encuestas.index', compact('encuestas'));
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

    	return view('admin.encuestas.encuestas.create', compact('estado_S'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EncuestaStoreRequest $request)
    {
    	
    	$encuesta                = new Encuesta;
    	$encuesta->id_entidad	     = 3;
    	$encuesta->users_id		 = Auth::id();	
        $encuesta->nombre      	 = $request->get('nombre');
        $encuesta->descripcion   = $request->get('descripcion');
        $encuesta->fecha_inicio  = $request->get('fecha_inicio');
        $encuesta->fecha_cierre  = $request->get('fecha_cierre');

       
        //estado_S se utiliza para el checkbox, si es activo, envio true.
        if ($request->estado === "Activo") {

            $encuesta->estado = 'Activo';
        } else {

            $encuesta->estado = 'Inactivo';
        }
        $encuesta->save();
  	

    	return redirect()
    	->route('encuestas.index')
    	->with('info', 'Encuesta creada con éxito');


    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$encuesta = Encuesta::find($id);
    	return view('admin.encuestas.encuestas.show', compact('encuesta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$encuesta = Encuesta::find($id);

    	//estado_S se utiliza para el checkbox, si es activo, envio true.
    	if ($encuesta->estado === "Activo") {

            $estado_S = "true";
        } else {

            $estado_S = "false";
        }


    	return view('admin.encuestas.encuestas.edit', compact('encuesta','estado_S'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EncuestaUpdateRequest $request, $id)
    {   

    	$encuesta                =  Encuesta::findOrFail($id);
      	$encuesta->id_entidad	 =  3;
    	$encuesta->users_id		 =  Auth::id();	
        $encuesta->nombre      	 =  $request->get('nombre');
        $encuesta->descripcion   =  $request->get('descripcion');
        $encuesta->fecha_inicio  =  $request->get('fecha_inicio');
        $encuesta->fecha_cierre  =  $request->get('fecha_cierre');

       
        //estado_S se utiliza para el checkbox, si es activo, envio true.
        if ($request->estado === "Activo") {

            $encuesta->estado = 'Activo';
        } else {

            $encuesta->estado = 'Inactivo';
        }
        $encuesta->save();
       

    	return redirect()
    	->route('encuestas.index')
    	->with('info', 'Encuesta actualizada con éxito');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	//dd($id);
    	$encuesta = Encuesta::find($id)->delete();
    	return back()->with('info', 'Eliminada correctamente');
    }
}
