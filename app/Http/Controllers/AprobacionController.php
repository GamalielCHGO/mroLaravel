<?php

namespace App\Http\Controllers;

use App\Mail\solicitudAprobacion;
use App\Mail\solicitudAprobada;
use App\Models\Aprobacion;
use App\Models\CC;
use App\Models\ElementosSolicitud;
use App\Models\Estacion;
use App\Models\Solicitud;
use App\Models\SolicitudReglas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AprobacionController extends Controller
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
    public function index(Request $request)
    {
        $mensaje=[];
        $userId=Auth::user()->id;
        $userMail=Auth::user()->email;
        $solicitud = DB::table('elementoscarrito')
            ->where('id_solicitud','=',$request['idSolicitud'])->get();
            if (sizeof($solicitud)==0)
            {
                $total= Solicitud::where('estado','=','O')
                        ->where('usuario','=',$userId)
                        ->get();

                return view('solicitud.solicitud',[
                    'error'=>"Error no hay articulos en tu carrito",
                    'cantidadCarrito'=>sizeof($total),
                    'solicitud'=>$total,
                    'articulosCarrito'=>$solicitud,
                    'estaciones'=>Estacion::where('estado','=','E')->get(),
                    'ccs'=>CC::where('estado','=','E')->get(),
                ]);
            }
            
        $reglas = SolicitudReglas::get();

        foreach ($reglas as $key) {
            
            // si la regla coincide, validamos las 3 reglas de articulos EPP, consumibles y refacciones
            if($key->tipo==$solicitud[0]->tipo)
            {
                // validamos si es un supervisor el que necesitamos
                if($key->aprobador=="SUPER")
                {
                    // llamamos al supervisor
                    $supervisor= User::where('id','=',$solicitud[0]->usuario)->get();
                    $supervisorEmail = $supervisor[0]['email'];
                    $supervisor = $supervisor[0]['idSupervisor'];
                    // validamos si existe
                    if ($supervisor == null)
                    {
                        $total= Solicitud::where('estado','=','O')
                        ->where('usuario','=',$userId)
                        ->get();
                        return view('solicitud.solicitud',[
                            'error'=>"Error no tienes supervisor Avisa a Compras",
                            'cantidadCarrito'=>sizeof($total),
                            'solicitud'=>$total,
                            'articulosCarrito'=>$solicitud,
                            'estaciones'=>Estacion::where('estado','=','E')->get(),
                            'ccs'=>CC::where('estado','=','E')->get(),
                        ]);
                    }
                }
                // aqui validamos las solicitudes de EPP
                else
                {
                    // si el tipo de aprobador es diferente al supervisor lo seleccionamos
                    // llamamos a los usuarios con EHS y Gerente
                    $supervisor= User::where('role','=',$key->aprobador)->get();
                    
                    if ($supervisor == null)
                    {
                        $total= Solicitud::where('estado','=','O')
                        ->where('usuario','=',$userId)
                        ->get();
                        return view('solicitud.solicitud',[
                            'error'=>"Error no existe un usuario con el rol de ".$key->aprobador,
                            'cantidadCarrito'=>sizeof($total),
                            'solicitud'=>$total,
                            'articulosCarrito'=>$solicitud,
                            'estaciones'=>Estacion::where('estado','=','E')->get(),
                            'ccs'=>CC::where('estado','=','E')->get(),
                        ]);
                    }
                    $supervisorEmail = $supervisor[0]['email'];
                    $supervisor = $supervisor[0]['username'];
                    $mensaje['supervisorEmail']=$supervisorEmail;
                }

                // envio de correo supervisor
                $mensaje['tipo']=$solicitud[0]->tipo;
                $mensaje['idSolicitud']=$request['idSolicitud'];
                $mensaje['idSolicitud']=$solicitud[0]->usuario;
                $mensaje['userMail']=$userMail;
                $mensaje['username']=Auth::user()->username;
                // envio de correo
                Mail::to($supervisorEmail)->queue(new solicitudAprobacion ($mensaje));


                // llamamos al gerente
                $gerente= User::where('role','=','GERENTE')->first();
                $gerenteEmail = $gerente['email'];
                $gerente = $gerente['username'];
                // agregamos aprobacion de gerente para articulos criticos
                foreach ($solicitud as $key) {
                    // si es critico creamos la aprobacion
                    if($key->critico=="Y"){ 
                        // envio de correo gerente
                        $mensaje['tipo']=$solicitud[0]->tipo;
                        $mensaje['idSolicitud']=$request['idSolicitud'];
                        $mensaje['idSolicitud']=$solicitud[0]->usuario;
                        $mensaje['userMail']=$userMail;
                        $mensaje['username']=Auth::user()->username;
                        $mensaje['supervisorEmail']=$gerenteEmail;
                        // envio de correo
                        Mail::to($gerenteEmail)->queue(new solicitudAprobacion ($mensaje));
                         // crear aprobacion gerente
                        Aprobacion::create([
                            'tipo'=>$solicitud[0]->tipo,
                            'idSolicitud'=>$request['idSolicitud'],
                            'idUsuario'=>$solicitud[0]->usuario,
                            'iDAprobador'=>$gerente,
                            'estado'=>'E',
                        ]);
                        break;
                    }
                }
                
                
                // agregamos la aprobacion para la solicitud
                    // crear aprobacion
                    Aprobacion::create([
                        'tipo'=>$solicitud[0]->tipo,
                        'idSolicitud'=>$request['idSolicitud'],
                        'idUsuario'=>$solicitud[0]->usuario,
                        'iDAprobador'=>$supervisor,
                        'estado'=>'E',
                    ]);
            }
            // agregamos una segunda validacion para agregar la reglas extras de costo y material critico
            if($key->tipo=="Critico")
            {}
            if($key->tipo=="Costo")
            {}
        }
        // una vez que se terminan las reglas si todo salio bien pasamos la solicitud y los articulos al siguiente estado y mandamos la notificacion
        Solicitud::where('id', $request['idSolicitud'])
        ->update(['estado' => 'E']);
        ElementosSolicitud::where('id_solicitud', $request['idSolicitud'])
        ->update(['estado' => 'E']);

        return view('home',[
            'cantidadCarrito'=>DB::table('elementoscarrito')->where('usuario','=',$userId)
            ->where('estado','=','O')
            ->count(),
            'listaSolicitudes'=>Solicitud::where('usuario','=',$userId)->orderBy('fecha_creacion','asc')->get(),
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
    public function show()
    {
        $ids=[];
        $userId=Auth::user()->username;
        $aprobaciones = DB::table('solicitudesusuario')->where('idAprobador','=',$userId)->where('estado','=','E')->get();
        foreach ($aprobaciones as $key => $value) {
            $ids[]=$value->idSolicitud;
        }

        return view('aprobacion.pendienteAprobacion',[
            'aprobaciones'=>DB::table('solicitudesusuario')->where('idAprobador','=',$userId)->where('estado','=','E')->get(),
            'ids'=>$ids,
            'elementosCarrito'=>DB::table('elementoscarrito')
            ->whereIn('id_solicitud',$ids)->orderBy('id_solicitud','asc')->get()
        ]);
    }

    public function actualizarCarritoSupervisor(){
        $ids=[];
        $userId=Auth::user()->username;
        $aprobaciones = DB::table('solicitudesusuario')->where('idAprobador','=',$userId)->where('estado','=','E')->get();
        foreach ($aprobaciones as $key => $value) {
            $ids[]=$value->idSolicitud;
        }

        $id=request()->idElemento;
        $cantidad=request()->cantidad;

        ElementosSolicitud::where('id',$id)->update([
            'cantidad'=>$cantidad,
        ]);

        return view('aprobacion.pendienteAprobacion',[
            'aprobaciones'=>DB::table('solicitudesusuario')->where('idAprobador','=',$userId)->where('estado','=','E')->get(),
            'ids'=>$ids,
            'elementosCarrito'=>DB::table('elementoscarrito')
            ->whereIn('id_solicitud',$ids)->orderBy('id_solicitud','asc')->get()
        ]);

       
    }



    public function destroyElementoSolicitud(Request $request){
        $ids=[];
        $userId=Auth::user()->username;
        $aprobaciones = DB::table('solicitudesusuario')->where('idAprobador','=',$userId)->where('estado','=','E')->get();
        foreach ($aprobaciones as $key => $value) {
            $ids[]=$value->idSolicitud;
        }
        ElementosSolicitud::where('id','=',$request->id)->delete();
        return view('aprobacion.pendienteAprobacion',[
            'aprobaciones'=>DB::table('solicitudesusuario')->where('idAprobador','=',$userId)->where('estado','=','E')->get(),
            'ids'=>$ids,
            'elementosCarrito'=>DB::table('elementoscarrito')
            ->whereIn('id_solicitud',$ids)->orderBy('id_solicitud','asc')->get()
        ]);
    }

    public function aprobarSolicitud(){
        $userId=Auth::user()->username;
        $idSolicitud=request()->id;
        Aprobacion::where('idSolicitud',$idSolicitud)->where('idAprobador',$userId)->update([
            'estado'=>'A',
            'fechaAprobacion'=>now()
        ]);
        $pendientes = Aprobacion::where('idSolicitud',$idSolicitud)->where('estado','E')->get();
        if(!$pendientes->count()>0){

            Solicitud::where('id',$idSolicitud)->update([
                'estado'=>'A'
            ]);
            ElementosSolicitud::where('id_solicitud',$idSolicitud)->update([
                'estado'=>'A'
            ]);
            
    
            $mensaje=[];
            $solicitudInformacion=Solicitud::where('id',$idSolicitud)->get();
            $isUsuario=$solicitudInformacion[0]['usuario'];
            $datosUsuario=User::where('id',$isUsuario)->first();
            $mensaje['name']=$datosUsuario['name'];
            $mensaje['lastname']=$datosUsuario['lastname'];
            $mensaje['email']=$datosUsuario['email'];
            $mensaje['solicitud']=$idSolicitud;
            $mensaje['estado']='Aprobada';
            Mail::to($datosUsuario['email'])->queue(new solicitudAprobada ($mensaje));

        }
        $ids=[];
        $userId=Auth::user()->username;
        $aprobaciones = DB::table('solicitudesusuario')->where('idAprobador','=',$userId)->where('estado','=','E')->get();
        foreach ($aprobaciones as $key => $value) {
            $ids[]=$value->idSolicitud;
        }
        return view('aprobacion.pendienteAprobacion',[
            'aprobaciones'=>DB::table('solicitudesusuario')->where('idAprobador','=',$userId)->where('estado','=','E')->get(),
            'ids'=>$ids,
            'elementosCarrito'=>DB::table('elementoscarrito')
            ->whereIn('id_solicitud',$ids)->orderBy('id_solicitud','asc')->get(),
            'status'=>'Solicitud aprobada'
        ]);
        
    }

    public function rechazarSolicitud(){
        $idSolicitud=request()->id;
        Solicitud::where('id',$idSolicitud)->update([
            'estado'=>'R'
        ]);
        ElementosSolicitud::where('id_solicitud',$idSolicitud)->update([
            'estado'=>'R'
        ]);
        Aprobacion::where('idSolicitud',$idSolicitud)->update([
            'estado'=>'R',
            'fechaAprobacion'=>now()
        ]);

        $mensaje=[];
        $solicitudInformacion=Solicitud::where('id',$idSolicitud)->get();
        $isUsuario=$solicitudInformacion[0]['usuario'];
        $datosUsuario=User::where('id',$isUsuario)->first();
        $mensaje['name']=$datosUsuario['name'];
        $mensaje['lastname']=$datosUsuario['lastname'];
        $mensaje['email']=$datosUsuario['email'];
        $mensaje['solicitud']=$idSolicitud;
        $mensaje['estado']='Aprobada';
        Mail::to($datosUsuario['email'])->queue(new solicitudAprobada ($mensaje));

        $ids=[];
        $userId=Auth::user()->username;
        
        $aprobaciones = DB::table('solicitudesusuario')->where('idAprobador','=',$userId)->where('estado','=','E')->get();
        foreach ($aprobaciones as $key => $value) {
            $ids[]=$value->idSolicitud;
        }

        return view('aprobacion.pendienteAprobacion',[
            'aprobaciones'=>DB::table('solicitudesusuario')->where('idAprobador','=',$userId)->where('estado','=','E')->get(),
            'ids'=>$ids,
            'elementosCarrito'=>DB::table('elementoscarrito')
            ->whereIn('id_solicitud',$ids)->orderBy('id_solicitud','asc')->get(),
            'status'=>'Solicitud aprobada'
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

