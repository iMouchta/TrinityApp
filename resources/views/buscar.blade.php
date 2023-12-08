@extends('layout.plantilla')

@section('buscar')
    <link rel="stylesheet" href="{{ asset('css/caja.css') }}">
    <div class="container">
        <center>
            <h1>Resultados de la búsqueda</h1>
        </center>

        @if (count($eventos) > 0)
        <div class="contiene">
            <div class="row">
                @foreach ($eventos as $evento)
                    <div class="col-md-3">
                        <a href="{{ route('ver.evento', ['evento' => $evento->EVENTO_ID]) }}"
                            style="text-decoration: none; color: inherit;">
                            <div class="cardevento">
                                <div class="card w-80">
                                    <div class="card-body" style="padding: 0px;">
                                        <div>
                                            @if ($evento->imagenes->where('IMAGEN_TIPO', 'banner')->count() > 0)
                                                @foreach ($evento->imagenes->where('IMAGEN_TIPO', 'banner') as $imagen)
                                                    <img src="{{ asset('storage/' . $imagen->IMAGEN_IMAGEN) }}"
                                                        alt="{{ $imagen->IMAGEN_TIPO }}" style="height: 7rem; width: 100%;">
                                                @endforeach
                                            @else
                                                <img src="{{ asset('storage/umss_logo-768x284.png') }}"
                                                    alt="Banner Predeterminado" style="height: 7rem; width: 100%;">
                                            @endif
                                        </div>
                                        <div style="margin: 0% 5%">
                                            <div class="titulo">
                                                <h2 class="text-center">{{ $evento->EVENTO_NOMBRE }}</h2>
                                            </div>
                                            <p class="letras">{{ $evento->EVENTO_TIPO }}</p>
                                            @foreach ($evento->fechas->take(1) as $fecha)
                                                <p class="letras">{{ $fecha->FECHA_NOMBRE }} : {{ $fecha->FECHA_INICIO }}</p>
                                            @endforeach
                                        </div>
                                    </div>
    
                                </div>
                            </div>
                        </a>
                        <br>
                    </div>
                @endforeach
            </div>
        </div>
        @else
            <p>No se encontraron resultados.</p>
        @endif
    </div>
@endsection
