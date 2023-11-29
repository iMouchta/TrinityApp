@extends('layout/plantilla')

@section('misEventos')
    <link rel="stylesheet" href="{{ asset('css/caja.css') }}">

    <h1>
        <center>Todos los eventos</center>
    </h1>
    <div class="contiene">
        <div class="row">
            @foreach ($eventos as $evento)
                <div class="col-md-3">
                    <a href="{{ route('ver.evento', ['evento' => $evento->EVENTO_ID]) }}"
                        style="text-decoration: none; color: inherit;">
                        <div class="cardevento">
                            <div class="card w-100">
                                <div class="card-body">
                                    <div class="titulo">
                                        <h2 class="text-center">{{ $evento->EVENTO_NOMBRE }}</h2>
                                    </div>
                                    <p class="letras">{{ $evento->EVENTO_TIPO }}</p>
                                    @foreach ($evento->fechas->take(1) as $fecha)
                                        <p class="letras">{{ $fecha->FECHA_NOMBRE }} : {{ $fecha->FECHA_FECHA }}</p>
                                    @endforeach
                                </div>

                                <div class=" botonver">
                                    <center>
                                        <a href="{{ route('mostrarFormularioRegistro', ['eventoId' => $evento->EVENTO_ID]) }}"class="btn btn-primary">Formulario de registro</a>
                                        <a href="{{ route('editarEvento', ['evento' => $evento->EVENTO_ID]) }}"class="btn btn-warning">Editar evento</a>
                                    </center>

                                </div>
                            </div>
                        </div>
                    </a>
                    <br>
                </div>
            @endforeach
        </div>
    </div>
@endsection
