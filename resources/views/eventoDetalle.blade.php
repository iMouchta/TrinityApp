@extends('layout/plantilla')


@section('misEventos')
    <link rel="stylesheet" href="{{ asset('css/caja.css') }}">


    @foreach ($eventos as $evento)
        <div class="container">
            <div class="baner">
                <img src="{{ asset('as.jpg') }}" class=" baner-imagen">
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="row">
                        <div class="col-8 d-flex align-items-center justify-content-center">

                            <div class="texto-titulo ">
                                <h2 class="til">{{ $evento->EVENTO_NOMBRE }}</h2>
                            </div>
                        </div>
                        <div class="col-4  d-flex align-items-center justify-content-center">
                            <img src="{{ asset('as.jpg') }}" class=" imagen-redonda">
                        </div>
                    </div>
                    <div class="descripcion">
                        <p> <strong>TIPO DE EVENTO:</strong> {{ $evento->EVENTO_TIPO }}</p>
                    </div>
                    <div class="descripcion ">
                        <p> <strong>DESCRIPCION:</strong> {{ $evento->EVENTO_DESCRIPCION }}</p>
                    </div>
                    <div class="descripcion">
                        <p> <strong>MODALIDAD:</strong> {{ $evento->EVENTO_MODALIDAD }}</p>
                    </div>
                    <div class="row">
                        <div class="col  ">
                            @if ($evento->fechas !== null && count($evento->fechas) > 0)
                                <div class="titulocrono ">
                                    <P class=" titulocro d-flex align-items-center justify-content-center  "> CRONOGRMA</P>

                                    @foreach ($evento->fechas as $fecha)
                                        <p class="crono"> {{ $fecha->FECHA_NOMBRE }} : {{ $fecha->FECHA_FECHA }}</p>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        <div class="col">
                            @if ($evento->requisitos !== null && count($evento->requisitos) > 0)
                                <div class="titulocrono ">
                                    <P class=" titulocro d-flex align-items-center justify-content-center  "> REQUISITOS</P>

                                    @foreach ($evento->requisitos as $requisito)
                                        <p class="crono"> - {{ $requisito->REQUISITO_NOMBRE }} </p>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-4 ">
                    <div class="descripcion">
                        <p> <strong>auspiciadores:</strong></p>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <img src="{{ asset('as.jpg') }}" class="img-fluid" alt="Auspiciador 1">
                            </div>
                            <div class="col-md-3 mb-3">
                                <img src="{{ asset('as.jpg') }}" class="img-fluid" alt="Auspiciador 1">
                            </div>
                            <div class="col-md-3 mb-3">
                                <img src="{{ asset('as.jpg') }}" class="img-fluid" alt="Auspiciador 1">
                            </div>
                            <div class="col-md-3 mb-3">
                                <img src="{{ asset('as.jpg') }}" class="img-fluid" alt="Auspiciador 1">
                            </div>

                        </div>

                    </div>

                    <div class="descripcion">
                        <p> <strong>afiche:</strong> </p>
                        <img src="{{ asset('as.jpg') }}" class="afiche" onclick="expandirImagen(this)"
                            alt="Afiche pequeño">
                    </div>
                    <div id="imagenAmpliada" class="imagen-ampliada" style="display: none;">
                        <img id="imagenAmpliadaContenido" src="" onclick="contraerImagen()" alt="Afiche ampliado">
                    </div>
                    <div class="descripcion">
                        <p> <strong>UBICACION:</strong> {{ $evento->EVENTO_UBICACION }}</p>
                    </div>
                    <div class="descripcion">
                        <p> <strong>CONSTO DEL EVENTO:</strong> {{ $evento->EVENTO_COSTO }}</p>
                    </div>
                    <button type="button" class="btn btn-custom" onclick="()">REGISTRARSE</button>
                </div>
            </div>
        </div>
    @endforeach
@endsection

<script>
    
    function contraerImagen() {
        document.getElementById("imagenAmpliada").style.display = "none";
    }
</script>
