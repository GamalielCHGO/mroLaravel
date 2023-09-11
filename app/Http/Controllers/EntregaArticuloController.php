<?php

namespace App\Http\Controllers;

use App\Models\Aprobacion;
use App\Models\ElementosSolicitud;
use App\Models\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EntregaArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('entrega.listaEntregaArticulos',[
            'listaSolicitudes'=>DB::table('solicitudesusuario')->where('estado','A')->latest('fecha_creacion')->get(),
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idSolicitud)
    {

        return view('entrega.entregaArticulos',[
            'cantidadCarrito'=>DB::table('elementoscarrito')->where('id_solicitud','=',$idSolicitud)
            ->count(),
            'solicitud'=>Solicitud::where('id','=',$idSolicitud)->get(),
            'articulosCarrito'=>DB::table('elementoscarrito')->where('id_solicitud','=',$idSolicitud)->get(),
            'aprobador'=>Aprobacion::where('idSolicitud','=',$idSolicitud)->first(),
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
    public function destroy()
    {
        $request = request();
        $idSolicitud=$request->idSolicitud;
        // Eliminando elemento
        ElementosSolicitud::where('id','=',$request->idArticulo)->delete();
        
        $elementos = ElementosSolicitud::where('id_Solicitud','=',$idSolicitud)->count();
        if($elementos==0)
        {
            // si la solicitud no tiene elementos se cancela
            Solicitud::where('id','=',$idSolicitud)->update([
                'estado'=>'R',
                'usuario_entrega'=>Auth::user()->username,
                'fecha_entrega'=>DB::raw('NOW()'),
            ]);
            Aprobacion::where('idSolicitud','=',$idSolicitud)->update([
                'estado'=>'R',
            ]);
        }
        return view('entrega.entregaArticulos',[
            'cantidadCarrito'=>DB::table('elementoscarrito')->where('id_solicitud','=',$idSolicitud)
            ->count(),
            'solicitud'=>Solicitud::where('id','=',$idSolicitud)->get(),
            'articulosCarrito'=>DB::table('elementoscarrito')->where('id_solicitud','=',$idSolicitud)->get(),
            'aprobador'=>Aprobacion::where('idSolicitud','=',$idSolicitud)->first(),
            'status'=>'Elemento eliminado'
        ]);
    }
    
    public function entregarSolicitud(){
        $request = request();
        $idSolicitud=$request->idSolicitud;

        Solicitud::where('id','=',$idSolicitud)->update([
            'estado'=>'F',
            'usuario_entrega'=>Auth::user()->username,
            'fecha_entrega'=>DB::raw('NOW()'),
        ]);
        Aprobacion::where('idSolicitud','=',$idSolicitud)->update([
            'estado'=>'F',
        ]);

        ElementosSolicitud::where('id_solicitud','=',$idSolicitud)->update([
            'estado'=>'F',
        ]);
        return view('entrega.listaEntregaArticulos',[
            'listaSolicitudes'=>DB::table('solicitudesusuario')->where('estado','A')->latest('fecha_creacion')->get(),
            'status'=>'Solicitud '. $idSolicitud.' entregada a ' 
        ]);

    }

}
