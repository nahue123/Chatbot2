<?php
include_once "../Model/categoria.class.php";
$operacion = $_POST["operacion"];

if (isset($operacion)) {
    $result = false;
    if ($operacion == "guardar") {
        $categoria = new Categoria(null, $_POST['nombre']);
        $result = $categoria->guardar();
    } else if ($operacion == "actualizar") {
        $categoria = new Categoria($_POST['id'], $_POST['nombre']); 
        $result = $categoria->actualizar();
    } else if ($operacion == "eliminar") {
        $categoria = new Categoria($_POST['id'], null);
        $result = $categoria->eliminar();
    }
    if ($result) {
        print "<br>La operación se ejecutó con éxito.";
    } else {
        print "<br>La operación no se ejecutó con éxito.";
    }
} else {
    print "<a href='../listarCategoria.php'>Volver</a>";
}
?>
