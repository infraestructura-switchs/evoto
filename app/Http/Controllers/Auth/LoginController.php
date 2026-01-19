<?php

namespace diser\Http\Controllers\Auth;

use diser\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use diser\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    /**
     * Create a redirect method to google api.
     *
     * @return void
     */
    public function redirectGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Return a callback method from google api.
     *
     * @return callback URL from google
     */
    public function callbackGoogle()
    {
        try{
            //$userSocial = Socialite::driver('google')->user();
            $userSocial = Socialite::driver('google')->stateless()->user();
        } catch (Exception $e) {
            //echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            return redirect()
                //->back()
                ->route('login')
                ->with('alerta', 'Error validación cuenta de correo !');
        }

        //dd($userSocial);

        $userArray = User::where('email', $userSocial->email)->get();
        $user = User::where('email', $userSocial->email)->first();

        //dd($userArray->count());
        if ($userArray->count() > 0) {
            //Auth::login($user);
            auth()->login($user, true);

            //return Redirect::to('/home');
            //dd(Auth::user());
            //redirect()->to('/');
            //redirect()->route('home1');
            return redirect($this->redirectPath());
            //return view('home1');
        } else {
            return redirect()
                ->route('login')
                ->with('alerta', 'El correo '.$userSocial->email.' no esta registrado en el sistema!');
                //->back();
        }
        //return $userSocial;
        /*
        $finduser = User::where('google_id', $userSocial->id)->first();
        if($finduser){
            Auth::login($finduser);
            return Redirect::to('/home');
        }else{
            $new_user = User::create([
                'fname' => $userSocial->name,
                'email' => $userSocial->email,
                'google_id'=> $userSocial->id
            ]);
            Auth::login($new_user);
            return redirect()->back();
        }
        */
    }
}
