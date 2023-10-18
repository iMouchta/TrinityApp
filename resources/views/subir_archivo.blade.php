@extends('layout/plantilla')

@section('subir_archivo')
    <form action="{{ route('patrocinador') }}" method="POST" enctype="multipart/form-data">
    <div class="row">
                                <label for="formGroupExampleInput2">Subir Afiche</label>
                                <div class="col">
                                    <input type="file" name="file" id="file" style="display: none;">
                                    <button class="btn btn-primary" type="button" onclick="document.getElementById('file').click()">Selecciona la imagen</button>
                                </div>
                                
                                <label for="formGroupExampleInput2">Archivos seleccionados:</label>
                                <p id="selectedFile"> </p>

                                <p class="center"><input class="btn btn-success" type="submit" value="Subir Archivo"></p>
                            </div>
                            </form>
@endsection