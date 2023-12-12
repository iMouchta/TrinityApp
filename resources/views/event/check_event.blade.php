@extends('layout/plantilla')

@section('contacto')
    <div class="container">
        <div class="row ">
            <div class="col-lg-12 text-center">
                <h3>Editar Evento</h3>
            </div>

            <input value={{$event->EVENTO_ID}}  hidden  id="EVENTO_ID"> 
            <div class="col-lg-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="editRegistro" required>
                    <label class="form-check-label" for="invalidCheck">
                       Editar Registro de Evento
                    </label>
                    <div class="invalid-feedback">
                      You must agree before submitting.
                    </div>
                  </div>
              
            </div>
            <div class="col-lg-4">
                <div class="form-check">
                
                    <input class="form-check-input" type="checkbox" value="" id="editAfiche" required>
                    <label class="form-check-label" for="invalidCheck">
                       Editar Afiche
                    </label>
                
                  </div>
              
            </div> 
            <div class="col-lg-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="idContacto" required>
                    <label class="form-check-label" for="invalidCheck">
                       Editar Contacto
                    </label>
                    <div class="invalid-feedback">
                      You must agree before submitting.
                    </div>
                  </div>
              
            </div> 
            
        </div>
        <div class="row"> 
        </div> 
    </div>
    <script>

        

        document.querySelector("#editRegistro").addEventListener('change', (event) => {
            if (event.target.checked) {
                var input = document.getElementById("EVENTO_ID");
                var valor = input.value;
              var url = 'http://127.0.0.1:8000/checkEdit/'+valor;
           
                    
                console.log(url);
                window.location.href = url;
             
            document.body.style.background = "#2E2E2E";
            } else {
            document.body.style.background = "";
            }
        })


        
        document.querySelector("#editAfiche").addEventListener('change', (event) => {
            if (event.target.checked) {
                var input = document.getElementById("EVENTO_ID");
                var valor = input.value;
              var url = 'http://127.0.0.1:8000/checkAfiche/'+valor;
           
                    
                console.log(url);
                window.location.href = url;
             
            document.body.style.background = "#2E2E2E";
            } else {
            document.body.style.background = "";
            }
        })


        
        document.querySelector("#idContacto").addEventListener('change', (event) => {
            if (event.target.checked) {
                var input = document.getElementById("EVENTO_ID");
                var valor = input.value;
              var url = 'http://127.0.0.1:8000/checkContacto/'+valor;
           
                    
                console.log(url);
                window.location.href = url;
             
            document.body.style.background = "#2E2E2E";
            } else {
            document.body.style.background = "";
            }
        })


        (() => {
        'use strict'
        const forms = document.querySelectorAll('.needs-validation')
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
            }, false)
        })
        })()
    </script>


@endsection