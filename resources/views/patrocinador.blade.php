
@extends('layout/plantilla')

@section('patrocinador')
<div class="container">
    <div class="row">
        <form action="{{ route('patrocinador') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <h1><center>Crear patrocinador</center></h1>  
                <div class="row">
                    <div class="col">
                        <label for="formGroupExampleInput">Nombre:</label>
                        <input type="text" class="form-control" placeholder="Ingrese el nombre del evento">
                    </div>
                    <div class="col">
                        <label for="formGroupExampleInput2">Dirección:</label>
                        <input type="text" class="form-control" placeholder="Ingrese la direccion">
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            
                            <label for="formGroupExampleInput">Subir imagen del sponsor:</label>
                                <div class="drop-container" id="dropArea">
                                    <center>Arrastra y suelta la imagen aquí</center>
                                    <center>o</center>
                                    <!-- <input  class="btn btn-primary" type="file" name="file" id="file" value="Selecciona la imagen"> -->
                                    <input type="file" name="file" id="file" style="display: none;">
                                    <div class="centrar-boton"><button class="btn btn-primary" type="button" onclick="document.getElementById('file').click()">Selecciona la imagen</button></div>
                                </div>
                                <div class="btn-group btn-group-toggle mb-3" >
                                <label for="formGroupExampleInput2">Archivos seleccionados:</label>
                                
                                <p id="selectedFile"> </p>
                                </div>
                                <p class="center"><input class="btn btn-success" type="submit" value="Subir Archivo"></p>
                            </div>
                        <script src="{{ asset('upload.js') }}"></script>
                        <div class="col">
                            <label for="formGroupExampleInput">Instrucciones:</label>
                            <p>Nota: Suba una imagen del sponsor en formato jpg, jpng o png; como en el ejemplo siguente de tamaño  700 px * 700 px.</p>
                            <img  src="{{ asset('images/patrocinio.jpg')}}"  width="442" height="315" alt="">
                        </div>
                    </div>          
                </div>

                <div class="botones">
                    <button class="accept-button" class="btn btn-success" type="submit">Registrar</button>
                    <button class="reject-button">Cancelar</button>
                </div>
        </form>
    </div>    
</div>
<br>
@endsection