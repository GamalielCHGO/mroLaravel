<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Solicitud;
use App\Models\Estacion;
use App\Models\Articulo;
use App\Models\ElementosSolicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SolicitudController extends Controller
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
        $userId=Auth::user()->id;
        $total= Solicitud::where('estado','=','O')
        ->where('usuario','=',$userId)
        ->get();
        // se debe validar si existe una solicitud abierta
        if(sizeof($total)==0)
        {
            return view('solicitud.crearSolicitud',[
                'departamentos'=>Departamento::where('estado','=','E')->get()
            ]);
        }
        else
        {
            return view('solicitud.solicitud',[
                'cantidadCarrito'=>DB::table('elementoscarrito')->where('usuario','=',$userId)
            ->where('estado','=','O')
            ->count(),
                'solicitud'=>$total,
                'articulosCarrito'=>DB::table('elementoscarrito')->where('id_Solicitud','=',$total[0]->id)->get(),
                'estaciones'=>Estacion::where('estado','=','E')->get(),
            ]);
        }
    }

    public function nuevaSolicitud(Request $request)
    {
        // creando nueva solicitud
        $userId=Auth::user()->id;
        request()->validate([
            'departamento'=>'required',
            'tipo'=>'required',
        ]);
        $id=Solicitud::insertGetId([
            'tipo'=>$request['tipo'],
            'usuario'=>$userId,
            'detalles'=>$request['detalles'],
            'departamento'=>$request['departamento'],
        ]);
        
        return view('solicitud.solicitud',[
            'cantidadCarrito'=>DB::table('elementoscarrito')->where('usuario','=',$userId)
            ->where('estado','=','O')
            ->count(),
            'solicitud'=>Solicitud::where('id','=',$id)->get(),
            'estaciones'=>Estacion::where('estado','=','E')->get(),
            'articulosCarrito'=>DB::table('elementoscarrito')->where('id_Solicitud','=',$id)->get(),
        ]);
    }

    public function eliminarElementoSolicitud(Request $request){
        ElementosSolicitud::where('id','=',$request->id)->delete();
        return redirect()->route('crearSolicitud')->with('status','El articulo fue eliminado con exito');
    }

    public function tablaSolicitud(Request $request){
        $userId=Auth::user()->id;
        $id=$request->id;
        $idEstacion=$request->estacion;
        $solicitud=Solicitud::where('id','=',$id)->get()[0];
        $tipo=$solicitud->tipo;
        $estacion=Estacion::where('id','=',$idEstacion)->get()[0];

        return view('solicitud.tablaSolicitud',[
            'cantidadCarrito'=>DB::table('elementoscarrito')->where('usuario','=',$userId)
            ->where('estado','=','O')
            ->count(),
            'estacion'=>$estacion->estacion,
            'cc'=>$estacion->cc,
            'solicitud'=>$solicitud,
            'estaciones'=>Estacion::get(),
            'articulosCarrito'=>DB::table('elementoscarrito')->where('id_Solicitud','=',$id)->get(),
            'articulos'=>DB::table('view_articulos')->
            where('tipo','=',$tipo)->
            where('estacion','=',$estacion->estacion)->
            where('cc','=',$estacion->cc)->
            get(),
        ]);
    }

    public function getArticulos($id, $tipo){
        $estacion =Estacion::where('id','=',$id)->get()[0];
        $articulos = DB::table('view_articulos')->
        where('tipo','=',$tipo)->
        where('estacion','=',$estacion->estacion)->
        where('cc','=',$estacion->cc)->
        get();
        return $articulos;
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
    public function show()
    {
        $userId=Auth::user()->id;
        return view('solicitud.listaSolicitudes',[
            'cantidadCarrito'=>DB::table('elementoscarrito')->where('usuario','=',$userId)
            ->where('estado','=','O')
            ->count(),
            'listaSolicitudes'=>Solicitud::where('usuario','=',$userId)->get(),
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
