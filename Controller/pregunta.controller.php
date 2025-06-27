<?php
include "../Model/pregunta.class.php";
$operacion = $_POST["operacion"];

if (isset($operacion)) {
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
        $pregunta = new Pregunta($_POST['id'], null);
        $result = $pregunta->eliminar();
    }
    if ($result) {
        print "<br>La operación se ejecutó con éxito.";
    } else {
        print "<br>La operación no se ejecutó con éxito.";
    }
} else {
    print "<a href='../listarCategoria.php'>Volver</a>";
}
?>