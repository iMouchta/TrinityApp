@extends('layout/plantilla')

@section('content')
    <div>
        <div class="container-fluid" style="height: 35%; padding:0; position:absolute; z-index:-10;">
            @if ($evento->imagenes->where('IMAGEN_TIPO', 'banner')->count() > 0)
                @foreach ($evento->imagenes->where('IMAGEN_TIPO', 'banner') as $imagen)
                    <img src="{{ asset('storage/' . $imagen->IMAGEN_IMAGEN) }}" alt="{{ $imagen->IMAGEN_TIPO }}"
                        style="height: 100%; width: 100%;">
                @endforeach
            @else
                <img src="{{ asset('storage/umss_logo-768x284.png') }}" alt="Banner Predeterminado"
                    style="height: 100%; width: 100%;">
            @endif

        </div>
        <div class="container-fluid" style="height: 35%; padding:0; background-color:rgba(0, 0, 0, 0.6); position:absolute;">
            <div>
                <h1>Sponsors</h1>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="top: 40%; padding:0; background-color:#C0C0C0; position:absolute; height:250px;">
        <div class="container" id="containerB" style="display: flex; aling-items:center; height:auto;padding-top:3rem;">
            <div class="col-md-10" style="display: flex">
                <div class="container" id="containerB"
                    style="width: 140px;height:140px;margin-right:1.2rem;margin-left:0rem; padding:0rem;">
                    @if ($evento->imagenes->where('IMAGEN_TIPO', 'icono')->count() > 0)
                        @foreach ($evento->imagenes->where('IMAGEN_TIPO', 'icono') as $imagen)
                            <img src="{{ asset('storage/' . $imagen->IMAGEN_IMAGEN) }}" alt="{{ $imagen->IMAGEN_TIPO }}"
                                style="height: 100%; width: 100%;">
                        @endforeach
                    @else
                        <img src="{{ asset('storage/iconopredeterminado.png') }}" alt="Icono Predeterminado"
                            style="height: 100%; width: 100%;">
                    @endif

                </div>
                <div class="col-md-9"
                    style="border-left:2px white solid; padding-left:1.2rem; border-right:2px white solid; color:white;">
                    <h1>{{ $evento->EVENTO_NOMBRE }}</h1>
                    <h2>{{ $evento->EVENTO_TIPO }} - {{ $evento->EVENTO_MODALIDAD }}</h2>
                    <h3>{{ $evento->EVENTO_UBICACION }}</h3>
                </div>
            </div>
            <div class="container" id="containerB" style="display:grid; justify-content: end">
                <button type="button" class="btn btn-secondary" disabled>Precio: {{ $evento->EVENTO_COSTO }} BS</button>
                <br>
                <a href="{{ route('formulario-generado', ['eventoId' => $evento->EVENTO_ID]) }}">
                    <button type="button" class="btn btn-success">Registrarme</button>
                </a>

            </div>
        </div>

    </div>
    <div style="display: flex;flex-wrap: wrap;">
        <div class="container-fluid"
            style="top: 39.6rem; background-color:rgba(217, 217, 217,0.21);position:absolute;height:fit-content;  width: 67%;z-index:-10; padding-top:3rem; padding-left:4rem; padding-right: 4rem">
            <h1>Descripcion</h1>
            <p style="text-align: justify;">
                {{ $evento->EVENTO_DESCRIPCION }}
            </p>
            <div>
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
                                <td>{{ $fecha->DESCRIPCION }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </p>
            </div>
            <div>
                <h1>Bases del Evento</h1>
                <p style="text-align: justify;">
                    {{ $evento->EVENTO_BASES }}
                </p>
            </div>
        </div>
        <div class="col-md-4"
            style="top: 39.6rem; padding:0; background-color:rgb(255, 255, 255);position:absolute; width: 33%;height:130%;z-index:-10;left:67% ">
            <div style="margin-top: 10%;width: 90%;margin-left: 5%;height:40% ;">
                @foreach ($evento->imagenes->where('IMAGEN_TIPO', 'afiche') as $imagen)
                    <img src=" {{ asset('storage/' . $imagen->IMAGEN_IMAGEN) }}" alt="{{ $imagen->IMAGEN_TIPO }}"
                        style="height: 100% ;width:100%; object-fit:fill;">
                @endforeach
            </div>
            <div id="carousel-container">
                <div id="image-container">
                    @foreach ($evento->imagenes->where('IMAGEN_TIPO', 'imagen') as $imagen)
                        <img class="carousel-image" src=" {{ asset('storage/' . $imagen->IMAGEN_IMAGEN) }}"
                            alt="{{ $imagen->IMAGEN_TIPO }}">
                    @endforeach
                </div>

                <button class="bton" id="prevBton" onclick="prevImage()">❮</button>
                <button class="bton" id="nextBton" onclick="nextImage()">❯</button>

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
