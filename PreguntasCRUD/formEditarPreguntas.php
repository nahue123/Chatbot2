<link rel="stylesheet" href="formEditarPreguntas.css">
<?php
include_once "../Model/pregunta.class.php";

if(isset($_GET["id"])){
    $pregunta = Pregunta::obtenerPorId($_GET["id"]);
    if ($pregunta) {
?>
    <h2 class="TituloEditar">Editar Pregunta</h2>
    <form name="formEditarPregunta" action="../Controller/pregunta.controller.php" method="POST">
        <input type="hidden" name="operacion" value="actualizar" />
        <label>Id</label>
        <input type="text" name="id" value="<?= $pregunta->getId(); ?>" readonly />
        
        <label>Pregunta</label>
        <input type="text" name="pregunta" value="<?= htmlspecialchars($pregunta->getPregunta()); ?>" required />
        
        <label>Categoria ID</label>
        <input type="number" name="categoria_id" value="<?= $pregunta->getCategoriaId(); ?>" required />
        
        <input type="submit" value="Aceptar" />
    </form>
    <a href="./listarpreguntas.php">Volver</a>
<?php
    } else {
        echo "No se encontró la pregunta con ese ID.";
    }
} else {
    echo "El ID ingresado no es válido.";
}
?>
