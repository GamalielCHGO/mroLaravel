@extends('layouts.app')

@section('articulos')
    @isset($articulosCarrito)
        {{$articulosCarrito}}
    @endisset
@endsection

@section('content')
<div class="inicioMargin hola">
    <div class="row justify-content-center">
        <div>
            <p class="text-center fw-bold display-2 text-primary">Bienvenid@ al sistema Vales electrónicos</p>
        </div>
        
        <!-- tabla de solicitudes -->
        <div class="card">
            <div class="card-header">
                <h5>Historico de solicitudes</h5>
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
                                <th>#ID</th>
                                <th>Usuario</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                                <th>Tipo</th>
                                <th>Detalles</th>
                                <th>Departamento</th>
                            </tr>
                        </thead>
                        <tbody class="text-start">
                            @forelse ($listaSolicitudes as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{Auth::user()->username}}</td>
                                    <td>{{$item->fecha_creacion}}</td>
                                    @switch($item->estado)
                                        @case('O')
                                            <td><span
                                                class="label label-primary">Abierto</span>
                                            </td>
                                            @break
                                        @case('E')
                                            <td><span
                                                class="label label-info">Esperando aprobacion</span>
                                            </td>
                                            @break
                                        @case('A')
                                            <td><span
                                                class="label label-warning">Aprobada</span>
                                            </td>
                                            @break
                                        @case('R')
                                            <td><span
                                                class="label label-danger">Rechazada</span>
                                            </td>
                                            @break
                                        @default
                                            <td><span
                                                class="label label-primary-emphasis">Entregada</span>
                                            </td>
                                    @endswitch
                                    <td>{{$item->tipo}}</td>
                                    <td>{{$item->detalles}}</td>
                                    <td>{{$item->departamento}}</td>
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
