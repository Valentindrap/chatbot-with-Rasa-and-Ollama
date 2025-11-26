<?php include("check_session.php"); ?>
<?php
require_once("./clases/respuesta.class.php");
require_once("./clases/pregunta.class.php");

$respuesta = Respuesta::obtenerPorId($_GET['id']);
$preguntas = Pregunta::obtenerTodas();
?>

<html>
<head>
    <link rel="stylesheet" href="../css/generico.css">
</head>
</html>

<h2>Editar Respuesta</h2>

<form method="post" action="controller/respuesta.controller.php">
    <input type="hidden" name="operacion" value="actualizar"/>

    <label>ID:</label>
    <input type="text" value="<?= $respuesta->getId() ?>" readonly><br><br>

    <label>Respuesta:</label>
    <input type="text" name="respuesta" value="<?= $respuesta->getRespuesta() ?>" required><br><br>

    <label>Pregunta:</label>
    <select name="pregunta_id" required>
        <?php foreach ($preguntas as $p): ?>
            <option value="<?= $p->getId() ?>"
                <?= ($respuesta->getPregunta()->getId() == $p->getId()) ? "selected" : "" ?>>
                <?= $p->getPregunta() ?>
            </option>
        <?php endforeach; ?>
    </select>

    <br><br>
    <input type="submit" value="Aceptar">
</form>

<a href="listarRespuesta.php">Volver</a>
