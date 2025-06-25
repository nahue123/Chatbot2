<link rel="stylesheet" href="formEditarRol.css">
<?php
include "./Model/rol.class.php";
if(isset($_GET["id"])){
    $rol= Rol::obtenerPorId($_GET["id"]);
?>
    <h2>Editar Rol</h2>
    <!-- Formulario para crear un nuevo rol -->
    <form name="formEditarRol" action="./Controller/rol.controller.php" method="POST">
        
        <!-- Campo oculto que indica la operación a realizar en el controlador -->
        <input type="hidden" name="operacion" value="actualizar" />

        <label>Id del Rol:</label>
        <input type="text" name="id" value="<?=$rol->getId();?>" readonly />

        <!-- Etiqueta y campo de texto para ingresar el nombre del nuevo rol -->
        <label> Nombre del Rol: </label>
        <input type="text" name="nombre" value="<?=$rol->getNombre();?>" />

        <!-- Botón para enviar el formulario -->
        <input type="submit" value="Aceptar" />
    </form>
<?php
    print "<a href='./listarRol.php'>Volver</a>";
}else{
    print "El ID ingresado no es valido";
}
?>