@extends('layout/plantilla')

@section('imagen')
    <div class="container">
        <form action="{{ route('guardarImagen') }}" method="POST" enctype="multipart/form-data"
            class="row g-3 needs-validation" novalidate>
            @csrf
            <h1>
                <center>Registrar Afiche</center>
            </h1>
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
                <input type="file" class="form-control" id="banner" name="banner">
                <div class="valid-feedback">Banner válido</div>
                <div class="invalid-feedback">Use una imagen valida"</div>
            </div>

            <div class="mb-3">
                <label for="icono" class="form-label">Icono del evento:</label>
                <input type="file" class="form-control" id="icono" name="icono">
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
                <input type="file" class="form-control" id="imagenesDiversas" name="imagenesDiversas[]" multiple>
                <div class="valid-feedback">Imagenes válidas</div>
                <div class="invalid-feedback">Use una imagen valida"</div>

            </div>


            <!-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif -->

            <!-- @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif -->

            <center>
                <button type="submit" class="btn btn-primary">Registrar</button>
                <button id="cancelar" type="button" class="btn btn-danger">Salir</button>
            </center>

                @if(session('success'))
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Datos guardados correctamente',
                            text: '{{ session('success') }}',
                            allowOutsideClick: false
                        }).then((result) => {
                            if (result.isConfirmed) {
                            
                            window.location.href = '/';
                            }
                        });
                    </script>
                @endif

                @if ($errors->any())
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            html: '<ul>' +
                                @foreach ($errors->all() as $error)
                                    '<li>{{ $error }}</li>' +
                                @endforeach
                                '</ul>',
                        });
                    </script>
                @endif
        </form>
    </div>
    <br>
    <script>
        (() => {
            'use strict'

            const forms = document.querySelectorAll('.needs-validation')
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

    <script>
        $('#formulario').on('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: "¿Estas seguro de registrar la información?",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Registrar",
                cancelButtonText: "Cancelar",
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Registrado",
                        text: "Se registro correctamente.",
                        icon: "success",
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.submit();
                            window.location.href = '/';
                        }
                    });
                }
            });
        })

        $('#cancelar').on('click', function() {
            Swal.fire({
                title: "¿Estas Seguro que deseas Salir?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, salir del registro",
                cancelButtonText: "Cancelar",
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/';
                }
            });
        });
    </script>
@endsection
