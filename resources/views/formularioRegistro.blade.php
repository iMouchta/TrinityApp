@extends('layout/plantilla')

@section('formularioRegistro')
    <div class="container">
        <center>
            <h2>Generar formulario de registro</h2>
        </center>
        <form action="{{ route('guardarFormulario', ['eventoId' => $evento->EVENTO_ID]) }}" method="post"
            id="formularioRegistro" enctype="multipart/form-data">
            @csrf
            <div class = "row align-items-center">
                <div class ="col">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" name="nombre[]" value="Correo" readonly>
                </div>
                <div class ="col">
                    <label for="tipo">Tipo:</label>
                    <input type="text" class="form-control" name="tipo[]" value="Correo" readonly>
                </div>
                <div class ="col">
                    <label for="configuracion">Configuracion:</label>
                    <input type="text" class="form-control" name="configuracion[]" value="Obligatorio" readonly>
                </div>
                
            </div>

            <div id="camposAdicionales"></div>
            <br>
            <div>
                <button type="button" class="btn btn-primary" onclick="agregarCampo()">Añadir</button>
                <button type="submit" class="btn btn-success" onclick="mostrarFormulario()">Enviar</button>
                <button id="cancelar" type="button" class="btn btn-danger">Cancelar</button>
            </div>

        </form>
    </div>

    <script>
        function mostrarFormulario() {
            if (primerClic) {
                document.getElementById('formularioRegistro').submit();
            } else {}
        }

        function agregarCampo() {
            var nuevaFila = `
            <div class = "row align-items-center">
                <div class ="col">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" name="nombre[]" value="" required>
                </div>
                <div class="col">
                    <label for="tipo">Tipo:</label>
                    <select class="form-control" name="tipo[]" required>
                        <option value="email">Correo</option>
                        <option value="text">Texto</option>
                        <option value="number">Numeral</option>
                        <option value="url">Enlace</option>
                        <option value="text">Talla de ropa</option>
                        <option value="image">Imagen</option>
                    </select>
                </div>
                <div class="col">
                    <label for="configuracion">Configuración:</label>
                    <select class="form-control" name="configuracion[]" required>
                        <option value="obligatorio">Obligatorio</option>
                        <option value="opcional">Opcional</option>
                    </select>
                </div>
                <div class="col text-center" style="padding-top: 2%" >
                    <button type="button" class="btn btn-danger" onclick="eliminarCampo(this)">Eliminar</button>
                </div>
            </div>
          
            `;

            document.getElementById('camposAdicionales').insertAdjacentHTML('beforeend', nuevaFila);
            index++;
        }

        function eliminarCampo(botonEliminar) {
            var fila = botonEliminar.parentNode.parentNode;
            fila.parentNode.removeChild(fila);
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
