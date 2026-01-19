<?php

namespace diser\Http\Controllers\Admin;

use Illuminate\Http\Request;
use diser\Http\Controllers\Controller;
use diser\Http\Requests\RolStoreRequest;
use diser\Http\Requests\RolUpdateRequest;

use Illuminate\Support\Facades\Storage;

use diser\Rol;
use Alert;

class RolController extends Controller
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
     * roles = contiene la lista de roles
     */
    public function index(Request $request) 
    {
    	if ($request)
    	{            
    		$roles = Rol::orderBy('id', 'DESC')
    		->get();
    		
    		return view('admin.configuraciones.roles.index', compact('roles'));
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

    	return view('admin.configuraciones.roles.create', compact('estado_S'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(rolStoreRequest $request)
    {
    	$rol              = new Rol;
        $rol->nombre      = $request->get('nombre');
        $rol->descripcion      = $request->get('descripcion');
               
        //estado_S se utiliza para el checkbox, si es activo, envio true.
        if ($request->estado === "Activo") {

            $rol->estado = 'Activo';
        } else {

            $rol->estado = 'Inactivo';
        }

        $rol->save();
  	
    	return redirect()
    	->route('roles.create')
    	->with('info', 'Rol creado con éxito');


    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$rol = Rol::find($id);

    	return view('admin.configuraciones.roles.show', compact('rol'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$rol = Rol::find($id);
    	//estado_S se utiliza para el checkbox, si es activo, envio true.
    	if ($rol->estado === "Activo") {

            $estado_S = "true";
        } else {

            $estado_S = "false";
        }

    	return view('admin.configuraciones.roles.edit', compact('rol','estado_S'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RolUpdateRequest $request, $id)
    {   

    	$rol              =  Rol::find($id);

   		$rol->nombre      =  $request->get('nombre');
        $rol->descripcion         =  $request->get('descripcion');
     
        //estado_S se utiliza para el checkbox, si es activo, envio true.
        if ($request->estado === "Activo") {

            $rol->estado = 'Activo';
        } else {

            $rol->estado = 'Inactivo';
        }
        $rol->save();

    	return redirect()
    	->route('roles.index')
    	->with('info', 'Rol actualizada con éxito');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$rol = Rol::find($id)->delete();
    	return back()->with('info', 'Eliminada correctamente');
    }
}
