@extends('layouts.app')

@section('content')
<div class="inicioMargin hola">
    <div class="row justify-content-center">
        <div>
            <p class="text-center fw-bold display-2 text-primary">Bienvenid@ al sistema Vales electrónicos</p>
        </div>
        
        <!-- bug list card start -->
        <div class="card">
            <div class="card-header">
                <h5>Historico de solicitudes</h5>
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
                                <th>#ID</th>
                                <th>Usuario</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody class="text-start">
                            <tr>
                                <td>1234</td>
                                <td>RFM7201</td>
                                <td>1/01/2023</td>
                                <td><span
                                    class="label label-primary">Abierto</span>
                                </td>
                            </tr>
                            <tr>
                                <td>1234</td>
                                <td>RFM7201</td>
                                <td>1/01/2023</td>
                                <td><span
                                    class="label label-danger">Cerrado</span>
                                </td>
                            </tr>
                            <tr>
                                <td>1234</td>
                                <td>RFM7201</td>
                                <td>1/01/2023</td>
                                <td><span
                                    class="label label-info">Pendiente Autor</span>
                                </td>
                            </tr>
                            <tr>
                                <td>1234</td>
                                <td>RFM7201</td>
                                <td>1/01/2023</td>
                                <td><span
                                    class="label label-warning">Pendiente entrega</span>
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
