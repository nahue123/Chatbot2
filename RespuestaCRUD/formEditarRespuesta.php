<?php
include_once "../Model/respuesta.class.php";

if(isset($_GET["id"])){
    $respuesta = Respuesta::obtenerPorId($_GET["id"]);
    if ($respuesta) {
?>
    <h2 class="TituloEditar">Editar Respuesta</h2>
    <form name="formEditarRespuesta" action="../Controller/respuesta.controller.php" method="POST">
        <input type="hidden" name="operacion" value="actualizar" />
        <label>Id</label>
        <input type="text" name="id" value="<?= $respuesta->getId(); ?>" readonly />
        
        <label>Respuesta</label>
        <input type="text" name="respuesta" value="<?= htmlspecialchars($respuesta->getRespuesta()); ?>" required />
        
        <label>Pregunta ID</label>
        <input type="number" name="pregunta_id" value="<?= $respuesta->getPreguntaId(); ?>" required />
        
        <input type="submit" value="Aceptar" />
    </form>
    <a href="./listarRespuesta.php">Volver</a>
<?php
    } else {
        echo "No se encontró la pregunta con ese ID.";
    }
} else {
    echo "El ID ingresado no es válido.";
}
?>
