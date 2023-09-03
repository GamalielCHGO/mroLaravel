@extends('layouts.app')

@section('content')
<!-- Page-header start -->
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Editar usuario</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page-header end -->

<!-- Page body start -->
<div class="page-body">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-6 mx-auto">
                <form method="POST" action="{{ route('editarUsuario.update',$user) }}"  class="bg-white shadow rounded py-3 px-4">
                    @csrf @method('PATCH')
                    <h1 class="display-4">Editar Usuario</h1>
                    <hr>
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="" class="form-control form-txt-primary  bg-light shadow-sm @error('name') is-invalid @else border-0  @enderror"
                        placeholder="Nombre...." required
                        value="{{ old('name',$user->name) }}"
                        id="name"> 
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="lastname">Apellido</label>
                        <input type="text" name="lastname" id="" class="form-control form-txt-primary  bg-light shadow-sm @error('lastname') is-invalid @else border-0  @enderror"
                        placeholder="Apellido...."  required
                        value="{{old('lastname',$user->lastname)}}" 
                        id="lastname">
                        @error('lastname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="username">Usuario</label>
                        <input type="text" name="username" placeholder="Usuario (8 letras)" value="{{old('username',$user->username)}}" required
                        class="form-control form-txt-primary bg-light shadow-sm @error('username') is-invalid @else border-0  @enderror">
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="sap">SAP</label>
                        <input type="number" name="sap" placeholder="Numero de SAP" value="{{ old('sap',$user->sap) }}" required
                        class="form-control form-txt-primary bg-light shadow-sm @error('sap') is-invalid @else border-0  @enderror">
                        @error('sap')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Correo</label>
                        <input type="email" name="email" placeholder="Correo...@tenneco.com" value="{{ old('email',$user->email)}}" required
                        class="form-control form-txt-primary bg-light shadow-sm @error('email') is-invalid @else border-0  @enderror">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="role">Rol</label>
                        <select type="role" name="role" value="{{$user->role}}" required
                        class="form-control form-txt-primary bg-light shadow-sm @error('role') is-invalid @else border-0  @enderror">
                        @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                        <option value="...">...</option>
                            <option value="ADMIN" @if(old('role',$user->role)=="ADMIN") selected @endif>Admin</option>
                            <option value="USER" @if(old('role',$user->role)=="USER") selected @endif>Usuario</option>
                            <option value="SUPER" @if(old('role',$user->role)=="SUPER") selected @endif>Supervisor</option>
                            <option value="EHS" @if(old('role',$user->role)=="EHS") selected @endif>EHS</option>
                            <option value="GERENTE" @if(old('role',$user->role)=="GERENTE") selected @endif>Gerente</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="idSupervisor">Supervisor</label>
                        <select name="idSupervisor" class="js-example-basic-single col-sm-12">
                            <option value="">NA</option>
                            @forelse ($usuarios as $item)
                                <option value="{{$item->username}}">{{$item->name }} {{$item->lastname }}</option>
                            @empty
                                <option value="">No hay usuarios para agregar</option>
                            @endforelse
                        </select>
                    </div>

                    <div class="col-sm-12 col-xl-12 m-b-30 ">
                        <div class="col-lg-12 col-md-12">
                            <div class="">
                                <div class="d-grid">
                                    <button class="btn btn-success">
                                        <i class="icofont icofont-check-circled"></i>
                                        Actualizar usuario</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form action="{{ route('user.destroy' , $user)}}" method="POST"  class="bg-white shadow rounded py-3 px-4">
                    @csrf @method('DELETE')
                    <div class="col-sm-12 col-xl-12 m-b-30 ">
                        <div class="col-lg-12 col-md-12">
                            <div class="">
                                <div class="d-grid">
                                    <button class="btn btn-danger">
                                        <i class="icofont icofont-check-circled"></i>
                                        Borrar usuario</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <hr>
            </div>
            <!-- Select2 end -->
            
        </div>
    </div>
</div>
<!-- Page body end -->
@endsection
