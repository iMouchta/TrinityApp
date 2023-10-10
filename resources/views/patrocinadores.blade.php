@extends('layout/plantilla')

@section('patrocinadores')
<div class="container">
<div class="row">
    <form>
        <h1><center>FORMULARIO DE REGISTRO</center></h1>  
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

            <div class="row">
                <div class="col">
                    <label for="formGroupExampleInput">Modalidad:</label>
                    <select id="inputState" class="form-control">
                        <option selected>Presencial</option>
                        <option >Virtual</option>
                    </select>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <label for="formGroupExampleInput">Fecha de Inicio:</label>
                            <div class="col">
                                <input type="date" id="fecha" name="fecha">
                            </div>
                        </div>

                        <div class="col">
                            <label for="formGroupExampleInput">Fecha Final:</label>
                            <div class="col">
                                <input type="date" id="fecha" name="fecha">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <label for="formGroupExampleInput">Tipo de Competencia:</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Individual</option>
                                    <option >Grupal</option>
                                </select>
                        </div>

                        <div class="col">
                        <div class="row">
                            <div class="col">
                                <label for="formGroupExampleInput">Costo:</label>
                                    <select id="inputState" class="form-control">
                                        <option selected>s/n costo</option>
                                        <option >costo</option>
                                    </select>
                            </div>
                            <div class="col">
                                <label for="formGroupExampleInput2">Precio:</label>
                                <input type="text" class="form-control" placeholder="si selecciono un costo, ingrese el costo">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label for="exampleFormControlTextarea1">Descripcion del Evento:</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput">Imagenes del evento:</label>
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

        <div class="form-group">
            <label for="formGroupExampleInput">Requisitos:</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Describa los requisitos para el evento">
        </div>

        <div class="botones">
            <button class="reject-button">Cancelar</button>
            <button class="accept-button">Registrar</button>
        </div>
    </form>
</div>
</div>
@endsection