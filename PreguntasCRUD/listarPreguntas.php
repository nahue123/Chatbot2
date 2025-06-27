<?php
require_once("../Model/pregunta.class.php");
$preguntas = Preguntas::obtenerTodos();
?>
<h2 style="text-align: center;">Listado de Usuarios</h2>
<div style="text-align: center; margin-bottom: 10px;">
    <a href="formAltaPreguntas.php"> + Nueva Pregunta </a>
</div>
<table>
    <tr>
        <th>ID</th>
        <th>Pregunta</th>
        <th>Categoria</th>
    </tr>
    <?php foreach ($preguntas as $pregunta): ?>
        <tr>
            <td><?= $usuario['id'] ?></td>
            <td><?= $usuario['pregunta'] ?></td>
            <td><?= $usuario['categoria_id'] ?></td>
            <td>
                <a href="formEditarPregunta.php?id=<?= $pregunta['id'] ?>">Editar</a>
                <form action="../Controller/pregunta.controller.php" method="POST" style="display:inline;">
                    <input type="hidden" name="operacion" value="eliminar"/>
                    <input type="hidden" name="id" value="<?= $pregunta['id'] ?>">
                    <button type="submit" onclick="return confirm('¿Seguro que deseas eliminar este usuario?')">Eliminar</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>