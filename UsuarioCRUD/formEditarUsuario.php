<?php
include "../Model/usuario.class.php";


if(isset($_GET["id"])){
    $usuario = Usuario::obtenerPorId($_GET["id"]);
?>
    <h2>Editar Rol</h2>
    <form name="formEditarUsuario" action="../Controller/usuario.controller.php" method="POST">
        <input type="hidden" name="operacion" value="actualizar" />
        <label> Id </label>
        <input type="text" name="id" value="<?=$usuario->getId();?>" readonly />
        <label> nombre </label>
        <input type="text" name="nombre" value="<?=$usuario->getNombre();?>" />
        <label> email </label>
        <input type="text" name="email" value="<?=$usuario->getEmail();?>" />
        <label> password </label>
        <input type="text" name="password" value="<?=$usuario->getPassword();?>" />
        <label> rol_id </label>
        <input type="text" name="rol_id" value="<?=$usuario->getRol_id();?>" />
        <input type="submit" value="Aceptar" />
    </form>
<?php
    print "<a href='./listarusuario.php'>Volver</a>";
}else{
    print "El ID ingresado no es valido";
}
?>