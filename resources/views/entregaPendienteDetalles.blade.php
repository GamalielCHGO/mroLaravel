@extends('layouts.app')

@section('content')
<div class="inicioMargin hola">
    <div class="row justify-content-center">
        <!-- bug list card start -->
        <div class="card">
            <div class="card-header">
                <h1><strong>Solicitud:</strong> 12345</h1>
                <h4><strong>Usuario:</strong> Rafael flores</h4>
                <h4><strong>CC:</strong> 106600123</h4>
                <h4><strong>Estacion:</strong> Dobladora 1</h4>
                <hr>
                <div class="background-warning container p-1 text-center">
                    <h1 class=""><strong>Atencion!! Confirma la cantidad entregada</strong></h1>
                </div>
            </div>
            <div class="card-block">
                <div class="table-responsive">
                    <table id=""
                        class="table dt-responsive width-100" style="width: 100%;">
                        <thead class="text-start">
                            <tr>
                                <th>Imagen</th>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Cantidad disponible</th>
                                <th>Cantidad solicitada</th>
                                <th>Cantidad entregada</th>
                                <th>Restantes</th>
                                <th>Costo</th>
                            </tr>
                        </thead>
                        <tbody class="text-start">
                            <tr>
                                <td class="pro-list-img">
                                    <img src="public/img/epp/casco.jpg"
                                        class="img-fluid" alt="tbl">
                                </td>
                                <td class="pro-name">
                                    NP66SECASCOPROTEC1/NP66SECASCOPROTEC1
                                </td>
                                <td>Casco de seguridad</td>
                                <td>
                                    <label class="form-label">10</label>
                                </td>
                                <td>
                                    <label class="form-label">1</label>
                                </td>
                                <td class="action-icon">
                                    <div class="input-group">
                                        <div class="input-group-text">
                                            <span class="" id="name">
                                                <i class="icofont icofont-ui-calculator"></i>
                                            </span>
                                        </div>
                                        <input type="number" class="form-control" placeholder="Cantidad" title="Cantidad" data-bs-toggle="tooltip" value="1">
                                    </div>
                                </td>
                                <td>
                                    <label class="form-label">9</label>
                                </td>
                                <td>
                                    <label class="form-label">$ 200 MXN</label>
                                </td>
                            </tr>
                            <tr>
                                <td class="pro-list-img">
                                    <img src="public/img/epp/gafas.jpg"
                                        class="img-fluid" alt="tbl">
                                </td>
                                <td class="pro-name">
                                    NP66SELENTESCLAROS/NP66SELENTESCLAROS
                                </td>
                                <td>LENTES DE SEGURIDAD CLAROS</td>
                                <td>
                                    <label class="form-label">100</label>
                                </td>
                                <td>
                                    <label class="form-label">5</label>
                                </td>
                                <td class="action-icon">
                                    <div class="input-group">
                                        <div class="input-group-text">
                                            <span class="" id="name">
                                                <i class="icofont icofont-ui-calculator"></i>
                                            </span>
                                        </div>
                                        <input type="number" class="form-control" placeholder="Cantidad" title="Cantidad" data-bs-toggle="tooltip" value="5">
                                    </div>
                                </td>
                                <td>
                                    <label class="form-label">95</label>
                                </td>
                                <td>
                                    <label class="form-label">$ 900 MXN</label>
                                </td>
                            </tr>
                            <tr>
                                <td class="pro-list-img">
                                    <img src="public/img/epp/guantes1.jpg"
                                        class="img-fluid" alt="tbl">
                                </td>
                                <td class="pro-name">
                                    NP66GUANTEEDG48706/40023331
                                </td>
                                <td>GUANTE EDGE 48-706</td>
                                <td>
                                    <label class="form-label">100</label>
                                </td>
                                <td>
                                    <label class="form-label">3</label>
                                </td>
                                <td class="action-icon">
                                    <div class="input-group">
                                        <div class="input-group-text">
                                            <span class="" id="name">
                                                <i class="icofont icofont-ui-calculator"></i>
                                            </span>
                                        </div>
                                        <input type="number" class="form-control" placeholder="Cantidad" title="Cantidad" data-bs-toggle="tooltip" value="3">
                                    </div>
                                </td>
                                <td>
                                    <label class="form-label">97</label>
                                </td>
                                <td>
                                    <label class="form-label">$ 900 MXN</label>
                                </td>
                            </tr>
                            <tr>
                                <td class="pro-list-img">
                                    <img src="public/img/epp/guantes2.jpg"
                                        class="img-fluid" alt="tbl">
                                </td>
                                <td class="pro-name">
                                    40023331/40023331
                                </td>
                                <td>GUANTES DE CARNAZA Y LONA PARA DAMA</td>
                                <td>
                                    <label class="form-label">50</label>
                                </td>
                                <td>
                                    <label class="form-label">10</label>
                                </td>
                                <td class="action-icon">
                                    <div class="input-group">
                                        <div class="input-group-text">
                                            <span class="" id="name">
                                                <i class="icofont icofont-ui-calculator"></i>
                                            </span>
                                        </div>
                                        <input type="number" class="form-control" placeholder="Cantidad" title="Cantidad" data-bs-toggle="tooltip" value="10">
                                    </div>
                                </td>
                                <td>
                                    <label class="form-label">40</label>
                                </td>
                                <td>
                                    <label class="form-label">$300 MXN</label>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5"></td>
                                <td colspan="2" class="fs-5">Total:</td>
                                <td class="fs-5">$2300 MXN</td>
                            </tr>
                        </tbody>
                    </table>
                    <form action="#" method="GET">
                        @csrf
                        <div class="container text-center">
                            <button class="btn btn-success fs-5"><i class="icofont icofont-check-circled fs-5"></i>Articulos entregados</button>
                        </div>
                    </form>
                </div>
                <!-- end of table -->
            </div>
        </div>
        <!-- bug list card end -->
        
         
    </div>
</div>
@endsection
