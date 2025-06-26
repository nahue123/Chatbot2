<link rel="stylesheet" href="FormAltaRol.css" />
<form name="formAltaRol" action="../Controller/rol.controller.php" method="POST">
    <input type="hidden" name="operacion" value="guardar" />
    <label> Nombre: </label>
    <input type="text" name="nombre" />
    <input type="submit" value="Aceptar" />
</form>