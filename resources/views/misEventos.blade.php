@extends('layout/plantilla')

@section('misEventos')
<link rel="stylesheet" href="{{ asset('css/caja.css') }}">
<style>
        .cardevento {
            height: 250px; /* Altura fija para las tarjetas */
            overflow: auto;/* Ajustar si el contenido excede la altura */
            
        }
    </style>
    
    <h1><center>Todos los eventos</center></h1>    
    <div class="container">
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
                                        <center> <button type="button" class="btn btn-primary" onclick="()">Ver evento</button></center>
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