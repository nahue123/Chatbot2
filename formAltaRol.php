<!-- Formulario para crear un nuevo rol -->
<form name="formAltaRol" action="./Controller/rol.controller.php" method="POST">
    
    <!-- Campo oculto que indica la operación a realizar en el controlador -->
    <input type="hidden" name="operacion" value="guardar" />

    <!-- Etiqueta y campo de texto para ingresar el nombre del nuevo rol -->
    <label> Nombre: </label>
    <input type="text" name="nombre" />

    <!-- Botón para enviar el formulario -->
    <input type="submit" value="Aceptar" />
</form>