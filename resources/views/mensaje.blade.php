

<!-- Desde el controlador luego de registrar el mensaje-->
<!--return redirect('vistaX')->with('status', '¡Datos del evento registrado exitosamente!'); -->


<!--Dentro de la vista devuelta-->
@if (session('status'))
<script>
    alert({{session('status')}});
</script>
@endif