<?php

namespace diser\Http\Controllers\Admin;

use Illuminate\Http\Request;
use diser\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;

use diser\Notificaciones;
use Alert;

class NotificacionController extends Controller
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
     * notificaciones = contiene la lista de notificaciones
     */
    public function index(Request $request) 
    {
    	if ($request)
    	{            
    		$notificaciones = Notificaciones::orderBy('id', 'DESC')
    		->get();

            // dd('david_'.$notificaciones[0]->em_inicio_elecc);
    		
    		return view('admin.configuraciones.notificaciones.index', compact('notificaciones'));
    	}
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {	
    	return back()->with('info', 'No tiene permisos suficientes!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return back()->with('info', 'No tiene permisos suficientes!');
    	

    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return back()->with('info', 'No tiene permisos suficientes!');
    	
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$notificaciones = Notificaciones::find($id);

    	//estado_S se utiliza para el checkbox, si es activo, envio true.
    	if ($notificaciones->em_inicio_elecc === "S") {

            $em_inicio_elecc_s = "true";
        } else {

            $em_inicio_elecc_s = "false";
        }


        if ($notificaciones->em_conf_voto === "S") {

            $em_conf_voto_s = "true";
        } else {

           $em_conf_voto_s = "false";
       }


       if ($notificaciones->sms_inicio_elecc === "S") {

        $sms_inicio_elecc_s = "true";
    } else {

        $sms_inicio_elecc_s = "false";
    }


    if ($notificaciones->sms_conf_voto === "S") {

        $sms_conf_voto_s = "true";
    } else {

        $sms_conf_voto_s = "false";
    }



    return view('admin.configuraciones.notificaciones.edit', compact('notificaciones','em_inicio_elecc_s','em_conf_voto_s','sms_inicio_elecc_s','sms_conf_voto_s'));
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

                // /////
        $notificaciones = Notificaciones::find($id);

        //estado_S se utiliza para el checkbox, si es activo, envio true.
        if ($request->em_inicio_elecc === "SI") {

            $notificaciones->em_inicio_elecc = "S";
        } else {

            $notificaciones->em_inicio_elecc = "N";
        }

// ##################################
        if ($request->em_conf_voto === "SI") {

            $notificaciones->em_conf_voto = "S";
        } else {

           $notificaciones->em_conf_voto = "N";
       }

// ##################################
    if ($request->sms_inicio_elecc === "SI") {

        $notificaciones->sms_inicio_elecc = "S";
    } else {

        $notificaciones->sms_inicio_elecc = "N";
    }
// ##################################

    if ($request->sms_conf_voto === "SI") {

        $notificaciones->sms_conf_voto = "S";
    } else {

        $notificaciones->sms_conf_voto = "N";
    }
    // ##################################
      $notificaciones->save();


    return redirect()
    ->route('notificaciones.index')
    ->with('info', 'Notificaciones actualizada con éxito');
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	// $rol = Notificaciones::find($id)->delete();
    	return back()->with('info', 'No tiene permisos suficientes!');
    }
}
