@extends('layout/plantilla')

@section('content')
    <div class="container" id="containerEvento">
        <div class="banner">
            @if ($evento->imagenes->where('IMAGEN_TIPO', 'banner')->count() > 0)
                @foreach ($evento->imagenes->where('IMAGEN_TIPO', 'banner') as $imagen)
                    <img src="{{ asset('storage/' . $imagen->IMAGEN_IMAGEN) }}" alt="{{ $imagen->IMAGEN_TIPO }}"
                        style="height: 100%; width: 100%;">
                @endforeach
            @else
                <img src="{{ asset('storage/umss_logo-768x284.png') }}" alt="Banner Predeterminado"
                    style="height: 100%; width: 100%;">
            @endif
            <div class="overlay"></div>
        </div>

        <div id="banner2">
            <div class="container-fluid text-center" id="containerB">
                <div class="row align-items-center">
                    <div class="col-3" id="logoContainerB">
                        @if ($evento->imagenes->where('IMAGEN_TIPO', 'icono')->count() > 0)
                            @foreach ($evento->imagenes->where('IMAGEN_TIPO', 'icono') as $imagen)
                                <img src="{{ asset('storage/' . $imagen->IMAGEN_IMAGEN) }}" alt="{{ $imagen->IMAGEN_TIPO }}"
                                    style="height: 100px; width: 100px;">
                            @endforeach
                        @else
                            <img src="{{ asset('storage/iconopredeterminado.png') }}" alt="Icono Predeterminado"
                                style="height: 100px; width: 100px;">
                        @endif

                    </div>

                    <div class="col-6" style="color:white;">
                        <h1>{{ $evento->EVENTO_NOMBRE }}</h1>
                        <h2>{{ $evento->EVENTO_TIPO }} - {{ $evento->EVENTO_MODALIDAD }}</h2>
                        <h3>{{ $evento->EVENTO_UBICACION }}</h3>

                    </div>
                    <div class="col-3" id="registroContainerB">
                        <a>
                            <button type="button" class="btn btn-secondary" disabled>Precio:
                                {{ $evento->EVENTO_COSTO }}
                                Bs</button>
                        </a>
                        <br>
                        <br>
                        <a href="{{ route('formulario-generado', ['eventoId' => $evento->EVENTO_ID]) }}">
                            <button type="button" class="btn btn-success">Registrarme</button>
                        </a>
                    </div>
                </div>

            </div>
        </div>

        <div class="container-fluid " id="containerD">
            <div class="row ">
                <div class="col align-items-start">
                    <h1>Descripcion</h1>
                    <p style="text-align: justify;">
                        {{ $evento->EVENTO_DESCRIPCION }}
                    </p>
                    <h1>Cronograma</h1>
                    <p style="text-align: justify;">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre de la actividad</th>
                                <th scope="col">Fecha de Inicio</th>
                                <th scope="col">Fecha Final</th>
                                <th scope="col">Descripcion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($evento->fechas as $index => $fecha)
                                <tr>
                                    <th scope="row">{{ $index + 1 }}</th>
                                    <td>{{ $fecha->FECHA_NOMBRE }}</td>
                                    <td>{{ $fecha->FECHA_INICIO }}</td>
                                    <td>{{ $fecha->FECHA_FINAL }}</td>
                                    <td>{{ $fecha->FECHA_DESCRIPCION }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </p>
                    <h1>Bases del Evento</h1>
                    <p style="text-align: justify;">
                        {{ $evento->EVENTO_BASES }}
                    </p>
                    <h1>Ubicacion o Enlace</h1>
                    <p> {{ $evento->EVENTO_UBICACION }}</p>
                </div>
                <div class="col d-flex align-items-center" id="containerI">
                    <!-- Contenido de la columna derecha -->
                    @if ($evento->imagenes->where('IMAGEN_TIPO', 'afiche')->count() > 0)
                        @foreach ($evento->imagenes->where('IMAGEN_TIPO', 'afiche') as $imagen)
                            <img src="{{ asset('storage/' . $imagen->IMAGEN_IMAGEN) }}" alt="{{ $imagen->IMAGEN_TIPO }}">
                        @endforeach
                    @else
                        <img src="{{ asset('storage/iconopredeterminado.png') }}" alt="Icono Predeterminado"
                            style="max-width: 50%; position:relative; left: 25%;">
                    @endif
                </div>
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


<script>
    let currentIndex = 0;

    function showImage(index) {
        const imageContainer = document.getElementById('image-container');
        const imageWidth = document.querySelector('.carousel-image').width;
        imageContainer.style.transform = `translateX(${-index * imageWidth}px)`;
        currentIndex = index;
    }

    function nextImage() {
        const totalImages = document.querySelectorAll('.carousel-image').length;
        currentIndex = (currentIndex + 1) % totalImages;
        showImage(currentIndex);
    }

    function prevImage() {
        const totalImages = document.querySelectorAll('.carousel-image').length;
        currentIndex = (currentIndex - 1 + totalImages) % totalImages;
        showImage(currentIndex);
    }

    // Mostrar la primera imagen al cargar la página
    showImage(currentIndex);
</script>
