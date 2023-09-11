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
            @if (isset($articulosCarrito[0]))
                <h4>Id: {{$articulosCarrito[0]->id_solicitud}}</h4>
                <h4>Tipo: {{$articulosCarrito[0]->tipo}}</h4>
                <h4>Estado:
                    @switch($articulosCarrito[0]->estado)
                    @case('O')
                        <span class="label label-primary">Abierto</span>
                        @break
                    @case('E')
                        <span class="label label-info">Esperando aprobacion</span>
                        @break
                    @case('A')
                        <span class="label label-warning">Aprobada</span>
                        
                        @break
                    @case('R')
                        <span class="label label-danger">Rechazada</span>
                        @break
                    @default
                        <span class="label label-success">Entregada</span>
                    @endswitch 
                </h4>
                <h4>Aprobador: {{$aprobador->idAprobador}}</h4>
                <h4>FechaAprobacion: {{$aprobador->fechaAprobacion==null? "No aprobado": $aprobador->fechaAprobacion}}</h4>        
            @else
                <h4>Id: {{$solicitud[0]->id}}</h4>
                <h4>Tipo: {{$solicitud[0]->tipo}}</h4>
                <h4>Estado: {{$solicitud[0]->estado}}</h4>
                <h4>Fecha Entrega/Cancelacion: {{$solicitud[0]->fecha_entrega}}</h4>
                <h4>Usuario Entrega/Cancelacion: {{$solicitud[0]->usuario_entrega}}</h4>
                <h4>Departamento: {{$solicitud[0]->departamento}}</h4>
            @endif
            
            
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
                                        <label class="form-label">{{$item->cantidad}}</label>
                                    </td>
                                    <td>
                                        <label class="form-label">{{$item->precio}}</label>
                                    </td>
                                    <td>{{$item->cc}}</td>
                                    <td>{{$item->estacion}}</td>
                                    <td>{{$item->estado}}</td>
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

