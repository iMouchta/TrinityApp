@extends('layout/plantilla')

@section('registro')

<div class="container">
<div class="row">
    <form>
        <h1><center>CREAR EVENTO</center></h1>  
            <div class="row">
                <div class="col">
                    <label for="formGroupExampleInput">Nombre:</label>
                    <input type="text" class="form-control" placeholder="Ingrese el nombre del evento">
                </div>
                <div class="col">
                <label for="formGroupExampleInput">Tipo de Evento:</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Competencia</option>
                                    <option >Entrenamiento</option>
                                </select>
                    

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
                            <label for="formGroupExampleInput2">Direccion:</label>
                            <input type="text" class="form-control" placeholder="Ingrese la direccion">
                        </div>

                        <div class="col">
                        <label for="formGroupExampleInput2">Subir Direccion:</label>
                        <label for="formGroupExampleInput2">Archivo seleccionado:</label>
                        <button>subir Imagen</button>
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
            <label for="formGroupExampleInput">Requisitos:</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Describa los requisitos para el evento">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Calendarizacion:</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Describa los requisitos para el evento">
        </div>
        <div class="form-group">
        <div class="col">
                <label for="formGroupExampleInput">Anadir Patrocinador:</label>
                                <select id="inputState" class="form-control">
                                    <option selected>patrocinador 1</option>
                                    <option >patrocindor 2</option>
                                </select>
                    

                </div>
                <div class="col">
                
                <label for="formGroupExampleInput2">Subir Afiche:</label>
                        <label for="formGroupExampleInput2">Archivo seleccionado:</label>
                </div>




        </div>
        <div class="botones">
            <button class="reject-button">Cancelar</button>
            <button class="accept-button">Registrar</button>
        </div>
    </form>
</div>
</div>
@endsection

