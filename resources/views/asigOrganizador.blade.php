@extends('layout/plantilla')

@section('asigOrganizador')
    <div class="container">
        <form action="{{ route('guardarOrga') }}" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation"
            novalidate>
            @csrf
            <h1>
                <center>Asignar Organizador</center>
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
                <label for="organizador_id" class="form-label">Seleccionar Organizador:</label>
                <select class="form-control" id="organizador_id" name="organizador_id" required>
                    <option value="" disabled selected>Selecciona un organizador</option>
                    @foreach ($organizadores as $organizador)
                        <option value="{{ $organizador->ORGANIZADOR_ID }}">{{ $organizador->ORGANIZADOR_NOMBRE }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">

                <div id="organizadores-container"></div>
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
                <button type="submit" class="btn btn-primary">Asignar Organizador</button>
                <button type="button" class="btn btn-success" onclick="agregarOrganizador()">Agregar Organizador</button>
                <a href="{{ route('welcome') }}" class="btn btn-danger">Salir</a>
            </center>
        </form>


    </div>

    <script>
        function agregarOrganizador() {
            var container = document.getElementById('organizadores-container');
            var nuevoOrganizador = document.createElement('div');
            nuevoOrganizador.innerHTML = `
                <div class="mb-3">
                    <label for="organizador_id" class="form-label">Seleccionar Organizador:</label>
                    <select class="form-control" name="organizadores[]" required>
                        <option value="" disabled selected>Selecciona un organizador</option>
                        @foreach ($organizadores as $organizador)
                            <option value="{{ $organizador->ORGANIZADOR_ID }}">{{ $organizador->ORGANIZADOR_NOMBRE }}</option>
                        @endforeach
                    </select>
                </div>
            `;
            container.appendChild(nuevoOrganizador);
        }
    </script>
@endsection
