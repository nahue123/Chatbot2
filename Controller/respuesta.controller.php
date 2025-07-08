<?php
include_once "../Model/respuesta.class.php";

if (isset($_POST['operacion'])) {
    $operacion = $_POST['operacion'];
    $result = false;

    if ($operacion == "guardar") {
        $respuesta = new Respuesta(
            null,
            $_POST['respuesta'],
            $_POST['pregunta_id']
        );
        $result = $respuesta->guardar();

    } else if ($operacion == "actualizar") {
        $respuesta = new Respuesta(
            $_POST['id'],
            $_POST['respuesta'],
            $_POST['pregunta_id']
        );
        $result = $respuesta->actualizar();

    } else if ($operacion == "eliminar") {
        $respuesta = new Respuesta($_POST['id']);
        $result = $respuesta->eliminar();
    }
    
    if ($result) {
        echo "<br>La operación se ejecutó con éxito.";
    } else {
        echo "<br>La operación no se ejecutó con éxito.";
    }
    echo "<br><a href='../RespuestaCRUD/listarRespuesta.php'>Volver al listado</a>";

} else {
    echo "<br>No se recibió ninguna operación.";
    echo "<br><a href='../RespuestaCRUD/listarRespuesta.php'>Volver al listado</a>";
}
?>