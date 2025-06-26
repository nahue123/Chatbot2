<link rel="stylesheet" href="formAltaUsuario.css">
<?php
include_once '../Model/rol.class.php';
$roles = Rol::obtenerTodxs();
?>

<form name="formAltaUsuario" action="../Controller/usuario.controller.php" method="POST">
    <input type="hidden" name="operacion" value="guardar" />
    <label> nombre </label>
    <input type="text" name="nombre" />
    <label> email </label>
    <input type="text" name="email" />
    <label> password </label>
    <input type="text" name="password" />
    <label> rol_id </label>
    <select name="rol_id" required>
        <option value="">-Seleccionar Rol-</option>
        <?php foreach ($roles as $rol): ?>
            <option value="<?= $rol['id'] ?>"><?= htmlspecialchars($rol['nombre']) ?></option>
        <?php endforeach; ?>
    </select>   
    <input type="submit" value="Aceptar" />
</form>