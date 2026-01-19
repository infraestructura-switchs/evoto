<?php

namespace diser\Http\Controllers\Admin;

use Illuminate\Http\Request;
use diser\Http\Controllers\Controller;



use diser\Http\Requests\EntidadStoreRequest;
use diser\Http\Requests\EntidadUpdateRequest;
//use diser\Image\ImageManager;
use Illuminate\Support\Facades\Storage;

use diser\Entidad;
use Alert;

class EntidadController extends Controller
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
     * entidades = contiene la lista de entidades
     */
    public function index(Request $request) 
    {
    	if ($request)
    	{            
    		$entidades = Entidad::orderBy('id', 'DESC')
    		->get();
    		return view('admin.configuraciones.entidades.index', compact('entidades'));
    	}
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
    	return view('admin.configuraciones.entidades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EntidadStoreRequest $request)
    {
    	//guardo todos los campos traidos del request
    	$entidad = Entidad::create($request->all());
       //si hay un archivo de imagen lo guardo, de lo contrario no realizo ninguna accion
    	if($request->file('logo')){
    		$path = Storage::disk('entidad')->put('logo',  $request->file('logo'));
    		$entidad->fill(['logo' => asset($path)])->save();
    	}

    	return redirect()
    	->route('entidad.index')
    	->with('info', 'Entidad creada con éxito');


    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$entidad = Entidad::find($id);
    	return view('admin.configuraciones.entidades.show', compact('entidad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$entidad = Entidad::find($id);
    	return view('admin.configuraciones.entidades.edit', compact('entidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EntidadUpdateRequest $request, $id)
    {
    	//busco la entidad
    	$entidad = Entidad::find($id);
        //guardo todos los campos traidos del request
    	$entidad->fill($request->all())->save();
        
       //si hay un archivo de imagen lo guardo, de lo contrario no realizo ninguna accion 
    	if($request->file('logo')){
    		$path = Storage::disk('entidad')->put('logo',  $request->file('logo'));
    		$entidad->fill(['logo' => asset($path)])->save();
    	}

    	return redirect()
    	->route('entidad.index')
    	->with('info', 'Entidad actualizada con éxito');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$entidad = Entidad::find($id)->delete();
    	return back()->with('info', 'Eliminada correctamente');
    }
}
