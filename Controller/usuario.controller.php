<?php
include "../Model/usuario.class.php"; 

if (isset($_POST['operacion'])) {
    $operacion = $_POST['operacion'];
    $result = false;

    if ($operacion == "guardar") {
        $usuario = new Usuario(
            null,
            $_POST['nombre'],
            $_POST['email'],
            $_POST['password'],
            $_POST['rol_id']
        );
        $result = $usuario->guardar();

    } else if ($operacion == "actualizar") {
        $usuario = new Usuario(
            $_POST['id'],
            $_POST['nombre'],
            $_POST['email'],
            $_POST['password'],
            $_POST['rol_id']
        );
        $result = $usuario->actualizar();
    } else if ($operacion == "eliminar") {
        $usuario = new Usuario($_POST['id']);
        $result = $usuario->eliminar();
    }
    
    if ($result) {
        echo "<br>La operación se ejecutó con éxito.";
    } else {
        echo "<br>La operación no se ejecutó con éxito.";
    }
}else {
    echo "<br>No se recibió ninguna operación.";
    echo "<br><a href='../listarUsuarios.php'>Volver</a>";
}
?>