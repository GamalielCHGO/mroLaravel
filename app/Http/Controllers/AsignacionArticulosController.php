<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\AsignacionArt;
use App\Models\CC;
use App\Models\Estacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsignacionArticulosController extends Controller
{
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
        return view('asignacionArticulos.listaAsignacion',[
            'asignacionArts'=> DB::table('view_estacion_tipo')->get(),
            'ccs'=> CC::get()->where('estado','E'),
            'estaciones' => Estacion::get()->where('estado','E')]); 
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
        // CREANDO EL ARRAY PARA INSERTAR
        for ($i=0; $i <sizeof($request['items']) ; $i++) { 
            $array[$i]=array("cc"=>$request['cc'],"estacion"=>$request['estacion'],"tipo"=>$request['tipo'],"idArticulo"=>$request['items'][$i]);
        } 
        // borrando la tabla con los registros
        AsignacionArt::where('cc','=',$request['cc'])->
        where('estacion','=',$request['estacion'])->
        where('tipo','=',$request['tipo'])->delete();
        // insertando el array
        AsignacionArt::insert(
            $array
        );
                 
        return redirect()->route('listaAsignacion')->with('status','La asignacion fue creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($estacion , $cc, $tipo)
    {
        return view('asignacionArticulos.vistaAsignacion',[
            'articulos'=> DB::table('tb_articulos')
            ->leftJoin('tb_asignacion_art',function($join) use ($estacion, $cc,  $tipo)
            {
                $join->on('tb_articulos.id', '=', 'tb_asignacion_art.idArticulo');
                $join->on('tb_asignacion_art.estacion','=',DB::raw("'".$estacion."'"));
                $join->on('tb_asignacion_art.cc','=',DB::raw("'".$cc."'"));
                $join->on('tb_asignacion_art.tipo','=',DB::raw("'".$tipo."'"));
            })
            ->where('tb_articulos.tipo','=',DB::raw("'".$tipo."'"))
            ->select('tb_articulos.id','tb_articulos.numero_parte','tb_articulos.descripcion','tb_asignacion_art.estado')
            ->get(),
            'estacion'=>$estacion,'cc'=>$cc,'tipo'=>$tipo,
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
