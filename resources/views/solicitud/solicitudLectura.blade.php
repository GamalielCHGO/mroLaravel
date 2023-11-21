@extends('layouts.app')

@section('title')
    vista de solicitud
@endsection

@section('title')
    Solicitud
@endsection

@section('content')
<div class="inicioMargin hola">
    <div class="row justify-content-center">
        <!-- bug list card start -->
        @isset($error)
                    <div class="alert alert-dismissible alert-success background-warning">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>Error!! </strong> {{ $error}}
                    </div>
                @endisset
        <div class="card">
            <div class="row text-center">
                <h1 class="fs-1">Elementos en el carrito</h1>
            </div>
            <h3>Datos de solicitud: </h3>
            <table class="table table-responsive">
                <thead class="table-primary">
                    <th>Solicitud</th>
                    <th>Usuario</th>
                    <th>Estado</th>
                    <th>Tipo</th>
                    <th>Departamento</th>
                    <th>Detalles</th>
                    <th>Fecha creacion</th>
                    <th>Fecha entrega</th>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$solicitudes[0]->idSolicitud}}</td>
                        <td>{{$solicitudes[0]->username}}</td>
                        @switch($solicitudes[0]->estadoSolicitud)
                            @case('O')
                                <td><span class="label label-primary">Abierto</span></td>
                                @break
                            @case('E')
                                <td><span class="label label-info">Esperando aprobacion</span></td>
                                @break
                            @case('A')
                                <td><span class="label label-warning">Aprobada</span>
                                </td> 
                                @break
                            @case('R')
                                <td><span class="label label-danger">Rechazada</span>
                                </td>
                                @break
                            @case('EP')
                                <td><span class="label label-primary">Entrega Parcial</span>
                                </td>
                                @break
                            @default
                                <td><span class="label label-success">Entregada</span>
                                </td>
                        @endswitch
                        <td>{{$solicitudes[0]->tipo}}</td>
                        <td>{{$solicitudes[0]->departamento}}</td>
                        <td>{{$solicitudes[0]->detalles}}</td>
                        <td>{{$solicitudes[0]->fecha_creacion}}</td>
                        <td>{{$solicitudes[0]->fecha_entrega}}</td>
                    </tr>
                </tbody>
            </table>

            <h3>Datos de aprobacion: </h3>
            <table class="table table-responsive">
                <thead class="table-primary">
                    <th>Id Aprobador</th>
                    <th>Estado</th>
                    <th>Fecha aprobacion</th>
                    <th>Fecha solicitud</th>
                </thead>
                <tbody>
                    @foreach ($solicitudes as $item)
                        <tr>
                            <td>{{$item->idAprobador}}</td>
                            @switch($item->estado)
                            @case('O')
                                <td><span class="label label-primary">Abierto</span></td>
                                @break
                            @case('E')
                                <td><span class="label label-info">Esperando aprobacion</span></td>
                                @break
                            @case('A')
                                <td><span class="label label-warning">Aprobada</span>
                                </td> 
                                @break
                            @case('R')
                                <td><span class="label label-danger">Rechazada</span>
                                </td>
                                @break
                            @case('EP')
                                <td><span class="label label-primary">Entrega Parcial</span>
                                </td>
                                @break
                            @default
                                <td><span class="label label-success">Entregada</span>
                                </td>
                        @endswitch
                            <td>{{$item->fechaAprobacion}}</td>
                            <td>{{$item->created_at}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            
            <!-- bug list card end -->
            <div class="card-block">
                <div class="table-responsive">
                    <table id="issue-list-table"
                        class="table dt-responsive width-100" style="width: 100%;">
                        <thead class="text-start">
                            <tr>
                                <th>Imagen</th>
                                <th>Nombre</th>
                                <th>Nombre old</th>
                                <th>Descripcion</th>
                                <th>Cantidad</th>
                                <th>precio</th>
                                <th>CC</th>
                                <th>Estacion</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody id="cuerpo" class="text-start">
                            @forelse ($articulosCarrito as $item)
                                <tr>
                                    <td>
                                        <img src="{{$item->rutaResize}}"
                                            class="img-fluid" alt="tbl">
                                    </td>
                                    <td>
                                        {{$item->numero_parte}}
                                    </td>
                                    <td>
                                        {{$item->numero_parte_old}}
                                    </td>
                                    <td>{{$item->descripcion}}</td>
                                    <td>
                                        <label class="form-label text-danger">{{$item->cantidad}}</label>
                                    </td>
                                    <td>
                                        <label class="form-label text-danger">{{$item->precio}}</label>
                                    </td>
                                    <td>{{$item->cc}}</td>
                                    <td>{{$item->estacion}}</td>
                                    @switch($item->estado)
                                        @case('O')
                                            <td>Abierto</td>
                                            @break
                                        @case('E')
                                            <td>Esperando aprobacion</td>
                                            @break
                                        @case('A')
                                            <td>Aprobada
                                            </td> 
                                            @break
                                        @case('R')
                                            <td>Rechazada
                                            </td>
                                            @break
                                        @case('EP')
                                            <td>Entrega Parcial
                                            </td>
                                            @break
                                        @default
                                            <td>Entregada
                                            </td>
                                    @endswitch
                                </tr>
                            @empty
                                <tr>No hay articulos para mostrar</tr>
                            @endforelse
                        </tbody>
                    </table>
                 
                </div>
                <!-- end of table -->
            </div>
        </div>
    </div>
</div>
@endsection


