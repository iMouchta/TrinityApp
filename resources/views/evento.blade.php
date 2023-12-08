@extends('layout/plantilla')

@section('evento')
    <div class="container">
        <div class="row">
            <form action="{{ route('guardarEvento') }}" method="post"  enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                @csrf
                <h1>
                    <center>Crear Evento</center>
                </h1>
                <div class = "row">
                    <div class ="col">
                        <label for="EVENTO_NOMBRE" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" name="EVENTO_NOMBRE" value="{{ old('EVENTO_NOMBRE') }}" placeholder="Ingrese el nombre"
                            required minlength="3" maxlength="200">
                            <div class="valid-feedback">Nombre válido</div> 
                            <div class="invalid-feedback">Use un nombre de "minimo de 3 caracteres"</div>

                        <label for="EVENTO_MODALIDAD" class="form-label">Modalidad:</label>
                        <select name= "EVENTO_MODALIDAD" class="form-control" value="{{ old('EVENTO_MODALIDAD') }}"
                            required>
                            <option value ="Individual">Individual</option>
                            <option value ="Grupal">Grupal</option>
                        </select>

                        <div class ="col">
                        <label for="EVENTO_COSTO" class="form-label">Costo:</label>
                        <input type="text" class="form-control" name="EVENTO_COSTO" value="{{ old('EVENTO_COSTO') }}" placeholder="Ingrese el costo" requerid pattern="^[0-9]{1,6}$">
                        <div class="valid-feedback">Costo válido</div>
                        <div class="invalid-feedback">Registre un costo válido"</div>
                        </div>
                        <label for="EVENTO_TIPO" class="form-label">Tipo de evento:</label>
                        <select name= "EVENTO_TIPO" class="form-control" value="{{ old('EVENTO_TIPO') }}" required>
                            <option value ="Rondas de Entrenamiento">Rondas de entrenamiento</option>
                            <option value ="Reclutamiento">Reclutamiento</option>
                            <option value ="Clasificatorios">Clasificatorios</option>
                            <option value ="Taller de programacion competitiva">Taller de programacion competitiva</option>
                            <option value ="Competencia">Competencia</option>
                            <option value ="Evento especial">Especial</option>
                        </select>
                        <label for="EVENTO_DESCRIPCION" class="form-label">Descripción del Evento:</label>
                        <textarea class="form-control" name= "EVENTO_DESCRIPCION" rows="3" required></textarea>

                        <label for="EVENTO_BASES" class="form-label">Bases del Evento:</label>
                        <textarea class="form-control" name="EVENTO_BASES" rows="3" style="resize: none;" required></textarea>
                        
                        <label for="EVENTO_UBICACION" class="form-label">Ubicacion:</label>
                        <input type="text" class="form-control" name="EVENTO_UBICACION" required minlength="8"

                            maxlength="250">
                            <div class="valid-feedback">Ubición válida</div> 
                            <div class="invalid-feedback">Registre una ubicación válida"</div>
                        </div>
                    </div>
                </div>

                <div>
                    <div id="requisitos-container">
                        <label for="requisitos-container" class="form-label">Requisitos:</label>
                        <div class="requisito-input">
                            <div class ="row g-1">
                                <input type="text" class="form-control" name="requisitos[REQUISITO_NOMBRE][]" requerid>
                            </div>
                        </div>
                        <br>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="agregarRequisito()">Agregar
                        Requisito</button>
                </div>



                <div>
                    <div id="fechas-container">
                        <label for="fecha-input" class="form-label">Cronograma:</label>
                        <div class="fecha-input">
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <input type="text" class="form-control" name="fechas[FECHA_NOMBRE][]"
                                        placeholder="Actividad Inicial" required>
                                </div>
                                <div class="col-auto">
                                    <input type="datetime-local" class="form-control" name="fechas[FECHA_INICIO][]"
                                        placeholder="Fecha Inicial" required>
                                </div>
                                <div class="col-auto">
                                    <input type="datetime-local" class="form-control" name="fechas[FECHA_FINAL][]"
                                        placeholder="Fecha Final" required>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="fechas[FECHA_DESCRIPCION][]"
                                        placeholder = "Descripcion">
                                </div>
                            </div>
                            <br>
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <input type="text" class="form-control" name="fechas[FECHA_NOMBRE][]"
                                        placeholder="Actividad Final" required>
                                </div>
                                <div class="col-auto">
                                    <input type="datetime-local" class="form-control" name="fechas[FECHA_INICIO][]"
                                        placeholder="Fecha Inicial" required>
                                </div>
                                <div class="col-auto">
                                    <input type="datetime-local" class="form-control" name="fechas[FECHA_FINAL][]"
                                        placeholder="Fecha Final" required>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="fechas[FECHA_DESCRIPCION][]"
                                        placeholder = "Descripcion">
                                </div>
                            </div>
                            <br>
                        </div>

                    </div>
                    <button type="button" class="btn btn-primary" onclick="agregarFecha()">Agregar Fecha</button>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="EVENTO_NOTIFICACIONES"
                        name="EVENTO_NOTIFICACIONES">
                    <label class="form-check-label" for="EVENTO_NOTIFICACIONES">
                        ¿Desea que los registrados reciban notifiaciones?
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="EVENTO_USUARIOS"
                        name="EVENTO_USUARIOS">
                    <label class="form-check-label" for="EVENTO_USUARIOS">
                        ¿Desea que a los registrados se les cree una cuenta?
                    </label>
                </div>


                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <center>
                <button type="submit" class="btn btn-primary">Registrar</button>
                <button id="cancelar" type="button" class="btn btn-danger">Salir</button>
                </center>

            </form>

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
                        '<input type="datetime-local" class="form-control" name="fechas[FECHA_INICIO][]" placeholder="Fecha">' +
                        '</div>' +
                        '<div class="col-auto">' +
                        '<input type="datetime-local" class="form-control" name="fechas[FECHA_FINAL][]" placeholder="Fecha">' +
                        '</div>' +
                        '<div class="col-md-4">' +
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

        </div>

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

<script>
    $('#eventoC').on('submit' ,function(e){ 
        e.preventDefault(); 
        Swal.fire({
        title: "¿Estas seguro de registrar la información?",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Registrar" ,
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
        title: "¿Estas Seguro que deseas Salir?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, salir del registro" ,
        cancelButtonText: "Cancelar",
        allowOutsideClick: false
        }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '/welcome';
        }
        });
    });
</script>
@endsection
