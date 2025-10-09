<!-- login.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="login.css">
    <style>
        .register-link {
            display: block;
            text-align: center;
            margin-top: 15px;
        }
        .register-button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .register-button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2 class="login-title">Iniciar sesión</h2>

        <form action="Controller/loginController.php" method="POST" class="login-form">
            <label for="email" class="label">Correo electrónico:</label>
            <input type="email" name="email" id="email" class="input-field" required><br><br>

            <label for="password" class="label">Contraseña:</label>
            <input type="password" name="password" id="password" class="input-field" required><br><br>

            <button type="submit" class="submit-button">Ingresar</button>
        </form>

        <div class="register-link">
            <a href="register.php" class="register-button">Crear nuevo usuario</a>
        </div>
    </div>
</body>
</html>
