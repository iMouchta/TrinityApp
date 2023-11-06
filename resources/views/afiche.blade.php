@extends('layout/plantilla')

@section('afiche')
<form action="{{ route('afiche') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="banner" class="form-label">Banner:</label>
        <input type="file" class="form-control" id="banner" name="banner">
    </div>

    <div class="mb-3">
        <label for="icono" class="form-label">Icono del evento:</label>
        <input type="file" class="form-control" id="icono" name="icono">
    </div>

    <div class="mb-3">
        <label for="afiche" class="form-label">Afiche oficial del evento:</label>
        <input type="file" class="form-control" id="afiche" name="afiche">
    </div>

    <div class="mb-3">
        <label for="imagenesDiversas" class="form-label">Imágenes diversas:</label>
        <input type="file" class="form-control" id="imagenesDiversas" name="imagenesDiversas[]" multiple>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection