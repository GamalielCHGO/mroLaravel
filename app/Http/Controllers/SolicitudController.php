<?php

namespace App\Http\Controllers;

use App\Exports\SolicitudExport;
use App\Models\Aprobacion;
use App\Models\Departamento;
use App\Models\Solicitud;
use App\Models\Estacion;
use App\Models\CC;
use App\Models\ElementosSolicitud;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

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
                'ccs'=>CC::where('estado','=','E')->get(),
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
            'ccs'=>CC::where('estado','=','E')->get(),
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
        $idCc=$request->cc;
        $solicitud=Solicitud::where('id','=',$id)->get()[0];
        $tipo=$solicitud->tipo;
        $estacion=Estacion::where('id','=',$idEstacion)->get()[0];
        $cc=CC::where('id','=',$idCc)->get()[0];

        return view('solicitud.tablaSolicitud',[
            'cantidadCarrito'=>DB::table('elementoscarrito')->where('usuario','=',$userId)
            ->where('estado','=','O')
            ->count(),
            'estacion'=>$estacion->estacion,
            'cc'=>$cc,
            'solicitud'=>$solicitud,
            'estaciones'=>Estacion::get(),
            'articulosCarrito'=>DB::table('elementoscarrito')->where('id_Solicitud','=',$id)->get(),
            'articulos'=>DB::table('tb_articulos')->
            where('tipo','=',$tipo)->
            get(),
        ]);
    }

    public function getArticulos($id, $tipo){
        $estacion =Estacion::where('id','=',$id)->get()[0];
        $articulos = DB::table('tb_articulos')->
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
        $solicitudes=json_decode(request()->solicitudes,true);
        $solicitudesArray=[];
        foreach ($solicitudes as $solicitud) {
            $solicitudesArray[]=$solicitud['idSolicitud'];
        }
       
        $userId=Auth::user()->id;
        
        $collection = collect ($solicitudes);

        $collection->values()->all();

        return Excel::download(new SolicitudExport($solicitudesArray), 'export.xlsx');
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
            'listaSolicitudes'=>Solicitud::where('usuario','=',$userId)->orderBy('fecha_creacion','desc')->get(),
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
        $userId=Auth::user()->id;
        Solicitud::where('id','=',request()->idSolicitud)->delete();
        ElementosSolicitud::where('id_solicitud','=',request()->idSolicitud)->delete();
        return view('home',[
            'cantidadCarrito'=>DB::table('elementoscarrito')->where('usuario','=',$userId)
            ->where('estado','=','O')
            ->count(),
            'listaSolicitudes'=>Solicitud::where('usuario','=',$userId)->orderBy('fecha_creacion','asc')->get(),
            'status'=>'Solicitud eliminada con exito'
        ]);
    }

    public function solicitudLectura($idSolicitud)
    {
        $solicitudes = DB::table('solicitudesusuario')
        ->groupBy('idSolicitud' , 'idAprobador' , 'estado' , 'created_at' , 'tipo' , 'departamento' , 'detalles' , 'fecha_creacion' , 'fecha_entrega' , 'estadoSolicitud' , 'fechaAprobacion' , 'username')
        ->where('idSolicitud',$idSolicitud)->get();
        $userId=Auth::user()->id;
        return view('solicitud.solicitudLectura',[ 
            'cantidadCarrito'=>DB::table('elementoscarrito')->where('id_solicitud','=',$idSolicitud)
            ->count(),
            'articulosCarrito'=>DB::table('elementoscarrito')->where('id_solicitud','=',$idSolicitud)->get(),
            'aprobador'=>Aprobacion::where('idSolicitud','=',$idSolicitud)->first(),
            'solicitudes'=>$solicitudes,
        ]);
    }

    public function listaSolicitudesGlobal(){
        $userId=Auth::user()->id;
        $totales=DB::table('elementoscarrito')->selectRaw('id_solicitud, SUM(total) AS Total')->groupByRaw('id_solicitud')->get();
        $fechaI=date('m/d/Y');
        $fechaF=date("m/d/Y",strtotime($fechaI."- 1 week")); 
        $totalesInd=[];
        foreach ($totales as $total) {
            $totalesInd[$total->id_solicitud]=$total->Total;
        }
        if($userId=Auth::user()->role=="EHS")
        {
            $solicitudes=DB::table('solicitudesusuario')
            ->select('idSolicitud','username','fecha_creacion','tipo','detalles','departamento','estado')
            ->where('tipo','EPP')
            ->groupBy('idSolicitud','username','fecha_creacion','tipo','detalles','departamento','estado')
            ->orderBy('fecha_creacion','desc')
            ->limit(100)
            ->get();
        }
        else
        {
            $solicitudes=DB::table('solicitudesusuario')
            ->select('idSolicitud','username','fecha_creacion','tipo','detalles','departamento','estado')
            ->groupBy('idSolicitud','username','fecha_creacion','tipo','detalles','departamento','estado')
            ->orderBy('fecha_creacion','desc')
            ->limit(100)
            ->get();
        }
        

        return view ('solicitud.listaSolicitudesGlobal',[
            'cantidadCarrito'=>DB::table('elementoscarrito')->where('usuario','=',$userId)
            ->where('estado','=','O')
            ->count(),
            'listaSolicitudes'=>$solicitudes,
            'totales'=>$totalesInd,
            'fechaI'=>$fechaI,
            'fechaF'=>$fechaF,
            
        ]);
    }

    public function listaSolicitudesGlobalFecha(){
        $request=request();
        $request=str_replace(' ','',$request->daterange);
        $vector=explode('-',$request);
        $fechaFO=$vector[0];
        $fechaIO=$vector[1];
        $fechaFV=explode('/',$fechaFO);
        $fechaIV=explode('/',$fechaIO);
        $fechaF=$fechaFV['2'].'-'.$fechaFV['0'].'-'.$fechaFV['1'];
        $fechaI=$fechaIV['2'].'-'.$fechaIV['0'].'-'.$fechaIV['1'];
        if($userId=Auth::user()->role=="EHS")
        {
            $solicitudes=DB::table('solicitudesusuario')
            ->select('idSolicitud','username','fecha_creacion','tipo','detalles','departamento','estado')
            ->groupBy('idSolicitud','username','fecha_creacion','tipo','detalles','departamento','estado')
            ->whereBetween('fecha_creacion',[$fechaF." 00:00:00",$fechaI." 23:59:59"])
            ->where('tipo','EPP')
            ->groupBy('idSolicitud','username')->orderBy('fecha_creacion','desc')->get();
        }
        else
        {
            $solicitudes=DB::table('solicitudesusuario')
        ->select('idSolicitud','username','fecha_creacion','tipo','detalles','departamento','estado')
        ->groupBy('idSolicitud','username','fecha_creacion','tipo','detalles','departamento','estado')
        ->whereBetween('fecha_creacion',[$fechaF." 00:00:00",$fechaI." 23:59:59"])
        ->groupBy('idSolicitud','username')->orderBy('fecha_creacion','desc')->get();
        }

        $userId=Auth::user()->id;
        $totales=DB::table('elementoscarrito')->selectRaw('id_solicitud, SUM(total) AS Total')->groupByRaw('id_solicitud')->get();
        $totalesInd=[];
        foreach ($totales as $total) {
            $totalesInd[$total->id_solicitud]=$total->Total;
        }

        return view ('solicitud.listaSolicitudesGlobal',[
            'cantidadCarrito'=>DB::table('elementoscarrito')->where('usuario','=',$userId)
            ->where('estado','=','O')
            ->count(),
            'listaSolicitudes'=>$solicitudes,
            'totales'=>$totalesInd,
            'fechaI'=>$fechaIO,
            'fechaF'=>$fechaFO,
            
        ]);
    }


    public function actualizarCarrito(){
        
        $idSolicitud=request()->idSolicitud;
        $id=request()->idElemento;
        $cantidad=request()->cantidad;

        ElementosSolicitud::where('id',$id)->update([
            'cantidad'=>$cantidad,
        ]);


        return view('entrega.entregaArticulos',[
            'cantidadCarrito'=>DB::table('elementoscarrito')->where('id_solicitud','=',$idSolicitud)
            ->count(),
            'solicitud'=>Solicitud::where('id','=',$idSolicitud)->get(),
            'articulosCarrito'=>DB::table('elementoscarrito')->where('id_solicitud','=',$idSolicitud)->get(),
            'aprobador'=>Aprobacion::where('idSolicitud','=',$idSolicitud)->first(),
            'solicitudes'=>DB::table('solicitudesusuario')->where('idSolicitud',$idSolicitud)->get(),
            'status'=>'Elemento actualizado',
        ]);


    }

    public function descargarPDF($idSolicitud){
        $solicitudes = DB::table('elementoscarrito')->where('id_solicitud',$idSolicitud)->get()->toArray();
        $usuario = User::where('id',$solicitudes[0]->usuario)->first()->toArray();
        $pdf= Pdf::loadView('pdf.solicitudPDF', compact('solicitudes','usuario'));
        return $pdf->download('archivo.pdf');
        
        return 'holi';

    }

    
}
