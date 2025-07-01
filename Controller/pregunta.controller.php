<?php
include "../Model/pregunta.class.php";

if (isset($_POST['operacion'])) {
    $operacion = $_POST['operacion'];
    $result = false;

    if ($operacion == "guardar") {
        $pregunta = new Pregunta(
            null,
            $_POST['pregunta'],
            $_POST['categoria_id']
        );
        $result = $pregunta->guardar();

    } else if ($operacion == "actualizar") {
        $pregunta = new Pregunta(
            $_POST['id'],
            $_POST['pregunta'],
            $_POST['categoria_id']
        );
        $result = $pregunta->actualizar();

    } else if ($operacion == "eliminar") {
        $pregunta = new Pregunta($_POST['id']);
        $result = $pregunta->eliminar();
    }
    
    if ($result) {
        echo "<br>La operación se ejecutó con éxito.";
    } else {
        echo "<br>La operación no se ejecutó con éxito.";
    }
    echo "<br><a href='../PreguntasCRUD/listarpreguntas.php'>Volver al listado</a>";

} else {
    echo "<br>No se recibió ninguna operación.";
    echo "<br><a href='../PreguntasCRUD/listarpreguntas.php'>Volver al listado</a>";
}
?>
