@extends('layout/plantilla')

@section('sponsor')
    <div class="container">
        <form  id="formulario" action="{{ route('guardarSponsor') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h1><center>Registrar Sponsor</center></h1>
            <div class="mb-3">
                <label for="SPONSOR_NOMBRE" class="form-label">Nombre del Sponsor:</label>
                <input type="text" class="form-control" name="SPONSOR_NOMBRE" required>
            </div>

            <div class="mb-3">
                <label for="SPONSOR_ENLACE" class="form-label">Enlace del Sponsor:</label>
                <input type="text" class="form-control" name="SPONSOR_ENLACE">
            </div>

            <div class="mb-3">
                <label for="SPONSOR_LOGO" class="form-label">Logo del Sponsor:</label>
                <input type="file" class="form-control" name="SPONSOR_LOGO">
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
        </form>
    </div>
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

