<?php
include_once '../Model/categoria.class.php';
$categorias = Categoria::obtenerTodas();
?>

<form name="formAltaPregunta" action="../Controller/pregunta.controller.php" method="POST">
    <input type="hidden" name="operacion" value="guardar" />

    <label>Pregunta:</label>
    <input type="text" name="pregunta" required />

    <label>Categoría:</label>
    <select name="categoria_id" required>
        <option value="">-Seleccionar Categoría-</option>
        <?php foreach ($categorias as $categoria): ?>
            <option value="<?= $categoria['id'] ?>"><?= htmlspecialchars($categoria['nombre']) ?></option>
        <?php endforeach; ?>
    </select>

    <input type="submit" value="Aceptar" />
</form>