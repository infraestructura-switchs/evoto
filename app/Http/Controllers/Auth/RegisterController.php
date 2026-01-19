<?php

namespace diser\Http\Controllers\Auth;

use diser\User;
use diser\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'apellido' => 'required|string|max:45',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \diser\User
     */
    protected function create(array $data)
    {
        // User::create([
        //     'id_grupo'      =>
        //     'id_entidad'    => $data['id_entidad'],
        //     'id_role'       => $data['id_rol'],
        //     'documento'     => $data['documento'],
        //     'name'          => $data['name'],
        //     'apellido'      => $data['apellido'],
        //     'email'         => $data['email'],
        //     'password'      => Hash::make($data['password']),
        //     'estado'        => 'Activo',
        // ]);
        $usuario               =  new User;
        $usuario->id_grupo     =  $data['id_grupo'];
        $usuario->id_entidad   =  $data['id_entidad'];
        $usuario->id_role      =  $data['id_rol'];
        $usuario->documento    =  $data['documento'];
        $usuario->name         =  $data['name'];
        $usuario->apellido     =  $data['apellido'];
        $usuario->email        =  $data['email'];
        $usuario->password     =  Hash::make($data['password']);
        $usuario->estado       =  'activo';
        $usuario->save();






        // $usuario->id_role=$request->get('name');
        // $usuario->name=$request->get('name');
        // $usuario->user=$request->get('user');
        // $usuario->role=$request->get('role');
        // $usuario->email=$request->get('email');
        // $usuario->estado='Pendiente';
        // $usuario->password=bcrypt($request->get('password'));
        

        return view('user.elecciones.elecciones.create'); 
    }
}
