@extends('layout/plantilla')

@section('sponsor')
    <div class="container">
        <form action="{{ route('guardarSponsor') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="SPONSOR_NOMBRE" class="form-label">Nombre del Sponsor:</label>
                <input type="text" class="form-control" name="SPONSOR_NOMBRE" required>
            </div>

            <div class="mb-3">
                <label for="SPONSOR_ENLACE" class="form-label">Enlace del Sponsor:</label>
                <input type="text" class="form-control" name="SPONSOR_ENLACE">
            </div>

            <div class="mb-3">
                <label for="SPONSOR_LOGO" class="form-label">Logo del Sponsor:</label>
                <input type="file" class="form-control" name="SPONSOR_LOGO">
            </div>

            {{-- <div class="mb-3">
                <label for="eventos" class="form-label">Asignar a Eventos:</label>
                <select name="eventos[]" class="form-control" multiple required>
                    @foreach ($eventos as $evento)
                        <option value="{{ $evento->EVENTO_ID }}">{{ $evento->EVENTO_NOMBRE }}</option>
                    @endforeach
                </select>
            </div> --}}

            <button type="submit" class="btn btn-primary">Guardar Sponsor</button>
        </form>
    </div>
@endsection
