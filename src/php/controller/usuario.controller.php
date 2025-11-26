<?php
include "../clases/usuario.class.php";

$operacion = $_POST['operacion'];
$result = false;

if ($operacion == "guardar") {
    $usuario = new Usuario(
        null,
        $_POST['nombre'],
        $_POST['email'],
        password_hash($_POST['password'], PASSWORD_DEFAULT),
        $_POST['rol']
    );
    $result = $usuario->guardar();

} else if ($operacion == "actualizar") {
    $usuario = Usuario::obtenerPorId($_POST['id']);
    if ($usuario) {
        $usuario->setNombre($_POST['nombre']);
        $usuario->setEmail($_POST['email']);
        $usuario->setRolId($_POST['rol']);
        $usuario->setPassword(password_hash($_POST['password'], PASSWORD_DEFAULT));

        $result = $usuario->actualizar();
    }

} else if ($operacion == "eliminar") {
    $usuario = new Usuario($_POST['id']);
    $result = $usuario->eliminar();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado de la operación</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 50%;
            margin: 80px auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }

        h2 {
            color: #333;
        }

        .ok {
            color: #0a7c0a;
            font-size: 20px;
            font-weight: bold;
        }

        .error {
            color: #b30000;
            font-size: 20px;
            font-weight: bold;
        }

        a.boton {
            display: inline-block;
            margin-top: 25px;
            padding: 10px 20px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }

        a.boton:hover {
            background: #005fcc;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Resultado</h2>

        <?php if ($result): ?>
            <p class="ok">✔ Usuario procesado correctamente</p>
        <?php else: ?>
            <p class="error">✖ Error al procesar el usuario</p>
        <?php endif; ?>

        <a href="../listarUsuario.php" class="boton">Volver</a>
    </div>
</body>
</html>
