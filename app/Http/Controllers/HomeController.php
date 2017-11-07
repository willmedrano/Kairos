<?php

namespace Kairos\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Redirect;
use Session;
use Kairos\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $email=Auth::user()->email;
      $estadoUsuario=User::where('email',$email)->get(); //obtengo el estado del usuario a ingresar
      $autorizado=$estadoUsuario->last()->estadoUsu;
      if($autorizado==1){ //si el estado del uuario es 1 es por que esta activo y puede ingresar al sistema
        return view('caratula');
      }else{
          return redirect('/');
        }
    }

    public function logout()
    {
      Auth::logout();
      return Redirect::to('/home');
    }

    public function postGenerateBackup()
    {
        exec('C:\Windows\System32\cmd.exe /C START C:\xampp\htdocs\Kairos\backup.bat');
        return redirect('/home')->with('create','Backup  creado con éxito');

    }
}
