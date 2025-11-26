<?php
include "../clases/pregunta.class.php";

$operacion = $_POST['operacion'];

if ($operacion == "guardar") {
    $pregunta = new Pregunta(null, $_POST['pregunta'], $_POST['categoria_id']);
    $result = $pregunta->guardar();

} else if ($operacion == "actualizar") {
    $pregunta = new Pregunta($_POST['id'], $_POST['pregunta'], $_POST['categoria_id']);
    $result = $pregunta->actualizar();

} else if ($operacion == "eliminar") {
    $pregunta = new Pregunta($_POST['id']);
    $result = $pregunta->eliminar();
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
            <p class="ok">✔ Pregunta procesada correctamente</p>
        <?php else: ?>
            <p class="error">✖ Error al procesar la pregunta</p>
        <?php endif; ?>

        <a href="../listarPregunta.php" class="boton">Volver</a>
    </div>
</body>
</html>
