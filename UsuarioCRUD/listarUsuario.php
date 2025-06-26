<link rel="stylesheet" href="listarUsuario.css">
<?php
require_once("../Model/usuario.class.php");
$usuarios = Usuario::obtenerTodos();
?>
<h2 style="text-align: center;">Listado de Usuarios</h2>
<div style="text-align: center; margin-bottom: 10px;">
    <a href="formAltaUsuario.php"> + Nuevo Usuario </a>
</div>
<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Rol</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($usuarios as $usuario): ?>
        <tr>
            <td><?= $usuario['id'] ?></td>
            <td><?= $usuario['nombre'] ?></td>
            <td><?= $usuario['email'] ?></td>
            <td><?= $usuario['rol_id'] ?></td> 
            <td>
                <a href="formEditarUsuario.php?id=<?= $usuario['id'] ?>">Editar</a>
                <form action="../Controller/usuario.controller.php" method="POST" style="display:inline;">
                    <input type="hidden" name="operacion" value="eliminar"/>
                    <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
                    <button type="submit" onclick="return confirm('¿Seguro que deseas eliminar este usuario?')">Eliminar</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>