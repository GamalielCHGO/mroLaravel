@extends('layouts.app')

@section('title')
Lista solicitudes
@endsection

@section('content')
<div class="inicioMargin hola">
    <div class="row justify-content-center">
        <!-- bug list card start -->
        <div class="card">
            <div class="card-header">
                <h1>Lista de solicitudes</h1>
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
                                <th>CC</th>
                                <th>Estacion</th>
                                <th>Estado</th>
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
                                <td>106600123</td>
                                <td>Dobladora 1</td>
                                <td>
                                    <label class="form-label text-danger"><i class="icofont icofont-eye-blocked fs-5"></i>Pendiente de aprobacion</label>
                                </td>
                            </tr>

                            <tr>
                                <td class="pro-list-img">
                                    12345
                                </td>
                                <td class="pro-name">
                                    10-08-2023
                                </td>
                                <td>106600123</td>
                                <td>Dobladora 1</td>
                                <td>
                                    <label class="form-label text-success"><i class="icofont icofont-ui-check fs-5"></i>Aprobada pendiente entrega</label>
                                </td>
                            </tr>

                            <tr>
                                <td class="pro-list-img">
                                    12345
                                </td>
                                <td class="pro-name">
                                    10-08-2023
                                </td>
                                <td>106600123</td>
                                <td>Dobladora 1</td>
                                <td>
                                    <label class="form-label text-info"><i class="icofont icofont-ui-cart fs-5"></i>Abierta</label>
                                </td>
                            </tr>

                            <tr>
                                <td class="pro-list-img">
                                    12345
                                </td>
                                <td class="pro-name">
                                    10-08-2023
                                </td>
                                <td>106600123</td>
                                <td>Dobladora 1</td>
                                <td>
                                    <label class="form-label text-warning"><i class="icofont icofont-racing-flag fs-5"></i>Entregada</label>
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
