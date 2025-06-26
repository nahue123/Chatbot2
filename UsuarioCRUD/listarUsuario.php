<?php
// Incluye la clase Usuario para poder usar sus métodos
require_once("../Model/usuario.class.php");

// Llama al método estático para obtener todos los usuarios
$usuarios = Usuario::obtenerTodos();
?>

<!-- Título centrado -->
<h2 style="text-align: center;">Listado de Usuarios</h2>

<!-- Botón para agregar un nuevo usuario -->
<div style="text-align: center; margin-bottom: 10px;">
    <a href="formAltaUsuario.php"> + Nuevo Usuario </a>
</div>

<!-- Tabla con los usuarios -->
<table>
    <tr>
        <!-- Encabezados de la tabla -->
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Rol</th>
        <th>Acciones</th>
    </tr>

    <!-- Recorre el arreglo de usuarios y muestra cada uno en una fila -->
    <?php foreach ($usuarios as $usuario): ?>
        <tr>
            <td><?= $usuario['id'] ?></td>
            <td><?= $usuario['nombre'] ?></td>
            <td><?= $usuario['email'] ?></td>
            <td><?= $usuario['rol'] ?></td> 
            <td>
                <!-- Enlace para editar -->
                <a href="formEditarUsuario.php?id=<?= $usuario['id'] ?>">Editar</a>

                <!-- Formulario para eliminar -->
                <form action="./Controller/usuario.controller.php" method="POST" style="display:inline;">
                    <input type="hidden" name="operacion" value="eliminar"/>
                    <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
                    <button type="submit" onclick="return confirm('¿Seguro que deseas eliminar este usuario?')">Eliminar</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>