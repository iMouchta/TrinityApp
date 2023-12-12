@extends('layout/plantilla')

@section('contacto')
    <div class="container">
        <div class="row ">
            <div class="col-lg-12 text-center">
                <h3>Editar Afiche</h3>
            </div>
         </div>
        <form  action="{{ route('updateAfiche') }}" method="post"  enctype="multipart/form-data" class="row g-3 needs-validation">
            @csrf
            <div class="row align-items-start"> 
            <div class="col-lg-4 ">

                <input hidden  name="evento_id" value={{$evento->EVENTO_ID}}>
                <div class="">
                    <label for="evento_id" class="form-label">Seleccionar Evento:</label>
                    <select disabled class="form-control" id="evento_id" name="evento_id" required>
                        <option value="" disabled selected>Selecciona un evento</option>
                        @foreach ($eventos as $event)
                            <option value="{{ $event->EVENTO_ID }}"
                                @if("$event->EVENTO_ID" == $evento->EVENTO_ID) selected @endif 
                                >{{$event->EVENTO_NOMBRE}}</option>
                        @endforeach
                    </select>
                </div>   
            </div>
        </div> 
        <div class="row align-items-start"> 
            <div class="col-lg-4 ">
                <div class="">
                    <label for="evento_id" class="form-label">Banner:...........</label>
                    <input type="file" name="banner">
                </div>   
            </div>
        </div> 
        <div class="row align-items-start"> 
            <div class="col-lg-4" >
                <div class="">
                    <label for="evento_id" class="form-label">Afiche Oficial del evento:</label>
                    <input type="file" name="afiche">
                </div>   
            </div>
        </div> 
        <div class="row align-items-start"> 
            <div class="col-lg-4">
                <div class="">
                    <label for="evento_id" class="form-label">Imagenes diversas:</label>
                    <input type="file"  name="imagenesDiversas[]">
                </div>   
            </div>
        </div> 
         

        <div class="row align-items-start"> 
            <div class="col-lg-4">
                <div class="">
                    <label for="evento_id" class="form-label">Seleccionar Evento:</label>
                    <input type="file">
                </div>   
            </div>
        </div> 
        <br>
        <div class="row align-items-start"> 
            <div class="col-lg-1">
                <button type="submit" class="btn btn-primary">Actualizar </button>
            </div>
            <div class="col-lg-6">
                <a class="btn btn-danger">Salir</a>
            </div>
        </div> 
        </form>
        </div> 
    </div>
    <script>

  
    </script>


@endsection