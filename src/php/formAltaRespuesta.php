<?php include("check_session.php"); ?>
<?php
require_once("./clases/pregunta.class.php");
$preguntas = Pregunta::obtenerTodas();
?>

<html>
<head>
    <link rel="stylesheet" href="../css/generico.css">
</head>
</html>

<h2>Nueva Respuesta</h2>

<form method="post" action="controller/respuesta.controller.php">
    <input type="hidden" name="operacion" value="guardar"/>

    <label>Respuesta:</label>
    <input type="text" name="respuesta" required><br><br>

    <label>Pregunta:</label>
    <select name="pregunta_id" required>
        <option value="">Seleccione una pregunta</option>
        <?php foreach ($preguntas as $p): ?>
            <option value="<?= $p->getId() ?>">
                <?= $p->getPregunta() ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <input type="submit" value="Aceptar">
</form>
