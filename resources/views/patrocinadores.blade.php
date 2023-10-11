@extends('layout/plantilla')

@section('patrocinadores')
<div class="container">
<div class="row">
    <form>
        <h1><center>CREAR PATROCINADOR</center></h1>  
            <div class="row">
                <div class="col">
                    <label for="formGroupExampleInput">Nombre:</label>
                    <input type="text" class="form-control" placeholder="Ingrese el nombre del evento">
                </div>
                <div class="col">
                    <label for="formGroupExampleInput2">Direccion:</label>
                    <input type="text" class="form-control" placeholder="Ingrese la direccion">
                </div>
            </div>



            <div class="form-group">
                <label for="formGroupExampleInput">Imagenes del Esponsor:</label>
                <div class="drop-container" id="dropArea">
                    <center>Arrastra y suelta archivos aquí.</center>
                </div>
                <div id="fileList">
                    <p>Archivos seleccionados:</p>
                    <ul></ul>
                    <p class="center"><input   type="submit" value="Subir archivo"></p>
                </div>
                <script src="manejador.js"></script>
            </div>

        

        <div class="botones">
            <button class="reject-button">Cancelar</button>
            <button class="accept-button">Registrar</button>
        </div>
    </form>
</div>
</div>
@endsection