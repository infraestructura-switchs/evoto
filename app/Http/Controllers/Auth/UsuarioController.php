<?php

namespace diser\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use diser\Http\Controllers\Controller;
use diser\User;
use diser\Rol;
use diser\Entidad;
use diser\Grupo;
use diser\AyudaTemporales;
use Illuminate\Support\Facades\Redirect;
use diser\Http\Requests\UsuarioStoreRequest;
use diser\Http\Requests\UsuarioUpdateRequest;
use DB;

use Mail;
use diser\Mail\SendMailNewUser;

use diser\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;


class UsuarioController extends Controller
{


	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{    	

		$users=DB::table('users as us')
		->join('roles as rol','us.id_role','=','rol.id')
		->where('rol.nombre','!=','Usuario')
		->select('us.*','rol.nombre as rol')
		->orderBy('id','asc')
		->get();

		$tipo_usuario = 'LISTADO DE ADMINISTRADORES Y JURADOS';

		return view('admin.configuraciones.usuarios.index',compact('users','tipo_usuario'));
		
	}

	public function create()
	{
		$roles      = Rol::where('nombre','!=','Usuario')->orderBy('nombre', 'ASC')->pluck('nombre', 'id');
		$entidades  = Entidad::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
		$grupos     = Grupo::where('nombre','=','ADMINISTRADORES')->orderBy('id', 'ASC')->pluck('nombre', 'id');	

		$tipo_usuario = 'CREAR USUARIOS ADMINISTRADORES';

		return view('admin.configuraciones.usuarios.create', compact('roles','entidades','grupos','tipo_usuario'));
	}


	protected function store(UsuarioStoreRequest $request)
	{	
		//genero una contrasena aleatoria de 8 caracteres
		$random_password = str_random(8);
		

		$usuario               =  new User;
		$usuario->id_grupo     =  $request->get('id_grupo');
		$usuario->id_entidad   =  $request->get('id_entidad');
		$usuario->id_role      =  $request->get('id_role');
		$usuario->documento    =  $request->get('documento');
		$usuario->name         =  $request->get('name');
		$usuario->apellido     =  $request->get('apellido');
		$usuario->email        =  $request->get('email');
		$usuario->telefono        =  $request->get('telefono');
		// $usuario->password     =  bcrypt($random_password);
		$usuario->password     =  bcrypt('12345678');
		$usuario->estado       =  'Activo';
		$usuario->save();

		///-------------enviar email con datos de inicio de session USUARIOS NUEVOS -------------////
		// $subject = "Acceso a cuenta software EVOTO";
		
		// $email   = $request->get('email');
		// $pass    = $random_password;
		// $nombre  = $request->get('name');

		// Mail::to($request->get('email'))
		// 	->send( new SendMailNewUser( $subject, $email, $pass, $nombre ) );

		
		return redirect()
		->route('usuarios.create')
		->with('info', 'Usuario creado con éxito');
	}


	public function edit($id)
	{
		$user 		= User::findOrFail($id);
		// $roles      = Rol::orderBy('nombre', 'DESC')->pluck('nombre', 'id');
		// $entidades  = Entidad::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
		// $grupos     = Grupo::orderBy('nombre', 'ASC')->pluck('nombre', 'id');


		$roles      = Rol::where('nombre','!=','Usuario')->orderBy('nombre', 'ASC')->pluck('nombre', 'id');
		$entidades  = Entidad::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
		$grupos     = Grupo::where('nombre','=','ADMINISTRADORES')->orderBy('id', 'ASC')->pluck('nombre', 'id');	

		$tipo_usuario = 'EDITAR USUARIOS ADMINISTRADORES';
		$tipo = 'admin';

		return view('admin.configuraciones.usuarios.edit', compact('user','roles','entidades','grupos','tipo_usuario','tipo'));

	}

	protected function update(UsuarioUpdateRequest $request,$id)
	{	
		//genero una contrasena aleatoria de 8 caracteres
		$random_password = str_random(8);
		

		// $usuario               =  new User;
		$usuario              =  User::find($id);
		$usuario->id_grupo     =  $request->get('id_grupo');
		$usuario->id_entidad   =  $request->get('id_entidad');
		$usuario->id_role      =  $request->get('id_role');
		$usuario->documento    =  $request->get('documento');
		$usuario->name         =  $request->get('name');
		$usuario->apellido     =  $request->get('apellido');
		$usuario->email        =  $request->get('email');
		$usuario->telefono        =  $request->get('telefono');
		// $usuario->password     =  bcrypt($random_password);
		$usuario->password     =  bcrypt('12345678');
		$usuario->estado       =  'Activo';
		$usuario->save();

		///-------------enviar email con datos de inicio de session USUARIOS NUEVOS -------------////
		// $subject = "Acceso a cuenta software EVOTO";
		
		// $email   = $request->get('email');
		// $pass    = $random_password;
		// $nombre  = $request->get('name');

		// Mail::to($request->get('email'))
		// 	->send( new SendMailNewUser( $subject, $email, $pass, $nombre ) );

		
		return redirect()
		->route('usuarios.index')
		->with('info', 'Usuario Actualizado con éxito');
	}

	public function destroy($id)
	{			
		$usuario = User::find($id)->delete();

		return back()->with('info', 'Eliminada correctamente');

	}

	public function reset_password($id)
	{
		//genero una contrasena aleatoria de 8 caracteres
		$random_password = str_random(8);


		$user 	= User::findOrFail($id);
		
		// $user->password     =  bcrypt($random_password);
		$user->password     =  bcrypt('12345678');;
		$user->save();
		
		///-------------enviar email con datos de inicio de session USUARIOS NUEVOS -------------////
		$subject = "Acceso a cuenta software EVOTO";
		
		$email   = $user->email;
		$pass    = $random_password;
		$nombre  = $user->name;

		Mail::to($user->email)
		->send( new SendMailNewUser( $subject, $email, $pass, $nombre ) );

		return back()->with('info', 'Se resablecio correctamente contraseña');

	}
	public function show()
	{

	}

	//vista para importar usuarios
	public function importUsersView()
	{
		$grupos     = Grupo::orderBy('id', 'ASC')->pluck('nombre', 'id');

		return view('admin.configuraciones.usuarios.import',compact('grupos'));
	}

	//vista para procesar la infrmacion del formulario de importar usuarios
	public function importUsers(Request $request)
	{
		// return back()->with('alerta', 'Formato o archivo invalido!!!'); 


		$grupo              	=  AyudaTemporales::find(1);
		$grupo->import_grupo    =  $request->id_grupo;
		$grupo->save();

		// dd('pru');
		$file=Input::file('excel');
		
		Excel::import(new UsersImport,$file);

		return back()->with('info', 'Usuarios Importardos correctamente');
	}

	// listado completo sufragantes

	public function lista_sufragantes()
	{
		$users=DB::table('users as us')
		->join('roles as rol','us.id_role','=','rol.id')
		// ->where('rol.nombre','LIKE','%'.$query.'%')
		->where('rol.nombre','=','Usuario')
		->select('us.*','rol.nombre as rol')
		->orderBy('id','asc')
		->get();

		$tipo_usuario = 'LISTADO DE SUFRAGANTES';

		return view('admin.configuraciones.usuarios.index',compact('users','tipo_usuario'));
	}


	public function crear_sufragantes()
	{
		// $roles      = Rol::orderBy('nombre', 'DESC')->pluck('nombre', 'id');
		// $entidades  = Entidad::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
		// $grupos     = Grupo::orderBy('id', 'ASC')->pluck('nombre', 'id');

		$roles      = Rol::where('nombre','=','Usuario')->orderBy('nombre', 'ASC')->pluck('nombre', 'id');
		$entidades  = Entidad::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
		$grupos     = Grupo::where('nombre','!=','ADMINISTRADORES')->orderBy('id', 'ASC')->pluck('nombre', 'id');

		$tipo_usuario = 'CREAR SUFRAGANTES';

		return view('admin.configuraciones.usuarios.create', compact('roles','entidades','grupos','tipo_usuario'));
	}


	public function editar_sufragantes($id)
	{
		$user 		= User::findOrFail($id);
		// $roles      = Rol::orderBy('nombre', 'DESC')->pluck('nombre', 'id');
		// $entidades  = Entidad::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
		// $grupos     = Grupo::orderBy('nombre', 'ASC')->pluck('nombre', 'id');

		$roles      = Rol::where('nombre','=','Usuario')->orderBy('nombre', 'ASC')->pluck('nombre', 'id');
		$entidades  = Entidad::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
		$grupos     = Grupo::where('nombre','!=','ADMINISTRADORES')->orderBy('id', 'ASC')->pluck('nombre', 'id');

		$tipo_usuario = 'EDITAR SUFRAGANTE';
		$tipo = 'sufragante';

		return view('admin.configuraciones.usuarios.edit', compact('user','roles','entidades','grupos','tipo','tipo_usuario'));

	}


}
