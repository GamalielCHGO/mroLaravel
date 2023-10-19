<?php

namespace App\Http\Controllers;

use App\Models\CC;
use App\Models\Estacion;
use Illuminate\Http\Request;

class EstacionController extends Controller
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
        return view('estacion.listaEstaciones',[
            'estaciones'=> Estacion::get(),'ccs'=> CC::get()->where('estado','E')]);
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
        request()->validate([
            'estacion'=>['required'],
        ]);
        // guardando
        Estacion::create ([
            'estacion' => $request['estacion'],
            'estado' => 'E',
        ]);
        
        return redirect()->route('listaEstaciones')->with('status','La estacion fue creada con exito');
    }
 /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function activar(Estacion $estacion)
    {
            $estacion->update([
                'estado'=> 'E'
            ]);
            return redirect()->route('listaEstacioness')->with('status','La estacion fue activada con exito');
    }
    public function desActivar(Estacion $estacion)
    {
            $estacion->update([
                'estado'=> 'D'
            ]);
            return redirect()->route('listaEstaciones')->with('status','La estacion fue DesActivada con exito');
    }
}
