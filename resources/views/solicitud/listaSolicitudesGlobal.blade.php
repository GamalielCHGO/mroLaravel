@extends('layouts.app')

@section('title')
Lista de solicitudes
@endsection

@section('content')
<div class="inicioMargin hola">
    <div class="row justify-content-center">
        <div>
            <p class="text-center fw-bold display-2 text-primary">Historico de solicitudes</p>
        </div>
        <!-- tabla de solicitudes -->
        <div class="card">
            <div class="card-header">
                <h3>Filtrar por fecha</h3>
                <div class="card-header-right">
                    <i class="icofont icofont-spinner-alt-5"></i>
                </div>
                <div>
                    <form action="{{route('listaSolicitudesGlobalFecha')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <input type="text" name="daterange" class="form-control"
                                    value="{{$fechaF}} - {{$fechaI}}"/>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-success" data-bs-toggle="tooltip" title="Actualizar cantidad">Buscar <i class="fa fa-search" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-block">
                <div class="table-responsive">
                    <table id="issue-list-table"
                        class="table dt-responsive width-100" style="width: 100%;">
                        <thead class="text-start">
                            <tr>
                                <th>#ID</th>
                                <th>Usuario</th>
                                <th>Fecha</th>
                                <th>Tipo</th>
                                <th>Detalles</th>
                                <th>Departamento</th>
                                <th>Costo</th>
                                <th>Estado</th>
                                <th>Visualizar</th>
                            </tr>
                        </thead>
                        <tbody class="text-start">
                            @forelse ($listaSolicitudes as $item)
                                <tr>
                                    <td>{{$item->idSolicitud}}</td>
                                    <td>{{$item->username}}</td>
                                    <td>{{$item->fecha_creacion}}</td>
                                    <td>{{$item->tipo}}</td>
                                    <td>{{$item->detalles}}</td>
                                    <td>{{$item->departamento}}</td>
                                    <td>{{$totales[$item->idSolicitud]}}</td>
                                    
                                    @switch($item->estado)
                                        @case('O')
                                            <td><span class="label label-primary">Abierto</span></td>
                                            <td><a href="{{route('crearSolicitud')}}"><i class="fa fa-eye fs-5" aria-hidden="true"></i></a></td>
                                            @break
                                        @case('E')
                                            <td><span class="label label-info">Esperando aprobacion</span></td>
                                            <td><a href="{{route('solicitudLectura',$item->idSolicitud) }}"><i class="fa fa-eye fs-5" aria-hidden="true"></i></a></td>
                                            @break
                                        @case('A')
                                            <td><span class="label label-warning">Aprobada</span>
                                            <td><a href="{{route('solicitudLectura',$item->idSolicitud) }}"><i class="fa fa-eye fs-5" aria-hidden="true"></i></a></td>
                                            </td> 
                                            @break
                                        @case('R')
                                            <td><span class="label label-danger">Rechazada</span>
                                            <td><a href="{{route('solicitudLectura',$item->idSolicitud) }}"><i class="fa fa-eye fs-5" aria-hidden="true"></i></a></td>
                                            </td>
                                            @break
                                        @default
                                            <td><span class="label label-success">Entregada</span>
                                            <td><a href="{{route('solicitudLectura',$item->idSolicitud) }}"><i class="fa fa-eye fs-5" aria-hidden="true"></i></a></td>
                                            </td>
                                    @endswitch
                                </tr>
                            @empty
                                No tienes solicitudes creadas
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- end of table -->
            </div>
        </div>
        <!-- bug list card end -->         
    </div>
</div>
@endsection
