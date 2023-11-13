@extends('layout/plantilla')

@section('misEventos')
    <link rel="stylesheet" href="{{ asset('css/caja.css') }}">
    <style>
        .cardevento {
            height: 250px;
            /* Altura fija para las tarjetas */
            overflow: auto;
            /* Ajustar si el contenido excede la altura */

        }
    </style>


    <div class="container">
        <h1>
            <center>Todos los eventos</center>
        </h1>
        <div class="row">
            @foreach ($eventos as $evento)
                <div class="col-md-3">
                    <div class="cardevento">
                        <div class="card">
                            <div class="card-body">
                                <div class="titulo">
                                    <h2 class="text-center">{{ $evento->EVENTO_NOMBRE }}</h2>
                                </div>
                                <p>Tipo de Evento: {{ $evento->EVENTO_TIPO }}</p>

                                @foreach ($evento->fechas->take(2) as $fecha)
                                    <p class="crono">{{ $fecha->FECHA_NOMBRE }} : {{ $fecha->FECHA_FECHA }}</p>
                                @endforeach

                                <center><a href="{{ route('ver.evento' , ['evento' => $evento->EVENTO_ID]) }}" class="btn btn-primary">Ver evento</a></center>
                                
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            @endforeach
        </div>
    </div>
@endsection
