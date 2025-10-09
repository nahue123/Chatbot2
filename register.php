<?php
include(__DIR__ . "/conexion.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nombre, $email, $password);

    if ($stmt->execute()) {
        echo "<script>alert('Usuario creado correctamente'); window.location='login.php';</script>";
    } else {
        echo "<script>alert('Error al crear el usuario');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-container">
        <h2 class="login-title">Crear nuevo usuario</h2>
        <form method="POST" class="login-form">
            <label for="nombre" class="label">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="input-field" required><br><br>

            <label for="email" class="label">Correo electrónico:</label>
            <input type="email" name="email" id="email" class="input-field" required><br><br>

            <label for="password" class="label">Contraseña:</label>
            <input type="password" name="password" id="password" class="input-field" required><br><br>

            <button type="submit" class="submit-button">Registrar</button>
        </form>

        <div class="register-link">
            <a href="login.php" class="register-button">Volver al login</a>
        </div>
    </div>
</body>
</html>
