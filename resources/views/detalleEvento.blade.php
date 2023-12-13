@extends('layout/plantilla')

@section('detalleEvento')
    <div class="container">
        <center>
            <h2>{{ $evento->EVENTO_NOMBRE }}</h2>
        </center>

        <div class="container text-center">
            <div class="row align-items-start">
                <div class="col">
                    <a href="{{ route('editarEvento', ['eventoId' => $evento->EVENTO_ID]) }}">
                        <button class="btn btn-outline-dark">Editar Evento</button>
                    </a>
                </div>
                <div class="col">
                    @if (!$existeFormularioCorreo)
                        <a href="{{ route('mostrarFormularioRegistro', ['eventoId' => $evento->EVENTO_ID]) }}">
                            <button class="btn btn-outline-dark">Crear Formulario de Registro</button>
                        </a>
                    @else
                        <button class="btn btn-outline-dark" disabled>Ya existe un formulario de registro para este evento</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
