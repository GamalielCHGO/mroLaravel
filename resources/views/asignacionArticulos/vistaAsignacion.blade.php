@extends('layouts.app')

@section('title')
    Asignacion de articulos
@endsection

@section('content')
<div class="inicioMargin hola">
    <div class="row justify-content-center">
        <!-- bug list card start -->
        <div class="card">
            <div class="card-header">
                <h1>Lista de asignaciones</h1>
                <h4>Estacion: {{ $estacion}}</h4>
                <h4>Tipo: {{ $tipo}}</h4>
                <h4>CC: {{ $cc}}</h4>
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
                    <div class="row">
                        <div class="col-sm-12 col-xl-6 m-b-30">
                            <h4 class="sub-title">Articulos Disponibles para asignacion</h4>
                            <form action="{{route('guardarArticulos')}}" method="post">
                                @csrf
                                <div>
                                    <input type="text" name="tipo" id="" value="{{$tipo}}" class="d-none">
                                </div>
                                <div>
                                    <input type="text" name="estacion" id="" value="{{$estacion}}" class="d-none">
                                </div>
                                <div>
                                    <input type="text" name="cc" id="" value="{{$cc}}" class="d-none">
                                </div>

                                <div class="row">
                                    <div class="form-group col-12">
                                        <select id='custom-headers' class="searchable"
                                        multiple='multiple' name="items[]">
                                            @forelse ($articulos as $item)
                                                <option value="{{$item->id}}" 
                                                @if ($item->estado!=null)
                                                    selected
                                                @endif
                                                >{{$item->numero_parte}} </option>    
                                            @empty

                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-xl-12 m-b-30 ">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="">
                                                <div class="d-grid">
                                                    <input type="submit" class="btn btn-success" value="Guardar modificaciones">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                        </div> 
                
                </div>
                <!-- end of table -->
            </div>
        </div>
        <!-- bug list card end -->
        
         
    </div>
</div>
@endsection
