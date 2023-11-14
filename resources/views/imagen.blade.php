@extends('layout/plantilla')

@section('imagen')
    <div class="container">
        <form action="{{ route('guardarImagen') }}" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
            @csrf
            <h1><center>Registrar Afiche</center></h1>
            <div class="mb-3">
                <label for="evento_id" class="form-label">Seleccionar Evento:</label>
                <select class="form-control" id="evento_id" name="evento_id">
                    @foreach ($eventos as $evento)
                        <option value="{{ $evento->EVENTO_ID }}">{{ $evento->EVENTO_NOMBRE }}</option>
                    @endforeach
                </select>
            </div>


            <div class="mb-3">
                <label for="banner" class="form-label">Banner:</label>
                <input type="file" class="form-control" id="banner" name="banner" required>
                <div class="valid-feedback">Banner válido</div>
                <div class="invalid-feedback">Use una imagen valida"</div>
            </div>

            <div class="mb-3">
                <label for="icono" class="form-label">Icono del evento:</label>
                <input type="file" class="form-control" id="icono" name="icono" required>
                <div class="valid-feedback">Icono válido</div>
                <div class="invalid-feedback">Use una imagen valida"</div>
            </div>

            <div class="mb-3">
                <label for="afiche" class="form-label">Afiche oficial del evento:</label>
                <input type="file" class="form-control" id="afiche" name="afiche" required>
                <div class="valid-feedback">Afiche válido</div>
                <div class="invalid-feedback">Use una imagen valida"</div>
            </div>

            <div class="mb-3">
                <label for="imagenesDiversas" class="form-label">Imágenes diversas:</label>
                <input type="file" class="form-control" id="imagenesDiversas" name="imagenesDiversas[]" multiple required>
                <div class="valid-feedback">Imagenes válidas</div>
                <div class="invalid-feedback">Use una imagen valida"</div>
                
            </div>

            <center>
                <button type="submit" class="btn btn-primary">Registrar</button>
                <button id="cancelar" type="button" class="btn btn-danger">Salir</button>
            </center>
        </form>
    </div>
    <br>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
            }, false)
        })
        })()
    </script>
@endsection
