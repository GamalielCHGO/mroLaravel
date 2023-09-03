@extends('layouts.app')

@section('title')
Lista departamentos
@endsection

@section('content')
<div class="inicioMargin hola">
    <div class="row justify-content-center">
        <!-- bug list card start -->
        <div class="card">
            <div class="card-header">
                <h1>Lista de departamentos</h1>
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
                                <th>Departamento</th>
                                <th>Estado</th>
                                <th>Activar/Desactivar</th>
                            </tr>
                        </thead>
                        <tbody class="text-start">
                            @forelse ($departamentos as $item)
                                <tr>
                                    <td class="pro-list-img">
                                        {{$item->id}}
                                    </td>
                                    <td class="pro-name">{{$item->departamento}}</td>
                                    @if ($item->estado=='E')
                                        <td class="text-success">Activo</td>
                                        <td><a href="{{ route('editarDepartamento.desActivar', $item) }}"><i class="text-danger fa fa-times fs-5"> Desactivar</a></td>    
                                    @else
                                        <td class="text-danger">Desactivado</td>
                                        <td><a href="{{ route('editarDepartamento.activar', $item) }}"><i class="text-success fa fa-check fs-5"> Activar</a></td>
                                    @endif
                                    
                                </tr>
                            @empty
                            <tr>
                                No hay departamentos para mostrar
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
                            <form action=" {{ route('crearDepartamento.store') }}" method="post" class="bg-white shadow rounded py-3 px-4">
                                @csrf
                                <div class="modal-header">
                                    <h4 class="modal-title">Agregar Departamento</h4>
                                    <button type="button" class="btn-close"
                                        data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <span
                                            aria-hidden="true"></span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="departamento">Departamento</label>
                                        <input type="text" name="departamento" id="" class="form-control form-txt-primary  bg-light shadow-sm @error('departamento') is-invalid @else border-0  @enderror"
                                        placeholder="Departamento...." required
                                        value="{{old('departamento')}}"  
                                        id="departamento">
                                        @error('departamento')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$message}}</strong>
                                            </span>
                                        @enderror
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
