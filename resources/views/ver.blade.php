@extends('layout/plantilla')

@section('content')

    <link rel="stylesheet" href="{{ asset('css/eventoaDetalle.css') }}">
    <div class="container">
    @if ($evento->imagenes->where('IMAGEN_TIPO', 'banner')->isNotEmpty())
        <div class="baner">
            @foreach ($evento->imagenes->where('IMAGEN_TIPO', 'banner') as $imagen)
                <img src="{{ asset('storage/' . $imagen->IMAGEN_IMAGEN) }}" alt="{{ $imagen->IMAGEN_TIPO }}"
                    style="width: 100%;
                height: 50%;
                object-fit: cover;">
            @endforeach
        </div>
        @endif

        <div class="row">
            <div class="col-8">
                <div class="row">
                    <div class="col-8 d-flex align-items-center justify-content-center">
                        <div class="texto-titulo ">
                            <strong>
                                <h1>{{ $evento->EVENTO_NOMBRE }}</h1>
                            </strong>
                        </div>
                    </div>
                    @if ($evento->imagenes->where('IMAGEN_TIPO', 'icono')->isNotEmpty())
                    <div class="col-4  d-flex align-items-center justify-content-center">
                        
                        @foreach ($evento->imagenes->where('IMAGEN_TIPO', 'icono') as $imagen)
                            <img src="{{ asset('storage/' . $imagen->IMAGEN_IMAGEN) }}" alt="{{ $imagen->IMAGEN_TIPO }}"
                               class="imagen-redonda ">
                        @endforeach

                    </div>
                    @endif

                </div>

                @if ($evento->EVENTO_TIPO !== null)
                    <div class="descripcion">
                        <p><span class="descripcion-bold">Tipo de evento:  </span> {{ $evento->EVENTO_TIPO }}</p>
                    </div>
                @endif

                @if ($evento->EVENTO_DESCRIPCION !== null)
                    <div class="descripcion ">
                        <p><span class="descripcion-bold">Descripcion: </span> {{ $evento->EVENTO_DESCRIPCION }}</p>
                    </div>
                @endif

                @if ($evento->EVENTO_BASES !== null)
                    <div class="descripcion ">
                        <p><span class="descripcion-bold">Bases del evento: </span> {{ $evento->EVENTO_BASES }}</p>
                    </div>
                @endif

                <div class="descripcion">
                    <p><span class="descripcion-bold">Modalidad: </span> {{ $evento->EVENTO_MODALIDAD }}</p>
                </div>


                <div class="row">
                    <div class="col  ">
                        @if ($evento->fechas->isNotEmpty())
                            <div class="titulocrono ">
                                <h4> Cronograma</h4>

                                @foreach ($evento->fechas as $fecha)
                                    <p> <span class="descripcion-bold"> {{ $fecha->FECHA_NOMBRE }} :</span>
                                        {{ $fecha->FECHA_FECHA }} {{ $fecha->FECHA_DESCRIPCION }} </p>
                                @endforeach
                            </div>
                        @endif
                        @if ($contactos->isNotEmpty())
                            <div class="titulocrono">
                                <h4>Contactos</h4>
                                @foreach ($contactos as $contacto)
                                    <p> <span class="descripcion-bold"> {{ $contacto->CONTACTO_NOMBRE }} </span>
                                        <span class="descripcion-bold"> cel :</span> {{ $contacto->CONTACTO_NUMERO }}
                                        <span class="descripcion-bold"> gmal :</span> {{ $contacto->CONTACTO_EMAIL }}
                                    </p>
                                @endforeach
                            </div>
                        @endif
                    </div>


                    <div class="col">
                        @if ($requisitos->isNotEmpty())
                            <div class="titulocrono">
                                <h4>Requisios</h4>
                                @foreach ($requisitos as $requisito)
                                    <p> <strong> * </strong> {{ $requisito->REQUISITO_NOMBRE }} </p>
                                @endforeach
                            </div>
                        @endif


                    </div>
                </div>
            </div>

            <div class="col-4 ">
               
                    <div class="descripcion">

                        <p><span class="descripcion-bold">Organizadores:</span> </p>
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
            

                @if ($evento->imagenes->where('IMAGEN_TIPO', 'afiche')->isNotEmpty())
                <div class="descripcion">

                    <p><span class="descripcion-bold">Afiche:</span> </p>

                    @foreach ($evento->imagenes->where('IMAGEN_TIPO', 'afiche') as $imagen)
                        <img src="{{ asset('storage/' . $imagen->IMAGEN_IMAGEN) }}" alt="{{ $imagen->IMAGEN_TIPO }}"
                        style="width: 100%;
                        height: 50%;
                        object-fit: cover;"     onclick="expandirImagen(this);"> >
                    @endforeach

                </div>
                @endif

                <div id="imagenAmpliada" class="imagen-ampliada" style="display: none;">
                    <img id="imagenAmpliadaContenido" src="" onclick="contraerImagen()" alt="Afiche ampliado">
                </div>


                @if ($evento->EVENTO_UBICACION !== null)
                    <div class="descripcion">
                        <p><span class="descripcion-bold">Ubicaion:</span> {{ $evento->EVENTO_UBICACION }}</p>
                    </div>
                @endif

                @if ($evento->EVENTO_COSTO != 0)
                    <div class="descripcion">
                        <p><span class="descripcion-bold">Costo:</span> {{ $evento->EVENTO_COSTO }}</p>
                    </div>
                @endif



                <div class ="botones">
                    <button class="button-27" role="button"
                        href="{{ route('ver.evento', ['evento' => $evento->EVENTO_ID]) }}"> <span
                            class="text">REGISTRARSE </span>
                    </button>
                    <a class="button-27 btn btn-danger" href="{{ route('misEventos') }}"><span
                            class="text">ATRAS</span></a>

                </div>
            </div>
            
            <br>
            <div>
                @foreach ($evento->imagenes->where('IMAGEN_TIPO', 'imagen') as $imagen)
                    <img src="{{ asset('storage/' . $imagen->IMAGEN_IMAGEN) }}" alt="{{ $imagen->IMAGEN_TIPO }}"style="width: 100%;
                            height: 50%;
                            object-fit: cover;">
                @endforeach
            </div>

        </div>
    </div>

@endsection





<script>
    function expandirImagen(imagen) {
        var imagenAmpliada = document.getElementById("imagenAmpliadaContenido");

        imagenAmpliada.src = imagen.src;
        document.getElementById("imagenAmpliada").style.display = "block";
    }

    function contraerImagen() {
        document.getElementById("imagenAmpliada").style.display = "none";
    }
</script>
