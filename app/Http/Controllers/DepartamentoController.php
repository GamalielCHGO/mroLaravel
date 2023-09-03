<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DepartamentoController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('departamento.listaDepartamentos',[
            'departamentos'=> Departamento::get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validando
        request()->validate(['departamento'=>['required','unique:tb_departamentos']]);
        // guardando
        Departamento::create ([
            'departamento' => $request['departamento'],
            'estado' => 'E'
        ]);
        
        return redirect()->route('listaDepartamentos')->with('status','El departamento fue creado con exito');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function activar(Departamento $departamento)
    {
            $departamento->update([
                'estado'=> 'E'
            ]);
            return redirect()->route('listaDepartamentos')->with('status','El departamento fue activado con exito');
    }
    public function desActivar(Departamento $departamento)
    {
            $departamento->update([
                'estado'=> 'D'
            ]);
            return redirect()->route('listaDepartamentos')->with('status','El departamento fue activado con exito');
    }

}
