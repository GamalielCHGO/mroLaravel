<?php

namespace App\Http\Controllers;
 
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('usuario.listaUsuarios',[
            'users'=> User::get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.crearUsuario',[
            'usuarios'=> User::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name'=>'required',
            'role'=>'required',
            'lastname'=>'required',
            'username'=>['required','size:8','unique:users'],
            'email'=>'required|email|unique:users',
            'sap'=>'required|numeric|max:99999999',
            'idSupervisor'=>'string',
        ]);

        $request['password']=strtoupper($request['lastname']);

        $request;

        User::create([
            'name' => $request['name'],
            'role' => $request['role'],
            'lastname' => $request['lastname'],
            'username' => strtoupper($request['username']),
            'email' => $request['email'],
            'sap' => $request['sap'],
            'password' => Hash::make($request['password']),
            'idSupervisor'=>$request['idSupervisor'],
        ]);
        // validar que el username y el correo no existan

        return redirect()->route('listaUsuarios')->with('status','El usuario fue creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('usuario.usuario',[
            'user'=> $user,
            'usuarios'=> User::get(),
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {

        request()->validate([
            'name'=>'required',
            'role'=>'required',
            'lastname'=>'required',
            'username'=>['required','size:8',
            Rule::unique('users')->ignore($user)],
            'email'=>['required','email',
            Rule::unique('users')->ignore($user)],
            'sap'=>'required|numeric',
            'idSupervisor'=>'string',
        ]);
        $user->update([
            'name'=> request('name'),
            'role'=> request('role'),
            'lastname'=> request('lastname'),
            'username'=> request('username'),
            'email'=> request('email'),
            'sap'=> request('sap'),
            'idSupervisor'=> request('idSupervisor'),
        ]);
            return redirect()->route('listaUsuarios')->with('status','El usuario fue actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete(); 
        return redirect()->route('listaUsuarios')->with('status','El usuario fue eliminado con exito');
    }
}

