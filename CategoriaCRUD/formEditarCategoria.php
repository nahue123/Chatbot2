<link rel="stylesheet" href="formEditarRol.css">
<?php
include "../Model/categoria.class.php";
if(isset($_GET["id"])){
    $Categoria= Categoria::obtenerPorId($_GET["id"]);
?>
    <h2> Editar Categoria </h2>
    <form name="formEditarCategoria" action="../Controller/categoria.controller.php" method="POST">
        <input type="hidden" name="operacion" value="actualizar" />
        <label> Id </label>
        <input type="text" name="id" value="<?=$Categoria->getId();?>" readonly />
        <label> Nombre </label>
        <input type="text" name="nombre" value="<?=$Categoria->getNombre();?>" />
        <input type="submit" value="Aceptar" />
    </form>
<?php
    print "<a href='./listarCategoria.php'>Volver</a>";
}else{
    print "El ID ingresado no es valido";
}