@extends('layout/plantilla')

@section('evento')

<div class="container">
    <div class="row">
        <form action="tu_script_php.php" method="post" id="eventoC">
            <h1><center>Crear evento</center></h1>  
            <div class="row">
                                <div class="col">
                                        <label for="formGroupExampleInput">Nombre:</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ingrese el nombre del evento" required minlength="4" maxlength="200">
                                        
                                        <br>
                                        <label for="tipoDeCompetencia">Tipo de Competencia:</label>
                                        <select id="tipoDeCompetencia" class="form-control" placeholder="Seleccione una opcion" required>
                                        <option selected></option>
                                        <option value ="Individual" >Individual</option>
                                        <option value ="Grupal" >Grupal</option> 
                                       </select>
                                        
                                </div>
                
                            <div class="col">


                                            <label for="tipoEvento">Tipo de evento:</label>
                                            <select id="tipoEvento" class="form-control" placeholder="Seleccione una opcion" required>
                                            <option selected></option>
                                            <option value ="Competecnia">Competencia</option>
                                            <option value ="Entrenamiento">Entrenamiento</option>
                                            <option value="otroEvento">Otro</option>
                                            </select>
                                                                                                 <br>
                                                  <input type="text" id="otroE" class="form-control" style="display: none;" placeholder="Especifica la otra opción" required>
                                                 <script>
                                                    document.getElementById("tipoEvento").addEventListener("change", function () {
                                                        var otroeInput = document.getElementById("otroE");
                                                        if (this.value === "otroEvento") {
                                                            otroeInput.style.display = "block";
                                                        } else {
                                                            otroeInput.style.display = "none";
                                                        }
                                                    });
                                                </script>
                
                                    <div class="row">
                                                <div class="col">
                                                    <label for="costos">Costo:</label>
                                                    <select id="costos" class="form-control" required>
                                                    <option selected></option>
                                                    <option value="sinCosto">sin costo</option>
                                                    <option value= "costo">con costo</option>
                                                    </select>
                                                </div>

                                         <div class="col">
                                                <label id="labelcosto" style="display: none;" >Costo del evento:</label>
                                                <input type="number" id="costo" class="form-control" style="display: none;" placeholder="costo del evento" required> 
                                                <script>
                                                  var costoInput = document.getElementById("costo");
                                                document.getElementById("costos").addEventListener("change", function () {
                                                    var costoInput = document.getElementById("costo");
                                                    var labelInput = document.getElementById("labelcosto");
                                                    if (this.value === "costo") {

                                                        costoInput.style.display = "block";
                                                        labelInput.style.display = "block";
                                                    } else {
                                                        costoInput.style.display = "none";
                                                        labelInput.style.display = "none";
                                                    }
                                                    });
                                                        costoInput.addEventListener("input", function () {
                                                    // Elimina espacios en blanco y reemplaza todo lo que no sea un número entero con una cadena vacía
                                                    this.value = this.value.replace(/\s/g, '').replace(/[^\d]/g, '');
                                                    });
                                                </script>
                                             </div>
                                     </div>

                             </div>
                   
                   
                        <label for="descripcion">Descripción del Evento:</label>
                        <textarea class="form-control" id="descripcion" rows="3" style="resize: none;" required></textarea>
                   

                    
                        <label for="requisitos">Requisitos:</label>
                        <input type="text" class="form-control" id="requisitos" placeholder="Describa los requisitos para el evento" required>
                 
                        <label for="bases">Bases del Evento:</label>
                        <textarea class="form-control" id="bases" rows="3"  style="resize: none;" required></textarea >

                        <div class="row">          
                                <div class="col">
                                <label for="fecha">fecha Inicio:</label>
                                <input type="date" class="form-control" id="fecha" placeholder="Describa los requisitos para el evento" required>
                                </div>

                              <div class="col">
                                <label for="fechaf">fecha fin:</label>
                                <input type="date" class="form-control" id="fechaf" placeholder="Describa los requisitos para el evento" required>
                                </div>
                         </div>
                         <div id="calendarioContainer">
                                    <!-- Aquí se agregarán los campos de calendario y hora dinámicamente -->
                                </div>

                                <button type="submit" class="btn btn-primary" onclick="agregarCalendario()">Añadir calendario</button>
                                
                               
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
                                                const bases = document.getElementById("bases");
                                                const fechaInicio = document.getElementById("fecha");
                                                const fechaFin = document.getElementById("fechaf");

                                                // Campos de calendario y fecha
                                                const calendarioInputs = document.querySelectorAll("input[name='calendario[]']");
                                                const fechaInputs = document.querySelectorAll("input[name='fecha[]']");

                                                // Verificar que todos los campos tengan un valor
                                                if (
                                                    nombreEvento.value === "" ||
                                                    tipoCompetencia.value === "" ||
                                                    tipoEvento.value === "" ||
                                                    descripcion.value === "" ||
                                                    requisitos.value === "" ||
                                                    bases.value === "" ||
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
                                                        <label for="calendario">Calendario:</label>
                                                        <input type="text" class="form-control" name="calendario[]" required>
                                                    </div>
                                                `;

                                                // Campo de fecha
                                                const fechaInput = document.createElement("div");
                                                fechaInput.innerHTML = `
                                                    <div class="col">
                                                        <label for="fecha">Fecha:</label>
                                                        <input type="date" class="form-control" name="fecha[]" required>
                                                    </div>
                                                `;

                                                nuevoCalendario.appendChild(calendarioInput);
                                                nuevoCalendario.appendChild(fechaInput);

                                                const calendarioContainer = document.getElementById("calendarioContainer");
                                                calendarioContainer.appendChild(nuevoCalendario);
                                            }
                                        </script>
                        </div>                                  
              </div>
                



                
                            <div>               
                            <center>                   
                    <button type="submit" class="btn btn-success"  >Registrar</button>
                    <button type="reset" class="btn btn-danger" form="eventoC"  onclick="resetForm()">Cancelar</button>
                    </center> </div>    

                                
              
        </form>
    </div>
</div>

@endsection

