@extends('layouts.app')

@section('title')
    Carrito de articulos
@endsection

@section('title')
    Solicitud
@endsection

@section('content')
<div class="inicioMargin hola">
    <div class="row text-center">
        <h1 class="fs-1">Elementos en el carrito</h1>
    </div>
    <div class="row justify-content-center">
        <!-- bug list card start -->
                @isset($error)
                    <div class="alert alert-dismissible alert-success background-warning">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>Error!! </strong> {{ $error}}
                    </div>
                @endisset
        <div class="card">
            <div class="card-header">
                @isset($status)
                    <div class="alert alert-dismissible alert-success background-success">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>Correcto!! </strong> {{ $status}}
                    </div>
                @endisset
                
                <h1>Solicitud #{{$solicitud[0]->id}}</h1>
                <h3>Departamento: {{$solicitud[0]->departamento}}</h3>
                <h3>Tipo: {{$solicitud[0]->tipo}}</h3>
                <h4>Buscar articulos</h4>
                <div class="card-header-right">
                    <i class="icofont icofont-spinner-alt-5"></i>
                </div>
                <div class="row">
                    <div class="col-4">
                        <form action="{{route('eliminarSolicitud')}}" method="post">
                            @csrf
                            <div class="d-none"><input type="text" id="idSolicitud" name="idSolicitud" value="{{$solicitud[0]->id}}"></div>
                            <div class="text-cente">
                                <button type="submit" class="btn btn-danger">Eliminar solicitud</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="row">
                <form action="{{route('tablaSolicitud')}}" method="post">
                    @csrf
                    <input type="text" id="id" name="id" value="{{$solicitud[0]->id}}" class="d-none">
                    <div class="col-12 mb-2">
                        <select name="estacion" id="estacion" class="form-control" required>
                            <option value="">Selecciona la estacion</option>
                            @forelse ($estaciones as $item)
                                <option value="{{$item->id}}">{{$item->estacion}} {{$item->cc}} </option>
                            @empty
                            <option value="...">Aun no hay estaciones creadas</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="col-12 mt-2 text-center">
                        <button value=""  class="btn btn-info">Agregar articulos</button>
                    </div>
                </form>
            </div>
            <hr>
            <div class="row">
                <div class="col-12">
                    <form action="{{route('solicitarAprobacion')}}" method="post">
                        @csrf
                        <div class="d-none"><input type="text" id="idSolicitud" name="idSolicitud" value="{{$solicitud[0]->id}}"></div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Terminar solicitud</button>
                        </div>
                    </form>
                </div>
            </div>
            <hr>
            <h5>Articulos en el carrito</h5>
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
                                        <label class="form-label text-danger">{{$item->cantidad}}</label>
                                    </td>
                                    <td>
                                        <label class="form-label text-danger">{{$item->precio}}</label>
                                    </td>
                                    <td>{{$item->cc}}</td>
                                    <td>{{$item->estacion}}</td>
                                    <td>
                                        <form action="{{route('eliminarElementoSolicitud')}}" method="GET">
                                            @csrf
                                            <input type="text" name="id" id="id" value="{{$item->id}}" class='d-none'>
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
                    <div class="row">
                        <div class="col-12">
                            <form action="{{route('solicitarAprobacion')}}" method="post">
                                @csrf
                                <div class="d-none"><input type="text" id="idSolicitud" name="idSolicitud" value="{{$solicitud[0]->id}}"></div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success">Terminar solicitud</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end of table -->
            </div>
        </div>
    </div>
</div>
@endsection
