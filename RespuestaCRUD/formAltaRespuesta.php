<?php
include_once '../Model/respuesta.class.php';
include_once '../Model/pregunta.class.php';
$preguntas = Pregunta::obtenerTodos();
?>

<form name="formAltaRespuesta" action="../Controller/respuesta.controller.php" method="POST">
    <input type="hidden" name="operacion" value="guardar" />

    <label>Respuesta:</label>
    <input type="text" name="respuesta" required />

    <label>Pregunta:</label>
    <select name="pregunta_id" required>
        <option value="">-Seleccionar Pregunta-</option>
        <?php foreach ($preguntas as $pregunta): ?>
            <option value="<?= $pregunta['id'] ?>"><?= htmlspecialchars($pregunta['pregunta']) ?></option>
        <?php endforeach; ?>
    </select>
    <input type="submit" value="Aceptar" />
</form>