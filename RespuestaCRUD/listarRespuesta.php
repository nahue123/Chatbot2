<link rel="stylesheet" href="listarRespuesta.css">
<?php
require_once("../Model/respuesta.class.php");
$respuesta = Respuesta::obtenerTodas();
?>
<h2 style="text-align: center;">Listado de Respuestas</h2>
<div style="text-align: center; margin-bottom: 10px;">
    <a href="formAltaPreguntas.php"> + Nueva Respuesta </a>
</div>
<table>
    <tr>
        <th>ID</th>
        <th>Respuesta</th>
        <th>Pregunta</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($respuesta as $respuesta): ?>
        <tr>
            <td><?= $respuesta['id'] ?></td> 
            <td><?= $respuesta['respuesta'] ?></td> 
            <td><?= $respuesta['pregunta_id'] ?></td> 
            <td>
                <a href="formEditarRespuesta.php?id=<?= $respuesta['id'] ?>">Editar</a>
                <form action="../Controller/respuesta.controller.php" method="POST" style="display:inline;">
                    <input type="hidden" name="operacion" value="eliminar" />
                    <input type="hidden" name="id" value="<?= $respuesta['id'] ?>">
                    <button type="submit" onclick="return confirm('¿Seguro que querés eliminar esta respuesta?')">Eliminar</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>