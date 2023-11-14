@extends('layout.plantilla')

@section('buscar')
    <div class="container">
        <h1>Resultados de la búsqueda</h1>

        @if(count($eventos) > 0)
            <ul>
                @foreach($eventos as $evento)
                    <li>
                        <strong>Nombre:</strong> {{ $evento->EVENTO_NOMBRE }} <br>
                        <strong>Tipo:</strong> {{ $evento->EVENTO_TIPO }} <br>
                        <strong>Modalidad:</strong> {{ $evento->EVENTO_MODALIDAD }} <br>
                        <strong>Costo:</strong> {{ $evento->EVENTO_COSTO }} <br>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No se encontraron resultados.</p>
        @endif
    </div>
@endsection