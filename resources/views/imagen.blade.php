@extends('layout/plantilla')

@section('imagen')
    <div class="container">
        <form id="formulario" action="{{ route('guardarImagen') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h1><center>Registar Afiche</center></h1>
            <div class="mb-3">
                <label for="evento_id" class="form-label">Seleccionar Evento:</label>
                <select class="form-control" id="evento_id" name="evento_id">
                    @foreach ($eventos as $evento)
                        <option value="{{ $evento->EVENTO_ID }}">{{ $evento->EVENTO_NOMBRE }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="banner" class="form-label">Banner:</label>
                <input type="file" class="form-control" id="banner" name="banner">
            </div>

            <div class="mb-3">
                <label for="icono" class="form-label">Icono del evento:</label>
                <input type="file" class="form-control" id="icono" name="icono">
            </div>

            <div class="mb-3">
                <label for="afiche" class="form-label">Afiche oficial del evento:</label>
                <input type="file" class="form-control" id="afiche" name="afiche">
            </div>

            <div class="mb-3">
                <label for="imagenesDiversas" class="form-label">Imágenes diversas:</label>
                <input type="file" class="form-control" id="imagenesDiversas" name="imagenesDiversas[]" multiple>
            </div>
            <center>
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button id="cancelar" type="button" class="btn btn-danger">Salir</button>
            </center>
        </form>
    </div>
    <br>
@endsection

@section('scripts')
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
                window.location.href = '/welcome';
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
            window.location.href = '/welcome';
        }
        });
    });
</script>
@endsection
