@extends('layout/plantilla')

@section('baja')

<div class="container">
    <form  method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
    @csrf
        <h1><center>Se esta dando de baja</center></h1>
            <div class="mb-3 position-relative w-75">
                <label class="form-label">Nombre:</label>
                <input type="text" class="form-control"  placeholder="Ingrese el nombre" required
                minlength="3" maxlength="100">
                    <div class="valid-feedback">Nombre válido</div>
                    <div class="invalid-feedback">Use un nombre de "minimo de 3 caracteres"</div>
            </div>

            <div class="mb-3 position-relative w-75">
                <label class="form-label">Email:</label>
                <input type="email" class="form-control" placeholder="Ingrese el correo" required>
                <div class="valid-feedback">Campo válido</div>
                <div class="invalid-feedback">Use un correo válido</div>
            </div>

            <div class="mb-3 w-75" >
                <label for="evento_id" class="form-label">Seleccionar Evento:</label>
                <select class="form-control" id="evento_id" name="evento_id">
                    
                </select>
            </div>

            <center>
                <button type="submit" class="btn btn-primary">Darse de baja</button>
                <button id="cancelar" type="button" class="btn btn-danger">Cancelar</button>
            </center>

                @if(session('success'))
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Datos guardados correctamente',
                            text: '{{ session('success') }}',
                            allowOutsideClick: false
                        }).then((result) => {
                            if (result.isConfirmed) {
                            
                            window.location.href = '/';
                            }
                        });
                    </script>
                @endif



    </form>
    <br>
    <script>
        (() => {
        'use strict'
        const forms = document.querySelectorAll('.needs-validation')
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
            }, false)
        })
        })()
    </script>
<script>

    $('#cancelar').on('click', function() {
        Swal.fire({
        title: "¿Estas Seguro que deseas Salir?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, salir del registro" ,
        cancelButtonText: "Cancelar",
        allowOutsideClick: false
        }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '/';
        }
        });
    });
</script>
</div>

@endsection