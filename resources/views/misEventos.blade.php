@extends('layout/plantilla')

@section('misEventos')
    @foreach($eventos as $evento)
    <div class="evento">
        <h2>{{ $evento->EVENTO_NOMBRE }}</h2>
        <p>{{ $evento->EVENTO_TIPO }}</p>
        <!-- Mostrar más información del evento según tus necesidades -->
    </div>
@endforeach

@endsection