@extends('layout.plantilla')

@section('buscar')
    <link rel="stylesheet" href="{{ asset('css/caja.css') }}">
    <div class="container">
        <center>
            <h1>Resultados de la búsqueda</h1>
        </center>

        @if (count($eventos) > 0)
            <div class= "contiene">
                <div class="row">
                    @foreach ($eventos as $evento)
                        <div class="col-md-3">
                            <div class="cardevento">
                                <div class="card w-100">
                                    <div class="card-body">

                                        <div class="titulo">
                                            <h2 class="text-center">{{ $evento->EVENTO_NOMBRE }}</h2>
                                        </div>
                                        <p class="letras ">{{ $evento->EVENTO_TIPO }}</p>
                                        @foreach ($evento->fechas->take(1) as $fecha)
                                            <p class="letras">{{ $fecha->FECHA_NOMBRE }} : {{ $fecha->FECHA_FECHA }}</p>
                                        @endforeach

                                    </div>
                                    <div class=" botonver ">
                                        <center><a href="{{ route('ver.evento', ['evento' => $evento->EVENTO_ID]) }}"
                                                class="btn btn-primary">Ver evento</a></center>
                                    </div>
                                </div>
                            </div>
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
