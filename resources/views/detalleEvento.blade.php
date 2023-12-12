@extends('layout/plantilla')

@section('detalleEvento')
    <div class="container">
        <center>
            <h2>{{ $evento->EVENTO_NOMBRE }}</h2>
        </center>

        <div class="container text-center">
            <div class="row align-items-start">
                <div class="col">
                    <a href="{{ route('formularioRegistro', ['eventoId' => $evento->EVENTO_ID]) }}">
                        <button class="btn btn-outline-dark">Editar Formulario de Registro</button>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('mostrarFormularioRegistro', ['eventoId' => $evento->EVENTO_ID]) }}">
                        <button class="btn btn-outline-dark">Editar Formulario de Registro</button>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('formularioRegistro', ['eventoId' => $evento->EVENTO_ID]) }}">
                        <button class="btn btn-outline-dark">Editar Formulario de Registro</button>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('formularioRegistro', ['eventoId' => $evento->EVENTO_ID]) }}">
                        <button class="btn btn-outline-dark">Editar Formulario de Registro</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
