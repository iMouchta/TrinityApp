@extends('layout/plantilla')

@section('contacto')
    <div class="container">
        <form action="{{ route('guardarContacto') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="evento_id" class="form-label">Seleccionar Evento:</label>
                <select class="form-control" id="evento_id" name="evento_id">
                    @foreach ($eventos as $evento)
                        <option value="{{ $evento->EVENTO_ID }}">{{ $evento->EVENTO_NOMBRE }}</option>
                    @endforeach
                </select>
            </div>
            <label for="CONTACTO_NOMBRE" class="form-label">Nombre:</label>
            <input type="text" class="form-control" name="CONTACTO_NOMBRE" value="{{ old('CONTACTO_NOMBRE') }}" required
                minlength="4" maxlength="200">
            <label for="CONTACTO_NUMERO" class="form-label">Numero:</label>
            <input type="text" class="form-control" name="CONTACTO_NUMERO" value="{{ old('CONTACTO_NUMERO') }}" required
                minlength="4" maxlength="200">
            <label for="CONTACTO_EMAIL" class="form-label">Email:</label>
            <input type="text" class="form-control" name="CONTACTO_EMAIL" value="{{ old('CONTACTO_EMAIL') }}" required
                minlength="4" maxlength="200">

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
    <br>
@endsection
