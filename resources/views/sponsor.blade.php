@extends('layout/plantilla')

@section('sponsor')
    <div class="container">
        <form action="{{ route('guardarSponsor') }}" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
            @csrf
            <h1><center>Registrar Sponsor</center></h1>
            <div class="mb-3">
                <label for="SPONSOR_NOMBRE" class="form-label">Nombre del Sponsor:</label>
                <input type="text" class="form-control" name="SPONSOR_NOMBRE" placeholder="Ingrese el nombre" required minlength="3" maxlength="100">
                <div class="valid-feedback">Nombre válido</div>    <!--tooltip -->
                <div class="invalid-feedback">Use un nombre de "minimo de 3 caracteres"</div>
            </div>

            <div class="mb-3">
                <label for="SPONSOR_ENLACE" class="form-label">Enlace del Sponsor:</label>
                <input type="url" class="form-control" name="SPONSOR_ENLACE" placeholder="Ingrese la Url" required>
                <div class="valid-feedback">Url válido</div>
                <div class="invalid-feedback">Use una url valida"</div>
            </div>

            <div class="mb-3">
                <label for="SPONSOR_LOGO" class="form-label">Logo del Sponsor:</label>
                <input type="file" class="form-control" name="SPONSOR_LOGO" required>
                <div class="valid-feedback">Sponsor válido</div>
                <div class="invalid-feedback">Use una imagen valida"</div>
            </div>

            {{-- <div class="mb-3">
                <label for="eventos" class="form-label">Asignar a Eventos:</label>
                <select name="eventos[]" class="form-control" multiple required>
                    @foreach ($eventos as $evento)
                        <option value="{{ $evento->EVENTO_ID }}">{{ $evento->EVENTO_NOMBRE }}</option>
                    @endforeach
                </select>
            </div> --}}
             
            <center>
                <button type="submit" class="btn btn-primary">Registrar</button>
                <button id="cancelar" type="button" class="btn btn-danger">Salir</button>
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
    </div>
    <br>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
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
