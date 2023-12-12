@extends('layout/plantilla')

@section('formGenerado')
    <div class="container">
        <center>
            <h2>Formulario Generado de {{ $evento->EVENTO_NOMBRE}}</h2>
        </center>

        <form action="{{ route('procesarFormularioGenerado', ['eventoId' => $evento->EVENTO_ID]) }}" method="post">
            @csrf

            @foreach ($formularios as $regform)
                <div class="form-group">
                    <label for="{{ $regform->REGFORM_NOMBRE }}">{{ $regform->REGFORM_NOMBRE }}</label>
                    <input type= "{{ $regform->REGFORM_TIPO }}" name="{{ $regform->REGFORM_NOMBRE }}" class="form-control"
                        {{ $regform->REGFORM_CONFIGURACION == 'obligatorio' ? 'required' : '' }}>
                </div>
            @endforeach

            <button type="submit" class="btn btn-success">Enviar</button>
            <button type="submit" class="btn btn-success" >Añadir</button>
        </form>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var form = document.querySelector('form');

            form.addEventListener('submit', function(event) {
                var formElements = form.elements;
                for (var i = 0; i < formElements.length; i++) {
                    var element = formElements[i];
                    var regformTipo = obtenerTipoDeCampo(element.name);

                    if (regformTipo) {
                        element.type = regformTipo;
                    }

                    if (element.required && element.required !== 'required') {

                    } else {
                        var regformConfiguracion = obtenerConfiguracionDeCampo(element.name);
                        element.required = (regformConfiguracion === 'obligatorio');
                    }
                }
            });

            function obtenerTipoDeCampo(nombre) {

                switch (nombre) {
                    case 'texto':
                        return 'text';
                    case 'numeral':
                        return 'number';
                    case 'correo':
                        return 'email';
                    case 'enlace':
                        return 'url';
                    case 'talla_ropa':
                        return 'text';
                    case 'imagen':
                        return 'image';
                    case 'fecha':
                        return 'date';
                    default:
                        return null;
                }
            }

            function obtenerConfiguracionDeCampo(nombre) {
                var regform = @json($formularios->keyBy('REGFORM_NOMBRE')->toArray());
                return (regform[nombre] && regform[nombre].REGFORM_CONFIGURACION) || null;
            }
        });
    </script>
@endsection
