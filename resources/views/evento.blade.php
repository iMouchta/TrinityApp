@extends('layout/plantilla')

@section('evento')

<div class="container">
    <div class="row">
        <form>
            <h1><center>Crear evento</center></h1>  
            <div class="row">
                <div class="col">
                    <label for="formGroupExampleInput">Nombre:</label>
                    <input type="text" class="form-control" placeholder="Ingrese el nombre del evento">                 
                </div>
                
                <div class="col">


                            <label for="tipoEvento">Tipo de evento:</label>
                                <select id="tipoEvento" class="form-control">
                                    <option selected></option>
                                    <option value ="Competecnia">Competencia</option>
                                    <option value ="Entrenamiento">Entrenamiento</option>
                                    <option value="otroEvento">Otro</option>
                                 </select>
                                        <br>
                                    <input type="text" id="otroE" class="form-control" style="display: none;" placeholder="Especifica la otra opción">
                                    <script>
                                            document.getElementById("tipoEvento").addEventListener("change", function () {
                                                var otroeInput = document.getElementById("otroE");
                                                if (this.value === "otroEvento") {
                                                    otroeInput.style.display = "block";
                                                } else {
                                                    otroeInput.style.display = "none";
                                                }
                                            });
                                        </script>
                   
                </div>




            

            </div>

            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <label for="formGroupExampleInput">Modalidad:</label>
                            <select id="inputState" class="form-control">
                                <option selected>Presencial</option>
                                <option >Virtual</option>
                            </select>
                        </div>

                        <div class="col">
                            <label for="formGroupExampleInput2">Dirección:</label>
                            <input type="text" class="form-control" placeholder="Ingrese la direccion">
                        </div>

                                        <label for="formGroupExampleInput">Subir imagen de la ubicaion :</label>
                                        <div class="drop-container" id="dropArea">
                                            <center>Arrastra y suelta la imagen aquí</center>
                                            <center>o</center>
                                            <div class="centrar-boton"><input  class="btn btn-primary" type="submit" value="Selecciona la imagen"></div>
                                        </div>
                                        <div id="fileList">
                                            <p>Archivos seleccionados:</p>
                                            <ul></ul>
                                            <p class="center"><input class="btn btn-success" type="submit" value="Ver imagen"></p>
                                        </div>
                                        <script src="manejador.js"></script>                                                                                    
                     
                                        <div class="col">
                            
                                <br>                                                                
                        </div>
                    </div>
                </div>

                <div class="col">
                    <label for="formGroupExampleInput">Instrucciones:</label>
                    <p>Nota: Suba una imagen de la ubicación en formato jpg, jpng o png; como en el ejemplo siguente de tamaño  700 px * 700 px.</p>
                    <img  src="{{ asset('images/croquis.jpg')}}"  width="442" height="300" alt="">
                </div>
            </div>        
           
            <div class="form-group">
                <div class="col">
                    <div class="row">
                        <div class="col">
                      
                      
                      
                        <label for="tipoDeCompetencia">Tipo de Competencia:</label>
                            <select id="tipoDeCompetencia" class="form-control">
                                <option selected></option>
                                <option value ="Individual" >Individual</option>
                                <option value ="Grupal" >Grupal</option>
                             
                            </select>
                           
                            </script>



                        </div>

                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <label for="costos">Costo:</label>
                                        <select id="costos" class="form-control">
                                        <option selected></option>
                                            <option value="sinCosto">sin costo</option>
                                            <option value= "costo">con costo</option>
                                        </select>
                               </div>

                                <div class="col">
                                            <label id="labelcosto" style="display: none;" >Costo del evento:</label>
                                            <input type="number" id="costo" class="form-control" style="display: none;" placeholder="costo del evento">
                                            <script>
                                            document.getElementById("costos").addEventListener("change", function () {
                                                var costoInput = document.getElementById("costo");
                                                var labelInput = document.getElementById("labelcosto");
                                                if (this.value === "costo") {

                                                    costoInput.style.display = "block";
                                                    labelInput.style.display = "block";
                                                } else {
                                                    costoInput.style.display = "none";
                                                    labelInput.style.display = "none";
                                                }
                                            });
                                        </script>



                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            <div class="form-group">
                        <label for="descripcion">Descripción del Evento:</label>
                        <textarea class="form-control" id="descripcion" rows="3" style="resize: none;"></textarea>
                    </div>

            <div class="form-group">
                <label for="requisitos">Requisitos:</label>
                <input type="text" class="form-control" id="requisitos" placeholder="Describa los requisitos para el evento">
            </div>

            <div class="form-group">
                <label for="bases">Bases del Evento:</label>
                <textarea class="form-control" id="bases" rows="3"  style="resize: none;" ></textarea>
            </div>

            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="col">
                                <br>
                                <label for="formGroupExampleInput">Subir imagen del afiche:</label>
                                <div class="drop-container" id="dropArea">
                                    <center>Arrastra y suelta la imagen aquí</center>
                                    <center>o</center>
                                    <div class="centrar-boton"><input  class="btn btn-primary" type="submit" value="Selecciona la imagen"></div>
                                </div>
                                <div id="fileList">
                                    <p>Archivos seleccionados:</p>
                                    <ul></ul>
                                    <p class="center"><input class="btn btn-success" type="submit" value="Ver imagen"></p>
                                </div>
                                <script src="manejador.js"></script>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <br>
                    <label for="instruciones">Instrucciones:</label>
                    <p>Nota: Suba la imagen del afiche en formato jpg, jpng o png; como en el ejemplo siguente de tamaño  700 px * 700 px.</p>
                    <img  src="{{ asset('images/afiche.png')}}"  width="442" height="300" alt="">
                </div>
            </div>
        
            <div class="row">
                <label for="formGroupExampleInput">Cronograma de actividades:</label>
                <div class="col">
                    <ul class="list-group">

                        <li class="list-group-item">
                            <div class="actividad">
                                <div class="actividad-izquierdo">
                                    <input type="text" class="form-control" style="width: 100%;"placeholder="Inicio">
                                </div>  
                                <div class="actividad-derecho">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <input class="btn btn-outline-primary btn-sm" type="date" id="fecha" name="fecha">
                                        <button type="button" class="btn btn-danger">Eliminar</button>
                                    </div>
                                </div>   
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="actividad">
                                <div class="actividad-izquierdo">
                                    <input type="text" class="form-control" style="width: 100%;"placeholder="Fase 1">
                                </div>  
                                <div class="actividad-derecho">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <input class="btn btn-outline-primary btn-sm" type="date" id="fecha" name="fecha">
                                        <button type="button" class="btn btn-danger">Eliminar</button>
                                    </div>
                                </div>   
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="actividad">
                                <div class="actividad-izquierdo">
                                    <input type="text" class="form-control" style="width: 100%;"placeholder="Fase 2">
                                </div>  
                                <div class="actividad-derecho">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <input class="btn btn-outline-primary btn-sm" type="date" id="fecha" name="fecha">
                                        <button type="button" class="btn btn-danger">Eliminar</button>
                                    </div>
                                </div>   
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="actividad">
                                <div class="actividad-izquierdo">
                                    <input type="text" class="form-control" style="width: 100%;"placeholder="Fase 3">
                                </div>  
                                <div class="actividad-derecho">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <input class="btn btn-outline-primary btn-sm" type="date" id="fecha" name="fecha">
                                        <button type="button" class="btn btn-danger">Eliminar</button>
                                    </div>
                                </div>   
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="actividad">
                                <div class="actividad-izquierdo">
                                    <input type="text" class="form-control" style="width: 100%;"placeholder="Fase 4">
                                </div>  
                                <div class="actividad-derecho">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <input class="btn btn-outline-primary btn-sm" type="date" id="fecha" name="fecha">
                                        <button type="button" class="btn btn-danger">Eliminar</button>
                                    </div>
                                </div>   
                            </div>
                        </li>
                        
                        <li class="list-group-item">
                            <div class="actividad">
                                <div class="actividad-izquierdo">
                                    <input type="text" class="form-control" style="width: 100%;"placeholder="Ingrese el nombre del evento  ">
                                </div>  
                                <div class="actividad-derecho">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <input class="btn btn-outline-primary btn-sm" type="date" id="fecha" name="fecha">
                                        <button type="button" class="btn btn-success">Agregar</button>
                                    </div>
                                </div>   
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="botones">
                <button class="accept-button">Registrar</button>
                <button class="reject-button">Cancelar</button>
            </div>    
        </form>
    </div>
</div>
<br>
@endsection

