@extends('layouts.app')

@section('content')
<!-- Page-header start -->
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Nueva solicitud</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page-header end -->

<!-- Page body start -->
<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <!-- Select2 start -->
            <div class="card">
                <div class="card-header">
                    <h5>Llena la siguiente informacion de tu vale</h5>
                </div>
                <form action=" {{ route('solicitud') }}" method="get">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-sm-12 col-xl-6 m-b-30">
                                <h4 class="sub-title">Usuario</h4>
                                <select class="js-example-basic-single col-sm-12 js-example-disabled" required>
                                    <option value="{{ Auth::user()->username }}" selected>{{ Auth::user()->username }}</option>
                                </select>
                            </div>
                            <div class="col-sm-12 col-xl-6 m-b-30">
                                <h4 class="sub-title">Numero de SAP</h4>
                                <select class="js-example-basic-single col-sm-12 js-example-disabled" required>
                                    <option value="70030647" selected>70030647</option>
                                </select>
                            </div>
                            <div class="col-sm-12 col-xl-6 m-b-30">
                                <h4 class="sub-title">Departamento</h4>
                                <select class="js-example-basic-single col-sm-12 js-example-disabled" required>
                                    <option value="Produccion" selected>Produccion</option>
                                </select>
                            </div>
                            <div class="col-sm-12 col-xl-6 m-b-30">
                                <h4 class="sub-title">Categoria</h4>
                                <select class="js-example-basic-single col-sm-12" required>
                                    <option value="Consumibles">Consumibles</option>
                                    <option value="EPP">EPP</option>
                                    <option value="Refacciones">Refacciones</option>
                                </select>
                            </div>
                            <div class="col-sm-12 col-xl-6 m-b-30">
                                <h4 class="sub-title">Centro de costos</h4>
                                <select class="js-example-basic-single col-sm-12" required>
                                    <option value="106600123">106600123</option>
                                    <option value="106600124">106600124</option>
                                    <option value="106600125">106600125</option>
                                </select>
                            </div>
                            <div class="col-sm-12 col-xl-6 m-b-30">
                                <h4 class="sub-title">Estacion</h4>
                                <select class="js-example-basic-single col-sm-12" required>
                                    <option value="Dobladora 1">Dobladora 1</option>
                                    <option value="Robot 1">Robot 1</option>
                                    <option value="Canning">Canning</option>
                                </select>
                            </div>
                            <br>
                            <hr>

                            <div class="col-sm-12 col-xl-12 m-b-30 ">
                                <div class="col-lg-12 col-md-12">
                                    <div class="">
                                        <div class="d-grid">
                                            <button class="btn btn-success">
                                                <i class="icofont icofont-check-circled"></i>
                                                Enviar formulario</button>
                                        </div>
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
