<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Chatbot</title>
</head>
<body>
    <h1>Chatbot con POO y Base de Datos</h1>

    <form action="Controller/conversacion.controller.php" method="POST">
        <label for="pregunta">Escribí tu pregunta:</label><br>
        <input type="text" id="pregunta" name="pregunta" required autocomplete="off" style="width:300px;">
        <button type="submit">Enviar</button>
    </form>

    <?php
    if (isset($_GET['respuesta'])) {
        echo "<h3>Respuesta:</h3>";
        echo "<p>" . htmlspecialchars($_GET['respuesta']) . "</p>";
    }
    ?>
</body>
</html>