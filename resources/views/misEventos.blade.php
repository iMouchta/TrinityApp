@extends('layout/plantilla')

@section('misEventos')
    <h1><center>Todos los eventos</center></h1>    
    <div class="row">
    @foreach($eventos as $evento)
        <div class="col-md-3">
            <div class="cardevento">
                <div class="card">
                    <div class="card-body">
                        <div class="titulo">
                            <h2 class="text-center">{{ $evento->EVENTO_NOMBRE }}</h2>
                        </div>
                            <p>tipo: {{ $evento->EVENTO_TIPO }}</p>
                            <p>fecha inicio: </p>
                            <p>fecha fin: </p>
                            <center><button type="button" class="btn btn-primary" onclick="()">Ver evento</button></center>
                            <!-- Mostrar más información del evento según tus necesidades -->
                        </div>
                    </div>      
                </div>
            <br>
        </div>
    @endforeach
    </div>
@endsection
