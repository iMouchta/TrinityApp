@extends('layout/plantilla')

@section('contacto')
    <div class="container">
    <form action="{{ route('guardarContacto') }}" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>  
            @csrf
            <h1><center>Registrar Usuario</center></h1>
           
            <div class="mb-3 position-relative w-100">
                <label for="CONTACTO_NOMBRE" class="form-label">Nombre de  coach:</label>
                <input type="text" class="form-control" name="CONTACTO_NOMBRE" value="{{ old('CONTACTO_NOMBRE') }}" placeholder="Ingrese el nombre" required
                minlength="3" maxlength="100">
                    <div class="valid-feedback">Nombre válido</div>
                    <div class="invalid-feedback">Use un nombre de "minimo de 3 caracteres"</div>
            </div>
          
            
            <div class="mb-3 position-relative w-100">
                <label for="CONTACTO_EMAIL" class="form-label">Email del coach:</label>
                <input type="email" class="form-control" name="CONTACTO_EMAIL" value="{{ old('CONTACTO_EMAIL') }}" placeholder="Ingrese el correo">
                <div class="valid-feedback">Campo válido</div>
                <div class="invalid-feedback">Use un correo válido</div>
            </div>

            <div class="mb-3 position-relative w-25">
                <label for="CONTACTO_NUMERO" class="form-label">Nombre del participante:</label>
                <input type="text" class="form-control" value="{{ old('CONTACTO_NUMERO') }}"  placeholder="Ingrese el nombre" required
                >
                    <div class="valid-feedback">Nombre válido</div>
                    <div class="invalid-feedback">Use un nombre valido"</div>
            </div>
            
            <center>
                <button type="submit" class="btn btn-primary">Registrar</button>
                <button id="cancelar" type="button" class="btn btn-danger">Salir</button>
            </center>
        </form>
    </div>
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
    $('#formulario').on('submit' ,function(e){ 
        e.preventDefault(); 
        Swal.fire({
        title: "¿Estas seguro de registrar la información?",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Registrar" ,
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
                window.location.href = '/';
            }
            });
        }
        });
    })

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
@endsection
