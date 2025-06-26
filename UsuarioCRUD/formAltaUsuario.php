<!-- Formulario para crear un nuevo rol -->
<form name="formAltaUsuario" action="../Controller/usuario.controller.php" method="POST">
    
    <!-- Campo oculto que indica la operación a realizar en el controlador -->
    <input type="hidden" name="operacion" value="guardar" />

    <!-- Etiqueta y campo de texto para ingresar el nombre del nuevo rol -->
    <label> nombre </label>
    <input type="text" name="nombre" />

    <label> email </label>
    <input type="text" name="email" />

    <label> password </label>
    <input type="text" name="password" />


    <label> rol_id </label>
    <select name="rol">
        <option value="Rol_Id">nombre</option>
    </select>    

    <!-- Botón para enviar el formulario -->
    <input type="submit" value="Aceptar" />
</form>