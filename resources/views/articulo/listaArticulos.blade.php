@extends('layouts.app')

@section('title')
Lista articulos
@endsection

@section('content')
<div class="inicioMargin hola">
    <div class="row justify-content-center">
        <!-- bug list card start -->
        <div class="card">
            <div class="card-header">
                <h1>Lista de articulos</h1>
                @if(session('status'))
                    <div class="alert alert-dismissible alert-success background-success">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>Correcto!! </strong> {{ session('status')}}
                    </div>
                @endif
                <div class="card-header-right">
                    <i class="icofont icofont-spinner-alt-5"></i>
                </div>
            </div>
            <div class="card-block">
                <div class="table-responsive">
                    <table id="issue-list-table"
                        class="table dt-responsive width-100" style="width: 100%;">
                        <thead class="text-start">
                            <tr>
                                <th>Imagen</th>
                                <th>ID</th>
                                <th>Numero parte</th>
                                <th>Numero parte old</th>
                                <th>Descripcion</th>
                                <th>Tipo</th>
                                <th>Ubicacion</th>
                                <th>Precio</th>
                                <th>Inventario</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody class="text-start">
                            @forelse ($articulos as $item)
                                <tr>
                                    <td>
                                        <a href="{{old('ruta',$item->ruta)}}" data-lightbox="1" data-title="{{old('numero_parte',$item->numero_parte)}}">
                                            <img src="{{old('ruta',$item->rutaResize)}}" alt="Imagen Original" class="img-fluid img-thumbnail" >
                                        </a>
                                    </td>
                                    <td class="pro-list-img">
                                        {{$item->id}}
                                    </td>
                                    <td>{{$item->numero_parte}}</td>
                                    <td>{{$item->numero_parte_old}}</td>
                                    <td>{{$item->descripcion}}</td>
                                    <td>{{$item->tipo}}</td>
                                    <td>{{$item->ubicacion}}</td>
                                    <td>{{$item->precio}}</td>
                                    <td>{{$item->inventario}}</td>
                                    @can('configuracion')
                                        <td><a href="{{ route('articulo', $item) }}"><i class="icofont icofont-pencil-alt-5 fs-5"></a></td>
                                    @else
                                        <td></td>
                                    @endcan
                                </tr>
                            @empty
                            <tr>
                                No hay articulos para mostrar
                            </tr>
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
