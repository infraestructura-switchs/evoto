<?php

namespace diser\Http\Controllers\Admin;

use Illuminate\Http\Request;
use diser\Http\Controllers\Controller;


use diser\Http\Requests\AspiranteStoreRequest;
use diser\Http\Requests\AspiranteUpdateRequest;
//use diser\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

use diser\Aspirante;
use diser\Programa;
use diser\Candidato;
use diser\Eleccion;
use Alert;
use DB;
use Auth;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade as PDF;

class AspiranteController extends Controller
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
     * aspirantes = contiene la lista de aspirantes
     */

    public function index(Request $request) 
    {


    	
    	if(Auth::user()->isAdmin()){

    		if ($request)
    		{   
    			$aspirantes=DB::table('aspirantes as asp')
    			->join('elecciones as el','asp.ideleccion','=','el.id')
    			->select('asp.*','el.nombre as eleccion','el.estado as estadoele')

    			->where([['el.estado','!=','Cerrada'],['el.estado','!=','Ejecucion'], ['asp.estado','!=','Eliminado'],['asp.estado','=','A']])
    			->orderBy('asp.id','ASC')
    			->get();

    			return view('admin.elecciones.aspirantes.index', compact('aspirantes'));
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
       // dd('s');
       $hoy = Carbon::now();
       $hora = $hoy->format('h:i:s');
       $hoy = $hoy->format('Y-m-d');

     // dd($hoy);
     // dd($hora);
       $inscripcionesAbiertas = Eleccion::where([
          ['estado','=','Pendiente'],
          // ['fecha_apertura_inscripcion','<=',$hoy],
          // ['fecha_cierre_inscripcion','>=',$hoy],
          // ['hora_apertura_inscripcion','<=',$hora],
          // ['hora_cierre_inscripcion','>=',$hora]
      ])
     // ->whereDate('fecha_apertura_inscripcion','>=',$hoy)
     // ->whereTime('hora_apertura_inscripcion','<',$hora)
     // ->where('fecha_cierre_inscripcion','>=',$hoy)
     // ->whereTime('fecha_cierre_inscripcion','>',$hora)
       ->count();

     // dd($inscripcionesAbiertas); 

       if($inscripcionesAbiertas > 0){

         $elecciones = Eleccion::where([
          ['estado','=','Pendiente'],
          // ['fecha_apertura_inscripcion','<=',$hoy],
          // ['fecha_cierre_inscripcion','>=',$hoy],
          // ['hora_apertura_inscripcion','<=',$hora],
          // ['hora_cierre_inscripcion','>=',$hora]
      ])
         ->orderBy('id', 'ASC')->pluck('nombre', 'id');

         $programas = Programa::orderBy('id', 'ASC')->pluck('nombre', 'nombre');

         $foto="";
         $solicitud="";
         $declaracion="";


         return view('admin.elecciones.aspirantes.create', compact('elecciones','foto','declaracion','solicitud','programas'));
     }else{

      return back()->with('alerta','No hay inscripciones abiertas!!! ');
  }

}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	if(Auth::user()->isAdmin()){

    		$aspirante                   =  new Aspirante;
    		$aspirante->ideleccion       =  $request->get('ideleccion');
    		$aspirante->nombre           =  $request->get('nombre');
    		$aspirante->apellido         =  $request->get('apellido');
    		$aspirante->tipo_documento   =  $request->get('tipo_documento');
    		$aspirante->documento        =  $request->get('documento');
            $aspirante->lugar_expedicion =  $request->get('lugar_expedicion');
            $aspirante->email            =  $request->get('email');
            $aspirante->telefono         =  $request->get('telefono');
            $aspirante->programa         =  $request->get('programa');
            $aspirante->semestre         =  $request->get('semestre');
            $aspirante->nota             =  $request->get('nota');
            $aspirante->estado    		 =	'A';
            $aspirante->save();


        //IMAGEN FOTO ASPIRANTE
        //si hay un archivo de imagen lo guardo, de lo contrario no realizo ninguna accion

            if($request->file('foto')){

               $file=Input::file('foto');

               $aspirante->foto=$file->hashName();
               $aspirante->save();
               $file->move(public_path().'/storage/candidatos/',$file->hashName());

           }
         //SOLICITUD DE ASPIRACION
       //si hay un archivo de imagen lo guardo, de lo contrario no realizo ninguna accion
           if($request->file('solicitud')){

               $file=Input::file('solicitud');

               $aspirante->solicitud=$file->hashName();
               $aspirante->save();
               $file->move(public_path().'/storage/solicitudes/',$file->hashName());

           }

          // declaracion
           if($request->file('declaracion')){

               $file=Input::file('declaracion');

               $aspirante->declaracion=$file->hashName();
               $aspirante->save();
               $file->move(public_path().'/storage/declaraciones/',$file->hashName());

           }

         // GENERA ACTA DE INSCRIPCION
           $eleccion = Eleccion::find('22');
           $aspirante = Aspirante::find('11');

           $total_documentos = 0;

           if ($aspirante->declaracion) {

            $total_documentos++;

           # code...
        }

        if ($aspirante->solicitud) {

            $total_documentos++;

           # code...
        }

        $pdf = PDF::loadView('formatos.actainscripcion',compact('eleccion','aspirante','total_documentos'));



        return $pdf->stream('Acta_de_inscripcione.pdf');


        return redirect()
        ->route('aspirantes.index')
        ->with('info', 'Aspirante creado con éxito');

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
    	$aspirante = Aspirante::find($id);
    	return view('admin.elecciones.aspirantes.show', compact('aspirante'));
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

    	$aspirante = Aspirante::find($id);

    	$foto="1";
    	$solicitud="1";
    	$declaracion="1";


    	return view('admin.elecciones.aspirantes.edit', compact('aspirante','elecciones','foto','solicitud','declaracion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
    	if(Auth::user()->isAdmin()){

    		$aspirante              =  Aspirante::find($id);
    		// dd($aspirante);

    		$aspirante->ideleccion       =  $request->get('ideleccion');
    		$aspirante->nombre           =  $request->get('nombre');
    		$aspirante->apellido         =  $request->get('apellido');
    		$aspirante->tipo_documento         =  $request->get('tipo_documento');
    		$aspirante->documento         =  $request->get('documento');
    		$aspirante->email         =  $request->get('email');
    		$aspirante->telefono         =  $request->get('telefono');
    		$aspirante->programa         =  $request->get('programa');
    		$aspirante->semestre         =  $request->get('semestre');
    		$aspirante->nota         =  $request->get('nota');

    		// $aspirante->estado    		 =	'A';
    		$aspirante->update();


//IMAGEN FOTO ASPIRANTE
       //si hay un archivo de imagen lo guardo, de lo contrario no realizo ninguna accion
    		if($request->file('foto')){

    			$file=Input::file('foto');

    			$aspirante->foto=$file->hashName();
    			$aspirante->update();
    			$file->move(public_path().'/storage/candidatos/',$file->hashName());

    		}
         //SOLICITUD DE ASPIRACION
       //si hay un archivo de imagen lo guardo, de lo contrario no realizo ninguna accion
    		if($request->file('solicitud')){

    			$file=Input::file('solicitud');

    			$aspirante->solicitud=$file->hashName();
    			$aspirante->update();
    			$file->move(public_path().'/storage/solicitudes/',$file->hashName());

    		}

          // declaracion
    		if($request->file('declaracion')){

    			$file=Input::file('declaracion');

    			$aspirante->declaracion=$file->hashName();
    			$aspirante->save();
    			$file->move(public_path().'/storage/declaraciones/',$file->hashName());

    		}


    		return redirect()
    		->route('aspirantes.index')
    		->with('info', 'Aspirante editado con éxito');


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
    		return back()->with('alerta', 'Error 0x4283');
    		// $aspirante = Aspirante::find($id)->delete();
    		return back()->with('info', 'Eliminado correctamente');
    	}else{
    		return back()->with('alerta', 'Acceso restringido');


    	}
    }
    public function validar(Request $request)
    {

      if(Auth::user()->isAdmin()){

         if ($request->estado == 'S') {          

            if ($request->numero_tarjeton == null) {

               return back()->with('alerta', 'Debe ingresar nuemero de tarjeton!');       
           }
       }

    		// dd($request->request);
       $aspirante              =  Aspirante::find($request->id);

       $aspirante->numero_tarjeton = $request->numero_tarjeton;
       $aspirante->estado = $request->estado;
       $aspirante->nota = $request->nota;
       $aspirante->update();

    		// ######### TRANSFIRE DATOS CANDIDATO ####### //
       if ($request->estado == 'S') {


          $candidato                   =  new Candidato;
          $candidato->ideleccion       =  $aspirante->ideleccion;
          $candidato->nombre           =  $aspirante->nombre;
          $candidato->apellido         =  $aspirante->apellido;
          $candidato->numero_tarjeton  =  $aspirante->numero_tarjeton;
          $candidato->foto  =  $aspirante->foto;
          $candidato->estado    		 =	'Activo';
          $candidato->save();
      }else{
          return back()->with('info', 'Actualizado correctamente');

      }


    		// return back()->with('alerta', 'Error 0x4283');
    		// $aspirante = Aspirante::find($id)->delete();
      return back()->with('info', 'Validado y creado como candidato correctamente');
  }else{
    return back()->with('alerta', 'Acceso restringido');


}
}
}
