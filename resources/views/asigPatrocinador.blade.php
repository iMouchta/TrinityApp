@extends('layout/plantilla')

@section('asigPatrocinador')
    <div class="container">
        <form action="{{ route('guardarPatro') }}" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation"
            novalidate>
            @csrf
            <h1>
                <center>Asignar Patrocinador</center>
            </h1>

            <div class="mb-3">
                <label for="evento_id" class="form-label">Seleccionar Evento:</label>
                <select class="form-control" id="evento_id" name="evento_id" required>
                    <option value="" disabled selected>Selecciona un evento</option>
                    @foreach ($eventos as $evento)
                        <option value="{{ $evento->EVENTO_ID }}">{{ $evento->EVENTO_NOMBRE }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="patrocinador_id" class="form-label">Seleccionar Patrocinador:</label>
                <select class="form-control" id="patrocinador_id" name="patrocinador_id" required>
                    <option value="" disabled selected>Selecciona un patrocinador</option>
                    @foreach ($patrocinadores as $patrocinador)
                        <option value="{{ $patrocinador->ORGANIZADOR_ID }}">{{ $patrocinador->ORGANIZADOR_NOMBRE }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">

                <div id="patrocinadores-container"></div>
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
                <button type="submit" class="btn btn-primary">Asignar Patrocinador</button>
                <button type="button" class="btn btn-success" onclick="agregarPatrocinador()">Agregar Patrocinador</button>
                <a href="{{ route('welcome') }}" class="btn btn-danger">Salir</a>
            </center>
        </form>


    </div>

    <script>
        function agregarPatrocinador() {
            var container = document.getElementById('patrocinadores-container');
            var nuevoPatrocinador = document.createElement('div');
            nuevoPatrocinador.innerHTML = `
                <div class="mb-3">
                    <label for="patrocinador_id" class="form-label">Seleccionar Patrocinador:</label>
                    <select class="form-control" name="patrocinadores[]" required>
                        <option value="" disabled selected>Selecciona un patrocinador</option>
                        @foreach ($patrocinadores as $patrocinador)
                            <option value="{{ $patrocinador->ORGANIZADOR_ID }}">{{ $patrocinador->ORGANIZADOR_NOMBRE }}</option>
                        @endforeach
                    </select>
                </div>
            `;
            container.appendChild(nuevoPatrocinador);
        }
    </script>
@endsection
