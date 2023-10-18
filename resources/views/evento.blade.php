@extends('layout/plantilla')

@section('evento')
    <link rel="stylesheet" href="{{ asset('hoja.css') }}">
    <div class="container">
        <div class="row">
            <form action="{{ route('guardarEvento') }}" method="post" id="eventoC" enctype="multipart/form-data">
                @csrf
                <h1>
                    <center>Crear evento</center>
                </h1>
                <div class="row">
                    <div class="col">
                        <label for="formGroupExampleInput">Nombre:</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="EVENTO_NOMBRE"
                            placeholder="Ingrese el nombre del evento" required minlength="4" maxlength="200">
                        <label for="tipoDeCompetencia">Tipo de Competencia:</label>
                        <select id="tipoDeCompetencia" name= "EVENTO_MODALIDAD" class="form-control"
                            placeholder="Seleccione una opcion" required>
                            <option value ="Individual">Individual</option>
                            <option value ="Grupal">Grupal</option>
                        </select>
                        <label for="tipoEvento">Tipo de evento:</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="EVENTO_TIPO"
                            placeholder="Ingrese el tipo del evento" required minlength="4" maxlength="200">
                        <label for="costos">Costo:</label>
                        <input type="number" class="form-control" id="formGroupExampleInput" name="EVENTO_COSTO"
                            placeholder="Costo">

                    </div>

                    {{-- <div class="row">
                        <div class="col">
                            <label for="tipoEvento">Tipo de evento:</label>
                            <select id="tipoEvento" name= "EVENTO_TIPO" class="form-control"
                                placeholder="Seleccione una opcion" required>
                                <option value ="Competencia">Competencia</option>
                                <option value ="Entrenamiento">Entrenamiento</option>
                                <option value ="TallerProgra">Taller de Programacion</option>
                                <option value ="Reclutamiento">Reclutamiento</option>
                                <option value ="Clasificatorias">Clasificatorias</option>
                                <option value ="otroEvento">Otro</option>
                            </select>
                        </div>

                        <div class="col">
                            <label id="labeltipo" class="hidden">Otro:</label>
                            <input type="text" id="otroE" class="form-control hidden"
                                placeholder="Especifica la otra opción" required>
                            <script>
                                document.getElementById("tipoEvento").addEventListener("change", function() {
                                    var otroeInput = document.getElementById("otroE");
                                    var labelInput = document.getElementById("labeltipo");
                                    if (this.value === "otroEvento") {
                                        otroeInput.classList.remove(hidden);
                                        labelInput.classList.remove(hidden);

                                    } else {
                                        labelInput.classList.remove(hidden);
                                        otroeInput.classList.remove(hidden);
                                    }
                                });
                            </script>
                        </div>
                    </div> --}}

                    {{-- <div class="row">
                        <div class="col">
                            <label for="costos">Costo:</label>
                            <select id="costos" class="form-control" required>
                                <option value="sinCosto">Sin costo</option>
                                <option value= "costo">Con costo</option>
                            </select>
                        </div>

                        <div class="col">
                            <label id="labelcosto" style="display: none;">Costo del evento:</label>
                            <input type="number" id="costo" name="EVENTO_COSTO" class="form-control"
                                style="display: none;" placeholder="costo del evento" required>
                            <script>
                                document.getElementById("costos").addEventListener("change", function() {
                                    var costoInput = document.getElementById("costo");
                                    var labelInput = document.getElementById("labelcosto");
                                    if (this.value === "costo") {
                                        costoInput.style.display = "block";
                                        labelInput.style.display = "block";
                                    } else {
                                        costoInput.style.display = "none";
                                        labelInput.style.display = "none";
                                    }
                                    costoInput.addEventListener("input", function() {
                                        // Elimina espacios en blanco y reemplaza todo lo que no sea un número entero con una cadena vacía
                                        this.value = this.value.replace(/\s/g, '').replace(/[^\d]/g, '');

                                    });

                                });
                            </script>
                        </div>
                    </div> --}}

                </div>

                <div>
                    <label for="descripcion">Descripción del Evento:</label>
                    <textarea class="form-control" id="descripcion" name= "EVENTO_DESCRIPCION" rows="3" style="resize: none;"
                        required></textarea>
                </div>

                <div>
                    <label for="requisitos">Requisitos:</label>
                    <input type="text" class="form-control" id="requisitos" name="EVENTO_REQUISITOS"
                        placeholder="Describa los requisitos para el evento" required>
                </div>

                <div>
                    <label for="bases">Bases del Evento:</label>
                    <textarea class="form-control" name="EVENTO_BASE" id="bases" rows="3" style="resize: none;" required></textarea>
                </div>


                <div id="calendarioContainer" class="row">
                    <div class="col">
                        <label for="fecha" name="fechas[FECHA_NOMBRE][]">Fecha Inicio:</label>
                        <input type="date" name="fechas[FECHA_FECHA][]" class="form-control" id="fecha"
                            placeholder="Describa los requisitos para el evento" required>
                        <br>
                    </div>
                    <div class="col">
                        <label for="fechaf" name="FECHA_NOMBRE[]">Fecha Fin:</label>
                        <input type="date" name="fechas[FECHA_FECHA][]" class="form-control"
                            id="fechaf"name="FECHA_FECHA[]" required>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary" onclick="agregarCalendario()">Añadir
                            calendario</button>
                    </div>
                </div>

                <script>
                    function resetForm() {
                        // Elimina los calendarios dinámicos
                        const calendarioContainer = document.getElementById("calendarioContainer");
                        calendarioContainer.innerHTML = "";

                        // Restablece el formulario
                        document.getElementById("eventoC").reset();
                    }

                    function agregarCalendario() {
                        // Verificar que todos los campos obligatorios estén llenos
                        const nombreEvento = document.getElementById("formGroupExampleInput");
                        const tipoCompetencia = document.getElementById("tipoDeCompetencia");
                        const tipoEvento = document.getElementById("tipoEvento");
                        const descripcion = document.getElementById("descripcion");
                        const requisitos = document.getElementById("requisitos");
                        const fechaInicio = document.getElementById("fecha");
                        const fechaFin = document.getElementById("fechaf");

                        // Campos de calendario y fecha
                        const calendarioInputs = document.querySelectorAll("input[name='fechas[FECHA_NOMBRE][]']");
                        const fechaInputs = document.querySelectorAll("input[name='fechas[FECHA_FECHA][]']");

                        // Verificar que todos los campos tengan un valor
                        if (
                            nombreEvento.value === "" ||
                            tipoCompetencia.value === "" ||
                            tipoEvento.value === "" ||
                            descripcion.value === "" ||
                            requisitos.value === "" ||
                            fechaInicio.value === "" ||
                            fechaFin.value === ""
                        ) {
                            alert("Por favor, complete todos los campos antes de agregar calendarios.");
                            return; // No se pueden agregar calendarios si hay campos vacíos
                        }

                        // Verificar que los campos de calendario y fecha estén llenos
                        for (let i = 0; i < calendarioInputs.length; i++) {
                            if (calendarioInputs[i].value === "" || fechaInputs[i].value === "") {
                                alert("Por favor, complete los campos de calendario y fecha antes de agregar otro calendario.");
                                return; // No se pueden agregar calendarios si hay campos de calendario o fecha vacíos
                            }
                        }

                        // Si todos los campos obligatorios están llenos, agrega un nuevo calendario
                        const nuevoCalendario = document.createElement("div");
                        nuevoCalendario.classList.add("row");

                        // Campo de calendario
                        const calendarioInput = document.createElement("div");
                        calendarioInput.innerHTML = `
                                                    <div class="col">
                                                        <label for="fecha">Nombre de la fecha:</label>
                                                        <input type="text" class="form-control" name="fechas[FECHA_NOMBRE][]" required>
                                                    </div>
                                                `;

                        // Campo de fecha
                        const fechaInput = document.createElement("div");
                        fechaInput.innerHTML = `
                                                    <div class="col">
                                                        <label for="fecha">Fecha:</label>
                                                        <input type="date" class="form-control" name="fechas[FECHA_FECHA][]" required>
                                                    </div>
                                                `;

                        nuevoCalendario.appendChild(calendarioInput);
                        nuevoCalendario.appendChild(fechaInput);

                        const calendarioContainer = document.getElementById("calendarioContainer");
                        calendarioContainer.appendChild(nuevoCalendario);
                    }
                </script>



                <!-- <form action="{{ route('patrocinador') }}" method="POST" enctype="multipart/form-data"> -->
                <div class="row">
                    <label for="formGroupExampleInput2">Subir Afiche</label>
                    <div class="col">
                        <input type="file" name="file" id="file" style="display: none;">
                        <button class="btn btn-primary" type="button"
                            onclick="document.getElementById('file').click()">Selecciona
                            la imagen</button>
                    </div>

                    <label for="formGroupExampleInput2">Archivos seleccionados:</label>
                    <p id="selectedFile"> </p>

                    <p class="center"><input class="btn btn-success" type="submit" value="Subir Archivo"></p>
                </div>
                <!-- </form>    -->

                <div>
                    <center>
                        <button type="submit" class="btn btn-success">Registrar</button>
                        <button type="reset" class="btn btn-danger" form="eventoC"
                            onclick="resetForm()">Cancelar</button>
                    </center>
                </div>

            </form>

        </div>

    </div>
    <br>
@endsection
