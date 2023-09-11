@extends('layouts.app')

@section('title')
Perfil usuario
@endsection

@section('content')
<div class="inicioMargin hola">
    <div class="row justify-content-center">
        <!-- Page-body start -->
        <div class="page-body">
            <!--profile cover start-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="cover-profile">
                        <div class="profile-bg-img">
                            <img class="profile-bg-img img-fluid"
                                src="/mro/public/files/assets/images/user-profile/bg-img1.jpg"
                                alt="bg-img">
                            <div class="card-block user-info">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @isset($status)
                <div class="alert alert-dismissible alert-success background-success">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>Correcto!! </strong> {{ $status }}
                </div>
            @endisset

            <div class="view-info">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="general-info">
                            <div class="row">
                                <div class="col-lg-12 col-xl-6">
                                    <div class="table-responsive">
                                        <table class="table m-0">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">
                                                        Id
                                                    </th>
                                                    <td>{{$usuario->id}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        Nombre
                                                    </th>
                                                    <td>{{$usuario->name}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        Apellido
                                                    </th>
                                                    <td>{{$usuario->lastname}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        Rol
                                                    </th>
                                                    <td>{{$usuario->role}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- end of table col-lg-6 -->
                                <div class="col-lg-12 col-xl-6">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">
                                                        Correo
                                                    </th>
                                                    <td>{{$usuario->email}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        SAP
                                                    </th>
                                                    <td>{{$usuario->sap}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        Supervisor</th>
                                                        <td>{{$usuario->idSupervisor}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        Fecha creacion</th>
                                                        <td>{{$usuario->created_at->format('Y-m-d')}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- end of table col-lg-6 -->
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12 col-sm-10 col-lg-6 mx-auto">
                                            <form method="POST" action="{{ route('updatePass') }}"  class="bg-white shadow rounded py-3 px-4">
                                                @csrf
                                                <h1 class="display-5">Actualizar contrasena</h1>
                                                <hr>
                                                <div class="form-group">
                                                    <label for="passwordOld">Contrasena actual</label>
                                                    <input type="password" name="passwordOld" id="" class="form-control form-txt-primary  bg-light shadow-sm @error('passwordOld') is-invalid @else border-0  @enderror"
                                                    placeholder="Contrasena...." required
                                                    id="passwordOld"> 
                                                    @error('passwordOld')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{$message}}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="contrasenaNueva">Contrasena nueva</label>
                                                    <input type="password" name="contrasenaNueva" id="" class="form-control form-txt-primary  bg-light shadow-sm @error('contrasenaNueva') is-invalid @else border-0  @enderror"
                                                    placeholder="Nueva Contrasena...." required
                                                    id="contrasenaNueva"> 
                                                    @error('contrasenaNueva')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{$message}}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                {{$errors}}
                                                <div class="form-group">
                                                    <label for="contrasenaNueva_confirmation">Confirmar nueva contrasena</label>
                                                    <input type="password" name="contrasenaNueva_confirmation" id="" class="form-control form-txt-primary  bg-light shadow-sm @error('contrasenaNueva_confirmation') is-invalid @else border-0  @enderror"
                                                    placeholder="Confirmar Contrasena...." required
                                                    id="contrasenaNueva_confirmation"> 
                                                    @error('contrasenaNueva_confirmation')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{$message}}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                
                                                <div class="col-sm-12 col-xl-12 m-b-30 ">
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="">
                                                            <div class="d-grid">
                                                                <button class="btn btn-success">
                                                                    <i class="icofont icofont-check-circled"></i>
                                                                    Actualizar Contrasena</button>
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
                            <!-- end of row -->
                        </div>
                        <!-- end of general info -->
                    </div>
                    <!-- end of col-lg-12 -->
                </div>
                <!-- end of row -->
            </div>


        </div>
    </div>
</div>
@endsection
