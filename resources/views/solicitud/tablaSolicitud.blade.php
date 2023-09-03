@extends('layouts.app')

@section('title')
    Agregar articulos
@endsection

@section('content')
<div class="inicioMargin">
    <div class="row text-center">
        <h1 class="fs-1">Selecciona los articulos para agregar al carrito</h1>
    </div>
    
    <div class="row justify-content-center">
        <!-- bug list card start -->
        <div class="card">
            <div class="card-header">
                <h1>Solicitud #{{$solicitud->id}}</h1>
                <h3>Departamento: {{$solicitud->departamento}}</h3>
                <h3>Tipo: {{$solicitud->tipo}}</h3>
                <h4>Buscar articulos</h4>
                <div class="card-header-right">
                    <i class="icofont icofont-spinner-alt-5"></i>
                </div>
            </div>
            <div class="row">
                <form action="{{route('tablaSolicitud')}}" method="post">
                    @csrf
                    <input type="text" id="id" name="id" value="{{$solicitud->id}}" class="d-none">
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
                        <button value=""  class="btn btn-success">Buscar articulos</button>
                    </div>
                </form>
            </div>
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
                                <th>Cantidad disponible</th>
                                <th>Carrito</th>
                            </tr>
                        </thead>
                        <tbody id="cuerpo" class="text-start">
                            @forelse ($articulos as $item)
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
                                        <label class="form-label text-danger">{{$item->inventario}}</label>
                                    </td>
                                    <td >
                                        <form action="{{route('agregarCarrito')}}" method="post">
                                            @csrf
                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    <span class="" id="name">
                                                        <i class="icofont icofont-ui-calculator"></i>
                                                    </span>
                                                </div>
                                                <input name="cantidad" type="number" class="form-control" placeholder="Cantidad" title="Cantidad" data-bs-toggle="tooltip" value="0">
                                                <input name="idSolicitud" type="text" value="{{$solicitud->id}}" class="d-none">
                                                <input name="cc" type="text" value="{{$cc}}" class="d-none">
                                                <input name="estacion" type="text" value="{{$estacion}}" class="d-none">
                                                <input name="idArticulo" type="text" value="{{$item->idArticulo}}" class="d-none">
                                                <button type="submit" value="Agregar Al carrito" class="m-r-15 text-muted btn btn-success" data-bs-toggle="tooltip"
                                                data-placement="top" title="Agregar al carrito"
                                                data-original-title="Edit">
                                                <i class="icofont text-light icofont-ui-cart fs-2"></i>
                                                </button>
                                            </div>
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
            </div>
        </div>
        <!-- bug list card end -->
    </div>
</div>

<script>
    function agregarCarrito(celda){
        // articulos a agregar al carrito
        var idSolicitud = '{{$solicitud->id}}';
        var estacion = '{{$estacion}}';
        var cc = '{{$cc}}';
        
        console.log(celda);
        console.log(celda.parentElement);
        console.log(celda.parentElement.parentElement);


    }
</script>
@endsection
