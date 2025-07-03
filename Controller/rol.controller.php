<?php
include_once "../Model/rol.class.php";
//Capturamos la variable que viene del formulario 
$operacion=$_POST["operacion"];

// Verificamos si se recibió la operación
if (isset($_POST['operacion'])) {
    $operacion = $_POST['operacion'];
    $result = false;

    // Operación: Guardar un nuevo rol
    if ($operacion == "guardar") {
        $rol = new Rol(null, $_POST['nombre']);
        $result = $rol->guardar();

    // Operación: Actualizar un rol existente
    } else if ($operacion == "actualizar") {
        $rol = new Rol($_POST['id'], $_POST['nombre']); 
        $result = $rol->actualizar();

    // Operación: Eliminar un rol
    } else if ($operacion == "eliminar") {
        $rol = new Rol($_POST['id'], null);
        $result = $rol->eliminar();
    }

    if ($result) {
       print "<br>La operacion se ejecuto con exito.";
    } else {
        print "<br>La operacion no se ejecuto con exito.";
    }
} else {
    print "<a href='../listarRol.php'>Volver</a>";
}
?>