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
                <div class = "row">
                    <div class ="col">
                        <label for="EVENTO_NOMBRE" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" name="EVENTO_NOMBRE" value="{{ old('EVENTO_NOMBRE') }}"
                            required minlength="4" maxlength="200">
                        <label for="EVENTO_MODALIDAD" class="form-label">Modalidad:</label>
                        <select name= "EVENTO_MODALIDAD" class="form-control" value="{{ old('EVENTO_MODALIDAD') }}" required>
                            <option value ="Individual">Individual</option>
                            <option value ="Grupal">Grupal</option>
                        </select>
                        <label for="EVENTO_COSTO" class="form-label">Costo:</label>
                        <input type="number" class="form-control" name="EVENTO_COSTO" value="{{ old('EVENTO_COSTO') }}">
                        <label for="EVENTO_TIPO" class="form-label">Tipo de evento:</label>
                        <input type="text" class="form-control" name="EVENTO_TIPO" required minlength="4"
                            maxlength="200">
                        <label for="EVENTO_DESCRIPCION" class="form-label">Descripción del Evento:</label>
                        <textarea class="form-control" name= "EVENTO_DESCRIPCION" rows="3" required></textarea>
                        <label for="EVENTO_REQUISITOS" class="form-label">Requisitos:</label>
                        <textarea class="form-control" name= "EVENTO_REQUISITOS" rows="3" required></textarea>
                        <label for="EVENTO_BASE" class="form-label">Bases del Evento:</label>
                        <textarea class="form-control" name="EVENTO_BASE" rows="3" style="resize: none;" required></textarea>
                        <label for="EVENTO_UBICACION" class="form-label">Ubicacion:</label>
                        <input type="text" class="form-control" name="EVENTO_UBICACION" required minlength="8"
                            maxlength="250">
                    </div>
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

                <div>
                    <div id="fechas-container">
                        <div class="fecha-input">
                            <label for="fechas-container" class="form-label">Cronograma:</label>
                            <br>
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <input type="text" class="form-control" name="fechas[FECHA_NOMBRE][]"
                                        placeholder="Fecha Inicio">
                                </div>
                                <div class="col-auto">
                                    <input type="date" class="form-control" name="fechas[FECHA_FECHA][]"
                                        placeholder="Fecha">
                                </div>
                                <div class="col-sm-6 col-md-8">
                                    <input type="text" class="form-control" name="fechas[FECHA_DESCRIPCION][]"
                                        placeholder = "Descripcion">
                                </div>
                            </div>
                            <br>
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <input type="text" class="form-control" name="fechas[FECHA_NOMBRE][]"
                                        placeholder="Fecha Fin">
                                </div>
                                <div class="col-auto">
                                    <input type="date" class="form-control" name="fechas[FECHA_FECHA][]"
                                        placeholder="Fecha">
                                </div>
                                <div class="col-sm-6 col-md-8">
                                    <input type="text" class="form-control" name="fechas[FECHA_DESCRIPCION][]"
                                        placeholder = "Descripcion">
                                </div>
                            </div>
                            <br>
                        </div>

                    </div>
                    <button type="button" class="btn btn-primary" onclick="agregarFecha()">Agregar Fecha</button>
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
                    <button type="button" class="btn btn-danger">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </center>


            </form>

            <script>
                function agregarFecha() {
                    var container = document.getElementById('fechas-container');
                    var div = document.createElement('div');
                    div.className = 'fecha-input';

                    // Estructura interna con el mismo formato que el original, incluyendo el botón de eliminar
                    div.innerHTML = '<div class="row g-4 align-items-center">' +
                        '<div class="col-auto" style="margin-bottom:3px">' +
                        '<input type="text" class="form-control" name="fechas[FECHA_NOMBRE][]" placeholder="Nombre de la fecha">' +
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
                    // Obtén el div padre (contenedor de la fila) y elimínalo
                    var fila = element.parentNode.parentNode;
                    fila.parentNode.removeChild(fila);
                }
            </script>

        </div>

    </div>
    <br>
@endsection