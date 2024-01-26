@extends('layouts.app')

@section('title')
Crear articulo
@endsection

@section('content')
<!-- Page-header start -->
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Nuevo articulo</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page-header end -->

<!-- Page body start -->
<div class="page-body">
    <div class="container">
        <div class="">
            <div class="row">
                <form action=" {{ route('crearArticulo.store') }}" method="post" class="bg-white shadow rounded py-3 px-4" enctype="multipart/form-data">
                    <div class="row">
                        @csrf
                        <h1 class="display-4">Nuevo Articulo</h1>
                        <hr>
                        <div class="form-group col-6">
                            <label for="numero_parte">Numero de parte</label>
                            <input type="text" name="numero_parte" placeholder="Numero de parte (SAP)" value="{{old('numero_parte')}}" required
                            class="form-control form-txt-primary bg-light shadow-sm @error('numero_parte') is-invalid @else border-0  @enderror">
                            @error('numero_parte')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="numero_parte_old">Numero de parte antiguo</label>
                            <input type="text" name="numero_parte_old" placeholder="Numero de parte (SAP Old)" value="{{old('numero_parte_old')}}" required
                            class="form-control form-txt-primary bg-light shadow-sm @error('numero_parte_old') is-invalid @else border-0  @enderror">
                            @error('numero_parte_old')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="tipo">Tipo articulo</label>
                            <select type="tipo" name="tipo" value="{{old('tipo')}}" required
                            class="form-control form-txt-primary bg-light shadow-sm @error('tipo') is-invalid @else border-0  @enderror">
                            @error('tipo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                            <option value="">...</option>
                                <option value="EPP">EPP</option>
                                <option value="Consumibles">Consumibles</option>
                            </select>
                        </div>

                        <div class="form-group col-6">
                            <label for="descripcion">Descripcion</label>
                            <input type="text" name="descripcion" id="" class="form-control form-txt-primary  bg-light shadow-sm @error('descripcion') is-invalid @else border-0  @enderror"
                            placeholder="Descripcion...."  required
                            value="{{old('descripcion')}}"  
                            id="descripcion">
                            @error('descripcion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        

                        <div class="form-group col-6">
                            <label for="ubicacion">Ubicacion</label>
                            <input type="text" name="ubicacion" placeholder="Ubicacion en MRO" value="{{old('ubicacion')}}" required
                            class="form-control form-txt-primary bg-light shadow-sm @error('ubicacion') is-invalid @else border-0  @enderror">
                            @error('ubicacion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="precio">Precio(USD)</label>
                            <input type="number" name="precio" placeholder="Precio" value="{{old('precio')}}" required step="0.01"
                            class="form-control form-txt-primary bg-light shadow-sm @error('precio') is-invalid @else border-0  @enderror">
                            @error('precio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="categoria">Categoria</label>
                            <input type="text" name="categoria" placeholder="Categoria de articulo" value="{{old('categoria')}}" required
                            class="form-control form-txt-primary bg-light shadow-sm @error('categoria') is-invalid @else border-0  @enderror">
                            @error('categoria')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="precio" class="bg-danger px-2">Critico?</label>
                            <select type="text" name="critico" placeholder="Material Critico" value="{{old('critico')}}" required
                            class="form-control form-txt-primary bg-light shadow-sm @error('critico') is-invalid @else border-0  @enderror">
                                <option value="">Debes seleccionar su criticidad</option>
                                <option value="Y">Si</option>
                                <option value="N">No</option>
                            </select>
                            @error('critico')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="categoria">Obsoleto</label>
                            <select type="text" name="obsoleto" placeholder="Material Obsoleto" value="{{old('obsoleto')}}" required
                            class="form-control form-txt-primary bg-light shadow-sm @error('obsoleto') is-invalid @else border-0  @enderror">
                                <option value="">El articulo es obsoleto?</option>
                                <option value="Y">Si</option>
                                <option value="N">No</option>
                            </select>
                            @error('obsoleto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="inventario">Inventario</label>
                            <input type="number" name="inventario" placeholder="Inventario" value="{{old('inventario')}}" required
                            class="form-control form-txt-primary bg-light shadow-sm @error('inventario') is-invalid @else border-0  @enderror">
                            @error('inventario')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="imagen">Imagen del articulo</label>
                            <input type="file" name="imagen" placeholder="Imagen" value="{{old('imagen')}}" required
                            class="form-control form-txt-primary bg-light shadow-sm @error('imagen') is-invalid @else border-0  @enderror">
                            @error('imagen')
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
                                            Generar articulo</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Select2 end -->
            
        </div>
    </div>
</div>
<!-- Page body end -->
@endsection

