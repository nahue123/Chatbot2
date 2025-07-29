<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require_once "../Model/respuesta.class.php";
require_once "../Model/conversacion.class.php";

$idUsuario = isset($_SESSION['usuario_id']) ? $_SESSION['usuario_id'] : 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['pregunta'])) {
    $pregunta = trim($_POST['pregunta']);

    $respuestaObj = new Respuesta();
    $respuesta = $respuestaObj->buscar($pregunta);

    $conversacion = new Conversacion(null, $pregunta, $respuesta);
    $guardado = $conversacion->guardar();

    if ($guardado) {
        header("Location: ../index.php?respuesta=" . urlencode($respuesta));
        exit;
    } else {
        echo "Error al guardar la conversación.";
    }
} 
?>
