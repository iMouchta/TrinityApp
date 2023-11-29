@extends('layout/plantilla')

@section('imagen')
    <div class="container">
        <form action="{{ route('save.asginar') }}" method="POST" enctype="multipart/form-data"
            class="row g-3 needs-validation" novalidate>
            @csrf
            <h1>
                <center>Asignar Patrocinador y Organizador</center>
            </h1>
            
            <input hidden value="{{$evento->EVENTO_ID}}" name="EVENTO_ID"> 
            <div class="mb-3">
                <label for="evento_id" class="form-label">Asignar patrocinador:</label>
                <select class="form-control" id="SPONSOR_ID" name="SPONSOR_ID">
                    @foreach ($patornacidor as $pt)
                        <option value="{{$pt->SPONSOR_ID}}">{{ $pt->SPONSOR_NOMBRE }} {{ $pt->SPONSOR_ID }}</option>
                    @endforeach
                </select>
            </div>
            

            <div class="mb-3">

                <label for="evento_id" class="form-label">Asignar organizador:</label>
                <select class="form-control" id="ORGANIZADOR_ID" name="ORGANIZADOR_ID">
                    @foreach ($organizador as $or)
                        <option value="{{ $or->ORGANIZADOR_ID }}">{{ $or->ORGANIZADOR_NOMBRE }}</option>
                    @endforeach
                </select>
            </div>


            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

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
        $('#formulario').on('submit', function(e) {
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
                confirmButtonText: "Si, salir del registro",
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

