@extends('layouts.app')

@section('title')
    Elementos carrito
@endsection

@section('title')
    Solicitud
@endsection

@section('content')
<div class="inicioMargin hola">
    <div class="row justify-content-center">
        <!-- bug list card start -->
        @isset($status)
            <div class="alert alert-dismissible alert-success background-success">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Correcto!! </strong> {{ $status}}
            </div>
        @endisset

        @isset($error)
            <div class="alert alert-dismissible alert-success background-warning">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Error!! </strong> {{ $error}}
            </div>
        @endisset
 

        <div class="card">
            <div class="row text-center">
                <h1 class="fs-1">Elementos a entregar</h1>
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
                                <th>Comentarios</th>
                                <th>Eliminar</th>
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
                                        <form action="{{route('actualizarCarrito')}}" method="post">
                                            @csrf
                                            <div class="row">
                                                <input type="number" name="idElemento" id="idElemento" value={{$item->id}} class="form-control d-none" >
                                                <input type="number" name="idSolicitud" id="idSolicitud" value="{{$item->id_solicitud}}" class="form-control d-none" >
                                                <div class="col">
                                                    <input type="number" name="cantidad" id="cantidad" value={{$item->cantidad}} class="form-control"  required min=1>
                                                </div>
                                                <div class="col">
                                                    <button type="submit" class="btn btn-success" data-bs-toggle="tooltip" title="Actualizar cantidad"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                                                </div>
                                              </div>
                                        </form>
                                    </td>
                                    <td>
                                        <label class="form-label">{{$item->precio}}</label>
                                    </td>
                                    <td>{{$item->cc}}</td>
                                    <td>{{$item->estacion}}</td>
                                    <td><div class="container-fluid">{{$item->comentarios}}</div></td>
                                    <td class="action-icon">
                                        <form action="{{route('eliminarArticuloSolicitud')}}" method="POST">
                                            @csrf
                                            <input type="text" name="idSolicitud" id="idSolicitud" value="{{$item->id_solicitud}}" class='d-none'>
                                            <input type="text" name="idArticulo" id="idArticulo" value="{{$item->id}}" class='d-none'>
                                            <input type="text" name="ruta" id="ruta" value="solicitud" class='d-none'>
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash fs-5" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>No hay articulos para mostrar</tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- end of table -->
                <div class="row ">
                    <div class="cols-11 text-center">
                        <form action="{{route('entregarSolicitud')}}" method="POST">
                            @csrf
                            <input type="text" name="idSolicitud" id="idSolicitud" value="{{$item->id_solicitud}}" class='d-none'>
                            <button type="submit" class="btn btn-success"><i class="fa fa-check fs-5" aria-hidden="true"></i>Marcar como entregado</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

