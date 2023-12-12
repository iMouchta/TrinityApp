@extends('layout/plantilla')

@section('seleccionarEvento')
    <div class="container">
        <h2>Seleccionar Evento para Editar</h2>


        <div class="mb-3">
            <label for="evento_id" class="form-label">Seleccionar Evento:</label>
            <select class="form-control" id="evento_id" name="evento_id" required>
                <option value="" disabled selected>Selecciona un evento</option>
                @foreach ($eventos as $evento)
                    <option value="{{ $evento->EVENTO_ID }}">{{ $evento->EVENTO_NOMBRE }}</option>
                @endforeach
            </select>
            <div class="container text-center">
                <div class="row align-items-start">
                    <div class="col">
                        <form action="{{ route('asigPatrocinador') }}" method="post">
                            @csrf
                            <input type="hidden" name="evento_id" value="">
                            <button type="submit" class="btn btn-outline-dark">Asignar Patrocinador</button>
                        </form>
                    </div>
                    <div class="col">
                        <form action="{{ route('asigOrganizador') }}" method="post">
                            @csrf
                            <input type="hidden" name="evento_id" value="">
                            <button type="submit" class="btn btn-outline-dark">Asignar Organizador</button>
                        </form>
                    </div>
                    <div class="col">
                        <form action="{{ route('editarEvento') }}" method="post">
                            @csrf
                            <input type="hidden" name="evento_id" value="">
                            <button type="submit" class="btn btn-outline-dark">Editar Evento</button>
                        </form>
                    </div>
                    <div class="col">
                        <form action="{{ route('formularioRegistro', ['eventoId' => '']) }}" method="post" id="formularioRegistroForm">
                            @csrf
                            <input type="hidden" name="evento_id" value="">
                            <button type="submit" class="btn btn-outline-dark">Editar formulario de Registro</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var selectEvento = document.getElementById('evento_id');
            var formularioRegistroForm = document.getElementById('formularioRegistroForm');

            selectEvento.addEventListener('change', function() {
                var eventoIdInput = document.querySelector('input[name="evento_id"]');
                eventoIdInput.value = selectEvento.value;
            });

            formularioRegistroForm.addEventListener('submit', function(event) {
                
            });
        });
    </script>
@endsection
