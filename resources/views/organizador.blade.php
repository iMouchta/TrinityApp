@extends('layout/plantilla')

@section('organizador')
    <div class="container">
        <form action="{{ route('guardarOrganizador') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="ORGANIZADOR_NOMBRE" class="form-label">Nombre del Organizador:</label>
                <input type="text" class="form-control" name="ORGANIZADOR_NOMBRE" required>
            </div>

            <div class="mb-3">
                <label for="ORGANIZADOR_ENLACE" class="form-label">Enlace del Organizador:</label>
                <input type="text" class="form-control" name="ORGANIZADOR_ENLACE">
            </div>

            <div class="mb-3">
                <label for="ORGANIZADOR_LOGO" class="form-label">Logo del Organizador:</label>
                <input type="file" class="form-control" name="ORGANIZADOR_LOGO">
            </div>

            {{-- <div class="mb-3">
                <label for="eventos" class="form-label">Asignar a Eventos:</label>
                <select name="eventos[]" class="form-control" multiple required>
                    @foreach ($eventos as $evento)
                        <option value="{{ $evento->EVENTO_ID }}">{{ $evento->EVENTO_NOMBRE }}</option>
                    @endforeach
                </select>
            </div> --}}

            <button type="submit" class="btn btn-primary">Guardar Organizador</button>
        </form>
    </div>
@endsection
