@extends('layouts.app')

@section('articulos')
    @isset($articulosCarrito)
        {{sizeof($articulosCarrito)}}
    @endisset
@endsection

@section('listaArticulos')
<ul class="show-notification notification-view dropdown-menu"
    data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
    <li>
        <h6>Articulos en el carrito</h6>
        <label class="form-label label label-danger">New</label>
    </li>
    <li>
        <div class="d-flex">
            <div class="flex-shrink-0">
            <img class="d-flex align-self-center img-radius"
                src="/mroTest/public/img/epp/gafas.jpg"
                alt="Generic placeholder image">
            </div>
            <div class="flex-grow-1">
                <h5 class="notification-user">NP66SELENTESCLAROS</h5>
                <p class="notification-msg">LENTES DE SEGURIDAD CLAROS</p>
                <span class="notification-time">5 piezas</span>
            </div>
        </div>
    </li>
    <li>
        <form action="" method="post">
            @csrf
            <div class="row">
                <input type="submit" value="Terminar solicitud" class="btn btn-success">
            </div>
        </form>
    </li>
</ul>
@endsection

@section('title')
Crear solicitud
@endsection

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
                    @if(session('status'))
                    <div class="alert alert-dismissible alert-success background-success">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>Correcto!! </strong> {{ session('status')}}
                    </div>
                @endif
                </div>
                <form action=" {{ route('solicitud') }}" method="post">
                    @csrf
                    <div class="card-block">
                        <div class="row">
                            <div class="col-sm-12 col-xl-6 m-b-30">
                                <h4 class="sub-title">Usuario</h4>
                                <select name="usuario" class="js-example-basic-single col-sm-12 js-example-disabled" required>
                                    <option value="{{ Auth::user()->username }}" selected>{{ Auth::user()->username }}</option>
                                </select>
                            </div>
                            <div class="col-sm-12 col-xl-6 m-b-30">
                                <h4 class="sub-title">Numero de SAP</h4>
                                <select name="sap" class="js-example-basic-single col-sm-12 js-example-disabled" required>
                                    <option value="70030647" selected>70030647</option>
                                </select>
                            </div>
                            <div class="col-sm-12 col-xl-6 m-b-30">
                                <h4 class="sub-title">Departamento</h4>
                                <select name="departamento" class="js-example-basic-single col-sm-12" required>
                                    <option value="">...</option>
                                    @forelse ($departamentos as $item)
                                    <option value="{{$item->departamento}}">{{$item->departamento}}</option>    
                                    @empty

                                    @endforelse
                                </select>
                            </div>
                            <div class="col-sm-12 col-xl-6 m-b-30">
                                <h4 class="sub-title">Categoria</h4>
                                <select name="tipo" id="tipo" class="js-example-basic-single col-sm-12" required onchange="activarEPP();">
                                    <option value="">...</option>
                                    <option value="Consumibles">Consumibles</option>
                                    <option value="EPP">EPP</option>
                                    <option value="Refacciones">Refacciones</option>
                                </select>
                            </div>

                            <div id='motivoEPP' class="col-sm-12 col-xl-6 m-b-30 d-none">
                                <h4 class="sub-title">Motivo EPP</h4>
                                <select name="detalles" class="js-example-basic-single col-sm-12" >
                                    <option value="">...</option>
                                    <option value="Equipo a cambio">Equipo a cambio</option>
                                    <option value="Nuevo ingreso">Nuevo ingreso</option>
                                    <option value="Reposicion equipo">Reposicion equipo</option>
                                    <option value="Visita corporativa">Visita corporativa</option>
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
                                                Crear solicitud</button>
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
<script type="text/javascript" >
    function activarEPP(){
        var tipo = document.getElementById('tipo').value;
        var selector = document.getElementById('motivoEPP');
        console.log(tipo);
        if(tipo=='EPP')
        {
            selector.classList.remove('d-none');
        }
        else
        {
            selector.classList.add('d-none');
        }
    }
</script>
@endsection
