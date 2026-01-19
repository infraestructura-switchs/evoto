<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
   return redirect()->route('login');
});

Auth::routes();

//----------------  USUARIOS  ------------------//
Route::resource('usuarios', 		    			'Auth\UsuarioController');
//LISTADO USUARIOS SUFRAGANTES
Route::get('sufragantes',                           'Auth\UsuarioController@lista_sufragantes')->name('lista_sufragantes');
//CREAR SUFRAGANTE
Route::get('sufragantes/create',                    'Auth\UsuarioController@crear_sufragantes')->name('crear_sufragantes');
//EDITAR SUFRAGANTE
Route::get('sufragantes/{id}/edit',                 'Auth\UsuarioController@editar_sufragantes')->name('editar_sufragantes');
//EXPORTAR EXCEL SUFRAGANTES
Route::get('sufragantes/excel/{id}',                'User\EleccionController@excel_sufragantes')->name('excel_sufragantes');
//EXPORTAR PDF SUFRAGANTES
Route::get('sufragantes/pdf/{id}',                'User\EleccionController@pdf_sufragantes')->name('pdf_sufragantes');

//RESET PASSWORD
Route::get('usuario/reset_password/{id}', 			'Auth\UsuarioController@reset_password')->name('usuarios.reset_password');
//IMPORTAR USUARIOS
Route::get('usuario/import-excel-view', 			'Auth\UsuarioController@importUsersView')->name('usuario.import_excel_view');
//IMPORTAR USUARIOS
Route::post('usuarios/import-excel', 				'Auth\UsuarioController@importUsers')->name('usuario.import_excel');
// Route::get('usuarios', 'UsuarioController@index')->name('usuarios.index');
Route::get('/logout', 								'Auth\LoginController@logout');

Route::get('/home', 								'HomeController@index')->name('home');
// Route::get('/home1', 								'Home1Controller@index')->name('home1');
 
//Admin

//----------------  CONFIGURACIONES  ------------------//
//ENTIDADES
Route::resource('configuraciones/entidad', 		    'Admin\EntidadController');
//ENTIDADES
Route::resource('configuraciones/notificaciones',   'Admin\NotificacionController');
//ROLES
Route::resource('roles', 		    	            'Admin\RolController');

//user

//----------------  URNA ELECTRONICA  ------------------//
//ELECCIONES
Route::resource('urna/elecciones', 		    'User\EleccionController');
//ASPIRANTES
Route::resource('urna/aspirantes', 		    'Admin\AspiranteController');
//ASPIRANTES validar
Route::post('aspirantes_validar', 		    'Admin\AspiranteController@validar')->name('aspirantes_validar');

//ACTIVAR ELECCION
Route::post('activar/eleccion}', 			'User\EleccionController@activar_eleccion')->name('activar.eleccion');
//ACTIVAR ELECCION
Route::get('cerrar/eleccio/{id}', 			'User\EleccionController@cerrar_eleccion')->name('cerrar.eleccio');
//CANDIDATOS

Route::resource('urna/candidatos', 		    'User\CandidatoController');
//GRUPOS
Route::resource('grupos', 		    	    'User\GrupoController');
//ASIGNAR GRUPOS A LA VOTACION
Route::get('asignargrupo', 					'User\GrupoController@asignar_grupo')->name('asignargrupo');
//GUARDAR GRUPOS A LA VOTACION
Route::post('asignargrupo/guardar', 		'User\GrupoController@asignar_grupo_guardar')->name('asignargrupo.guardar');
//USUARIOS ASIGNADOS ELECCION
Route::get('eleccion/usuarios', 				'User\EleccionController@asignados')->name('eleccion.asignados');



//---------------- TARJETON------------------------------//
//VISTA_PREVIA_TARJETON
Route::get('elecciones/tarjeton', 			'Admin\TarjetonController@vista_previa_tarjeton')->name('tarjeton.preview');
//VOTACION - TARJETON
Route::get('elecciones/votacion', 			'Admin\TarjetonController@tarjeton')->name('tarjeton.votacion');
//CONFIRMAR VOTO
Route::post('elecciones/tarjeton/{id}', 	'Admin\TarjetonController@confirmar_voto')->name('confirmar.voto');

//VOTACION - CERTIFICADO
Route::get('elecciones/certificado/{id}', 	'Admin\TarjetonController@certificado')->name('elecciones.certificado');
//---------------- ESTADISTICAS------------------------------//
//ESTADISTICAS DE ELECCIONES
Route::get('estadisticas', 					'User\EstadisticaController@index')->name('estadisticas');
//GENERAR REPORTE DE ELECIONES
Route::get('reporte/eleccion/{id}', 		'User\EstadisticaController@reporte_eleccion')->name('reporte.eleccion');
//ENCUESTAS
//
//----------------  ENCUESTAS  ------------------//
//encuestas
Route::resource('encuestas', 		    	'User\EncuestaController');


//----------------  GOOGLELOGIN  ------------------//
Route::get('auth/google', 'Auth\LoginController@redirectGoogle');
Route::get('auth/google/callback', 'Auth\LoginController@callbackGoogle');



//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});

//Clear Config cache:
Route::get('/config-clear', function() {
    $exitCode = Artisan::call('config:clear');
    return '<h1>Clear Config cleared</h1>';
});

//Route List:
//php artisan route:list
Route::get('/route-list', function() {
    $exitCode = Artisan::call('route:list');
    return '<h1>Clear route list</h1>'.$exitCode;
});