<?php
// loginController.php

require_once 'Model/Usuario.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $usuario = new Usuario();
    $validacion = $usuario->validarLogin($email, $password);

    if ($validacion) {
        header("Location: dashboard.php");
    } else {
        echo "Credenciales incorrectas.";
    }
}
?>
