<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/hoja.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>@yield('titulo')</title>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar navbar-dark " style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <a class="navbar-brand" href="/"> Logo </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown" style="margin-right: 10px;">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Evento</a>

                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('evento') }}">Crear Evento</a></li>
                            <li><a class="dropdown-item" href="{{ route('misEventos') }}">Todos los Eventos</a></li>
                            <li><a class="dropdown-item" href="{{ route('eventoDetalle') }}">Ver eventos a detalle</a></li>
                        </ul>
                    </li>
                    <li class="nav-item" style="margin-right: 10px;">
                        <a class="nav-link active" aria-current="page" href="{{ route('imagen') }}">Registrar Afiche</a>
                    </li>
                    <li class="nav-item" style="margin-right: 10px;">
                        <a class="nav-link active" aria-current="page" href="{{ route('sponsor') }}">Registrar Sponsor</a>
                    </li>
                    <li class="nav-item" style="margin-right: 10px;">
                        <a class="nav-link active" aria-current="page" href="{{ route('organizador') }}">Registrar Organizador</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Busqueda ..." aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
            </div>
        </div>
    </nav>

    @yield('welcome')
    @yield('evento')
    @yield('misEventos')
    @yield('imagen')
    @yield('sponsor')
    @yield('organizador')
    @yield('eventoDetalle')

    <footer class="bg-white text-white text-center py-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h5>Síguenos en las redes sociales</h5>
                    <div class="social-icons">
                        <a href="https://www.facebook.com/UmssBolOficial/"
                            class="btn btn-outline-white text-white btn-social">
                            <i class="fab fa-facebook-f"></i> Facebook
                        </a>
                        <a href="#" class="btn btn-outline-white text-white btn-social">
                            <i class="fab fa-twitter"></i> Twitter
                        </a>
                        <a href="#" class="btn btn-outline-white text-white btn-social">
                            <i class="fab fa-instagram"></i> Instagram
                        </a>
                        <a href="#" class="btn btn-outline-white text-white btn-social">
                            <i class="fab fa-linkedin-in"></i> LinkedIn
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
