<?php
include "../Model/rol.class.php";

if($operacion=="guardar"){
    $rol= new Rol(null, $_POST ['nombre']);
    $result=$rol->guardar();
}else if($operacion=="actualizar"){
    $rol= new Rol(null, $_POST ['id'],  $_POST ['nombre']);
    $result=$rol->actualizar();
}else if($operacion=="eliminar"){
    $rol= new Rol($_POST ['id'], null);
    $result=$rol->eliminar();
}

if($result){
    print"<b>La operacion se ejecuto con exito.";
}else{
    print"<b>La operacion no pude ejecutarse.";
}

print "<a href='listarRoles.php'>Volver</a>";
?>