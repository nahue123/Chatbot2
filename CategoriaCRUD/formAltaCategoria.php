<form name="formAltaCategoria" action="../Controller/categoria.controller.php" method="POST">
    <input type="hidden" name="operacion" value="guardar" />
    <label> Categoria: </label>
    <input type="text" name="nombre" required />
    <input type="submit" value="Aceptar" />
</form>