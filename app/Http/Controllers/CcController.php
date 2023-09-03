<?php

namespace App\Http\Controllers;

use App\Models\CC;
use Illuminate\Http\Request;

class CcController extends Controller
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
        return view('cc.listaCCs',[
            'ccs'=> CC::get()]);
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
            'cc'=>['required','unique:tb_ccs'],
            'descripcion'=>'required'
        ]);
         // guardando
         CC::create ([
             'cc' => $request['cc'],
             'estado' => 'E',
             'descripcion' => $request['descripcion'],
         ]);
         
         
         return redirect()->route('listaCcs')->with('status','El CC fue creado con exito');
    }

    public function activar(CC $cc)
    {
            $cc->update([
                'estado'=> 'E'
            ]);
            return redirect()->route('listaCcs')->with('status','El CC fue activado con exito');
    }
    public function desActivar(CC $cc)
    {
            $cc->update([
                'estado'=> 'D'
            ]);
            return redirect()->route('listaCcs')->with('status','El CC fue activado con exito');
    }
}
