@extends('layout/plantilla')

@section('content')
    <div class="container">
        <h2>{{ $evento->EVENTO_NOMBRE }}</h2>

        <p>Fechas:</p>
        @foreach ($evento->fechas as $fecha)
            <p class="crono">{{ $fecha->FECHA_NOMBRE }} : {{ $fecha->FECHA_FECHA }}</p>
        @endforeach

        <p>Imágenes:</p>
        @foreach ($evento->imagenes as $imagen)
        <img src="{{ asset('storage/' . $imagen->IMAGEN_IMAGEN) }}" alt="{{ $imagen->IMAGEN_TIPO }}">

        @endforeach
    </div>
@endsection
