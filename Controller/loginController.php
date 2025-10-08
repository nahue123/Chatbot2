<?php
session_start();

// Ejemplo de credenciales válidas
$email_valido = "Admin@gmail.com";
$pass_valida  = "Admin";

// Verifico que se enviaron datos por POST
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email === $email_valido && $password === $pass_valida) {
        $_SESSION['usuario'] = $email;

        // Redirigir al index.php (chat)
        header("Location: ../Index.php");
        exit();
    } else {
        echo "Correo o contraseña incorrectos.";
    }
} else {
    echo "No se enviaron los datos correctamente.";
}
?>