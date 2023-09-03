<?php

namespace App\Http\Controllers;

use App\Models\Aprobacion;
use App\Models\ElementosSolicitud;
use App\Models\Estacion;
use App\Models\Solicitud;
use App\Models\SolicitudReglas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AprobacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $solicitud = DB::table('elementoscarrito')
            ->where('id_solicitud','=',$request['idSolicitud'])->get();
        $reglas = SolicitudReglas::get();

        foreach ($reglas as $key) {
            $userId=Auth::user()->id;
            // si la regla coincide, validamos las 3 reglas de articulos
            if($key->tipo==$solicitud[0]->tipo)
            {
                // llamamos al aprobador
                $supervisor= User::where('id','=',$solicitud[0]->usuario)->get();
                // si no existe el supervisor:
                if ($supervisor[0]['idSupervisor'] == null)
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
                    ]);
                }
                // si existe supervisor y es cualquiera de las reglas creamos la solicitud de aprobacion para un supervisor
                else
                {
                    // crear aprobacion
                    Aprobacion::create([
                        'tipo'=>$solicitud[0]->tipo,
                        'idSolicitud'=>$request['idSolicitud'],
                        'idUsuario'=>$solicitud[0]->usuario,
                        'iDAprobador'=>$supervisor[0]['idSupervisor'],
                        'estado'=>'E',
                    ]);
                }
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
            'listaSolicitudes'=>Solicitud::where('usuario','=',$userId)->get(),
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
