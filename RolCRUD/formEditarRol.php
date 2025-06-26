<link rel="stylesheet" href="formEditarRol.css">
<?php
include "../Model/rol.class.php";
if(isset($_GET["id"])){
    $rol= Rol::obtenerPorId($_GET["id"]);
?>
    <h2>Editar Rol</h2>
    <form name="formEditarRol" action="../Controller/rol.controller.php" method="POST">
        <input type="hidden" name="operacion" value="actualizar" />
        <label>Id del Rol:</label>
        <input type="text" name="id" value="<?=$rol->getId();?>" readonly />
        <label> Nombre del Rol: </label>
        <input type="text" name="nombre" value="<?=$rol->getNombre();?>" />
        <input type="submit" value="Aceptar" />
    </form>
<?php
    print "<a href='./listarRol.php'>Volver</a>";
}else{
    print "El ID ingresado no es valido";
}
?>