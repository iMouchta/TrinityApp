@extends('layout/plantilla')


@section('misEventos')
<link rel="stylesheet" href="{{ asset('css/caja.css') }}">


    <div class="row">
        @foreach($eventos as $evento)
            <div class="col-md-3">
                <div class="cardevento">
                    <div class="card">
                        <div class="card-body">
                        <div class="titulo">
                            <h2 class="text-center">{{ $evento->EVENTO_NOMBRE }}</h2>
                            </div>
                            <p>{{ $evento->EVENTO_TIPO }}</p>
                            
                            <button type="button" class="btn btn-custom" onclick="()">Ver evento</button>
                
                            <!-- Mostrar más información del evento según tus necesidades -->
                        </div>
                    </div>
                </div>
                <br>
            </div>
            
        @endforeach
        
    </div>
@endsection