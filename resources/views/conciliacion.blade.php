@extends('layouts.app')

@section('title')
Lista a conciliar
@endsection

@section('content')
<div class="inicioMargin hola">
    <div class="row justify-content-center">
        <!-- bug list card start -->
        <div class="card">
            <div class="card-header">
                <h1>Totales pendientes a conciliar</h1>
                <div class="card-header-right">
                    <i class="icofont icofont-spinner-alt-5"></i>
                </div>
            </div>
            <div class="card-block">
                <div class="table-responsive">
                    <form action="#" method="GET">
                        <table id="issue-list-tabl"
                            class="table dt-responsive width-100" style="width: 100%;">
                            <thead class="text-start">
                                <tr>
                                    <th>Articulo</th>
                                    <th>ID Articulo</th>
                                    <th>CC</th>
                                    <th>Cantidad</th>
                                    <th>Conciliar</th>
                                </tr>
                            </thead>
                            <tbody class="text-start">
                                <tr>
                                    <td class="pro-list-img">
                                        <img src="public/img/epp/guantes1.jpg"
                                            class="img-fluid" alt="tbl">
                                    </td>
                                    <td class="">
                                        NP66GUANTEEDG48706/40023331
                                    </td>
                                    <td>106600123</td>
                                    <td>100</td>
                                    <td class="">
                                        <input type="checkbox" class="js-switch" checked />
                                    </td>
                                </tr>

                                <tr>
                                    <td class="pro-list-img">
                                        <img src="public/img/epp/guantes2.jpg"
                                            class="img-fluid" alt="tbl">
                                    </td>
                                    <td class="">
                                        NP66GUANTEEDG48706/40023331
                                    </td>
                                    <td>106600123</td>
                                    <td>100</td>
                                    <td class="">
                                        <input type="checkbox" class="js-switch" checked />
                                    </td>
                                </tr>

                                <tr>
                                    <td class="pro-list-img">
                                        <img src="public/img/epp/gafas.jpg"
                                            class="img-fluid" alt="tbl">
                                    </td>
                                    <td class="">
                                        NP66GUANTEEDG48706/40023331
                                    </td>
                                    <td>106600123</td>
                                    <td>100</td>
                                    <td class="">
                                        <input type="checkbox" class="js-switch" checked />
                                    </td>
                                </tr>

                                <tr>
                                    <td class="pro-list-img">
                                        <img src="public/img/epp/casco.jpg"
                                            class="img-fluid" alt="tbl">
                                    </td>
                                    <td class="">
                                        NP66GUANTEEDG48706/40023331
                                    </td>
                                    <td>106600123</td>
                                    <td>100</td>
                                    <td class="">
                                        <input type="checkbox" class="js-single" checked />
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>

                        <div class="col-sm-12 col-xl-12 m-b-30 ">
                            <div class="col-lg-12 col-md-12">
                                <div class="">
                                    <div class="d-grid">
                                        <button class="btn btn-success">
                                            <i class="icofont icofont-check-circled"></i>
                                            Conciliar informacion</button>
                                    </div>
                                </div>
                            </div>
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
