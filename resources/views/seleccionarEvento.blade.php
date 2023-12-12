@extends('layout/plantilla')

@section('seleccionarEvento')
    <div class="container">
        <h2>Seleccionar Evento</h2>

        <form action="{{ route('mostrarDetalleEvento') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="evento_id" class="form-label">Seleccionar Evento:</label>
                <select class="form-control" id="evento_id" name="evento_id" required>
                    <option value="" disabled selected>Selecciona un evento</option>
                    @foreach ($eventos as $evento)
                        <option value="{{ $evento->EVENTO_ID }}">{{ $evento->EVENTO_NOMBRE }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-outline-dark">Mostrar Detalle del Evento</button>
        </form>
    </div>
@endsection
