<?php

namespace Kairos\Http\Controllers;

use Illuminate\Http\Request;
use Kairos\Http\Requests\UsuarioRequest;
use Kairos\User;
use Redirect;
use Session;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $user=\Kairos\User::All();
      //  $user=\Kairos\User::paginate(2);
      return view('usuario.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.formulario.forUsuario');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioRequest $request)
    {
        User::create([
        'name'=>$request['name'],
        'password'=> $request['password'],
        'email'=>$request['email'],
      ]);
      return redirect('/usuario')->with('create','• Usuario ingresado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $user=User::find($id);

      return view('usuario.edit',compact('user'));
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
      $aux=$request['hi2'];
      $user= User::find($id);

      if($aux=='2')
        {
            $user->estadoUsu =true;
            Session::flash('mensaje','• Usuario Activado correctamente');

        }
        else if($aux=='3')
        {
            $user->estadoUsu =false;
            Session::flash('mensaje','• Usuario dado de baja correctamente');

        }
        else{
            $user->name=$request['name'];
            $user->password=$request['password'];
            $user->email=$request['email'];
            Session::flash('update','• Usuario editado correctamente');

      }
      $user->save();
      return Redirect::to('/usuario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
