<?php include("check_session.php"); ?>

<?php
require_once("./clases/pregunta.class.php");
$preguntas = Pregunta::obtenerTodas();
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/generico.css">
    <link rel="icon" href="../img/logo.png" type="image/png">
</head>
</html>

<h2 style="text-align: center;">Lista de Preguntas</h2>
<div style="text-align: center; margin-bottom: 10px;">
    <a href="formAltaPregunta.php">Nueva Pregunta</a>
</div>
<a href="../../entrada.php">Volver</a>

<?php if (!$preguntas) echo "No hay preguntas"; ?>

<table>
    <tr>
        <th>ID</th>
        <th>Pregunta</th>
        <th>Categoría</th>
        <th>Acciones</th>
    </tr>

    <?php foreach ($preguntas as $pregunta) { ?>
        <tr>
            <td><?= $pregunta->getId() ?></td>
            <td><?= $pregunta->getPregunta() ?></td>
            <td><?= $pregunta->getCategoria()->getNombre() ?></td>

            <td>
                <form action="controller/pregunta.controller.php" method="post" style="display:inline;">
                    <a href="formEditarPregunta.php?id=<?= $pregunta->getId() ?>">Editar</a>

                    <input type="hidden" name="operacion" value="eliminar">
                    <input type="hidden" name="id" value="<?= $pregunta->getId() ?>">

                    <input type="submit"
                           onclick="return confirm('¿Está seguro de eliminar esta pregunta?')"
                           value="Eliminar">
                </form>
            </td>
        </tr>
    <?php } ?>
</table>
