<?php
include_once __DIR__ . '/../Model/conversacion.class.php';

if (isset($_POST['text'])) {
    $pregunta = trim($_POST['text']);

    $chat = new Conversacion();
    $respuesta = $chat->buscar($pregunta);
    $chat->guardarConversacion($pregunta, $respuesta);

    echo $respuesta;
} else {
    echo "No se recibió ninguna entrada.";
}
?>
