<?php
include_once "../Model/conversacion.class.php";

if (isset($_POST['text'])) {
    $chat = new Conversacion();
    $pregunta = trim($_POST['text']);
    $respuesta = $chat->buscarRespuesta($pregunta);
    $chat->guardarConversacion($pregunta, $respuesta);
    echo $respuesta;
} else {
    echo "No recibí ninguna pregunta.";
}
?>