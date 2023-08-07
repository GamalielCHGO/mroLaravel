@extends('layouts.app')

@section('content')
<div class="inicioMargin hola">
    <div class="row justify-content-center">
        <!-- bug list card start -->
        <div class="card">
            <div class="card-header">
                <h1>Solicitud 12345</h1>
                <h4>Buscar articulos</h4>
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
                                <th>Imagen</th>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Cantidad disponible</th>
                                <th>Carrito</th>
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
                                    <label class="form-label text-danger">10</label>
                                </td>
                                <td class="action-icon">
                                    <div class="input-group">
                                        <div class="input-group-text">
                                            <span class="" id="name">
                                                <i class="icofont icofont-ui-calculator"></i>
                                            </span>
                                        </div>
                                        <input type="number" class="form-control" placeholder="Cantidad" title="Cantidad" data-bs-toggle="tooltip" value="1">
                                        <a href="#!"
                                        class="m-r-15 text-muted"
                                        data-bs-toggle="tooltip"
                                        data-placement="top" title="Agregar al carrito"
                                        data-original-title="Edit"><i class="icofont icofont-ui-cart fs-5"></i></a>
                                    </div>
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
                                    <label class="form-label text-success">100</label>
                                </td>
                                <td class="action-icon">
                                    <div class="input-group">
                                        <div class="input-group-text">
                                            <span class="" id="name">
                                                <i class="icofont icofont-ui-calculator"></i>
                                            </span>
                                        </div>
                                        <input type="number" class="form-control" placeholder="Cantidad" title="Cantidad" data-bs-toggle="tooltip" value="1">
                                        <a href="#!"
                                        class="m-r-15 text-muted"
                                        data-bs-toggle="tooltip"
                                        data-placement="top" title="Agregar al carrito"
                                        data-original-title="Edit"><i class="icofont icofont-ui-cart fs-5"></i></a>
                                    </div>
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
                                    <label class="form-label text-success">100</label>
                                </td>
                                <td class="action-icon">
                                    <div class="input-group">
                                        <div class="input-group-text">
                                            <span class="" id="name">
                                                <i class="icofont icofont-ui-calculator"></i>
                                            </span>
                                        </div>
                                        <input type="number" class="form-control" placeholder="Cantidad" title="Cantidad" data-bs-toggle="tooltip" value="1">
                                        <a href="#!"
                                        class="m-r-15 text-muted"
                                        data-bs-toggle="tooltip"
                                        data-placement="top" title="Agregar al carrito"
                                        data-original-title="Edit"><i class="icofont icofont-ui-cart fs-5"></i></a>
                                    </div>
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
                                    <label class="form-label text-success">100</label>
                                </td>
                                <td class="action-icon">
                                    <div class="input-group">
                                        <div class="input-group-text">
                                            <span class="" id="name">
                                                <i class="icofont icofont-ui-calculator"></i>
                                            </span>
                                        </div>
                                        <input type="number" class="form-control" placeholder="Cantidad" title="Cantidad" data-bs-toggle="tooltip" value="1">
                                        <a href="#!"
                                        class="m-r-15 text-muted"
                                        data-bs-toggle="tooltip"
                                        data-placement="top" title="Agregar al carrito"
                                        data-original-title="Edit"><i class="icofont icofont-ui-cart fs-5"></i></a>
                                    </div>
                                </td>
                            </tr>
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
