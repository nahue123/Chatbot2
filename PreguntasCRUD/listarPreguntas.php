<link rel="stylesheet" href="listarPreguntas.css">
<?php
require_once("../Model/pregunta.class.php");
$pregunta = Pregunta::obtenerTodos();
?>
<h2 style="text-align: center;">Listado de Preguntas</h2>
<div style="text-align: center; margin-bottom: 10px;">
    <a href="formAltaPreguntas.php"> + Nueva Pregunta </a>
</div>
<table>
    <tr>
        <th>ID</th>
        <th>Pregunta</th>
        <th>Categoría</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($pregunta as $pregunta): ?>
        <tr>
            <td><?= $pregunta['id'] ?></td> 
            <td><?= $pregunta['pregunta'] ?></td> 
            <td><?= $pregunta['categoria_id'] ?></td> 
            <td>
                <a href="formEditarPreguntas.php?id=<?= $pregunta['id'] ?>">Editar</a>
                <form action="../Controller/pregunta.controller.php" method="POST" style="display:inline;">
                    <input type="hidden" name="operacion" value="eliminar" />
                    <input type="hidden" name="id" value="<?= $pregunta['id'] ?>">
                    <button type="submit" onclick="return confirm('¿Seguro que querés eliminar esta pregunta?')">Eliminar</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>