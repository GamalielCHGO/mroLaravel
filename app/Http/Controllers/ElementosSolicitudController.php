<?php

namespace App\Http\Controllers;

use App\Models\ElementosSolicitud;
use App\Models\Estacion;
use App\Models\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ElementosSolicitudController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'idSolicitud'=>['required'],
            'idArticulo'=>'required',
            'cantidad'=>'required',
            'cc'=>['required'],
            'estacion'=>'required',
        ]);
        ElementosSolicitud::create([
            'id_solicitud'=>$request['idSolicitud'],
            'id_articulo'=>$request['idArticulo'],
            'cantidad'=>$request['cantidad'],
            'cc'=>$request['cc'],
            'estacion'=>$request['estacion'],
            'comentarios'=>$request['comentarios'],
        ]);
        

        // return view('solicitud.solicitud',[
        //     'solicitud'=>Solicitud::where('id','=',$request['idSolicitud'])->get(),
        //     'estaciones'=>Estacion::where('estado','=','E')->get(),
        //     'articulosCarrito'=>DB::table('elementoscarrito')->where('id_Solicitud','=',$request['idSolicitud'])->get(),
        //     'status'=>'El articulo fue agregado al carrito'
        // ]);
        return redirect()->route('crearSolicitud')->with('status','El articulo fue agregado con exito');


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
        //
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
        //
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
