@extends('layouts.app')

@section('title')
    Titulo modificado
@endsection

@section('content')
<div class="inicioMargin hola">
    <div class="row justify-content-center">
        <!-- bug list card start -->
        <div class="card">
            <div class="card-header">
                <h1>Aprobaciones pendientes</h1>
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
                                <th>IDSolicitud</th>
                                <th>Fecha</th>
                                <th>Usuario</th>
                                <th>Tipo</th>
                                <th>Departamento</th>
                                <th>Revisar</th>
                                <th>Aprobar</th>
                                <th>Rechazar</th>
                            </tr>
                        </thead>
                        <tbody class="text-start">
                            @forelse ($aprobaciones as $item)
                                <tr>
                                    <td class="pro-list-img">
                                        {{$item->idSolicitud}}
                                    </td>
                                    <td class="pro-name">
                                        {{$item->created_at}}
                                    </td>
                                    <td>{{$item->username}}</td>
                                    <td>{{$item->tipo}}</td>
                                    <td>{{$item->departamento}}</td>
                                    <td>
                                        <button type="button"
                                        class="btn btn-warning btn-outline-warning waves-effect md-trigger"
                                        data-bs-toggle="modal" data-bs-target="#Modal-overflow{{$item->idSolicitud}}"><i class="icofont icofont-eye-blocked fs-5"></i></button>
                                    </td>
                                    <td>
                                        <form action="{{route('aprobarSolicitud')}}" method="post">
                                            @csrf
                                            <input type="text" name="id" id="id" value="{{$item->idSolicitud}}" class="d-none">
                                            <button type="submit" class="btn btn-success alert-success-msg m-b-10">
                                                <i class="icofont icofont-tick-mark fs-5"></i>
                                            </button>    
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{route('rechazarSolicitud')}}" method="post">
                                            @csrf
                                            <input type="text" name="id" id="id" value="{{$item->idSolicitud}}" class="d-none">
                                            <button type="submit" class="btn btn-danger alert-danger-msg m-b-10">
                                                <i class="icofont icofont-close fs-5"></i>
                                            </button>    
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                {{"No tienes aprobaciones asignadas"}}
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


@foreach ($ids as $id)
    <!-- Modal -->
    <div class="modal fade modal-flex" id="Modal-overflow{{$id}}"
    tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body model-container">
                    <button type="button" class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                        <span
                            aria-hidden="true"></span>
                    </button>
                    <div class="card">
                        <div class="card-header">
                            <h5>Lista de productos solicitud {{$id}}</h5>
                        </div>
                        <div class="card-block">
                            <div class="table-responsive">
                                <div class="table-content">
                                    <div class="project-table">
                                        <table id="e-product-list"
                                            class="table table-striped dt-responsive nowrap" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Producto</th>
                                                    <th>Nombre</th>
                                                    <th>Cantidad</th>
                                                    <th>Borrar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($elementosCarrito->where('id_solicitud',$id) as $item)
                                                    <tr>
                                                        <td class="pro-list-img">
                                                            <img src="{{$item->rutaResize}}"
                                                                class="img-fluid" alt="tbl">
                                                        </td>
                                                        <td class="pro-name">
                                                            <h6>{{$item->descripcion}}</h6>
                                                        </td>
                                                        <td>{{$item->cantidad}}</td>
                                                        <td class="action-icon">
                                                            <form action="{{route('destroyElementoSolicitud')}}" method="GET">
                                                                @csrf
                                                                <input type="text" name="id" id="id" value="{{$item->id}}" class='d-none'>
                                                                <input type="text" name="ruta" id="ruta" value="solicitud" class='d-none'>
                                                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash fs-5" aria-hidden="true"></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product list card end -->
                </div>
            </div>
        </div>
    </div>
@endforeach

@endsection
