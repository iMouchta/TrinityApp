@extends('layout/plantilla')

@section('editarEvento')
    <div class="container">
        <div class="row">
            <form action="{{ route('editarEvento', ['eventoId' => $evento->EVENTO_ID]) }}" method="get"
                enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                @csrf
                <h1>
                    <center>Editar evento</center>
                </h1>
                <div class="row">
                    <div class="col">
                        <label for="EVENTO_NOMBRE" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" name="EVENTO_NOMBRE" value="{{ $evento->EVENTO_NOMBRE }}"
                            placeholder="Ingrese el nombre" required minlength="3" maxlength="200">
                        <div class="valid-feedback">Nombre válido</div>
                        <div class="invalid-feedback">Use un nombre de "mínimo de 3 caracteres"</div>

                        <label for="EVENTO_MODALIDAD" class="form-label">Modalidad:</label>
                        <select name= "EVENTO_MODALIDAD" class="form-control" value="{{ $evento->EVENTO_MODALIDAD }}"
                            required>
                            <option value ="Individual">Individual</option>
                            <option value ="Grupal">Grupal</option>
                        </select>

                        <div class ="col">
                            <label for="EVENTO_COSTO" class="form-label">Costo:</label>
                            <input type="text" class="form-control" name="EVENTO_COSTO"
                                value="{{ $evento->EVENTO_COSTO }}" placeholder="Ingrese el costo" requerid
                                pattern="^[0-9]{1,6}$">
                            <div class="valid-feedback">Costo válido</div>
                            <div class="invalid-feedback">Registre un costo válido"</div>
                        </div>
                        <label for="EVENTO_TIPO" class="form-label">Tipo de evento:</label>
                        <select name= "EVENTO_TIPO" class="form-control" value="{{ $evento->EVENTO_TIPO }}" required>
                            <option value ="Rondas de Entrenamiento">Rondas de entrenamiento</option>
                            <option value ="Reclutamiento">Reclutamiento</option>
                            <option value ="Clasificatorios">Clasificatorios</option>
                            <option value ="Taller de programacion competitiva">Taller de programacion competitiva</option>
                            <option value ="Competencias">Competencias</option>
                            <option value ="Evento especial">Especial</option>
                        </select>
                        <label for="EVENTO_DESCRIPCION" class="form-label">Descripción del Evento:</label>
                        <textarea class="form-control" name= "EVENTO_DESCRIPCION" value="{{ $evento->EVENTO_DESCRIPCION }}" rows="3"
                            required></textarea>

                        <label for="EVENTO_BASES" class="form-label">Bases del Evento:</label>
                        <textarea class="form-control" name="EVENTO_BASES" value="{{ $evento->EVENTO_BASES }}" rows="3"
                            style="resize: none;" required></textarea>

                        <label for="EVENTO_UBICACION" class="form-label">Ubicacion:</label>
                        <input type="text" class="form-control" name="EVENTO_UBICACION"
                            value="{{ $evento->EVENTO_UBICACION }}" required minlength="8" maxlength="250">
                        <div class="valid-feedback">Ubición válida</div>
                        <div class="invalid-feedback">Registre una ubicación válida"</div>
                    </div>
                </div>
        </div>

        <div id="fechas-container">
            <label for="fechas-container" class="form-label">Cronograma:</label>
            @foreach ($evento->fechas as $fecha)
                <div class="fecha-input">
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <input type="text" class="form-control" name="fechas[FECHA_NOMBRE][]" placeholder="Actividad"
                                value="{{ $fecha->FECHA_NOMBRE }}">
                        </div>
                        <div class="col-auto">
                            <input type="date" class="form-control" name="fechas[FECHA_FECHA][]" placeholder="Fecha"
                                value="{{ $fecha->FECHA_FECHA }}">
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="fechas[FECHA_DESCRIPCION][]"
                                placeholder="Descripcion" value="{{ $fecha->FECHA_DESCRIPCION }}">
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-danger" onclick="eliminarFecha(this)">Eliminar</button>
                        </div>
                    </div>
                </div>
                <br>
            @endforeach
        </div>
        <button type="button" class="btn btn-primary" onclick="agregarFecha()">Agregar Fecha</button>

        <div>
            <div id="requisitos-container">
                <label for="requisitos-container" class="form-label">Requisitos:</label>
                @foreach ($evento->requisitos as $requisito)
                    <div class="requisito-input">
                        <div class="row g-1">
                            <div class="col-md-11">
                                <input type="text" class="form-control" name="requisitos[REQUISITO_NOMBRE][]"
                                    value="{{ $requisito->REQUISITO_NOMBRE }}">
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-danger"
                                    onclick="eliminarElemento(this)">Eliminar</button>
                            </div>
                        </div>
                    </div>
                    <br>
                @endforeach
            </div>
            <button type="button" class="btn btn-primary" onclick="agregarRequisito()">Agregar Requisito</button>
        </div>


        <center>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <button id="cancelar" type="button" class="btn btn-danger">Cancelar</button>
            </center>
        </form>

    </div>
    <br>
    <script>
        function agregarFecha() {
            var container = document.getElementById('fechas-container');
            var div = document.createElement('div');
            div.className = 'fecha-input';
            div.innerHTML = '<div class="row g-4 align-items-center">' +
                '<div class="col-auto" style="margin-bottom:3px">' +
                '<input type="text" class="form-control" name="fechas[FECHA_NOMBRE][]" placeholder="Actividad">' +
                '</div>' +
                '<div class="col-auto">' +
                '<input type="date" class="form-control" name="fechas[FECHA_FECHA][]" placeholder="Fecha">' +
                '</div>' +
                '<div class="col-md-7">' +
                '<input type="text" class="form-control" name="fechas[FECHA_DESCRIPCION][]" placeholder="Descripcion">' +
                '</div>' +
                '<div class="col-auto">' +
                '<button type="button" class="btn btn-danger" onclick="eliminarFecha(this)">Eliminar</button>' +
                '</div>' +
                '</div>';

            container.appendChild(div);
        }

        function eliminarFecha(element) {
            var fila = element.parentNode.parentNode;
            fila.parentNode.removeChild(fila);
        }


        function agregarRequisito() {
            var container = document.getElementById('requisitos-container');
            var div = document.createElement('div');
            div.className = 'requisito-input';
            div.innerHTML = '<div class="row g-1">' +
                '<div class="col-md-11">' +
                '<input type="text" class="form-control" name="requisitos[REQUISITO_NOMBRE][]">' +
                '</div>' +
                '<div class="col-auto">' +
                '<button type="button" class="btn btn-danger" onclick="eliminarElemento(this)">Eliminar</button>' +
                '</div>' +
                '</div>';
            container.appendChild(div);
        }

        function eliminarElemento(elemento) {
            var fila = elemento.closest('.requisito-input');
            fila.remove();
        }
    </script>
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

    <script>
        $('#eventoC').on('submit', function(e) {
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
                            window.location.href = '/welcome';
                        }
                    });
                }
            });
        })

        $('#cancelar').on('click', function() {
            Swal.fire({
                title: "¿Estas Seguro que deseas salir?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, salir del registro",
                cancelButtonText: "Cancelar",
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/misEventos';
                }
            });
        });
    </script>
@endsection
