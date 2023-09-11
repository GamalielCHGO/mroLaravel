<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userId=Auth::user()->id;
        return view('home',[
            'cantidadCarrito'=>DB::table('elementoscarrito')->where('usuario','=',$userId)
            ->where('estado','=','O')
            ->count(),
            'listaSolicitudes'=>Solicitud::where('usuario','=',$userId)->latest('fecha_creacion')->get(),
        ]);
    }

    public function base()
    {
        return view('base');
    }

    public function solicitar()
    {
        return view('solicitar');
    }

    public function solicitud()
    {
        return view('solicitud');
    }
    public function listaSolicitudes()
    {
        return view('listaSolicitudes');
    }
    public function aprobaciones()
    {
        return view('aprobaciones');
    }
    public function entregaPendiente()
    {
        return view('entregaPendiente');
    }
    public function entregaPendienteDetalles()
    {
        return view('entregaPendienteDetalles');
    }

    public function conciliacion()
    {
        return view('conciliacion');
    }


    public function configurar()
    {
        if (Gate::allows('configuracion'))
        {
            return view('configurar');
        }
        else
        {
            return view('home');
        }
    }

    

    
    

    
}
