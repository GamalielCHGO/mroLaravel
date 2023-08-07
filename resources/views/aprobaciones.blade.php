@extends('layouts.app')

@section('title')
    Titulo modificado
@endsection

@section('content')
<div class="inicioMargin hola">
    <div class="row justify-content-center">
        <!-- bug list card start -->
        <div class="card">
            <div class="card-header">
                <h1>Aprobaciones pendientes</h1>
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
                                <th>Fecha</th>
                                <th>Usuario</th>
                                <th>SAP</th>
                                <th>Estacion</th>
                                <th>Revisar</th>
                                <th>Aprobar</th>
                                <th>Rechazar</th>
                            </tr>
                        </thead>
                        <tbody class="text-start">
                            <tr>
                                <td class="pro-list-img">
                                    12345
                                </td>
                                <td class="pro-name">
                                    10-08-2023
                                </td>
                                <td>RFM7201</td>
                                <td>700xxxxx</td>
                                <td>Dobladora 1</td>
                                <td>
                                    <button type="button"
                                    class="btn btn-warning btn-outline-warning waves-effect md-trigger"
                                    data-bs-toggle="modal" data-bs-target="#Modal-overflow1"><i class="icofont icofont-eye-blocked fs-5"></i></button>
                                </td>
                                <td>
                                    <button type="button"
                                    class="btn btn-success alert-success-msg m-b-10"
                                    onclick="#"><i class="icofont icofont-tick-mark fs-5"></i></button>
                                </td>
                                <td>
                                    <button type="button"
                                    class="btn btn-danger alert-danger-msg m-b-10"
                                    onclick="#"><i class="icofont icofont-close fs-5"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="pro-list-img">
                                    12345
                                </td>
                                <td class="pro-name">
                                    10-08-2023
                                </td>
                                <td>ABRAGARC</td>
                                <td>700xxxxx</td>
                                <td>Dobladora 2</td>
                                <td>
                                    <button type="button"
                                    class="btn btn-warning btn-outline-warning waves-effect md-trigger"
                                    data-bs-toggle="modal" data-bs-target="#Modal-overflow2"><i class="icofont icofont-eye-blocked fs-5"></i></button>
                                </td>
                                <td>
                                    <button type="button"
                                    class="btn btn-success alert-success-msg m-b-10"
                                    onclick="#"><i class="icofont icofont-tick-mark fs-5"></i></button>
                                </td>
                                <td>
                                    <button type="button"
                                    class="btn btn-danger alert-danger-msg m-b-10"
                                    onclick="#"><i class="icofont icofont-close fs-5"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="pro-list-img">
                                    12345
                                </td>
                                <td class="pro-name">
                                    10-08-2023
                                </td>
                                <td>HUGONIEV</td>
                                <td>700xxxxx</td>
                                <td>Dobladora 3</td>
                                <td>
                                    <button type="button"
                                    class="btn btn-warning btn-outline-warning waves-effect md-trigger"
                                    data-bs-toggle="modal" data-bs-target="#Modal-overflow3"><i class="icofont icofont-eye-blocked fs-5"></i></button>
                                </td>
                                <td>
                                    <button type="button"
                                    class="btn btn-success alert-success-msg m-b-10"
                                    onclick="#"><i class="icofont icofont-tick-mark fs-5"></i></button>
                                </td>
                                <td>
                                    <button type="button"
                                    class="btn btn-danger alert-danger-msg m-b-10"
                                    onclick="#"><i class="icofont icofont-close fs-5"></i></button>
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

<!-- Modal -->
<div class="modal fade modal-flex" id="Modal-overflow1"
tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body model-container">
                <button type="button" class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close">
                    <span
                        aria-hidden="true"></span>
                </button>
                <div class="card">
                    <div class="card-header">
                        <h5>Product List</h5>
                    </div>
                    <div class="card-block">
                        <div class="table-responsive">
                            <div class="table-content">
                                <div class="project-table">
                                    <table id="e-product-list"
                                        class="table table-striped dt-responsive nowrap" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Producto</th>
                                                <th>Nombre</th>
                                                <th>Cantidad</th>
                                                <th>Borrar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="pro-list-img">
                                                    <img src="public/img/epp/casco.jpg"
                                                        class="img-fluid" alt="tbl">
                                                </td>
                                                <td class="pro-name">
                                                    <h6>Casco de seguridad</h6>
                                                </td>
                                                <td>4</td>
                                                <td class="action-icon">
                                                    <a href="#!" class="text-muted"
                                                        data-bs-toggle="tooltip"
                                                        data-placement="top" title=""
                                                        data-original-title="Delete"><i
                                                            class="icofont icofont-delete-alt"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="pro-list-img">
                                                    <img src="public/img/epp/gafas.jpg"
                                                        class="img-fluid" alt="tbl">
                                                </td>
                                                <td class="pro-name">
                                                    <h6>lentes de seguridad</h6>
                                                </td>
                                                <td>4</td>
                                                <td class="action-icon">
                                                    <a href="#!" class="text-muted"
                                                        data-bs-toggle="tooltip"
                                                        data-placement="top" title=""
                                                        data-original-title="Delete"><i
                                                            class="icofont icofont-delete-alt"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="pro-list-img">
                                                    <img src="public/img/epp/guantes1.jpg"
                                                        class="img-fluid" alt="tbl">
                                                </td>
                                                <td class="pro-name">
                                                    <h6>Guantes de seguridad</h6>
                                                </td>
                                                <td>4</td>
                                                <td class="action-icon">
                                                    <a href="#!" class="text-muted"
                                                        data-bs-toggle="tooltip"
                                                        data-placement="top" title=""
                                                        data-original-title="Delete"><i
                                                            class="icofont icofont-delete-alt"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="pro-list-img">
                                                    <img src="public/img/epp/guantes2.jpg"
                                                        class="img-fluid" alt="tbl">
                                                </td>
                                                <td class="pro-name">
                                                    <h6>Guantes de seguridad</h6>
                                                </td>
                                                <td>4</td>
                                                <td class="action-icon">
                                                    <a href="#!" class="text-muted"
                                                        data-bs-toggle="tooltip"
                                                        data-placement="top" title=""
                                                        data-original-title="Delete"><i
                                                            class="icofont icofont-delete-alt"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product list card end -->
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade modal-flex" id="Modal-overflow2"
tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body model-container">
                <button type="button" class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close">
                    <span
                        aria-hidden="true"></span>
                </button>
                <div class="card">
                    <div class="card-header">
                        <h5>Product List</h5>
                    </div>
                    <div class="card-block">
                        <div class="table-responsive">
                            <div class="table-content">
                                <div class="project-table">
                                    <table id="e-product-list"
                                        class="table table-striped dt-responsive nowrap" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Producto</th>
                                                <th>Nombre</th>
                                                <th>Cantidad</th>
                                                <th>Borrar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="pro-list-img">
                                                    <img src="public/img/epp/casco.jpg"
                                                        class="img-fluid" alt="tbl">
                                                </td>
                                                <td class="pro-name">
                                                    <h6>Casco de seguridad</h6>
                                                </td>
                                                <td>4</td>
                                                <td class="action-icon">
                                                    <a href="#!" class="text-muted"
                                                        data-bs-toggle="tooltip"
                                                        data-placement="top" title=""
                                                        data-original-title="Delete"><i
                                                            class="icofont icofont-delete-alt"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="pro-list-img">
                                                    <img src="public/img/epp/gafas.jpg"
                                                        class="img-fluid" alt="tbl">
                                                </td>
                                                <td class="pro-name">
                                                    <h6>lentes de seguridad</h6>
                                                </td>
                                                <td>4</td>
                                                <td class="action-icon">
                                                    <a href="#!" class="text-muted"
                                                        data-bs-toggle="tooltip"
                                                        data-placement="top" title=""
                                                        data-original-title="Delete"><i
                                                            class="icofont icofont-delete-alt"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="pro-list-img">
                                                    <img src="public/img/epp/guantes1.jpg"
                                                        class="img-fluid" alt="tbl">
                                                </td>
                                                <td class="pro-name">
                                                    <h6>Guantes de seguridad</h6>
                                                </td>
                                                <td>4</td>
                                                <td class="action-icon">
                                                    <a href="#!" class="text-muted"
                                                        data-bs-toggle="tooltip"
                                                        data-placement="top" title=""
                                                        data-original-title="Delete"><i
                                                            class="icofont icofont-delete-alt"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="pro-list-img">
                                                    <img src="public/img/epp/guantes2.jpg"
                                                        class="img-fluid" alt="tbl">
                                                </td>
                                                <td class="pro-name">
                                                    <h6>Guantes de seguridad</h6>
                                                </td>
                                                <td>4</td>
                                                <td class="action-icon">
                                                    <a href="#!" class="text-muted"
                                                        data-bs-toggle="tooltip"
                                                        data-placement="top" title=""
                                                        data-original-title="Delete"><i
                                                            class="icofont icofont-delete-alt"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product list card end -->
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade modal-flex" id="Modal-overflow3"
tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body model-container">
                <button type="button" class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close">
                    <span
                        aria-hidden="true"></span>
                </button>
                <div class="card">
                    <div class="card-header">
                        <h5>Product List</h5>
                    </div>
                    <div class="card-block">
                        <div class="table-responsive">
                            <div class="table-content">
                                <div class="project-table">
                                    <table id="e-product-list"
                                        class="table table-striped dt-responsive nowrap" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Producto</th>
                                                <th>Nombre</th>
                                                <th>Cantidad</th>
                                                <th>Borrar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="pro-list-img">
                                                    <img src="public/img/epp/casco.jpg"
                                                        class="img-fluid" alt="tbl">
                                                </td>
                                                <td class="pro-name">
                                                    <h6>Casco de seguridad</h6>
                                                </td>
                                                <td>4</td>
                                                <td class="action-icon">
                                                    <a href="#!" class="text-muted"
                                                        data-bs-toggle="tooltip"
                                                        data-placement="top" title=""
                                                        data-original-title="Delete"><i
                                                            class="icofont icofont-delete-alt"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="pro-list-img">
                                                    <img src="public/img/epp/gafas.jpg"
                                                        class="img-fluid" alt="tbl">
                                                </td>
                                                <td class="pro-name">
                                                    <h6>lentes de seguridad</h6>
                                                </td>
                                                <td>4</td>
                                                <td class="action-icon">
                                                    <a href="#!" class="text-muted"
                                                        data-bs-toggle="tooltip"
                                                        data-placement="top" title=""
                                                        data-original-title="Delete"><i
                                                            class="icofont icofont-delete-alt"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="pro-list-img">
                                                    <img src="public/img/epp/guantes1.jpg"
                                                        class="img-fluid" alt="tbl">
                                                </td>
                                                <td class="pro-name">
                                                    <h6>Guantes de seguridad</h6>
                                                </td>
                                                <td>4</td>
                                                <td class="action-icon">
                                                    <a href="#!" class="text-muted"
                                                        data-bs-toggle="tooltip"
                                                        data-placement="top" title=""
                                                        data-original-title="Delete"><i
                                                            class="icofont icofont-delete-alt"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="pro-list-img">
                                                    <img src="public/img/epp/guantes2.jpg"
                                                        class="img-fluid" alt="tbl">
                                                </td>
                                                <td class="pro-name">
                                                    <h6>Guantes de seguridad</h6>
                                                </td>
                                                <td>4</td>
                                                <td class="action-icon">
                                                    <a href="#!" class="text-muted"
                                                        data-bs-toggle="tooltip"
                                                        data-placement="top" title=""
                                                        data-original-title="Delete"><i
                                                            class="icofont icofont-delete-alt"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product list card end -->
            </div>
        </div>
    </div>
</div>
@endsection
