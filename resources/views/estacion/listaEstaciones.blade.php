
@extends('layouts.app')

@section('title')
Lista Estaciones
@endsection

@section('content')
<div class="inicioMargin hola">
    <div class="row justify-content-center">
        <!-- bug list card start -->
        <div class="card">
            <div class="card-header">
                <h1>Lista de Estaciones</h1>
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
                                <th>ID</th>
                                <th>Estaciones</th>
                                <th>CC</th>
                                <th>Estado</th>
                                <th>Activar/Desactivar</th>
                            </tr>
                        </thead>
                        <tbody class="text-start">
                            @forelse ($estaciones as $item)
                                <tr>
                                    <td class="pro-list-img">
                                        {{$item->id}}
                                    </td>
                                    <td class="pro-name">{{$item->estacion}}</td>
                                    <td class="pro-name">{{$item->cc}}</td>
                                    @if ($item->estado=='E')
                                        <td class="text-success">Activo</td>
                                        <td><a href="{{ route('editarEstacion.desActivar', $item) }}"><i class="text-danger fa fa-times fs-5"> Desactivar</a></td>    
                                    @else
                                        <td class="text-danger">Desactivado</td>
                                        <td><a href="{{ route('editarEstacion.activar', $item) }}"><i class="text-success fa fa-check fs-5"> Activar</a></td>
                                    @endif
                                    
                                </tr>
                            @empty
                            <tr>
                                No hay Estaciones para mostrar
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- end of table -->
                <!-- Modal static-->
                <button type="button"
                class="btn btn-primary waves-effect"
                data-bs-toggle="modal"
                data-bs-target="#default-Modal">Agregar</button>
                <div class="modal fade md-effect-1" id="default-Modal" tabindex="-1"
                    role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action=" {{ route('crearEstacion.store') }}" method="post" class="bg-white shadow rounded py-3 px-4">
                                @csrf
                                <div class="modal-header">
                                    <h4 class="modal-title">Agregar Estacion</h4>
                                    <button type="button" class="btn-close"
                                        data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <span
                                            aria-hidden="true"></span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="estacion">Estacion</label>
                                        <input type="text" name="estacion" id="" class="form-control form-txt-primary  bg-light shadow-sm @error('estacion') is-invalid @else border-0  @enderror"
                                        placeholder="Estacion...." required
                                        value="{{old('estacion')}}"  
                                        id="estacion">
                                        @error('estacion')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$message}}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="cc">CC</label>
                                        <select type="text" name="cc" id="" class="form-control form-txt-primary  bg-light shadow-sm @error('cc') is-invalid @else border-0  @enderror"
                                        placeholder="Centro de Costos...." required
                                        value="{{old('cc')}}"  
                                        id="cc">
                                        @error('cc')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$message}}</strong>
                                            </span>
                                        @enderror
                                            <option value="">...</option>  
                                            @forelse ($ccs as $item)
                                                <option value="{{$item->cc}}">{{$item->cc}} {{$item->descripcion}}</option>    
                                            @empty

                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button"
                                        class="btn btn-danger waves-effect "
                                        data-bs-dismiss="modal">Cancelar</button>
                                    <input type="submit" value="Guardar"
                                        class="btn btn-primary waves-effect waves-light ">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- end modal static --}}
            </div>
        </div>
        <!-- bug list card end -->
        
         
    </div>
</div>
@endsection
