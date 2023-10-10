@extends('layout/plantilla')

@section('titulo', 'TrinityApp')

@section('contenido')
    <br>
    <div class="card" style="width: 100%;">
        <div class="card-body">
            <h5 class="card-title">Pagina de inicio</h5>
            <p class="card-text">Desarrollo en progreso, se mostraran todos los eventos a continuacion
                funcionalidad para registrar nuevo evento ya realizado</p>
            <a href="{{ route('Evento.create') }}" class="btn btn-primary">Registrar Evento</a>
        </div>
    </div>

    <br>
    @foreach ($datos as $item)
    <?php /*$x = $item->USUARIOS; 
          $y = "false";
          if ($x > 0){
            $y ="true";
          }
    */?>
        <div class="card" style="width: 20%;">
            <div class="card-body">
                <h5 class="card-title">{{ $item->TITULO }}</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"> {{ $item->NOMBRE }}</li>
                    <li class="list-group-item">{{ $item->MODALIDAD }}</li>
                </ul>
            </div>
        </div>
    @endforeach
    </div>
@endsection
