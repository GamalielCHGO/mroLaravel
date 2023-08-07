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
                <h1>Entregas pendientes</h1>
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
                                    <form action="{{ route('entregaPendienteDetalles' )}}" method="get">
                                        @csrf
                                        <button type="submit" value=""
                                        class="btn btn-warning btn-outline-warning waves-effect md-trigger"
                                        data-bs-toggle="modal" data-bs-target="#Modal-overflow1"><i class="icofont icofont-eye-blocked fs-5"></i></button>
                                    </form>
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
                                    <form action="{{ route('entregaPendienteDetalles' )}}" method="get">
                                        @csrf
                                        <button type="submit" value=""
                                        class="btn btn-warning btn-outline-warning waves-effect md-trigger"
                                        data-bs-toggle="modal" data-bs-target="#Modal-overflow1"><i class="icofont icofont-eye-blocked fs-5"></i></button>
                                    </form>
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
                                    <form action="{{ route('entregaPendienteDetalles' )}}" method="get">
                                        @csrf
                                        <button type="submit" value=""
                                        class="btn btn-warning btn-outline-warning waves-effect md-trigger"
                                        data-bs-toggle="modal" data-bs-target="#Modal-overflow1"><i class="icofont icofont-eye-blocked fs-5"></i></button>
                                    </form>
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
