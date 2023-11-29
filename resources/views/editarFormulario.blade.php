@extends('layout/plantilla')

@section('editarFormulario')
    <div class="container">
        <center>
            <h2>Editar formulario de registro</h2>
        </center>
        <form action="{{ route('actualizarFormulario', ['regformId' => $regform->REGFORM_ID]) }}" method="post">
            @method('PUT')
            @csrf

            @foreach ($regform as $index => $regform)
                <div class="form-row mb-2">
                    <div class="col-md-4">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" name="nombre[]"
                            value="{{ old("nombre.$index", $regform->REGFORM_NOMBRE) }}">
                    </div>
                    <div class="col-md-4">
                        <label for="tipo">Tipo:</label>
                        <select class="form-control" name="tipo[]">
                            @foreach (['texto', 'numeral', 'enlace', 'talla', 'imagen'] as $option)
                                <option value="{{ $option }}"
                                    {{ old("tipo.$index", $regform->REGFORM_TIPO) == $option ? 'selected' : '' }}>
                                    {{ ucfirst($option) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="configuracion">Configuración:</label>
                        <select class="form-control" name="configuracion[]">
                            @foreach (['obligatorio', 'opcional'] as $option)
                                <option value="{{ $option }}"
                                    {{ old("configuracion.$index", $regform->REGFORM_CONFIGURACION) == $option ? 'selected' : '' }}>
                                    {{ ucfirst($option) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <button type="button" class="btn btn-danger" onclick="eliminarCampo(this)">Eliminar</button>
                    </div>
                </div>
                <br>
            @endforeach

            <br>
            <div>
                <button type="button" class="btn btn-primary" onclick="agregarCampo()">Añadir</button>
                <button type="submit" class="btn btn-success">Actualizar</button>
                <button id="cancelar" type="button" class="btn btn-danger">Cancelar</button>
            </div>
        </form>
    </div>

    <script>
        var primerClic = true;

        function mostrarFormulario() {
            if (primerClic) {
                document.getElementById('formularioRegistro').submit();
            } else {
                window.location.href = '{{ route('editarFormulario', ['eventoId' => $evento->EVENTO_ID]) }}';
            }
            primerClic = false;

            function agregarCampo() {
                var filaOriginal = document.querySelector('.form-row');
                var nuevaFila = filaOriginal.cloneNode(true);

                // Agrega un botón de eliminar a la nueva fila
                var botonEliminar = document.createElement('button');
                botonEliminar.type = 'button';
                botonEliminar.className = 'btn btn-danger';
                botonEliminar.innerText = 'Eliminar';
                botonEliminar.onclick = function() {
                    eliminarCampo(this);
                };

                nuevaFila.appendChild(botonEliminar);

                document.getElementById('camposAdicionales').appendChild(nuevaFila);
            }

            // Función para eliminar la fila correspondiente
            function eliminarCampo(botonEliminar) {
                var fila = botonEliminar.parentNode.parentNode;
                fila.parentNode.removeChild(fila);
            }
        }
    </script>

    <script>
        $('#eventoC').on('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: "¿Estas seguro de registrar la información?",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Registrar",
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
                title: "¿Estas Seguro que deseas salir?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si",
                cancelButtonText: "Cancelar",
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/misEventos';
                }
            });
        });
    </script>
@endsection
