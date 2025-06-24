<?php
// Incluye la clase Rol para poder usar sus métodos
require_once("./Model/rol.class.php");

// Llama al método estático para obtener todos los roles
$roles = Rol::obtenerTodxs(); // Método estático: se llama sin instanciar la clase
?>

<!-- Título centrado -->
<h2 style="text-align: center;">Listado de Roles</h2>

<!-- Botón para agregar un nuevo rol -->
<div style="text-align: center; margin-bottom: 10px;">
    <a href="formAltaRol.php"> + Nuevo Rol </a>
</div>

<!-- Tabla con los roles -->
<table>
    <tr>
        <!-- Encabezados de la tabla -->
        <th>ID</th>
        <th>Nombre</th>
        <th>Acciones</th>
    </tr>

    <!-- Recorre el arreglo de roles y muestra cada uno en una fila -->
    <?php foreach ($roles as $rol): ?>
        <tr>
            <td><?= $rol['id'] ?></td> <!-- Muestra el ID del rol -->
            <td><?= $rol['nombre'] ?></td> <!-- Muestra el nombre del rol -->
            <td>
                <!-- Botón para editar el rol (pasa el ID por la URL) -->
                <a href="rol_editar.php?id=<?= $rol['id'] ?>">Editar</a>

                <!-- Formulario para eliminar el rol (usa método POST) -->
                <form action="../procesar/rol_eliminar.php" method="POST" style="display:inline;">
                    <!-- Campo oculto que lleva el ID del rol a eliminar -->
                    <input type="hidden" name="id" value="<?= $rol['id'] ?>">
                    <!-- Botón de eliminar con confirmación -->
                    <button type="submit" onclick="return confirm('¿Seguro que querés eliminar este rol?')">Eliminar</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>