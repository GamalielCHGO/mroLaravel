<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('home');
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

    
    

    
}
