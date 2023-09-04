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
            <h4>Tipo: {{$articulosCarrito[0]->tipo}}</h4>
            <h4>Estado: {{$articulosCarrito[0]->estado}}</h4>
            <h4>Aprobador: {{$aprobador->idAprobador}}</h4>
            <h4>FechaAprobacion: {{$aprobador->fechaAprobaciob==null? "No aprobado": $aprobador->fechaAprobaciob}}</h4>
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
                                    <td>{{$item->estado}}</td>
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

