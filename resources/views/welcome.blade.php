<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body>
    <form action="{{ route('guardarEvento') }}" method="post">
        @csrf
        <!-- Campos para el evento -->
        <input type="text" name="name" placeholder="Nombre del evento">
        {{-- <input type="text" name="EVENTO_TIPO" placeholder="tipo"> --}}
        <select id="tipoDeCompetencia" name= "EVENTO_TIPO" class="form-control" placeholder="Seleccione una opcion"
            required>
            <option selected></option>
            <option value ="Individual">Individual</option>
            <option value ="Grupal">Grupal</option>
        </select>
        <input type="number" name="EVENTO_COSTO" placeholder="Costo" value="">

        <!-- Campos para las fechas y nombres -->
        <div id="fechas-container">
            <div class="fecha-input">
                <input type="text" name="fechas[FECHA_NOMBRE][]" placeholder="Nombre de la fecha">
                <input type="date" name="fechas[FECHA_FECHA][]" placeholder="Fecha">
            </div>
        </div>

        <button type="button" onclick="agregarFecha()">Agregar Fecha</button>
        <button type="submit">Guardar</button>
    </form>

    <script>
        function agregarFecha() {
            var container = document.getElementById('fechas-container');
            var div = document.createElement('div');
            div.className = 'fecha-input';
            div.innerHTML = '<input type="text" name="fechas[FECHA_NOMBRE][]" placeholder="Nombre de la fecha">' +
                '<input type="date" name="fechas[FECHA_FECHA][]" placeholder="Fecha">';
            container.appendChild(div);
        }
    </script>

</body>

</html>
