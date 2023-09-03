@extends('layouts.app')

@section('title')
Lista Asignacion
@endsection

@section('content')
<div class="inicioMargin hola">
    <div class="row justify-content-center">
        <!-- bug list card start -->
        <div class="card">
            <div class="card-header">
                <h1>Lista de asignaciones</h1>
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
                                <th>Estacion</th>
                                <th>CC</th>
                                <th>Tipo</th>
                                <th>Total Articulos</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody class="text-start">
                            @forelse ($asignacionArts as $item)
                                <tr>
                                    <td>{{$item->estacion}}</td>
                                    <td>{{$item->cc}}</td>
                                    <td>{{$item->tipo}}</td>
                                    @if($item->total>1)
                                        <td>{{$item->total}}</td>
                                    @else
                                        <td>0</td>
                                    @endif
                                    <td><a href="{{  route('vistaAsignacion',[$item->estacion,$item->cc,$item->tipo]) }}"><i class="icofont icofont-pencil-alt-5 fs-5"></a></td>
                                </tr>
                            @empty
                            <tr>
                                No hay asignaciones creadas para mostrar
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
