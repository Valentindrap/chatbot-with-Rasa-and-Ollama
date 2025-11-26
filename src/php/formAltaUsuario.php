<?php include("check_session.php"); ?>

<?php
require_once(__DIR__ . "/clases/usuario.class.php");
require_once(__DIR__ . "/clases/rol.class.php");

// Obtener roles desde la base (solo una vez)
$roles = Rol::obtenerTodas();
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/generico.css">
    <link rel="icon" href="../img/logo.png" type="image/png">
</head>
</html>

<h2 style="text-align: center;">Nuevo Usuario</h2>

<form action="controller/usuario.controller.php" method="post" style="max-width: 400px; margin: auto;">
    <input type="hidden" name="operacion" value="guardar">

    <label>Nombre:</label><br>
    <input type="text" name="nombre" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Contraseña:</label><br>
    <input type="password" name="password" required><br><br>

    <label>Rol:</label><br>
    <select name="rol" required>
        <?php foreach ($roles as $rol): ?>
            <option value="<?= $rol->getId() ?>">
                <?= $rol->getNombre() ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <input type="submit" value="Crear Usuario">
</form>
