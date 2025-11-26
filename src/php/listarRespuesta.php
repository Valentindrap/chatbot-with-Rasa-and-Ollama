<?php include("check_session.php"); ?>
<?php
require_once("./clases/respuesta.class.php");
$respuestas = Respuesta::obtenerTodas();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Respuestas</title>
    <link rel="stylesheet" href="../css/generico.css">
</head>

<body>

<h2 style="text-align:center;">Lista de Respuestas</h2>

<div style="margin: 20px 0; text-align:center;">
    <a class="boton" href="formAltaRespuesta.php">➕ Nueva Respuesta</a>
    <a class="boton" href="../../entrada.php">↩ Volver</a>
</div>

<table>
    <tr>
        <th>ID</th>
        <th>Respuesta</th>
        <th>Pregunta</th>
        <th>Acciones</th>
    </tr>

    <?php foreach ($respuestas as $r): ?>
        <tr>
            <td><?= $r->getId() ?></td>
            <td><?= $r->getRespuesta() ?></td>
            <td><?= $r->getPregunta()->getPregunta() ?></td>

            <td>
                <form method="post" action="controller/respuesta.controller.php" style="display:inline;">
                    <a href="formEditarRespuesta.php?id=<?= $r->getId() ?>">Editar</a>
                    <input type="hidden" name="operacion" value="eliminar">
                    <input type="hidden" name="id" value="<?= $r->getId() ?>">
                    <input type="submit" value="Eliminar"
                        onclick="return confirm('¿Está seguro de eliminar esta respuesta?')">
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
