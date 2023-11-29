@extends('layout/plantilla')

@section('content')

    <link rel="stylesheet" href="{{ asset('css/eventoaDetalle.css') }}">
    <div class="container">
        <div class="baner">
            @foreach ($evento->imagenes->where('IMAGEN_TIPO', 'banner') as $imagen)
                <img src="{{ asset('storage/' . $imagen->IMAGEN_IMAGEN) }}" alt="{{ $imagen->IMAGEN_TIPO }}"
                    style="width: 100%;
                height: 50%;
                object-fit: cover;">
            @endforeach
        </div>
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
                    <div class="col-4  d-flex align-items-center justify-content-center">
                        @foreach ($evento->imagenes->where('IMAGEN_TIPO', 'icono') as $imagen)
                            <img src="{{ asset('storage/' . $imagen->IMAGEN_IMAGEN) }}" alt="{{ $imagen->IMAGEN_TIPO }}"
                                style="width: 100%;
                            height: 50%;
                            object-fit: cover;">
                        @endforeach
                    </div>
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
                @if ($requisitos->isNotEmpty())
                    <div class="descripcion">
                        <p><span class="descripcion-bold">Organizadores:</span> </p>
                        <div class="row">
                            @foreach ($organizador  as $or)
                             <p>{{$or->ORGANIZADOR_NOMBRE}}</p>
                            @endforeach
                        </div>

                    </div>
                @endif
                
                <div class="descripcion">
                    <p><span class="descripcion-bold">Patrocinador:</span> </p>
                    <div class="row">
                        @foreach ($sponsor  as $es)
                         <p>{{$es->SPONSOR_NOMBRE}}</p>
                        @endforeach
                    </div>

                </div>

                <div class="descripcion">
                    <p><span class="descripcion-bold">Afiche:</span> </p>

                    @foreach ($evento->imagenes->where('IMAGEN_TIPO', 'afiche') as $imagen)
                        <img src="{{ asset('storage/' . $imagen->IMAGEN_IMAGEN) }}" alt="{{ $imagen->IMAGEN_TIPO }}"
                            style="width: 100%;
                        height: 50%;
                        object-fit: cover;">
                    @endforeach

                </div>

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


                <style>
    .botones {
        display: flex;
        flex-direction: row;
        justify-content: space-between; /* Adjust as needed for the desired spacing */
    }

    .btn {
        margin-right: 10px; /* Adjust the value as needed for the desired separation */
    }
</style>

<div class="botones">
    <a class="btn btn-primary btn-sm" role="button" href="{{ route('usuario') }}">Registro individual</a>
    <a class="btn btn-primary btn-sm" role="button" href="{{ route('asignar.evento',['id' => $evento->EVENTO_ID]) }}">Asignaciones</a>
    <a class="btn btn-primary btn-sm" role="button" href="{{ route('register.user.evento', ['id' => $evento->EVENTO_ID]) }}">
        <span class="text">Registrar</span>
    </a>
    <a class="btn btn-primary btn-sm" href="{{ route('misEventos') }}"><span class="text">Atras</span></a>
</div>


            </div>
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
