<?php

namespace diser\Http\Controllers\User;

use Illuminate\Http\Request;
use diser\Http\Controllers\Controller;



use diser\Http\Requests\CandidatoStoreRequest;
use diser\Http\Requests\CandidatoUpdateRequest;
//use diser\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

use diser\Candidato;
use diser\Eleccion;
use Alert;
use DB;
use Auth;

class CandidatoController extends Controller
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

    	
     if(Auth::user()->isAdmin()){

         if ($request)
         {   
          $candidatos=DB::table('candidatos as can')
          ->join('elecciones as el','can.ideleccion','=','el.id')
          ->select('can.id','can.nombre','can.apellido','can.numero_tarjeton','el.nombre as eleccion','el.estado as estadoele','can.foto','can.estado')

          ->where([['el.estado','!=','Cerrada'], ['can.estado','!=','Eliminado']])
          ->orderBy('can.id','ASC')
          ->get();

          return view('user.elecciones.candidatos.index', compact('candidatos'));
      }
  }else{
    return back()->with('alerta', 'Acceso restringido');


}
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {	
    	$elecciones = Eleccion::where('estado','=','Pendiente')
    	->orderBy('id', 'ASC')->pluck('nombre', 'id');
    	

    	return view('user.elecciones.candidatos.create', compact('elecciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CandidatoStoreRequest $request)
    {
        if(Auth::user()->isAdmin()){
         $candidato                   =  new Candidato;
         $candidato->ideleccion       =  $request->get('ideleccion');
         $candidato->nombre           =  $request->get('nombre');
         $candidato->apellido         =  $request->get('apellido');
         $candidato->numero_tarjeton  =  $request->get('numero_tarjeton');
         $candidato->estado    		 =	'Activo';
         $candidato->save();


//IMAGEN FOTO CANDIDATO
       //si hay un archivo de imagen lo guardo, de lo contrario no realizo ninguna accion
         if($request->file('foto')){

             $file=Input::file('foto');

             $candidato->foto=$file->hashName();
             $candidato->save();
             $file->move(public_path().'/storage/candidatos/',$file->hashName());

         }


         return redirect()
         ->route('candidatos.index')
         ->with('info', 'Candidato creada con éxito');

     }else{
        return back()->with('alerta', 'Acceso restringido');


    }


} 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$candidato = Candidato::find($id);
    	return view('user.elecciones.candidatos.show', compact('candidato'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $elecciones = Eleccion::where('estado','=','Pendiente')
       ->orderBy('id', 'ASC')->pluck('nombre', 'id');

       $candidato = Candidato::find($id);


       return view('user.elecciones.candidatos.edit', compact('candidato','elecciones'));
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CandidatoUpdateRequest $request, $id)
    {   
        if(Auth::user()->isAdmin()){

           $candidato              =  Candidato::find($id);
           $candidato->ideleccion       =  $request->get('ideleccion');
           $candidato->nombre           =  $request->get('nombre');
           $candidato->apellido         =  $request->get('apellido');
           $candidato->numero_tarjeton  =  $request->get('numero_tarjeton');
           $candidato->estado    		 =	'Activo';
           $candidato->save();


       //IMAGEN FOTO CANDIDATO
       //si hay un archivo de imagen lo guardo, de lo contrario no realizo ninguna accion
           if($request->file('foto')){

             $file=Input::file('foto');

             $candidato->foto=$file->hashName();
             $candidato->save();
             $file->move(public_path().'/storage/candidatos/',$file->hashName());
             
         }



         return redirect()
         ->route('candidatos.index')
         ->with('info', 'Candidato actualizada con éxito');

     }else{
        return back()->with('alerta', 'Acceso restringido');


    }
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->isAdmin()){
           $candidato = Candidato::find($id)->delete();
           return back()->with('info', 'Eliminado correctamente');
       }else{
        return back()->with('alerta', 'Acceso restringido');


    }
}
}
