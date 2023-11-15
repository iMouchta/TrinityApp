@extends('layout/plantilla')

@section('misEventos')

<link rel="stylesheet" href="{{ asset('css/caja.css') }}">

    
    <h1><center>Todos los eventos</center></h1>    
    <div class= "contiene">
    <div class="row">
    @foreach($eventos as $evento)
    <div class="col-md-3">
            <div class="cardevento">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="titulo">
                            <h2 class="text-center">{{ $evento->EVENTO_NOMBRE }}</h2>
                        </div>
                            <p class="letras ">Tipo de Evento : {{ $evento->EVENTO_TIPO }}</p>

                                       @foreach($evento->fechas->take(2) as $fecha)
                                            <p class="letras">{{ $fecha->FECHA_NOMBRE }} : {{ $fecha->FECHA_FECHA }}</p>
                                        @endforeach
                                       
                        </div>

                        <div class=" botonver ">
                        <center><a href="{{ route('ver.evento' , ['evento' => $evento->EVENTO_ID]) }}" class="btn btn-primary">Ver evento</a></center>
                            <!-- Mostrar más información del evento según tus necesidades -->
                            </div>
                    </div>      
                </div>
            <br>

        </div>
    @endforeach
    </div>
    </div>
@endsection

