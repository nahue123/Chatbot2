<?php
include "../Model/usuario.class.php"; 

// Verificamos si se recibió la operación
if (isset($_POST['operacion'])) {
    $operacion = $_POST['operacion'];
    $result = false;

    // Operación: Guardar un nuevo usuario
    if ($operacion == "guardar") {
        $usuario = new Usuario(
            null,
            $_POST['nombre'],
            $_POST['email'],
            $_POST['password'],
            $_POST['rol']
        );
        $result = $usuario->guardar();

    // Operación: Actualizar un usuario existente
    } else if ($operacion == "actualizar") {
        $usuario = new Usuario(
            $_POST['id'],
            $_POST['nombre'],
            $_POST['email'],
            $_POST['password'],
            $_POST['rol']
        );
        $result = $usuario->actualizar();

    // Operación: Eliminar un usuario
    } else if ($operacion == "eliminar") {
        $usuario = new Usuario($_POST['id']);
        $result = $usuario->eliminar();
    }

    // Resultado
    if ($result) {
        echo "<br>La operación se ejecutó con éxito.";
    } else {
        echo "<br>La operación no se ejecutó con éxito.";
    }
} else {
    echo "<br>No se recibió ninguna operación.";
    echo "<br><a href='../listarUsuarios.php'>Volver</a>";
}
?>